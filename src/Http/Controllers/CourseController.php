<?php

namespace ZFTInfo\Knowledge\Http\Controllers;

use Illuminate\Routing\Controller;


use ZFTInfo\Knowledge\Models\Course;
#use ZFTInfo\Knowledge\Models\Author;
#use ZFTInfo\Knowledge\Models\Publisher;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CourseController extends AdminController
{
    use HasResourceActions;

    /**
     * @var string
     */
    protected $title = '课程';
    protected $desc_index = '列表';
    protected $desc_show = '详情';
    protected $desc_edit = '编辑';
    protected $desc_create = '创建';
    protected $desc_url = '/course';

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header($this->title)
            ->description($this->desc_index)
            ->breadcrumb(
                ['text' => $this->title, 'url' => $this->desc_url],
                ['text' => $this->desc_index])
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header($this->title)
            ->description($this->desc_show)
            ->breadcrumb(
                ['text' => $this->title, 'url' => $this->desc_url],
                ['text' => $this->desc_show])
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header($this->title)
            ->description($this->desc_edit)
            ->breadcrumb(
                ['text' => $this->title, 'url' => $this->desc_url],
                ['text' => $this->desc_edit])
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header($this->title)
            ->description($this->desc_create)
            ->breadcrumb(
                ['text' => $this->title, 'url' => $this->desc_url],
                ['text' => $this->desc_create])
            ->body($this->form($request));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Course());

        $grid->disableRowSelector();

        $grid->paginate(20);

        $grid->model()->orderBy('id', 'desc');

        $grid->id('序号')->sortable();

        $grid->name('名称');

        $grid->tags('标签')->pluck('name')->label();

        $grid->code('编码');

        $grid->link('链接')->link();
      
        $grid->desc('描述');

        // 搜索相关
        $grid->filter(function (Grid\Filter $filter) {

            $filter->disableIdFilter();

            $filter->like('name', '名称');

        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Course::findOrFail($id));

        $show->name('名称');

        $show->tags('标签')->as(function ($authors) {
            return $authors->pluck('name');
        })->label();

        $show->code('编码');

        $show->link('链接')->link();

        $show->desc('描述');


        $show->divider();

        $show->created_at('创建时间');

        $show->updated_at('更新时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Course);

        $form->text('name', '名称')->rules('required');

        $form->text('code', '编码');

        $form->url('link', '链接');

        $form->text('desc', '描述');
        

        return $form;
    }
}