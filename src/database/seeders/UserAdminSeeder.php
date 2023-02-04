<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id1 = User::find(1);
        if ($user_id1) {
            throw new \RuntimeException(sprintf("Use with id 1 exist (<%s>%s), created at %s", $user_id1->name, $user_id1->email, $user_id1->created_at->format("d.m.Y H:i:s")));
        }

        $password = \Faker\Factory::create()->password(16, 20);
        $user = User::create([
            'id' => 1,
            'name' => config('defaults.admin.name'),
            'email' => config('defaults.admin.email'),
            'password' => Hash::make($password),
            'role' => RoleEnum::SuperAdministrator->value,
        ]);

        $this->command->info(sprintf('Admin user created successfully with data:' . PHP_EOL . '  *  name: %s' . PHP_EOL . '  *  email: %s', $user->name, $user->email));
        $this->command->alert(sprintf('Admin user password: "%s"', $password));
        $this->command->info('Please remember this password!');
    }
}
