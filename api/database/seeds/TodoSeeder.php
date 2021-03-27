<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) {
            factory(Todo::class)->create([
                'userId' => User::all()->random()->id,
            ]);
        }
    }
}
