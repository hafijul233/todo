<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Todo::factory(20)
            ->state(new Sequence(
                ['completed_at' => null],
                ['completed_at' => date('Y-m-d H:i:s')],
            ))->create();
    }
}
