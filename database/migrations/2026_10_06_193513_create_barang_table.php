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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('foto',255)->nullable();
            $table->string('kode_barang',50)->unique();
            $table->string('nama_barang',150);

            $table->foreignId('satuan_id')
                ->constrained('satuan')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('kategori_id')
                ->constrained('kategori')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->integer('harga_beli')->default(0);
            $table->integer('harga_jual')->default(0);
            $table->integer('stok')->default(0);
            $table->integer('min_stok')->default(5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
