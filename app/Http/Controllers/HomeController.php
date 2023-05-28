<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class HomeController {

    public function index() {
        if (!Auth::user()) {
            return redirect('/login');
        }

        $articles = Article::limit(15)
            ->with('user')
            ->with('badge')
            ->orderByDesc('created_at')
            ->get();

        return view('home')
            ->with([
                'articles' => $articles,
            ]);
    }
}