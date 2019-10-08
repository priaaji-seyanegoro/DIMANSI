<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableMurid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('murid', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->date('tanggal_lahir');
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
        //
    }
}
