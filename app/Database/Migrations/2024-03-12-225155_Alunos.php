<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alunos extends Migration
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
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'data_nascimento' => [
                'type' => 'DATE',
            ],
            'classe' => [
                'type' => 'VARCHAR',
                'constraint' => '8',
            ],
            'sala' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'curso' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'telefone' => [
                'type' => 'VARCHAR',
                'constraint' => '15'
            ],
            'localizacao' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->createTable('alunos');
    }

    public function down()
    {
        //
        $this->forge->dropTable('alunos');
    }
}
