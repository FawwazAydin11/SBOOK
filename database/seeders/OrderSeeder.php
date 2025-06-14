<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Field;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $dates = [
            date('Y-m-d'),                    // hari ini
            date('Y-m-d', strtotime('+1 day')) // besok
        ];

        $fields = Field::all();

        foreach ($dates as $date) {
            foreach ($fields as $field) {
                // Daftar jam
                $jamList = [
                    '08:00 - 09:00',
                    '09:00 - 10:00',
                    '10:00 - 11:00',
                    '11:00 - 12:00',
                    '12:00 - 13:00',
                    '13:00 - 14:00',
                    '14:00 - 15:00',
                    '15:00 - 16:00',
                    '16:00 - 17:00',
                    '17:00 - 18:00',
                    '18:00 - 19:00',
                    '19:00 - 20:00',
                    '20:00 - 21:00',
                    '21:00 - 22:00',
                    '22:00 - 23:00',
                ];

                shuffle($jamList);

                // Generate 2 jam random untuk setiap lapangan
                for ($i = 0; $i < 2; $i++) {
                    Order::create([
                        'order_unique_id' => 'ORD-' . date('ymd') . '-' . strtoupper(\Str::random(4)),
                        'user_id' => 2,
                        'lapangan_id' => $field->id,
                        'tanggal' => $date,
                        'jam' => $jamList[$i],
                        'status' => 'pending',
                    ]);
                }
            }
        }
    }
}
