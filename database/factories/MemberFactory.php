<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $groups = Group::pluck('id')->toArray();

        return [
            'id_group' => $this->faker->randomElement($groups),
            'nama_panggung' => $this->faker->name,
            'nama_asli' => $this->faker->name,
            'tanggal_lahir' => $this->faker->date(),
            'kewarganegaraan' => $this->faker->country,
            'foto_member' => $this->faker->imageUrl(),
        ];
    }
}
