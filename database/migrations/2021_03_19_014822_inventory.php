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
            $table->string('kelompok_aset');
            $table->string('jenis');
            $table->string('nama');
            $table->integer('jumlah');
            $table->string('kondisi');
            $table->string('kode');
            $table->string('merk');
            $table->integer('harga');
            $table->string('tahun_pembelian');
            $table->string('sumber_dana');
            $table->string('keterangan');
            $table->string('waktu_di_tambahkan');
        });

        Schema::create('kelompok_aset', function(Blueprint $table){
            $table->id();
            $table->string('nama');
            $table->string('umur_ekonomis');
            $table->string('keterangan');
        });

        Schema::create('users', function(Blueprint $table){
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('role');
        });

        Schema::create('pengelola', function(Blueprint $table){
            $table->id();
            $table->string('pengelola');
            $table->string('keterangan');
        });

        Schema::create('opsi', function(Blueprint $table){
            $table->id();
            $table->string('tempat');
            $table->string('kategori');
        });

        Schema::create('sumber_dana', function(Blueprint $table){
            $table->id();
            $table->string('nama');
            $table->string('keterangan');
        });

        Schema::create('ruangan', function(Blueprint $table){
            $table->id();
            $table->string('nama');
            $table->string('kode');
            $table->string('keterangan');
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
