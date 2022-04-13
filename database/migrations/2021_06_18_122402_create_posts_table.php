<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('user_id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('followup')->nullable();
            $table->string('rper_name')->nullable();
            $table->string('image');
            $table->string('imagecredit')->nullable();
            $table->text('leadnews')->nullable();
            $table->text('details')->nullable();
            $table->string('metatitle')->nullable();
            $table->string('keyword')->nullable();
            $table->text('description')->nullable();
            $table->text('tag')->nullable();
            $table->integer('headline')->nullable();
            $table->integer('first_section')->nullable();
            $table->integer('first_section_thumbnail')->nullable();
            $table->integer('bigthumbnail')->nullable();
            $table->integer('ent_bigthumbnile')->nullable();
            $table->string('post_date')->nullable();
            $table->string('post_month')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
