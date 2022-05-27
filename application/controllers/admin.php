<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_admin');
    }

    public function index()
    {
        $var['title'] = 'Home';
        $this->load->view('admin/dashboard', $var);
    }

    public function v_login()
    {
        $var['title'] = 'Admin | Login';
        $this->load->view('admin/login', $var);
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'username tidak boleh kosong']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'password tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/login');
        } else {
            $this->proses_login();
        }
    }

    private function proses_login()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $user = $this->db->get_where('admin', ['username' => $username])->row_array();
        $cekpass = $this->db->get_where('admin', array('password' => $password));

        if ($username == $user['username']) {
            if ($password == $user['password']) {
                $data = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('passwordsalah', true);
                redirect('admin/v_login');
            }
        } else {
            $this->session->set_flashdata('usernamesalah', true);
            redirect('admin/v_login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('logout', true);
        redirect('admin/v_login');
    }

    public function penyakit()
    {
        $var['title'] = 'Admin | Penyakit';
        $var['penyakit'] = $this->m_admin->get_penyakit();
        $var['penyakit2'] = $this->m_admin->get_penyakit();
        $this->load->view('admin/penyakit', $var);
    }

    public function save_penyakit()
    {
        $this->m_admin->save_penyakit();
        $this->session->set_flashdata('berhasil', true);
        redirect('admin/penyakit');
    }

    public function update_penyakit()
    {
        $this->m_admin->update_penyakit();
        $this->session->set_flashdata('berhasil_update', true);
        redirect('admin/penyakit');
    }

    public function delete_penyakit($kd)
    {
        $this->db->delete('penyakit', ['kd_penyakit' => $kd]);
        $this->session->set_flashdata('berhasil_hapus', true);
        redirect('admin/penyakit');
    }

    public function gejala()
    {
        $var['title'] = 'Admin | Gejala';
        $var['gejala'] = $this->m_admin->get_gejala();
        $var['gejala2'] = $this->m_admin->get_gejala();
        $this->load->view('admin/gejala', $var);
    }

    public function save_gejala()
    {
        $this->m_admin->save_gejala();
        $this->session->set_flashdata('berhasil', true);
        redirect('admin/gejala');
    }

    public function update_gejala()
    {
        $this->m_admin->update_gejala();
        $this->session->set_flashdata('berhasil_update', true);
        redirect('admin/gejala');
    }

    public function delete_gejala($kd)
    {
        $this->db->delete('gejala', ['kd_gejala' => $kd]);
        $this->session->set_flashdata('berhasil_hapus', true);
        redirect('admin/gejala');
    }

    public function rule()
    {
        $var['title'] = 'Admin | Rule';
        $var['rule'] = $this->m_admin->get_rule();
        $var['penyakit'] = $this->m_admin->get_penyakit();
        $var['gejala'] = $this->m_admin->get_gejala();
        $var['rule2'] = $this->m_admin->get_rule();
        $this->load->view('admin/rule', $var);
    }

    public function save_rule()
    {
        $this->m_admin->save_rule();
        $this->session->set_flashdata('berhasil', true);
        redirect('admin/rule');
    }
}
