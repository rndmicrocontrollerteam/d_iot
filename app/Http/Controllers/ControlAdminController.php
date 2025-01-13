<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Str;

class ControlAdminController extends Controller
{
    public function __construct()
    {
        // Membatasi akses hanya untuk user dengan user_roles_id = 5
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->user_roles_id == 5) {
                return $next($request);
            }
            return redirect('/404');
        });
    }

    public function index()
    {
        $users = User::all(); // Pastikan Anda mengambil data pengguna dari database
        
        return view('admin.controladmin', compact('users'));
    }

    public function create()
    {
        $roles = UserRole::all(); // Mengambil semua data role yang tersedia
        
        return view('admin.adduser', compact('roles')); // Mengirimkan $roles ke view   
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'user_roles_id' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'slug' => Str::slug($request->name),
            'user_roles_id' => $request->user_roles_id,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('controladmin.index')->with('success', 'User created successfully');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id); // Mengambil data user berdasarkan ID
        $roles = UserRole::all(); // Mengambil semua data role yang tersedia

        return view('admin.edituser', compact('user', 'roles')); // Mengirimkan $user dan $roles ke view
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'user_roles_id' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // 'slug' => Str::slug($request->name),
            'user_roles_id' => $request->user_roles_id,
        ]);

        return redirect()->route('controladmin.index')->with('success', 'User updated successfully');
    }


    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('controladmin.index')->with('success', 'Article deleted successfully');
    }

    public function userRoleIndex()
    {
        // Misalnya, mengambil data artikel atau data lain yang diperlukan
        $articles = Article::all();

        // Mengirimkan data ke view
        return view('custom.userrole', compact('articles'));
    }
}
