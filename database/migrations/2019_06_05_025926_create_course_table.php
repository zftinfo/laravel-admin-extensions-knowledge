<?php

use Jialeo\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('knowledge.database.table_prefix') . 'course', function (Blueprint $table) {

            $table->increments('id')->comment('唯一标识');

            $table->string('name')->comment('名称');
            $table->string('code')->comment('编码');
            $table->string('link')->comment('链接');
            $table->string('desc')->comment('描述');

            $table->timestamp('created_at')->nullable()->comment('创建时间');
            $table->timestamp('updated_at')->nullable()->comment('更新时间');

            $table->comment = '知识课程表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('knowledge.database.table_prefix') .'course');
    }
}
