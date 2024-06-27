<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use Database\Factories\MemberFactory;

class MemberSeeder extends Seeder
{
    public function run()
    {
        Member::factory()->count(10)->create();
    }
}