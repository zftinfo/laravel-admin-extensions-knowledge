<?php


namespace ZFTInfo\Knowledge\Commands;

use Illuminate\Console\Command;


use ZFTInfo\Knowledge\Models\Course;
use ZFTInfo\Knowledge\Models\Article;
use ZFTInfo\Knowledge\Models\Tag;

use Carbon\Carbon;

use DB;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zftinfo-ext:knowledge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the knowledge config';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('migrate');

        $this->info('migrate success');

        $this->seeder_demo();

        $this->seeder_menu();

        $this->info('seeder success');
    }


    protected function seeder_demo()
    {
        $course_info = Course::updateOrCreate(
            array(
                'name' => "十三邀",
            ),
            array(
                'name' => "十三邀",
                'code' => "",
                'link' => "",
                'desc' => "",

                'created_at' =>Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            )
        );

        $article_info = Article::updateOrCreate(
            array(
                'name' => "连红30年！这位日本超级偶像究竟有何魅力？",
            ),
            array(
                'name' => "连红30年！这位日本超级偶像究竟有何魅力？",
                'link' => "https://v.qq.com/x/cover/w5yaqtfu572ign9/c0861yiat22.html?",

                'created_at' =>Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            )
        );


        $tag_info = Tag::updateOrCreate(
            array(
                'name' => "十三邀",
            ),
            array(
                'name' => "十三邀",
                'desc' => "",

                'created_at' =>Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            )
        );

        $tag_info_2 = Tag::updateOrCreate(
            array(
                'name' => "许知远",
            ),
            array(
                'name' => "许知远",
                'desc' => "",
                
                'created_at' =>Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            )
        );


        DB::table('t_article_tag')->insert(array('article_id' => $article_info->id, 'tag_id' => $tag_info->id));
        DB::table('t_article_tag')->insert(array('article_id' => $article_info->id, 'tag_id' => $tag_info_2->id));

        DB::table('t_course_article')->insert(array('course_id' => $course_info->id, 'article_id' => $article_info->id));

        DB::table('t_course_tag')->insert(array('course_id' => $course_info->id, 'tag_id' => $tag_info->id));
        DB::table('t_course_tag')->insert(array('course_id' => $course_info->id, 'tag_id' => $tag_info_2->id));

    }


    protected function seeder_menu()
    {
         $data = [
            [
                'id' => 200,
                'parent_id' => 0,
                'order' => 200,
                'title' => '知识付费',
                'icon' => 'fa-book',
                'uri' => '/',
            ],
            [
                'id' => 201,
                'parent_id' => 200,
                'order' => 201,
                'title' => '课程管理',
                'icon' => 'fa-book',
                'uri' => '/course',
            ],
            [
                'id' => 203,
                'parent_id' => 200,
                'order' => 203,
                'title' => '文章管理',
                'icon' => 'fa-book',
                'uri' => '/article',
            ],
            [
                'id' => 204,
                'parent_id' => 200,
                'order' => 204,
                'title' => '标签管理',
                'icon' => 'fa-book',
                'uri' => '/tag',
            ]

        ];

        DB::table('admin_menu')->insert($data);
    }
}
