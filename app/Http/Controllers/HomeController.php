<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class HomeController {

    public function index() {
        if (!Auth::user()) {
            return redirect('/login');
        }

        $articles = Article::limit(50)
            ->with('user')
            ->with('badge')
            ->get();

        return view('home')
            ->with([
                'articles' => $articles,
            ]);
    }


}