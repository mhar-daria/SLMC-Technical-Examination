<?php

use Illuminate\Database\Seeder;

use App\Models\Photo;
use App\Models\Album;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) {
            factory(Photo::class)->create([
                'albumId' => Album::all()->random()->id,
            ]);
        }
    }
}
