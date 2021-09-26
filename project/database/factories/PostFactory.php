<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug' =>  $this->faker->name,
            'category_id' => rand(1, 3),
            'sub_cat_id' => rand(1, 3),
            'short_des' => $this->faker->text,
            'long_des' => $this->faker->text,
            'status' => true,
            'author_id' => 1,
            'image' => 'storage/post/default.png'
        ];
    }
}
