<?php

namespace Modules\Device\Database\Migrations;

use CodeIgniter\Database\Migration;

class DeviceMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "name" => [
                "type" => "VARCHAR",
                "constraint" => 100
            ],
            "type" => [
                "type" => "VARCHAR",
                "constraint" => 100
            ]
        ]);

        $this->forge->addPrimaryKey("id");

        $this->forge->createTable('devices');

    }

    public function down()
    {
        $this->forge->dropTable('devices');
    }
}
