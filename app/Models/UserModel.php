<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'email', 'senha'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function encrytSenha($args){
        
        //$args['data']['senha'] = password_hash($args['data']['senha'], PASSWORD_DEFAULT);
        $encrypt = \Config\Services::encrypter();

        $args['data']['senha'] = $encrypt->encrypt($args['data']['senha']);

        return $args;
    }
    
    protected function dencrytSenha($args){
        
        $encrypt = \Config\Services::encrypter();

        //echo md5($args['data']['senha']);
        
        $args['data']['senha'] = $encrypt->decrypt($args['data']['senha']);

        return $args;
    }
}
