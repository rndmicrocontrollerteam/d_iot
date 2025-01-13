<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ArticleCategory;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Hashids\Hashids;
use Illuminate\Http\Request;


class IndexController extends Controller
{
     public function index(Request $request){
            $articlealls = "";
            $noresult = '<div class="bg-red-500 flex items-center justify-center p-4 rounded-md font-semibold text-white list-none"><ion-icon name="warning"></ion-icon>No Result For "'.$request->searchQuest.'"</div>';
            if($request->ajax()){
               if($request->has('searchQuest')){
                $articleall = Article::where('title','like','%'.$request->searchQuest.'%')->get();
                if($request->searchQuest == ""){
                    $articleall = Article::all();
                  }
                  if($articleall){
                    if( !Auth::user() || Auth::user()->user_roles_id == 2){
                        foreach($articleall as $key => $article){
                            foreach($article->categories as $percategory){
                            if($article->article_type_id == 1){
                                $articlealls.= '<ul>'.'<p class="text-left font-semibold flex gap-1 items-center" id="iconsearchcat">'.$percategory->icon.$percategory->name.'</p>'.
                                '<li class="resultsearch justify-start relati`ve bg-slate-100  dark:bg-slate-600 dark:text-slate-300 duration-200 font-semibold shadow-md hover:bg-blue-500 rounded-md hover:text-white mb-2 p-4 w-full flex items-center">'.'<a class="flex items-center" href='."/article/$article->slug".'>'.'<ion-icon name="document-text"></ion-icon>'.Str::limit($article->title,65).'<ion-icon name="return-down-back-outline" class="absolute right-2 text-white"></ion-icon>'.'</a>'.'</li>'.
                                '</ul>';
                            }
                          }
                        }} else {
                            foreach($articleall as $key => $article){
                                foreach($article->categories as $percategory){
                                    $articlealls.= '<ul>'.'<p class="text-left font-semibold flex gap-1 items-center" id="iconsearchcat">'.$percategory->icon.$percategory->name.'</p>'.
                                '<li class="resultsearch justify-start bg-slate-100  dark:bg-slate-600 dark:text-slate-300 duration-200 font-semibold shadow-md hover:bg-blue-500 rounded-md hover:text-white mb-2 p-4 w-full flex items-center">'.'<a class="flex items-center" href='."/article/$article->slug".'>'.'<ion-icon name="document-text"></ion-icon>'.Str::limit($article->title,65).'</a>'.'</li>'.
                                '</ul>';
                                }
                              }
                          }
             }

       if($articlealls == ""){
          return json_encode($noresult);
       } else {
          return json_encode($articlealls);
       }

    }}
    else {
    $articleall = Article::latest()->paginate(9);
    }

    return view('home',compact('articleall'));


    }

    public function show($slug ,Request $request){
    $article = Article::with('user')->where('slug',$slug)->firstOrFail();
    $idofarticle = $article->id;
    $articlealls = "";
    $noresult = '<div class="bg-red-500 p-4 rounded-md font-semibold text-white list-none flex justify-center items-center"><ion-icon name="warning"></ion-icon>No Result</div>';
    if($request->ajax()){
        if($request->has('searchQuest')){
            $articleall = Article::where('title','like','%'.$request->searchQuest.'%')->get();
            if($request->searchQuest == ""){
                $articleall = Article::all();
            }
            if($articleall){
                if( !Auth::user() || Auth::user()->user_roles_id == 2){
                    foreach($articleall as $key => $article){
                        foreach($article->categories as $percategory){
                        if($article->article_type_id == 1){
                            $articlealls.= '<ul>'.'<p class="text-left font-semibold flex gap-1 items-center" id="iconsearchcat">'.$percategory->icon.$percategory->name.'</p>'.
                            '<li class="resultsearch justify-start relative bg-slate-100  dark:bg-slate-600 dark:text-slate-300 duration-200 font-semibold shadow-md hover:bg-blue-500 rounded-md hover:text-white mb-2 p-4 w-full flex items-center">'.'<a class="flex items-center" href='."/article/$article->slug".'>'.'<ion-icon name="document-text"></ion-icon>'.Str::limit($article->title,65).'<ion-icon name="return-down-back-outline" class="absolute right-2 text-white"></ion-icon>'.'</a>'.'</li>'.
                            '</ul>';
                        }
                      }
                    }} else {
                        foreach($articleall as $key => $article){
                            foreach($article->categories as $percategory){
                                $articlealls.= '<ul>'.'<p class="text-left font-semibold flex gap-1 items-center" id="iconsearchcat">'.$percategory->icon.$percategory->name.'</p>'.
                            '<li class="resultsearch justify-start bg-slate-100  dark:bg-slate-600 dark:text-slate-300 duration-200 font-semibold shadow-md hover:bg-blue-500 rounded-md hover:text-white mb-2 p-4 w-full flex items-center">'.'<a class="flex items-center" href='."/article/$article->slug".'>'.'<ion-icon name="document-text"></ion-icon>'.Str::limit($article->title,65).'</a>'.'</li>'.
                            '</ul>';
                            }
                          }
                      }
         }

         if($articlealls == ""){
            return json_encode($noresult);
         } else {
            return json_encode($articlealls);
         }

     }
  }


  if($article){
        if($article->article_type_id != 2){
            return view('detail',compact('article'));
        } else {
        if(!Auth::user() || Auth::user()->user_roles_id == 2){
            return redirect('/');
        } else {
            return view('detail',compact('article'));
        }
        }
    }





    }





}