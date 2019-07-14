<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->updateOrInsert([
            'email' => 'admin@admin.com'
        ], [
            'name' => 'Admin',
            'password' => bcrypt('Admin123!'),
            'role' => 'admin'
        ]);
    }
}
