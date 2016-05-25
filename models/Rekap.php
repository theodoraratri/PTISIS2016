<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rekap
 *
 * @author Lenovo
 */
class Rekap extends CI_Model {

    public function tampilRekapAbsen($kelas, $tahun) {
        $this->db->select("a.no_induk,a.id_kelas,s.nama_siswa,k.nama_kelas,SUM(case when`status`='sakit' then 1 else 0 end)S,SUM(case when`status`='alfa' then 1 else 0 end)A,SUM(case when`status`='izin' then 1 else 0 end)I,SUM(case when`status`='hadir' then 1 else 0 end)H");
        $this->db->from('data_absensi a');
        $this->db->join('siswa s', 's.no_induk=a.no_induk', 'inner');
        $this->db->join('kelas k', 'k.id_kelas=a.id_kelas', 'inner');
        //  $this->db->join('mapel m', 'm.id_mapel=a.id_mapel', 'inner');
        $this->db->where('a.id_kelas', $kelas);
        $this->db->where('a.tahun_ajaran', $tahun);
        $this->db->group_by("no_induk,tahun_ajaran,id_kelas");
        $query = $this->db->get()->result();
        return $query;
    }

    public function tampilRekapKemajuanKelas($bulan, $kls) {
        $this->db->select(' m.nama_mapel,k.id_kelas,kls.nama_kelas,tgl,k.jumlah_kehadiran,k.materiYD,k.kegiatanBM');
        $this->db->from('kemajuan_kelas k');
        $this->db->join('mapel m', 'm.id_mapel=k.id_mapel', 'inner');
        $this->db->join('kelas kls', 'kls.id_kelas=k.id_kelas', 'inner');
        $this->db->like('tgl', $bulan, 'after');
        $this->db->where('k.id_kelas', $kls);
        $query = $this->db->get()->result();
        return $query;
    }

    public function tampildKelas() {
        $query = $this->db->query("select id_kelas,nama_kelas from kelas");
        return $query;
    }

    public function tampilRekapCoba($noInduk) {
        $this->db->where('no_induk', $noInduk);
        return $this->db->get('absen');
    }

//    public function ambiIdkelas($id) {
//        $this->db->where('id_kelas', $id);
//        return $this->db->get('kelas');
//    }
    public function ambiIdkelas($id) {
        $this->db->select('g.nama_guru,k.nama_kelas');
        $this->db->from('kelas k');

        $this->db->join('guru g', 'g.nip=k.nip', 'inner');
        $this->db->where('k.id_kelas', $id);
        $query = $this->db->get()->result();
        return $query;
    }

}
