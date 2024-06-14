<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Field::create([
            'title' => 'LAPANGAN JUNIOR SERENIA',
            'location' => 'Jakarta Selatan',
            'slug' => Str::slug('LAPANGAN JUNIOR SERENIA'),
            'price' => 450000,
            'contact_person' => '(021) 73104142',
            'is_promo' => false,
        ]);
        Field::create([
            'title' => 'Lapangan Senior Serena',
            'location' => 'Jakarta Selatan',
            'slug' => Str::slug('Lapangan Senior Serena'),
            'contact_person' => '(021) 73104142',
            'price' => 1150000,
            'is_promo' => true,
        ]);
    }
}
