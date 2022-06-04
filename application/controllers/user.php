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

	public function proses_diagnosa()
	{
		$var['title'] = 'Hasil Konsultasi';
		$jml_gejala = $this->db->count_all_results('gejala');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('jenis_kelamin');
		$usia = $this->input->post('usia');
		$alamat = $this->input->post('alamat');
		$pilih_gejala = $this->input->post('gejala');
		// for ($key = 0; $key < $jml_gejala; $key++) {
		// }
		// if (empty($pilih_gejala)) {
		// 	$this->session->set_flashdata('belum_pilih', true);
		// 	redirect('user/konsultasi');
		// }



		$sql = "SELECT * FROM pasien ORDER BY idpasien DESC LIMIT 1";
		$dt = $this->db->query($sql)->row();
		$id_pasien = $dt->idpasien;
		$tampil_gejala = $this->db->query("SELECT * FROM gejala ORDER BY (SUBSTR(kd_gejala,2,2) + 0) ASC")->result();
		$dt = null;
		foreach ($tampil_gejala as $tg) {
			$dt[] = $tg;
		}
		$gejala = $this->input->post('jwb_gejala');

		$ID		= str_replace(".", "", $_SERVER['REMOTE_ADDR']);
		// var_dump($ID);
		$HiHasil = array();
		$gejala2 = array();
		$i = 0;
		$ya = 0;
		$tidak = 0;

		foreach ($gejala as $n) {
			if ($n == "YA") {
				array_push($gejala2, $dt[$i]);
				$ya++;
			} else {
				$tidak++;
			}
			$i++;
		}
		if ($tidak > $ya) {
			$this->session->set_flashdata('tidak_terdeteksi', true);
			redirect('user/konsultasi');
		} else {
			$save_pasien = array(
				'nama' => $nama,
				'jenis_kelamin' => $jk,
				'usia' => $usia,
				'alamat' => $alamat
			);
			$this->db->insert('pasien', $save_pasien);


			$jumlah = count($gejala2);
			$gjala = array();
			// echo "<h3>Gejala yang dialami : </h3><br>";
			foreach ($gejala2 as $nilai) {
				$gejalaSQL = "SELECT * FROM gejala WHERE kd_gejala='" . $nilai->kd_gejala . "'";
				$gejalaHsl = $this->db->query($gejalaSQL)->result();
				foreach ($gejalaHsl as $gh) {
					array_push($gjala, $gh->kd_gejala);
				}
			}
			$Hi	= 1;
			$h = 0;
			$PH = 0;
			$penyakitSql = "SELECT * FROM penyakit";
			$penyakitQry = $this->db->query($penyakitSql)->result();
			$diagnosa = array();

			foreach ($penyakitQry as $data_penyakit) {
				// echo "<div class='container'";
				// echo "<br> <b> $data_penyakit->kd_penyakit $data_penyakit->nm_penyakit</b><br>";
				$np_populasi = $data_penyakit->np_populasi;
				if (count($gejala2) <= 0) {
					$Em = 0;
				} else {
					$Em = 1;
				}

				$Em2 = 0;
				$nilai_probabilitas = 0;

				foreach ($gejala2 as $kd_gejala) {
					$aturanSql  = "SELECT * FROM aturan WHERE kd_penyakit='$data_penyakit->kd_penyakit' AND kd_gejala='" . $kd_gejala->kd_gejala . "'";
					$aturanData = $this->db->query($aturanSql)->result_array();

					foreach ($aturanData as $ad) {
						$kd_gejala2 = $ad['kd_gejala'];
						$nilai_probabilitas = $ad['nilai_probabilitas'];

						// echo $kd_gejala2 . " Probabilitas : " . $nilai_probabilitas;
						// echo "<br>";
					}

					// $view_prob[] = "<li class='list-group-item'>" . $kd_gejala2 . " Probabilitas : " . $nilai_probabilitas . "</li>";


					//Periksa jika memiliki Nilai Probabilitas pada tabel aturan
					if ($this->db->query($aturanSql)->num_rows() >= 1) {
						// $Em = $this->m_user->calcKali($Em, $nilai_probabilitas);
						$Em = $Em * $nilai_probabilitas;
					} else {
						// Jika tidak ada, atau bernilai 0.0000
						// $Em = $this->m_user->calcKali($Em, 0.0000);
						$Em = $Em * 0.0000;
					}
				}
				// $Hi = $this->m_user->calcKali($Em, $np_populasi);
				$Hi = $Em * $np_populasi;
				// $PH = $this->m_user->calcTambah($PH, $Hi);
				$PH = $PH + $Hi;

				// Simpan hasil kali ke variabel Array $hiHasil[Hx]
				$HiHasil[$data_penyakit->kd_penyakit] = $Hi;
				// var_dump($Em);
				// Informasi
				// echo "<u>Hasil p(E01, E02, .. En) </u> = " . $Em;
				// echo "<br><br/> <u> Populasi Penyakit $data_penyakit->kd_penyakit </u> = " . $np_populasi;
				// echo "<br> <u> p(E01 | Hi) x p(E01 | Hi) x p(En | Hi) : $Em * $np_populasi </u> = " . $Hi;
				// echo "<br>";
				// echo "</div>";
			}
			// Kosongkan (jika sudah pernah konsultasi)
			$this->db->query("DELETE FROM tmp_diagnosa WHERE ID='$ID'");

			$PHitung = array();
			//var_dump($HiHasil);

			foreach ($HiHasil as $kode => $nilai) {
				$PHitung[$kode] = ($nilai / $PH);
				$hasill = $nilai / $PH;
				// echo "Hasil hitung $kode : ";
				// echo "<br><u> p(Hi | E01, E02, En) : $nilai / $PH </u> = " . $nilai / $PH;
				// echo "<br><br>";


				// Simpan konsultasi ke Temporary
				// $inTmpSql = "INSERT INTO tmp_diagnosa (ID,kd_penyakit,hasil_hitung)Values ('$ID','$kode','" . calcBagi($nilai, $PH) . "')";
				$inTmpSql = array(
					'ID' => $ID,
					'kd_penyakit' => $kode,
					'hasil_hitung' => $hasill
				);
				$this->db->insert('tmp_diagnosa', $inTmpSql);
				// echo $inTmpSql ;
			}

			$maxSql = "SELECT * FROM tmp_diagnosa WHERE hasil_hitung=(SELECT MAX(hasil_hitung) FROM tmp_diagnosa WHERE ID='$ID') AND ID='$ID'";
			$maxHsl = $this->db->query($maxSql)->result();
			foreach ($maxHsl as $maxHsl) {
				$maxHasil = $maxHsl->hasil_hitung;
				// var_dump($maxHasil);
				$penyakit2Sql = "SELECT * FROM penyakit WHERE kd_penyakit='$maxHsl->kd_penyakit'";
				$penyakit2Hsl = $this->db->query($penyakit2Sql)->result();
				foreach ($penyakit2Hsl as $penyakit2) {
					$nama_penyakit = $penyakit2->nm_penyakit;
					// var_dump($nama_penyakit);
				}
				$id_p = $maxHsl->kd_penyakit;
				foreach ($gjala as $v) {
					$sql = "SELECT * from aturan where kd_penyakit='$id_p' and kd_gejala ='$v'";
					// $res = $this-> db->query($sql);
					// $hsl = mysqli_fetch_row($res);
					$hsl = $this->db->query($sql)->row();
					$nilai_probb = $hsl->nilai_probabilitas;
					// var_dump($nilai);
					//echo $nilai;
					//exit;
					//id_p
					//v
					//nilai
					//id_pasien	
					// $masuk = ("INSERT INTO diagnosa (kd_gejala,kd_penyakit,idpasien,nama,jenis_kelamin,usia,alamat,nilai,tgl_diagnosa) values ('$v','$id_p','$id_pasien','$nama','$jnsk','$usia','$alamat','$nilai',NOW())");
					$save_diagnosa = array(
						'kd_gejala' => $v,
						'kd_penyakit' => $id_p,
						'idpasien' => $id_pasien,
						'nama' => $nama,
						'jenis_kelamin' => $jk,
						'usia' => $usia,
						'alamat' => $alamat,
						'nilai' => $nilai_probb,
						'tgl_diagnosa' => date('Y-m-d')
					);
					$this->db->insert('diagnosa', $save_diagnosa);
					//echo $masuk;

					// mysql_query($masuk) or die("Error inTmpSql" . mysql_error());
				}
				// echo "Kesimpulan diambil paling besar Max(H01, Hn) dengan kode penyakit  <b> $maxHsl[kd_penyakit] = " . $maxHasil . "($nm_penyakit) </b>";
			}

			$var['gejala_pilihan'] = $gejala2;
			$var['gejala_pilihan2'] = $gejala2;
			$var['gejala2'] = $gejala2;
			$var['penyakit'] = $penyakitQry;
			$var['em'] = $Em;
			// $var['dataa'] = $aturanData;
			// var_dump($var['em']);
			$var['pasien'] = $save_pasien;
			$this->load->view('users/hasil_konsultasi', $var);
		}
	}
}
