<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CustomController extends Controller
{
    public function categoryArticleIndex()
    {
        // Ambil semua artikel
        $articles = Article::all();
        // Contoh mengambil satu artikel pertama untuk variabel $article
        $article = $articles->first(); // Atau logika lain sesuai kebutuhan

        // Kirimkan variabel $articles dan $article ke view
        return view('custom.categoryarticle', compact('articles', 'article'));
    }


    // Method untuk menyimpan tipe artikel (sudah ada sebelumnya)
    public function addArticleType(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:article_types,name',
        ]);

        // Simpan tipe artikel baru
        ArticleType::create([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Tipe Artikel Berhasil Ditambahkan');
    }
}
