<?php

namespace App\Models;
use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $allowedFields = ['nim', 'nama_mhs', 'tempat_lahir', 'tgl_lahir', 'alamat', 'gol_darah', 'nama_ibu', 'semester', 'ipk', 'penghasilan_ortu', 'jml_saudara'];

    public function getAllMahasiswa(){
        return $this->findAll();
    }

    public function getMahasiswaById($id_mahasiswa){
        return $this->getWhere(['id_mahasiswa' => $id_mahasiswa])->getRowArray();
    }

    public function getMahasiswaByVerif($nim, $tgl_lahir, $nama_ibu){
        return $this->getWhere(['nim' => $nim, 'tgl_lahir' => $tgl_lahir, 'nama_ibu' => $nama_ibu])->getRowArray();
    }

    public function getMahasiswaForInsertKecocokan($id_mahasiswa){
        return $this->db->table($this->table)
        ->select('ipk, semester, penghasilan_ortu, jml_saudara')
        ->where(['id_mahasiswa' => $id_mahasiswa])->get()
        ->getResultArray();
    }

    public function getMahasiswaForKecocokan($id_beasiswa){
        return $this->db->query("SELECT DISTINCT a.id_mahasiswa, a.nim, a.nama_mhs FROM $this->table a JOIN tb_kecocokan b ON 
        a.id_mahasiswa = b.id_mahasiswa WHERE b.id_beasiswa=$id_beasiswa")
        ->getResultArray();
    }

    public function insertDataMahasiswa($data){
        return $this->db->table($this->table)->insert($data);
    }

    public function updateDataMahasiswa($id_mahasiswa, $data){
        return $this->db->table($this->table)->update($data, ['id_mahasiswa' => $id_mahasiswa]);
    }

    public function deleteDataMahasiswa($id_mahasiswa){
        return $this->table($this->table)->delete(['id_mahasiswa' => $id_mahasiswa]);
    }
}