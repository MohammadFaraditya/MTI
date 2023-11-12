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
        Schema::create('users', function (Blueprint $table) {
            $table->string('ID_Akun')->nullable();
            $table->string('Role')->nullable();
            $table->string('Nama')->nullable();
            $table->string('Alamat')->nullable();
            $table->date('Tanggal_Lahir')->nullable();
            $table->string('Kota_Kelahiran')->nullable();
            $table->string('Username')->nullable();
            $table->string('Password')->nullable();
            $table->string('ID_Gaji')->nullable();
            $table->string('ID_Bus')->nullable();
            $table->string('ID_Komisi')->nullable();
            $table->string('No_Sim')->nullable();
            $table->string('Status')->nullable();
            $table->primary('ID_Akun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
