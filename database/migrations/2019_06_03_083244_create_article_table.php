<?php

use Jialeo\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('knowledge.database.table_prefix') . 'article', function (Blueprint $table) {
            
            $table->increments('id')->comment('唯一标识');

            $table->string('name')->comment('名称');
            $table->string('link')->comment('链接');

            $table->timestamp('created_at')->nullable()->comment('创建时间');
            $table->timestamp('updated_at')->nullable()->comment('更新时间');

            $table->comment = '文章表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('knowledge.database.table_prefix') . 'article');
    }
}
