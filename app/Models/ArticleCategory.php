<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Categories;

class ArticleCategory extends Model
{
    use HasFactory;
    protected $table = "category_article";
}