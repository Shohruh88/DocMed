<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationPostCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Begin add index to posts
        Schema::table('posts', function(Blueprint $table) {
            $table->bigInteger('id_cat')->unsigned()->index()->after('id');
            $table->foreign('id_cat')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Begin add index to posts
        Schema::table('posts', function(Blueprint $table) {
            $table->dropColumn('id_cat');
        });
    }
}
