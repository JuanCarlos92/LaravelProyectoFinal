<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizadores = [
            [
                'name' => 'Organizador1',
                'email' => 'organizador1@eventos.com',
            ],
            [
                'name' => 'Organizador2',
                'email' => 'organizador2@eventos.com',
            ],
            [
                'name' => 'Organizador3',
                'email' => 'organizador3@eventos.com',
            ],
            [
                'name' => 'Organizador4',
                'email' => 'organizador4@eventos.com',
            ],
            [
                'name' => 'Organizador5',
                'email' => 'organizador5@eventos.com',
            ],
            [
                'name' => 'Organizador6',
                'email' => 'organizador6@eventos.com',
            ],
            [
                'name' => 'Organizador7',
                'email' => 'organizador7@eventos.com',
            ],
            [
                'name' => 'Organizador8',
                'email' => 'organizador8@eventos.com',
            ],
            [
                'name' => 'Organizador9',
                'email' => 'organizador9@eventos.com',
            ],
            [
                'name' => 'Organizador10',
                'email' => 'organizador10@eventos.com',
            ],
        ];

        foreach ($organizadores as $organizador) {
            User::create([
                'name' => $organizador['name'],
                'email' => $organizador['email'],
                'password' => Hash::make('8888'),
                'remaining_events' => 5,
            ]);
        }
    }
}
