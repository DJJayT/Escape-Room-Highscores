<span class="badge rounded-pill bg-primary mb-2">{{ $article->badge->name ?? __('common.deleted_badge') }}</span>
<h4>{{ $article->header }}</h4>
<p>{{ $article->paragraph }}</p>
<div class="d-flex">
    @php($avatar = $article->user->avatar ?? "default.jpg")
    <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50"
         src="{{ asset('storage/images/profiles/' . $avatar) }}">
    <div>
        <p class="fw-bold mb-0">{{ $article->user->name ?? __('common.deleted_employee') }}</p>


        <p class="text-muted mb-0">{{ $article->updated_at->format('d.m.Y H:m') }}

            @if($article->updated_at != $article->created_at)
                ({{ __('common.edited') }})
            @endif
        </p>
    </div>
</div>
