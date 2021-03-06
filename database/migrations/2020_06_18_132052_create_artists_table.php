<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('Ap')->nullable();
            $table->string('Am')->nullable();
            $table->string('nameArt')->nullable();
            $table->string('imagen')->nullable();
            $table->string('imagenAlu')->nullable();
            $table->string('urlFa')->nullable();
            $table->string('descripcion', 1300)->nullable();
            $table->boolean('enabled')->default(true);
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
        Schema::dropIfExists('artists');
    }
}
