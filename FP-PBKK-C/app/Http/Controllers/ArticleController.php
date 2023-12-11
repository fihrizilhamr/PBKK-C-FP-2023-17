<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function showArticles(){
        if (Cache::has('articles')) {
            $articles = Cache::get('articles');
        } else {
            // Jika tidak, ambil dari database dan simpan ke dalam cache
            $articles = Article::all();
            Cache::put('articles', $articles, 1440); // Cache dengan durasi 24 jam
        }
        return view('list-articles', compact('articles'));
    }

    public function myArticle()
    {
        // Mengambil instance pengguna yang terautentikasi beserta relasinya dengan Trainer
        $trainer = User::with('trainer')->find(Auth::id());
    
        // Mengambil artikel yang terkait dengan trainer_id dari pengguna terautentikasi
        $articles = Article::where('trainer_id', $trainer->trainer->id)->get();
    
        return view('list-myarticles', compact('articles'));
    }
    

    public function view($id)
    {
        $article = Article::find($id);
        $trainer = Trainer::find($article->trainer_id);
        return view('view-article', compact('article', 'trainer'));
    }

    public function editArticle($id)
    {
        $article = Article::find($id);
        $trainer = User::find(Trainer::find($article->trainer_id)->user_id);
        return view('edit-articles', compact('article', 'trainer'));
    }

    public function updateArticle(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'Foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Judul' => 'required|string|max:255',
            'Text' => 'required|string',
        ]);
        $imageContent = file_get_contents($request->file('Foto'));
    
        // Generate a unique filename for the image
        $filename = 'article_' . uniqid() . '.jpg';
    
        // Save the image to the storage disk
        Storage::put('public/article_images/' . $filename, $imageContent);
        
        $results = [
            'Foto' => $filename,
            'Judul' => $request->input('Judul'),
            'Text' => $request->input('Text')
        ];
        Article::find($id)->update($results);

        return redirect()->route('list-myarticles');
    }

    public function deleteArticle($id)
    {
        // Delete the user from the database
        Article::destroy($id);

        return redirect()->route('list-myarticles'); // Redirect to home or wherever you want
    }

    public function createArticle()
    {
        $trainer = User::has('trainer')->with('trainer')->find(Auth::id());
        return view('create-article', compact('trainer'));
    }
    public function submitArticle(Request $request, $id)
    {
        $request->validate([
            'Foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Judul' => 'required|string|max:255',
            'Text' => 'required|string',
        ]);
        
        $imageContent = file_get_contents($request->file('Foto'));
    
        // Generate a unique filename for the image
        $filename = 'article_' . uniqid() . '.jpg';
    
        // Save the image to the storage disk
        Storage::put('public/article_images/' . $filename, $imageContent);
        
        $results = [
            'trainer_id' => $id,
            'Foto' => $filename,
            'Judul' => $request->input('Judul'),
            'Text' => $request->input('Text')
        ];
        Article::create($results);

        return redirect()->route('list-myarticles');
    }
}
