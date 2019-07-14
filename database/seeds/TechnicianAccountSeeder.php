<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnicianAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->updateOrInsert([
            'email' => 'technician@technician.com'
        ], [
            'name' => 'Technician',
            'password' => bcrypt('Technician123!'),
            'position' => 'Technician',
            'uid' => '1234568790',
            'phone_number' => '08123456790',
            'work_locations' => 'PDA, TUN',
            'role' => 'technician',
        ]);
    }
}
