<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Address;
use App\Models\Company;
use App\Models\Account;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->count(3)->hasAddress(1)->hasCompany(1)->create();
        for ($i=0; $i < 5; $i++) { 
            $user = factory(User::class)->create();
            factory(Account::class)->create([
                'userId' => $user->id,
            ]);
            factory(Address::class)->create([
                'userId' => $user->id,
            ]);
            factory(Company::class)->create([
                'userId' => $user->id,
            ]);
        }
    }
}
