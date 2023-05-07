<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Badge;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ArticleFactory extends Factory {
    protected $model = Article::class;

    public function definition(): array {
        return [
            'header' => $this->faker->word(),
            'paragraph' => $this->faker->word(),
            'pinned' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'badge_id' => Badge::factory(),
        ];
    }
}
