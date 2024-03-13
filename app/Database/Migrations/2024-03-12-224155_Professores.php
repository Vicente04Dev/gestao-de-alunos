<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Professores extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'data_nascimento' => [
                'type' => 'DATE',
            ],
            'nivel_academico' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'localizacao' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'telefone' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
            ],
            'imagem' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'obs' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP'
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('telefone');

        $this->forge->addForeignKey('user_id', 'users', 'id');

        $this->forge->createTable('professores');
    }

    public function down()
    {
        //
        $this->forge->dropTable('professores');
    }
}
