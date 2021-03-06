<?php

namespace App\Models;
use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'tb_akun';
    protected $primaryKey = 'id_akun';
    protected $allowedFields = ['username', 'password'];
    
    public function getAllAkun(){
        return $this->findAll();
    }

    public function getAkunByUsername($username){
        return $this->where(['username' => $username])->first();
    }

    public function getAkunById($id_akun){
        return $this->where(['id_akun' => $id_akun])->first();
    }

    public function insertDataAkun($data){
        return $this->db->table($this->table)->insert($data);
    }

    public function updateDataAkun($data, $id_akun){
        return $this->db->table($this->table)->update($data, ['id_akun' => $id_akun]);
    }

    public function deleteDataAkun($id_akun){
        return $this->table($this->table)->delete(['id_akun' => $id_akun]);
    }
}