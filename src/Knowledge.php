<?php

namespace ZFTInfo\Knowledge;

use Encore\Admin\Extension;

class Knowledge extends Extension
{
    public $name = 'knowledge';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';

    public $menu = [
        'title' => 'Knowledge',
        'path'  => 'knowledge',
        'icon'  => 'fa-gears',
    ];
}