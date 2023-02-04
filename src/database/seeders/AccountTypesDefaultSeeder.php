<?php

namespace Database\Seeders;

use App\Models\AccountType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountTypesDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var array $accountTypesData */
        $accountTypesData = config('defaults.accounting.account-types');
        foreach ($accountTypesData as $typeData) {
            $type = AccountType::create($typeData);
            $this->command->info(sprintf("created account type %s (id: %s)", $type->name, $type->id));
        }
    }
}
