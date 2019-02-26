<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMoviesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('movies', function (Blueprint $table) {
            $table->integer('id_genre')->unsigned()->nullable();
            $table->foreign('id_genre')->references('id')->on('genres')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropForeign('movies_id_genre_foreign');
            $table->dropColumn('id_genre');
        });
    }

}
