<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Libro;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Jair Chavez Balderas',
            'email' => 'bibliotecario@example.com',
            'password' => Hash::make('password'),
            'role' => 'Bibliotecario',
        ]);

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'Administrador',
        ]);

        User::create([
            'name' => 'Juan Lopez Perez',
            'email' => 'juan_lopez@example.com',
            'role' => 'Miembro',
            'password' => Hash::make('password'),
        ]);

        $libros = [
            [
                'titulo' => 'Cien Años de Soledad',
                'autor' => 'Gabriel García Márquez',
                'cantidad_disponible' => 5,
                'bibliotecario_id' => 1
            ],
            [
                'titulo' => 'Don Quijote de la Mancha',
                'autor' => 'Miguel de Cervantes',
                'cantidad_disponible' => 4,
                'bibliotecario_id' => 1
            ],
            [
                'titulo' => 'Crimen y Castigo',
                'autor' => 'Fiódor Dostoyevski',
                'cantidad_disponible' => 3,
                'bibliotecario_id' => 1
            ],
            [
                'titulo' => '1984',
                'autor' => 'George Orwell',
                'cantidad_disponible' => 6,
                'bibliotecario_id' => 1
            ],
            [
                'titulo' => 'El Principito',
                'autor' => 'Antoine de Saint-Exupéry',
                'cantidad_disponible' => 7,
                'bibliotecario_id' => 1
            ],
            [
                'titulo' => 'La Odisea',
                'autor' => 'Homero',
                'cantidad_disponible' => 4,
                'bibliotecario_id' => 1
            ],
            [
                'titulo' => 'Matar a un Ruiseñor',
                'autor' => 'Harper Lee',
                'cantidad_disponible' => 5,
                'bibliotecario_id' => 1
            ],
            [
                'titulo' => 'El Amor en los Tiempos del Cólera',
                'autor' => 'Gabriel García Márquez',
                'cantidad_disponible' => 3,
                'bibliotecario_id' => 1
            ],
            [
                'titulo' => 'La Metamorfosis',
                'autor' => 'Franz Kafka',
                'cantidad_disponible' => 2,
                'bibliotecario_id' => 1
            ],
            [
                'titulo' => 'El Gran Gatsby',
                'autor' => 'F. Scott Fitzgerald',
                'cantidad_disponible' => 5,
                'bibliotecario_id' => 1
            ],
        ];

        foreach ($libros as $libro) {
            Libro::create($libro);
        }
    }
}