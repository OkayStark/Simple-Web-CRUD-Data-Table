<?php

namespace Modules\Device\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class DeviceSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            $this->db->table('devices')->insert($this->getTestDevice());
        }
    }

    public function getTestDevice(){
        $faker = Factory::create();
        return [
            'name' => $faker->name,
            'type' => $faker->randomElement(['Mobile', 'Laptop', 'Tablet'])
        ];
    }
}

