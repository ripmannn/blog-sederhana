<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $latest = Post::where('status', 'published')
            ->with(['author']) // Eager load categories
            ->orderBy('created_at', 'desc')
            ->paginate(4);

        $categories = Category::select('name', 'slug')->get();
        $title = 'BlogSederhana - Home';

        return view('pages.home', compact('latest', 'categories', 'title'));
    }
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $title = 'BlogSederhana - ' . $post->title;

        return view('pages.show', compact('post', 'title'));
    }

    public function category($slug)
    {
        // Cari kategori berdasarkan slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Ambil semua post yang terkait dengan kategori tersebut
        $posts = $category->posts;  // Asumsi bahwa Category memiliki relasi 'posts'

        // Set the title based on the category name
        $title = 'Blog Sederhana - Category : ' . $category->name;

        // Kirim data kategori dan postingan ke view
        return view('pages.category', compact('category', 'posts', 'title'));
    }

    

    



}
