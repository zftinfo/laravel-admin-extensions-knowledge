<?php

namespace ZFTInfo\Knowledge\Http\Controllers;

use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;

class KnowledgeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Title')
            ->description('Description')
            ->body(view('knowledge::index'));
    }
}