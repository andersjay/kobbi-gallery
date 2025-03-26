<?php

namespace Database\Factories;

use App\Models\Exhibition;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exhibition>
 */
class ExhibitionFactory extends Factory
{
    protected $model = Exhibition::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Gerando nomes únicos para as imagens
        $imagePath = 'uploads/exhibitions/' . $this->faker->unique()->uuid . '.jpg';
        $bannerPath = 'uploads/exhibitions/banners/' . $this->faker->unique()->uuid . '.jpg';

        // Baixando imagens de placeholder e salvando no Storage do Laravel
        Storage::disk('public')->put($imagePath, file_get_contents('https://picsum.photos/640/480'));
        Storage::disk('public')->put($bannerPath, file_get_contents('https://picsum.photos/1200/400'));

        return [
            'title' => $this->faker->sentence(3),
            'slug' => $this->faker->slug(),
            'author_name' => $this->faker->name(),
            'author_description' => $this->faker->text(100),
            'description' => $this->faker->paragraph(5),
            'summary' => $this->faker->sentence(10),
            'image' => $imagePath,
            'banner' => $bannerPath,
            'year' => $this->faker->year(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
