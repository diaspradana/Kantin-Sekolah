<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_produk')->constrained('produks')->onDelete('cascade');
            $table->enum('status', ['not_paid', 'paid', 'teken']);
            $table->double('harga', 5);
            $table->integer('kuantitas');
            $table->double('total_harga', 5);
            $table->timestamp('tgl_transaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
