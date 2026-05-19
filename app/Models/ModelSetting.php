<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSetting extends Model
{
    public function Detail()
    {
        return  $this->db->table('tbl_web')->where('id', '1')->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_web')
            ->where('id', $data['id'])
            ->update($data);
    }
}
