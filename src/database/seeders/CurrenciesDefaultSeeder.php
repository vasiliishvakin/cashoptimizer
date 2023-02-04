<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrenciesDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $symbols = Currency::getSymbolsFromHttp();
        foreach ($symbols as $symbol) {
            Currency::create([
                "id" => $symbol["code"],
                'description' => $symbol['description'],
            ]);
        }
        $this->command->info(sprintf('Inserted currencies: %s', Currency::pluck('id')->implode(', ')));
    }
}
