<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\Volunteer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Member::class;
    public function definition(): array
    {
        // Get a random advisor ID
        $volId = Volunteer::inRandomOrder()->first()->id;
        return [
            //
            'name' => $this->faker->name,
            'volunteer_id' => $volId,
            'ic_number'=> $this->faker->myKadNumber($gender = null|'male'|'female', $hyphen = null|true|false),// "710703471796"
            'address'=> $this->faker->township()->townState(),
            'phoneNo' => $this->faker->voipNumber($countryCodePrefix = null|true|false, $formatting = null|true|false), // "015-458 7099",

        ];
    }
}
