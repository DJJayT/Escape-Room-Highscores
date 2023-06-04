<form method="post">
    @csrf
    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="mb-3"><label class="form-label" for="header">
                            <strong>{{ __('messages.header') }}</strong>
                        </label>
                        <input class="form-control" type="text" id="header"
                               placeholder="{{ __('messages.header') }}" name="header"
                               @if(isset($article)) value="{{ $article->header }}" @endif
                               required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div>
                        <label class="form-label" for="badge">
                            <strong>{{ __('messages.badge') }}</strong>

                            <select name="badge_id" class="form-select">
                                @if(!isset($article))
                                    <option value="" selected="">{{ __('messages.choose-badge') }}</option>
                                @endif

                                @foreach($badges as $badge)
                                    @if(isset($article) && $article->badge_id === $badge->id)
                                        <option value="{{ $badge->id }}" selected>{{ $badge->name }}</option>
                                    @else
                                        <option value="{{ $badge->id }}">{{ $badge->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="message">
                    <strong>{{ __('messages.content') }}</strong>
                </label>
                <textarea class="form-control" id="message" rows="4" name="message"
                          placeholder="{{ __('messages.content') }}"
                          required>@if(isset($article))
                        {{ $article->paragraph }}
                    @endif</textarea>
            </div>
        </div>
    </div>
    <div class="text-end mb-3">
        <a href="{{ route('home') }}" class="btn btn-primary btn-danger">
            {{ __('common.cancel') }}
        </a>
        <button class="btn btn-primary me-2" type="submit">{{ __('common.submit') }}</button>
    </div>
</form>
