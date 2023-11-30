<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Trainer;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showArticles(){
        $articles = Article::all();
        return view('list-articles', compact('articles'));
    }

    public function view($id)
    {
        $article = Article::find($id);
        $trainer = Trainer::find($article->trainer_id);
        return view('view-article', compact('article', 'trainer'));
    }

    public function edit($id)
    {
        $articles = Article::find($id);
        return view('edit-articles', compact('articles'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'Email' => 'required|email|max:255',
            'Password' => 'required|string|min:8',
            'Nama' => 'required|string|max:255',
            'TL' => 'required|date',
            'Alamat' => 'required|string|max:510',
            'NHP' => 'required|numeric', 
            'Gender' => 'required|in:Laki-laki,Perempuan', 
        ]);

        // Update the user in the database
        Article::where('id', $id)->update($validatedData);

        return redirect()->route('list-articles'); // Redirect to home or wherever you want
    }

    public function delete($id)
    {
        // Delete the user from the database
        Article::destroy($id);

        return redirect()->route('list-articles'); // Redirect to home or wherever you want
    }

    public function createArticle($id)
    {

    }
    public function submitArticle($id)
    {

    }
}
