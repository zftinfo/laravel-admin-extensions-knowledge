<?php

namespace ZFTInfo\Knowledge\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 't_article';

    protected $fillable = [
        'name', # 名称
        'link', # 链接
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 't_article_tag', 'article_id', 'tag_id');
    }
}
