<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //la siguiente linea hace posts/ruta del la imagen/nombreImagen

        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->text(),
            'image' => 'posts/' . $this->faker->image('public/storage/posts', 320, 240, null, false)
        ];
    }
}
