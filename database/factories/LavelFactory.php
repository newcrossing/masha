<?php

namespace Database\Factories;

use App\Models\Lavel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;


class LavelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lavel::class;

    public function configure()
    {
        // присваиваю позицию равную id
        return $this->afterCreating(
                function (Lavel $lavel) {
                    $lavel->position =$lavel->id;
                    $lavel->save();
                }
        );
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('ru_RU');
        return [
                'name' => $faker->text(30),
                'description' => $faker->realText(),
                'parent_id' => $faker->numberBetween(0,10),
                'meta_description' => $faker->text(200),
        ];
    }
}
