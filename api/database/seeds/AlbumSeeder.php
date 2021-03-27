<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Album;
use App\Models\Photo;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
            $album = factory(Album::class)->create([
                'userId' => User::all()->random()->id,
            ]);
            factory(Photo::class)->create([
                'albumId' => $album->id,
            ]);
        }
    }
}
