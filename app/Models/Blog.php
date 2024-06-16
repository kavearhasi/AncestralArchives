<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{

    use HasFactory,SoftDeletes;

    protected $table = 'blogs';
    protected $fillable = [
        'user_id',
        'blog_title',
        'blog_content',
        'blog_banner',
        'blog_approved_status',
        'blog_video_link'
    ];
}
