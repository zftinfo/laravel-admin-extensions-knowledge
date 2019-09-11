<?php

use Jialeo\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('knowledge.database.table_prefix') . 'article_tag', function (Blueprint $table) {
            $table->increments('id')->comment('唯一标识');

            $table->unsignedInteger('article_id')->comment('文章ID');
            $table->foreign('article_id')->references('id')->on(config('knowledge.database.table_prefix') . 'article');

            $table->unsignedInteger('tag_id')->comment('标签ID');
            $table->foreign('tag_id')->references('id')->on(config('knowledge.database.table_prefix') . 'tag');

            $table->timestamp('created_at')->nullable()->comment('创建时间');
            $table->timestamp('updated_at')->nullable()->comment('更新时间');

            $table->comment = '图书标签关系表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('book.database.table_prefix') . 'article_tag');
    }
}
