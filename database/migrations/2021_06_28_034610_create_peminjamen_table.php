<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->unsignedBigInteger('nota')->primary();
            $table->foreignId('kode_user')->index()->constrained('users', 'id')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreignId('kode_petugas')->nullable()->index()->constrained('users', 'id')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->timestamp('tanggal_pinjam')->nullable();
            $table->timestamp('tanggal_kembali')->nullable();
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
        Schema::dropIfExists('peminjamen');
    }
}
