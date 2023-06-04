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

        $articles = Article::with('badge')
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        $user = auth()->user();

        return view('messages.all_messages')
            ->with([
                'articles' => $articles,
                'user' => $user,
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

    public function editMessageView(int $id) {
        $article = Article::find($id);
        $user = auth()->user();

        if ($article->user_id !== $user->id) {
            return redirect()
                ->route('home')
                ->with('error', __('messages.edit-permission-error'));
        }

        $badges = Badge::all();

        return view('messages.edit_message')
            ->with([
                'article' => $article,
                'badges' => $badges,
            ]);
    }

    public function editMessage(ArticleRequest $request, $id): RedirectResponse {
        $article = Article::find($id);

        $article->header = $request->input('header');
        $article->paragraph = $request->input('message');
        $article->badge_id = $request->input('badge_id');

        $article->save();

        return redirect()
            ->route('home')
            ->with('success', __('messages.edit-success'));
    }

    public function deleteMessage(int $id): RedirectResponse {
        $article = Article::find($id);
        $user = auth()->user();

        if ($article->user_id !== $user->id) {
            return redirect()
                ->route('home')
                ->with('error', __('messages.delete-permission-error'));
        }

        $article->delete();

        return redirect()
            ->route('home')
            ->with('success', __('messages.delete-success'));
    }


}
