<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Badge;
use Illuminate\Http\RedirectResponse;

class MessageController {

    public function indexNewMessage() {

        $badges = Badge::all();

        return view('messages.new_message')
            ->with([
                'badges' => $badges,
            ]);
    }

    public function index() {

        $messages = Article::with('badge')
            ->with('user')
            ->paginate(50);

        return view('messages.all_messages')
            ->with([
                'messages' => $messages,
            ]);
    }

    public function create(ArticleRequest $request): RedirectResponse {

        Article::create([
            'header' => $request->input('header'),
            'paragraph' => $request->input('message'),
            'badge_id' => $request->input('badge_id'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()
            ->route('home')
            ->with('success', __('messages.success'));
    }


}