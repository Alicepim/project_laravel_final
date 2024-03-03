<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'em_name' => 'ณัฐพล วงศ์สุวรรณ',
                'em_email' => 'wirachot@email.com',
                'em_phone' => '0987263546',
                'em_position' => 'Div Developer',
                'em_salary' => '70000',
                'em_img' => 'profile/0001.jpg',
            ],
            [
                'em_name' => 'สุชาติ รัตนบูรณ์',
                'em_email' => 'rattanaboon@email.com',
                'em_phone' => '0981232787',
                'em_position' => 'Full stack developer',
                'em_salary' => '80000',
                'em_img' => 'profile/0002.jpg',
            ],
            [
                'em_name' => 'พรทิพย์ ชินวัตร',
                'em_email' => 'wongsuwan@email.com',
                'em_phone' => '0934655789',
                'em_position' => 'Data Engineer',
                'em_salary' => '60000',
                'em_img' => 'profile/0003.jpg',
            ],
        ]);
    }
}
