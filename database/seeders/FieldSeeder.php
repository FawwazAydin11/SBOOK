<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Field;

class FieldSeeder extends Seeder
{
    public function run(): void
    {
        $fields = [
            [
                'name' => 'Lapangan 1',
                'photo' => 'images.jpeg', // nanti kamu bisa isi path foto di storage
                'price' => 35000,
                'available' => true,
            ],
            [
                'name' => 'Lapangan 2',
                'photo' => 'images.jpeg',
                'price' => 35000,
                'available' => true,
            ],
            [
                'name' => 'Lapangan 3',
                'photo' => 'images.jpeg',
                'price' => 30000,
                'available' => true,
            ],
            [
                'name' => 'Lapangan 4',
                'photo' => 'images.jpeg', // nanti kamu bisa isi path foto di storage
                'price' => 35000,
                'available' => true,
            ],
            [
                'name' => 'Lapangan 5',
                'photo' => 'images.jpeg',
                'price' => 35000,
                'available' => true,
            ],
            [
                'name' => 'Lapangan 6',
                'photo' => 'images.jpeg',
                'price' => 30000,
                'available' => true,
            ],
            [
                'name' => 'Lapangan 7',
                'photo' => 'images.jpeg', // nanti kamu bisa isi path foto di storage
                'price' => 35000,
                'available' => true,
            ],
            [
                'name' => 'Lapangan 8',
                'photo' => 'images.jpeg',
                'price' => 35000,
                'available' => true,
            ],
        ];

        foreach ($fields as $field) {
            Field::create($field);
        }
    }
}
