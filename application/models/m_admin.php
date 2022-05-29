<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_admin extends CI_Model
{
    private $tb_penyakit = 'penyakit';
    private $tb_gejala = 'gejala';
    private $tb_aturan = 'aturan';
    private $tb_pesan = 'bukutamu';

    public function get_penyakit()
    {
        return $this->db->get($this->tb_penyakit)->result();
    }

    public function get_gejala()
    {
        return $this->db->get($this->tb_gejala)->result();
    }

    public function get_rule()
    {
        $this->db->select('aturan.nilai_probabilitas, aturan.id_aturan, penyakit.*, gejala.*');
        $this->db->from('aturan');
        $this->db->join('penyakit', 'aturan.kd_penyakit = penyakit.kd_penyakit');
        $this->db->join('gejala', 'aturan.kd_gejala = gejala.kd_gejala');
        $this->db->order_by('id_aturan', 'desc');
        return $this->db->get()->result();
    }

    public function get_pesan()
    {
        return $this->db->get($this->tb_pesan)->result();
    }

    public function get_diagnosa()
    {
        $this->db->select('*');
        $this->db->from('diagnosa');
        $this->db->join('penyakit', 'diagnosa.kd_penyakit = penyakit.kd_penyakit');
        $this->db->join('gejala', 'diagnosa.kd_gejala = gejala.kd_gejala');
        $this->db->order_by('kd_diagnosa', 'desc');
        return $this->db->get()->result();
    }

    public function get_laporan($tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from('diagnosa');
        $this->db->join('penyakit', 'diagnosa.kd_penyakit = penyakit.kd_penyakit');
        $this->db->join('gejala', 'diagnosa.kd_gejala = gejala.kd_gejala');
        $this->db->where('tgl_diagnosa >=', $tgl_awal);
        $this->db->where('tgl_diagnosa <=', $tgl_akhir);
        return $this->db->get()->result();

    }

    public function save_penyakit()
    {
        $post = $this->input->post();
        $this->kd_penyakit = $post['kd_penyakit'];
        $this->nm_penyakit = $post['nm_penyakit'];
        $this->pencegahan = $post['pencegahan'];
        $this->pengobatan = $post['pengobatan'];
        $this->np_populasi = $post['np_populasi'];
        $this->db->insert($this->tb_penyakit, $this);
    }

    public function update_penyakit()
    {
        $post = $this->input->post();
        $this->kd_penyakit = $post['kd_penyakit'];
        $this->nm_penyakit = $post['nm_penyakit'];
        $this->pencegahan = $post['pencegahan'];
        $this->pengobatan = $post['pengobatan'];
        $this->np_populasi = $post['np_populasi'];
        $this->db->update($this->tb_penyakit, $this, ['kd_penyakit' => $post['kd_penyakit']]);
    }

    public function save_gejala()
    {
        $post = $this->input->post();
        $this->kd_gejala = $post['kd_gejala'];
        $this->nm_gejala = $post['nm_gejala'];
        $this->db->insert($this->tb_gejala, $this);
    }

    public function update_gejala()
    {
        $post = $this->input->post();
        $this->kd_gejala = $post['kd_gejala'];
        $this->nm_gejala = $post['nm_gejala'];
        $this->db->update($this->tb_gejala, $this, ['kd_gejala' => $post['kd_gejala']]);
    }

    public function save_rule()
    {
        $post = $this->input->post();
        $this->kd_penyakit = $post['kd_penyakit'];
        $this->kd_gejala = $post['kd_gejala'];
        $this->nilai_probabilitas = $post['nilai_probabilitas'];
        $this->db->insert($this->tb_aturan, $this);
    }

    public function update_rule()
    {
        $post = $this->input->post();
        $this->id_aturan = $post['id_aturan'];
        $this->kd_penyakit = $post['kd_penyakit'];
        $this->kd_gejala = $post['kd_gejala'];
        $this->nilai_probabilitas = $post['nilai_probabilitas'];
        $this->db->update($this->tb_aturan, $this, ['id_aturan' => $post['id_aturan']]);
    }
}