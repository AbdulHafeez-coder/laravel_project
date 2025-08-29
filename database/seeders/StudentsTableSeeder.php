<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentsTableSeeder extends Seeder
{
    public function run(): void
    {
        $firstNames = [
            'Ahmed','Muhammad','Ali','Hassan','Hussain','Bilal','Umer','Usman','Zain','Daniyal',
            'Hamza','Saad','Salman','Fahad','Farhan','Imran','Kashif','Ahsan','Naveed','Shahzaib',
            'Ayesha','Fatima','Zainab','Marium','Hira','Sana','Iqra','Hina','Sara','Maha'
        ];

        $lastNames = [
            'Khan','Malik','Sheikh','Ahmed','Qureshi','Chaudhry','Butt','Rana','Bhatti','Ansari',
            'Ali','Mirza','Farooq','Aslam','Yousaf','Akhtar','Saleem','Nawaz','Javed','Zeeshan'
        ];

        $usedEmails = [];

        $rows = [];
        for ($i = 1; $i <= 100; $i++) {
            $first = $firstNames[array_rand($firstNames)];
            $last = $lastNames[array_rand($lastNames)];
            $name = trim($first . ' ' . $last);

            // Unique email
            $base = Str::slug($first . '.' . $last, '.');
            $email = $base . '@example.pk';
            $suffix = 1;
            while (isset($usedEmails[$email])) {
                $email = $base . $suffix . '@example.pk';
                $suffix++;
            }
            $usedEmails[$email] = true;

            // Pakistani mobile: 03XXXXXXXXX (11 digits)
            $operator = ['300','301','302','303','304','305','306','307','308','309','310','311','312','313','314','315','316','317','318','319'][array_rand(['300','301','302','303','304','305','306','307','308','309','310','311','312','313','314','315','316','317','318','319'])];
            $remaining = str_pad((string)random_int(0, 9999999), 7, '0', STR_PAD_LEFT);
            $phone = '0' . $operator . $remaining; // 03XXXXXXXXX

            $now = now();

            $rows[] = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // Insert in chunks to avoid large single insert
        foreach (array_chunk($rows, 50) as $chunk) {
            DB::table('students')->insert($chunk);
        }
    }
}
