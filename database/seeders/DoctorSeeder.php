<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'Dr.John Doe',
                'email' => 'jgjvj@example.com',
                'phone' => '1234567890',
                'gender' => 'male'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Dr.Dayana',
                'email' => 'ZI5pU@example.com',
                'phone' => '1234567890',
                'gender' => 'female'
            ],

        ]);
    }
}
