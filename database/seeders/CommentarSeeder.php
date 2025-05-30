<?php

namespace Database\Seeders;

use App\Models\Commentar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = now();

        Commentar::create([
            'nama' => 'tes',
            'text' => 'ini adalah pesan',
            'dibuat' => date_format($date, 'd-M-Y, H:m'),
        ]);
    }
}
