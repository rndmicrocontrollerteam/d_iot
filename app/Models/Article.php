<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleType;
use App\Models\Category;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;


    protected $fillable = [
        "user_id",
        "title",
        "slug",
        "article_role",
        "category_id",
        "description",
        "article_type_id",
        "images",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function articleType(){
        return $this->belongsTo(ArticleType::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'category_article');
    }
    
    public function getShortDescriptionAttribute()
    {
        return Str::limit(
            nl2br(strip_tags($this->description)),
            90
        );
    }

}

