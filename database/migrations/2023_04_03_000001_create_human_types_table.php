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
        Schema::create('human_types', function (Blueprint $table) {
            $table->comment('Személy típusok');
            $table->integer('id', true)->comment('Rekord azonosító');
            $table->string('name')->comment('Név');
            $table->integer('mod_u_id')->default(0)->comment('módosító azonosítója');
            $table->string('uuid', 36)->comment('Globális azonosító');
            $table->string('checksum', 32)->comment('ellenörző összeg');
            $table->timestamp('created_at')->nullable()->comment('rekord készült');
            $table->timestamp('updated_at')->nullable()->comment('utolsó frissítés');
            $table->softDeletes()->comment('törlés dátuma');
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
        Schema::dropIfExists('human_types');
    }
};
