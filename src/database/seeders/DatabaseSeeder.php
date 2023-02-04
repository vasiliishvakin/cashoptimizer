<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Model::unguarded(function (){
            $this->call(UserAdminSeeder::class);
            $this->call(AccountTypesDefaultSeeder::class);
            $this->call(CurrenciesDefaultSeeder::class);
            $this->call(AccountsDefaultSeeder::class);
        });
    }
}
