<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_user extends CI_Model
{
    private $tb_pesan = 'bukutamu';

    public function save_pesan()
    {
        $post = $this->input->post();
        $this->nama = $post['nama'];
        $this->email = $post['email'];
        $this->pesan = $post['pesan'];
        $this->tanggal = date('Y-m-d');
        $this->db->insert($this->tb_pesan, $this);
    }

    public function calcKali($a, $b)
    {
        $calcSql = "SELECT FORMAT($a * $b, 6)";
        $calcQry = $this->db->query($calcSql);
        // $calcHsl = mysqli_fetch_array($calcQry);
        $hasil = $calcQry[0];
        return $hasil;
    }

    public function calcTambah($a, $b)
    {
        $calcSql = "SELECT FORMAT($a + $b, 6)";
        $calcQry = $this->db->query($calcSql);
        $hasil = $calcQry[0];
        return $hasil;
    }
}
