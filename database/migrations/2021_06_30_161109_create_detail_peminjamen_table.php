<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_peminjamen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nota')->index()->constrained('peminjamen', 'nota')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreignId('kode_buku')->index()->constrained('bukus', 'id')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->unique(['nota', 'kode_buku']);
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
        Schema::dropIfExists('detail_peminjamen');
    }
}
