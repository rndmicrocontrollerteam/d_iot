<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleType;
use App\Models\ArticleCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user() || Auth::user()->user_roles_id != 1) {
            return redirect('/404');
        } else {
            $category = Category::all();
            $articletype = ArticleType::all();
            $articles = Article::all(); // Mengambil semua artikel
            return view('tools.addarticle', compact('category', 'articletype', 'articles'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Validasi input
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8024',
            'editor' => 'required',
            'title' => 'required',
            'typepost' => 'required',
        ], [
            'image.required' => 'Gambar Tidak Boleh Kosong',
            'editor.required' => 'Deskripsi Tidak Boleh Kosong',
            'title.required' => 'Judul Tidak Boleh Kosong',
            'typepost.required' => 'Visibility Artikel Tidak Boleh Kosong',
        ]);

        // Inisialisasi variabel
        $userid = Auth::user()->id;
        $title = $request->title;

        // Memeriksa dan meng-upload gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();

            // Simpan gambar ke storage/app/public/thumbnail
            $path = $image->storeAs('thumbnail', $filename); // Pastikan menyimpan di 'public/thumbnail'

            // Membuat artikel dan menyimpan nama file gambar
            $article = Article::create([
                "user_id" => $userid,
                "title" => $title,
                "article_type_id" => $request->typepost,
                "images" => $filename, // Simpan nama file di database
                "slug" => Str::slug($title, '-'),
                "description" => $request->editor,
            ]);

            // Mengaitkan kategori
            if ($request->has('category')) {
                $article->categories()->attach($request->category);
            }

            Alert::success('Artikel Terbuat');
        }

        return redirect('/dashboard');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article, $id)
    {
        $articletype = ArticleType::all();
        $category = Category::all();
        $editarticle = Article::with('categories')->findOrFail(decrypt($id));
        //   dd($editarticle);

        return view('tools.editarticle', compact('editarticle', 'category', 'articletype'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $decrypted_id = decrypt($id);

        // Validasi input
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8024',
            'editor' => 'required',
            'title' => 'required',
            'typepost' => 'required',
        ], [
            'editor.required' => 'Deskripsi Tidak Boleh Kosong',
            'title.required' => 'Judul Tidak Boleh Kosong',
            'typepost.required' => 'Visibility Artikel Tidak Boleh Kosong',
        ]);

        $article = Article::findOrFail($decrypted_id);
        $filename = $article->images;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();

            $path = $image->storeAs('thumbnail', $filename);

            // Hapus gambar lama jika ada
            if ($article->images && Storage::exists('thumbnail/' . $article->images)) {
                Storage::delete('thumbnail/' . $article->images);
            }

            $article->images = $filename;
            $article->save();
        }


        // Update data artikel
        $article->update([
            "title" => $request->title,
            "article_type_id" => $request->typepost,
            "slug" => Str::slug($request->title, '-'),
            "description" => $request->editor,
            "images" => $filename,
        ]);

        // Update kategori terkait
        $article->categories()->sync($request->editcategory);

        Alert::success('Artikel Terupdate');
        return redirect('/dashboard');
    }

    // public function update(Request $request, $id)
    // {
    //     $decrypted_id = decrypt($id);

    //     $request->validate([
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8024',
    //         'editor' => 'required',
    //         'title' => 'required',
    //         'typepost' => 'required',
    //     ], [
    //         'editor.required' => 'Deskripsi Tidak Boleh Kosong',
    //         'title.required' => 'Judul Tidak Boleh Kosong',
    //         'typepost.required' => 'Visibility Artikel Tidak Boleh Kosong',
    //     ]);

    //     $article = Article::findOrFail($decrypted_id);
    //     $filename = $article->images; // Default: gunakan gambar lama

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $filename = time() . '_' . $image->getClientOriginalName();
    //         $image->storeAs('images', $filename, 'public');

    //         if (Storage::exists('public/thumbnail/' . $article->images)) {
    //             Storage::delete('public/thumbnail/' . $article->images);
    //         }
    //     }

    //     $article->update([
    //         "title" => $request->title,
    //         "article_type_id" => $request->typepost,
    //         "slug" => Str::slug($request->title, '-'),
    //         "description" => $request->editor,
    //         "images" => $filename,
    //     ]);

    //     $article->categories()->sync($request->editcategory);
    //     Alert::success('Artikel Terupdate');
    //     return redirect('/dashboard');
    // }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Article $article, $id)
    // {
    //     $articleToDelete = Article::findOrFail(decrypt($id));
    //     $articleImagePath = $articleToDelete->images;
    //     if (!unlink(storage_path('app/public/thumbnail/' . $articleImagePath))) {
    //         $articleToDelete->delete();
    //     } else {
    //         $articleToDelete->delete();
    //         Storage::delete($articleToDelete->images);
    //     }

    //     return redirect()->back();
    // }

    public function destroy(Article $article, $id)
    {
        $articleToDelete = Article::findOrFail(decrypt($id));
        $articleImagePath = 'public/thumbnail/' . $articleToDelete->images;

        if (Storage::exists($articleImagePath)) {
            Storage::delete($articleImagePath); // Hapus gambar dari storage
        }

        $articleToDelete->delete();
        return redirect()->back();
    }


    public function category($slug, Request $request)
    {
        $articlealls = "";
        $noresult = '<div class="bg-red-500 flex items-center justify-center p-4 rounded-md font-semibold text-white list-none"><ion-icon name="warning"></ion-icon>No Result For "' . $request->searchQuest . '"</div>';
        if ($request->ajax()) {
            if ($request->has('searchQuest')) {
                $articleall = Article::where('title', 'like', '%' . $request->searchQuest . '%')->get();
                if ($request->searchQuest == "") {
                    $articleall = Article::all();
                }
                if ($articleall) {
                    if (!Auth::user() || Auth::user()->user_roles_id == 2) {
                        foreach ($articleall as $key => $article) {
                            foreach ($article->categories as $percategory) {
                                if ($article->article_type_id == 1) {
                                    $articlealls .= '<ul>' . '<p class="text-left font-semibold flex gap-1 items-center" id="iconsearchcat">' . $percategory->icon . $percategory->name . '</p>' .
                                        '<li class="resultsearch justify-start relative bg-slate-100  dark:bg-slate-600 dark:text-slate-300 duration-200 font-semibold shadow-md hover:bg-blue-500 rounded-md hover:text-white mb-2 p-4 w-full flex items-center">' . '<a class="flex items-center" href=' . "/article/$article->slug" . '>' . '<ion-icon name="document-text"></ion-icon>' . Str::limit($article->title, 65) . '<ion-icon name="return-down-back-outline" class="absolute right-2 text-white"></ion-icon>' . '</a>' . '</li>' .
                                        '</ul>';
                                }
                            }
                        }
                    } else {
                        foreach ($articleall as $key => $article) {
                            foreach ($article->categories as $percategory) {
                                $articlealls .= '<ul>' . '<p class="text-left font-semibold flex gap-1 items-center" id="iconsearchcat">' . $percategory->icon . $percategory->name . '</p>' .
                                    '<li class="resultsearch justify-start bg-slate-100  dark:bg-slate-600 dark:text-slate-300 duration-200 font-semibold shadow-md hover:bg-blue-500 rounded-md hover:text-white mb-2 p-4 w-full flex items-center">' . '<a class="flex items-center" href=' . "/article/$article->slug" . '>' . '<ion-icon name="document-text"></ion-icon>' . Str::limit($article->title, 65) . '</a>' . '</li>' .
                                    '</ul>';
                            }
                        }
                    }
                }


                if ($articlealls == "") {
                    return json_encode($noresult);
                } else {
                    return json_encode($articlealls);
                }

            }
        } else {

            $categories = Category::with('articles')->where("slug", $slug)->get();
        }
        return view("category", compact("categories"));
    }


    public function categoryall(Request $request)
    {
        $articlealls = "";
        $noresult = '<div class="bg-red-500 flex items-center justify-center p-4 rounded-md font-semibold text-white list-none"><ion-icon name="warning"></ion-icon>No Result For "' . $request->searchQuest . '"</div>';
        if ($request->ajax()) {
            if ($request->has('searchQuest')) {
                $articleall = Article::where('title', 'like', '%' . $request->searchQuest . '%')->get();
                if ($request->searchQuest == "") {
                    $articleall = Article::all();
                }
                if ($articleall) {
                    if (!Auth::user() || Auth::user()->user_roles_id == 2) {
                        foreach ($articleall as $key => $article) {
                            foreach ($article->categories as $percategory) {
                                if ($article->article_type_id == 1) {
                                    $articlealls .= '<ul>' . '<p class="text-left font-semibold flex gap-1 items-center" id="iconsearchcat">' . $percategory->icon . $percategory->name . '</p>' .
                                        '<li class="resultsearch justify-start relative bg-slate-100  dark:bg-slate-600 dark:text-slate-300 duration-200 font-semibold shadow-md hover:bg-blue-500 rounded-md hover:text-white mb-2 p-4 w-full flex items-center">' . '<a class="flex items-center" href=' . "/article/$article->slug" . '>' . '<ion-icon name="document-text"></ion-icon>' . Str::limit($article->title, 65) . '<ion-icon name="return-down-back-outline" class="absolute right-2 text-white"></ion-icon>' . '</a>' . '</li>' .
                                        '</ul>';
                                }
                            }
                        }
                    } else {
                        foreach ($articleall as $key => $article) {
                            foreach ($article->categories as $percategory) {
                                $articlealls .= '<ul>' . '<p class="text-left font-semibold flex gap-1 items-center" id="iconsearchcat">' . $percategory->icon . $percategory->name . '</p>' .
                                    '<li class="resultsearch justify-start bg-slate-100  dark:bg-slate-600 dark:text-slate-300 duration-200 font-semibold shadow-md hover:bg-blue-500 rounded-md hover:text-white mb-2 p-4 w-full flex items-center">' . '<a class="flex items-center" href=' . "/article/$article->slug" . '>' . '<ion-icon name="document-text"></ion-icon>' . Str::limit($article->title, 65) . '</a>' . '</li>' .
                                    '</ul>';
                            }
                        }
                    }
                }

                if ($articlealls == "") {
                    return json_encode($noresult);
                } else {
                    return json_encode($articlealls);
                }

            }
        } else {

            $categories = Category::all();
        }
        return view("categoryall", compact("categories"));
    }







}
