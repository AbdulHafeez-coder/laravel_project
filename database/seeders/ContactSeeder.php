<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use  App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::factory()->count(100)->create();
        
     
        // Contact::truncate();

        // for ($i = 1; $i <= 100; $i++) {
        //     Contact::create([
        //         'name' => 'Name ' . $i,
        //         'email' => 'contact' . $i . '@gmail.com',
        //         'phone' => '0300345678' . $i,
        //     ]);
        // }
    }
}
