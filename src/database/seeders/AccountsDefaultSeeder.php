<?php

namespace Database\Seeders;

use App\Facades\MoneyFormatterServiceFacade;
use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountsDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accountsData = config('defaults.accounting.accounts');
        foreach ($accountsData as $accountData) {
            $account = Account::create($accountData);
            $this->command->info(sprintf(
                    "Create account (%s):\n  *  name: %s \n  *  type: %s \n  *  for user: <%s> %s \n  *  with balance: %s \n  *  in currency: %s",
                    $account->id, $account->name, $account->accountType->name, $account->user->name, $account->user->email, MoneyFormatterServiceFacade::format($account->balance), $account->currency->id
                )
            );
        }
    }
}
