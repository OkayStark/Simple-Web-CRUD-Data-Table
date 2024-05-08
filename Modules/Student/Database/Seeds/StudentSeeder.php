<?php

namespace Modules\Student\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
class StudentSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $data = $this->createTestStudent();
            $this->db->table('students')->insert($data);
        }
    }

    public function createTestStudent()
    {
        $faker = Factory::create();
        return [
            "name" => $faker->name,
            "email" => $faker->email,
            "phone" => $faker->phoneNumber,
            "profile_image" => $faker->imageUrl(255, 255)
        ];
    }
}
