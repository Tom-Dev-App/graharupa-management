<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttachmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attachment_types')->insert([
            ['name' => 'PDF'],
            ['name' => 'IMAGE'],
            ['name' => 'LINK'],
            ['name' => 'TEXT']
        ]);
    }
}
