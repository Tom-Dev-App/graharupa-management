<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttachmentForItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attachment_for_items')->insert([
            [ "name" => "PROJECT"],
            [ "name" => "TASK"],
            [ "name" => "COMMENT"],
         ]);
    }
}
