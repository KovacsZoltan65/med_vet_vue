<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('humans_tl', function (Blueprint $table) {
            $table->comment('Személyek history');
            $table->integer('tl_id', true)->comment('Rekord azonosító');
            $table->timestamp('mod_at')->nullable()->comment('Módosító azonosítója');
            $table->enum('mod_op', ['I', 'U', 'SD', 'R', 'D'])->nullable()->comment('Módosítás típusa I = insert; U = update; SD = soft delete; R = restore; D = delete');
            $table->integer('id')->comment('Rekord azonosító');
            $table->string('name')->comment('Név');
            $table->integer('type_id')->default(1)->comment('szemény típusa');
            $table->integer('mod_u_id')->comment('módosító azonosítója');
            $table->string('uuid', 36)->nullable()->comment('Globális azonosító');
            $table->string('checksum', 32)->nullable()->comment('ellenörző összeg');
            $table->timestamp('created_at')->nullable()->comment('rekord készült');
            $table->timestamp('updated_at')->nullable()->comment('utolsó frissítés');
            $table->softDeletes()->comment('törlés dátuma');
            $table->timestamp('status_changed_at')->nullable()->comment('státusz változás');
            $table->timestamp('syncronized_at')->nullable()->comment('utolsó szinkronizálás');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('humans_tl');
    }
};
