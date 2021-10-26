<?php defined('BASEPATH') or exit('No direct script access allowed');

class Api_odel extends CI_Model
{

    public function insert($tabel, $arr)
    {
        $cek = $this->db->insert($tabel, $arr);
        return $cek;
    }
    public function hapus($id, $column, $tb)
    {
        $this->load->database();
        $this->db->where($column, $id);
        return $this->db->delete($tb);
    }
    public function ubah($data = array(), $id, $column, $tb)
    {
        $this->load->database();
        $this->db->where($column, $id);
        return $this->db->update($tb, $data);
    }
}
