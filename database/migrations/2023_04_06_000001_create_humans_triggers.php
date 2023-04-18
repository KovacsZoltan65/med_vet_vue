<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // BEFORE INSERT
        $procedures = "CREATE DEFINER=`root`@`localhost` TRIGGER med_vet.humans_BEFORE_INSERT 
            BEFORE INSERT ON med_vet.humans
            FOR EACH ROW
            BEGIN
                SET NEW.uuid = UUID();
                SET NEW.checksum = md5(concat(NEW.name, NEW.type_id, NEW.mod_u_id));
            END;";

        // AFTER INSERT
        $procedures .= "CREATE DEFINER=`root`@`localhost` TRIGGER med_vet.humans_AFTER_INSERT
            AFTER INSERT
            ON med_vet.humans
            FOR EACH ROW
            BEGIN
            IF @disable_trigger IS NULL OR @disable_trigger = 0 THEN
                INSERT INTO med_vet.humans_tl SELECT NULL, UTC_TIMESTAMP(), 'I', h.* FROM med_vet.humans h WHERE h.id = NEW.id;
            END IF;
            END;";

        // BEFORE UPDATE
        $procedures .= "CREATE DEFINER=`root`@`localhost` TRIGGER med_vet.humans_BEFORE_UPDATE
            BEFORE UPDATE ON med_vet.humans
            FOR EACH ROW
            BEGIN
                # Új ellenőrző összeg
                SET @new_checksum = MD5(CONCAT(NEW.name, NEW.type_id, NEW.mod_u_id));
            
                IF OLD.checksum <> @new_checksum THEN
                    SET NEW.checksum = @new_checksum;
                END IF;
            
            END;";

        // AFTER UPDATE
        $procedures .= "CREATE DEFINER=`root`@`localhost` TRIGGER med_vet.humans_AFTER_UPDATE
            AFTER UPDATE ON med_vet.humans
            FOR EACH ROW
            BEGIN
                IF @disable_trigger IS NULL OR @disable_trigger = 0 THEN
                    # alap állapot
                    SET @mod_op = 'I';

                    # törlés vagy visszaállítás 
                    IF ( OLD.deleted_at IS NULL AND NEW.deleted_at IS NOT NULL ) THEN
                        SET @mod_op = 'SD';
                    ELSEIF( OLD.deleted_at IS NOT NULL AND NEW.deleted_at IS NULL ) THEN
                        SET @mod_op = 'R';
                    END IF;

                    # Szerkesztés
                    IF ( OLD.updated_at <> NEW.updated_at ) THEN
                        SET @mod_op = 'U';
                    END IF;

                    # ellenőrző összeg
                    SET @new_checksum = MD5(CONCAT(NEW.name, NEW.type_id, NEW.mod_u_id));
            
                    IF ( OLD.checksum <> @new_checksum ) THEN
                        INSERT INTO med_vet.humans_tl SELECT NULL, UTC_TIMESTAMP(), @mod_op, h.* FROM med_vet.humans h WHERE h.id = NEW.id;
                    END IF;
            
                END IF;
            END;";

        // BEFORE DELETE
        $procedures .= "CREATE DEFINER=`root`@`localhost` TRIGGER med_vet.humans_BEFORE_DELETE 
            BEFORE DELETE ON med_vet.humans
            FOR EACH ROW
            BEGIN
                IF @disable_trigger IS NULL OR @disable_trigger = 0 THEN
                    INSERT INTO med_vet.humans_tl SELECT NULL, UTC_TIMESTAMP(), 'D', h.* FROM med_vet.humans h WHERE h.id = OLD.id;
                END IF;
            END;";

        DB::unprepared($procedures);
    }

    public function down()
    {
        $procedures = "DROP TRIGGER IF EXISTS med_vet.humans_BEFORE_INSERT;
        DROP TRIGGER IF EXISTS med_vet.humans_AFTER_INSERT;
        DROP TRIGGER IF EXISTS med_vet.humans_BEFORE_UPDATE;
        DROP TRIGGER IF EXISTS med_vet.humans_AFTER_UPDATE;
        DROP TRIGGER IF EXISTS med_vet.humans_BEFORE_DELETE;";

        DB::unprepared($procedures);
    }
};