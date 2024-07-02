<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false); // Menjadikan kolom title tidak boleh bernilai null
            $table->text('description')->nullable(false); // Menjadikan kolom description tidak boleh bernilai null
            $table->enum('status', ['open', 'closed', 'pending'])->default('open')->nullable(false); // Menjadikan kolom status tidak boleh bernilai null
            $table->unsignedBigInteger('user_id')->nullable(false); // Menjadikan kolom user_id tidak boleh bernilai null
            $table->unsignedBigInteger('agent_id')->nullable()->default(null); // Menjadikan kolom agent_id boleh bernilai null
            $table->unsignedBigInteger('kecamatan_id')->nullable(false); // Menjadikan kolom kecamatan_id tidak boleh bernilai null
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('agent_id')->references('id')->on('users');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan'); // Menambahkan foreign key kecamatan_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
