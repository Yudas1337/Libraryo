<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku', 100);
            $table->string('penulis_buku', 100);
            $table->string('penerbit_buku', 100);
            $table->string('foto_buku', 100);
            $table->char('tahun_penerbit', 4);
            $table->integer('stok');
            $table->foreignId('id_rak')->index()->constrained('raks', 'id')->onUpdate('CASCADE')->onDelete('RESTRICT');
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
        Schema::dropIfExists('bukus');
    }
}
