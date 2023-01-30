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
        Schema::create('udls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('alamat');
            $table->string('kelurahan');
            $table->string('no_rumah')->nullable();
            $table->string('rt');
            $table->string('rw');
            $table->string('telepon');
            $table->string('identitas');
            $table->string('no_identitas');
            $table->string('layanan');
            $table->string('peruntukan');
            $table->string('daya');
            $table->string('jadwal_ubah')->nullable();
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
        Schema::dropIfExists('udls');
    }
};
