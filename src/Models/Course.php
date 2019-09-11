<?php

namespace ZFTInfo\Knowledge\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 't_course';

    protected $fillable = [
        'name', # 名称
        'code',
        'link', # 链接
        'desc'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 't_course_tag', 'course_id', 'tag_id');
    }

    public function articles()
    {
        return $this->belongsToMany(Tag::class, 't_course_article', 'course_id', 'article_id');
    }
}
