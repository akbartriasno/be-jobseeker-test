<?php

namespace Database\Seeders;

use App\Models\Candidates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Candidates::create([
            'full_name' => "Akbar Triasno S.",
            'email' => "akbar@admin.com",
            'phone_number' => "085175322110",
            'dob' => "1995-11-22",
            'pob' => "Surabaya",
            'gender' => "M",
            'year_exp' => "6",
            'last_salary' => "12.500.000"
        ]);

        Candidates::create([
            'full_name' => "Dafid Ainur Rozi",
            'email' => "dafid@user.com",
            'phone_number' => "085112344550",
            'dob' => "1997-12-12",
            'pob' => "Surabaya",
            'gender' => "M",
            'year_exp' => "6",
            'last_salary' => "12.500.000"
        ]);

        Candidates::create([
            'full_name' => "Aditya Rhesa Firmansyah",
            'email' => "adit@user.com",
            'phone_number' => "085112366770",
            'dob' => "1996-05-21",
            'pob' => "Surabaya",
            'gender' => "M",
            'year_exp' => "6",
            'last_salary' => "12.500.000"
        ]);

        Candidates::create([
            'full_name' => "Erick Wahyudi Prakoso",
            'email' => "erick@user.com",
            'phone_number' => "085112377880",
            'dob' => "1995-10-12",
            'pob' => "Surabaya",
            'gender' => "M",
            'year_exp' => "6",
            'last_salary' => "12.500.000"
        ]);

        Candidates::create([
            'full_name' => "Ayyub Rizaldy",
            'email' => "ayyub@user.com",
            'phone_number' => "085112388990",
            'dob' => "1995-09-24",
            'pob' => "Surabaya",
            'gender' => "M",
            'year_exp' => "6",
            'last_salary' => "12.500.000"
        ]);
    }
}
