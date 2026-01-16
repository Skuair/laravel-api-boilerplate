<?php

namespace Database\Seeders;

use App\Enums\Role as EnumsRole;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin user',
            'email' => 'admin@example.org',
            'password' => Hash::make('admin'),
        ]);

        Role::create(['name' => EnumsRole::ADMIN]);
        Role::create(['name' => EnumsRole::USER]);

        $user = User::where('email', 'admin@example.org')->first();
        $user->assignRole(EnumsRole::ADMIN);
    }
}
