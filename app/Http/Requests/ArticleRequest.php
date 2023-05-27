<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest {
    public function rules(): array {
        return [
            'header' => ['required'],
            'message' => ['required'],
            'badge_id' => ['required', 'integer'],
        ];
    }
}
