<?php

namespace App\Controllers;

use App\Models\M_home;
use M_upload;

class Home extends BaseController
{
	protected $m_home;
	protected $m_upload;
	public function __construct()
	{
		$this->m_home = new M_home();
		$this->m_upload = new M_upload();
	}

	public function index()
	{
		$data['title'] = 'Sistem Informasi Produk Hukum Undiksha';
		$data['title_navbar'] = 'Sistem Informasi Produk Hukum Undiksha';
		$data['unit'] = $this->m_home->get_unit();
		$data['baru'] = $this->m_home->get_prohum_terbaru();
		$data['kategori'] = $this->m_home->get_kategori();
		$data['tahun'] = $this->m_home->get_tahun();
		$data['status'] = $this->m_home->get_status();
		return view('Home/Content/beranda', $data);
	}

	public function statistik()
	{
		$data['title'] = 'Statistik - Sistem Informasi Produk Hukum Undiksha';
		$data['title_navbar'] = 'Statistik';
		$data['unit'] = $this->m_home->get_unit();
		$data['jenis'] = $this->m_home->get_statistik_by_jenis();
		$data['kategori'] = $this->m_home->get_statistik_by_kategori();
		$data['tahun'] = $this->m_home->get_statistik_by_tahun();
		return view('Home/Content/statistik', $data);
	}

	public function unit($id)
	{
		$data['nama_unit'] = $this->m_home->get_unit_by_id($id);
		$data['title'] = 'Unit ' . $data['nama_unit']['nama_unit'] . ' - Sistem Informasi Produk Hukum Undiksha';
		$data['title_navbar'] = 'Unit ' . $data['nama_unit']['nama_singkat'];
		$data['prohum'] = $this->m_home->get_prohum_by_id_unit($id);
		$data['pager'] = $this->m_home->pager;

		$data['unit'] = $this->m_home->get_unit();
		$data['kategori'] = $this->m_home->get_kategori();
		$data['tahun'] = $this->m_home->get_tahun();
		$data['status'] = $this->m_home->get_status();
		return view('Home/Content/unit', $data);
	}

	public function kategori($id)
	{
		$data['nama_kategori'] = $this->m_home->get_kategori_by_id($id);
		$data['title'] = 'Kategori ' . $data['nama_kategori']['nama_kategori'] . ' - Sistem Informasi Produk Hukum Undiksha';
		$data['title_navbar'] = 'Kategori ' . $data['nama_kategori']['nama_kategori'];
		$data['prohum'] = $this->m_home->get_prohum_by_id_kategori($id);
		$data['pager'] = $this->m_home->pager;

		$data['unit'] = $this->m_home->get_unit();
		$data['kategori'] = $this->m_home->get_kategori();
		$data['tahun'] = $this->m_home->get_tahun();
		$data['status'] = $this->m_home->get_status();
		return view('Home/Content/kategori', $data);
	}

	public function cari()
	{
		$data['title'] = 'Hasil Pencarian - Sistem Informasi Produk Hukum Undiksha';
		$data['title_navbar'] = 'Pencarian';
		$data['prohum'] = $this->m_home->cari($this->request->getVar());
		$data['pager'] = $this->m_home->pager;

		$data['unit'] = $this->m_home->get_unit();
		$data['kategori'] = $this->m_home->get_kategori();
		$data['tahun'] = $this->m_home->get_tahun();
		$data['status'] = $this->m_home->get_status();
		return view('Home/Content/hasil_cari', $data);
	}

	public function produk($id)
	{
		$data['title'] = 'Detail Produk Hukum - Sistem Informasi Produk Hukum Undiksha';
		$data['title_navbar'] = 'Detail Produk Hukum';
		$data['prohum'] = $this->m_home->get_prohum_by_id_produk($id);
		$data['kategori'] = $this->m_home->get_kategori();

		$data['unit'] = $this->m_home->get_unit();
		$data['kategori'] = $this->m_home->get_kategori();
		$data['tahun'] = $this->m_home->get_tahun();
		$data['status'] = $this->m_home->get_status();

		$id_upload = $this->m_upload->get_upload_by_id_produk($id);
		$array = [];

		foreach ($id_upload as $up) {
			$vid = $this->m_upload->get_galeri_video($up['id_upload']);
			$gal = $this->m_upload->get_galeri_gambar($up['id_upload']);
			array_push($array, $vid);
			array_push($array, $gal);
			// $array = $gal;
		}
		$data['galeri'] = $array;
		// dd($data['galeri']);

		return view('Home/Content/produk', $data);
	}

	//--------------------------------------------------------------------

}
