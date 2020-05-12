<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert(['id' => 1, 'name' => 'admin', 'guard_name' => 'super-admin']);

        \DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'test@test.adm',
            'password' => bcrypt('admin123admin'),
        ]);

        \DB::table('model_has_roles')->insert(['role_id' => 1, 'model_type' => \App\Models\User::class, 'model_id' => 1]);
    }
}
