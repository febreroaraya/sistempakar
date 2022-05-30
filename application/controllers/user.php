<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_admin');
		$this->load->model('m_user');
	}

	public function index()
	{
		$var['title'] = 'Home';
		$this->load->view('users/home', $var);
	}

	public function informasi()
	{
		$var['title'] = 'Informasi';
		$var['penyakit'] = $this->m_admin->get_penyakit();
		$var['diagnosa'] = $this->m_admin->get_diagnosa();
		$this->load->view('users/informasi', $var);
	}

	public function konsultasi()
	{
		$var['title'] = 'Konsultasi';
		$var['gejala'] = $this->m_admin->get_gejala();
		$this->load->view('users/konsultasi', $var);
	}

	public function kontak()
	{
		$var['title'] = 'Kontak';
		$this->load->view('users/kontak', $var);
	}

	public function save_pesan()
	{
		$this->m_user->save_pesan();
		$this->session->set_flashdata('berhasil_terkirim', true);
		redirect('admin/kontak');
	}
}
