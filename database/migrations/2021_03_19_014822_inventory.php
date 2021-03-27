<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function(Blueprint $table){
            $table->id();
            $table->string('pengelola');
            $table->string('tempat');
            $table->string('kategori');
            $table->string('barang');
            $table->integer('jumlah');
            $table->integer('baik');
            $table->integer('rusak');
            $table->string('waktu_di_tambahkan');
        });

        Schema::create('users', function(Blueprint $table){
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('role');
        });

        Schema::create('opsi', function(Blueprint $table){
            $table->id();
            $table->string('tempat');
            $table->string('kategori');
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
