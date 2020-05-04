<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPostsAddTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function(Blueprint $table) {
            $table->renameColumn('title', 'title_uz');
            $table->renameColumn('short', 'short_uz');
            $table->renameColumn('content', 'content_uz');

            $table->string('title_ru');
            $table->string('short_ru');
            $table->text('content_ru');

            $table->string('title_en');
            $table->string('short_en');
            $table->text('content_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
