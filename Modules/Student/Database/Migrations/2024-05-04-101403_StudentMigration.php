<?php

namespace Modules\Student\Database\Migrations;

use CodeIgniter\Database\Migration;

class StudentMigration extends Migration
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
                "constraint" => 100,
                "null" => false
            ],
            "email" => [
                "type" => "VARCHAR",
                "constraint" => 100,
                "null" => false,
                "unique" => true
            ],
            "phone" => [
                "type" => "VARCHAR",
                "constraint" => 20,
                "null" => false
            ],
            "profile_image" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => true
            ],
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("students");
    }

    public function down()
    {
        //
    }
}
