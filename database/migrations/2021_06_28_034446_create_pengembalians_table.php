<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembaliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->unsignedBigInteger('nota')->primary();
            $table->foreignId('kode_user')->index()->constrained('users', 'id')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreignId('kode_petugas')->index()->constrained('users', 'id')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->integer('denda')->nullable();
            $table->timestamp('tanggal_pengembalian')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('pengembalians');
    }
}
