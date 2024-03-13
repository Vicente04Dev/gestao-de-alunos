<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Encarregados extends Migration
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
            'aluno_id' => [
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
            'profissao' => [
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
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('telefone');
        
       $this->forge->addForeignKey('aluno_id', 'alunos', 'id');

        $this->forge->createTable('encarregados');
    }

    public function down()
    {
        $this->forge->dropTable('encarregados');
        //
    }
}
