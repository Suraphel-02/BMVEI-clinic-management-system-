<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            [
                'name' => 'John',
                'lastname' => 'Doe',
                'dob' => '1980-01-01',
                'phone' => '1234567890',
                'email' => 'john.doe@example.com',
                'sex' => 'Male',
                'diseases' => 'None',
                'allergies' => 'None',
                'medical_history' => 'Healthy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane',
                'lastname' => 'Smith',
                'dob' => '1990-02-02',
                'phone' => '0987654321',
                'email' => 'jane.smith@example.com',
                'sex' => 'Female',
                'diseases' => 'Asthma',
                'allergies' => 'Peanuts',
                'medical_history' => 'Mild Asthma',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
