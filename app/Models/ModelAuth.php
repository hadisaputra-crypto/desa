<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';

    public function LoginUser($username, $password)
    {
        return $this->db->table('tbl_user')
            ->where('username', $username)
            ->where('password', $password)
            ->get()->getRowArray();
    }
}
