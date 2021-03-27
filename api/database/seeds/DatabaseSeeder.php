<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('AlbumSeeder');
        $this->call('PostSeeder');
        $this->call('TodoSeeder');
        $this->call('PhotoSeeder');
        $this->call('CommentSeeder');
    }
}
