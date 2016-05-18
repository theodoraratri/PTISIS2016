<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RekapController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Rekap"); //constructor yang dipanggil ketika memanggil products.php untuk melakukan pemanggilan pada model : products_model.php yang ada di folder models
    }

    public function tampilIdKelas() {
        $this->load->model('Rekap');

        // $data['tahunajaran'] = $this->Rekap->tampilTahunAjaran();
        $data['idkelas'] = $this->Rekap->tampildKelas();
        $this->load->view('CetakRekapView', $data);
    }

    public function tampilIdKelasKemajuan() {
        $this->load->model('Rekap');

        // $data['tahunajaran'] = $this->Rekap->tampilTahunAjaran();
        $data['tidkelas_cetakkemajuankelas'] = $this->Rekap->tampildKelas();
        $this->load->view('CetakKemajuanKelas', $data);
    }

    public function cetakKemajuanKelas() {
        $this->load->model('Rekap');
        $idkls = $this->input->post('idKelas');
        $bulan = $this->input->post('bln');
        $tahun = $this->input->post('thn');
        $tahunbulan = "" . $tahun . "-" . $bulan . "";
        $sql = $this->Rekap->ambiIdkelas($idkls);
        foreach ($sql as $nama) {
            $data['walikelaskemajuan'] = $nama->nama_guru;
            $data['nkelas_cetakkemajuankelas'] = $nama->nama_kelas;
        }
        $data['tidkelas_cetakkemajuankelas'] = $this->Rekap->tampildKelas();
        $data['tcetakkemajuankelas'] = $this->Rekap->tampilRekapKemajuanKelas($tahunbulan, $idkls);
        $data['blntahun'] = $tahunbulan;
        $data['idKelasCetakK'] = $idkls;
        $this->load->view('CetakKemajuanKelas', $data);
    }

    public function CetakAbsensi() {
        $this->load->model('Rekap');
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $query = $this->Rekap->ambiIdkelas($id);
        foreach ($query as $nama) {
            $data['walikelasabsen'] = $nama->nama_guru;
            $data['namakelas_cetakabsen'] = $nama->nama_kelas;
        }
        $data['thnn'] = $tahun;
        $data['idkelas_cetakabsen'] = $id;
        $data['idkelas'] = $this->Rekap->tampildKelas();
        $data['rekapa'] = $this->Rekap->tampilRekapAbsen($id, $tahun);
        $this->load->view('CetakRekapView', $data);
    }

    public function cetak() {
        $this->load->model('Rekap');
        $kelas = $this->input->post('kelas');
        $th = $this->input->post('thn');
        $this->load->helper('excel_helper');
        $sql = $this->Rekap->ambiIdkelas($kelas);
        foreach ($sql as $nama) {
            $waliKls = $nama->nama_guru;
            $NamaKelas = $nama->nama_kelas;
        }
        $namaFile = "Kelas" . $kelas . ".xls";
        $judul = "SMA PANGUDI LUHUR YOGYAKARTA ";
        $tahunAjaran = "TAHUN AJARAN " . $th . "";
        $NamaKelas1 = "Kelas: " . $NamaKelas . "";
        $NamaWk = "Wali Kelas: " . $waliKls . "";
        $tablehead = 4;
        $tablebody = 5;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        xlsWriteLabel(0, 5, $judul);
        xlsWriteLabel(1, 6, $tahunAjaran);
        xlsWriteLabel(2, 8, $NamaKelas1);
        xlsWriteLabel(2, 9, $NamaWk);

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No Induk");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Siswa");
        //  xlsWriteLabel($tablehead, $kolomhead++, "Nama Mata Pelajaran");
        xlsWriteLabel($tablehead, $kolomhead++, "Hadir");
        xlsWriteLabel($tablehead, $kolomhead++, "Sakit");
        xlsWriteLabel($tablehead, $kolomhead++, "Ijin");
        xlsWriteLabel($tablehead, $kolomhead++, "Alfa");


        foreach ($this->Rekap->tampilRekapAbsen($kelas, $th) as $data) {
            $kolombody = 0;
            xlsWriteLabel($tablebody, $kolombody++, $data->no_induk);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_siswa);
            //    xlsWriteLabel($tablebody, $kolombody++, $data->nama_mapel);
            xlsWriteLabel($tablebody, $kolombody++, $data->H);
            xlsWriteLabel($tablebody, $kolombody++, $data->S);
            xlsWriteLabel($tablebody, $kolombody++, $data->I);
            xlsWriteLabel($tablebody, $kolombody++, $data->A);
            $tablebody++;
            $nourut++;
        }


        xlsEOF();
        exit();
    }

    public function cetakExcelKemajuanKelas() {
        $this->load->model('Rekap');
        $kls = $this->input->post('idkelascetak');
        $thnB = $this->input->post('bulanThn');
        $this->load->helper('excel_helper');
        $sql = $this->Rekap->ambiIdkelas($kls);
        foreach ($sql as $namaK) {

            $NamaKelasKemajuan = $namaK->nama_kelas;
            $namaWaliKelasKemajuan = $namaK->nama_guru;
        }
        $namaFile = "Kemajuan_Kelas" . $kls . $thnB . ".xls";
        $judul = "SMA PANGUDI LUHUR YOGYAKARTA ";
        $judul1 = "KEMAJUAN KELAS";
        $NamaKelasKemajuan1 = "Kelas " . $NamaKelasKemajuan . "";
        $wkelas = "Wali Kelas :" . $namaWaliKelasKemajuan . "";
        $tablehead = 4;
        $tablebody = 5;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        xlsWriteLabel(0, 4, $judul);
        xlsWriteLabel(1, 5, $judul1);
        xlsWriteLabel(2, 8, $NamaKelasKemajuan1);
        xlsWriteLabel(2, 10, $wkelas);

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
        xlsWriteLabel($tablehead, $kolomhead++, "Mata Pelajaran ");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Hadir");
        xlsWriteLabel($tablehead, $kolomhead++, "Materi YD");
        xlsWriteLabel($tablehead, $kolomhead++, "Kegiatan Bm");

        foreach ($this->Rekap->tampilRekapKemajuanKelas($thnB, $kls) as $data) {
            $kolombody = 0;
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_mapel);
            xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_kehadiran);
            xlsWriteLabel($tablebody, $kolombody++, $data->materiYD);
            xlsWriteLabel($tablebody, $kolombody++, $data->kegiatanBM);

            $tablebody++;
            $nourut++;
        }


        xlsEOF();
        exit();
    }

}
