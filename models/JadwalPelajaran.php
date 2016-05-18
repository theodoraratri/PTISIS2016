<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JadwalPelajaran
 *
 * @author Windows 10
 */
class JadwalPelajaran extends CI_Model {

    function getAllJadwal() {
        $this->db->select('jp.kode_jadwal,jp.id_kelas,jp.id_mapel,m.nama_mapel,jp.nip,g.nama_guru,jp.hari,jp.jam,k.nama_kelas ');
        $this->db->from('jadwalpelajaran jp');
        $this->db->join('kelas k', 'k.id_kelas=jp.id_kelas', 'inner');
        $this->db->join('mapel m', ' m.id_mapel=jp.id_mapel', 'inner');
        $this->db->join('guru g', ' g.nip=jp.nip', 'inner');
        $query = $this->db->get()->result();
        return $query;
    }

    function getJadwal($kode) {
        $this->db->where('kode_jadwal', $kode);
        return $this->db->get('jadwalpelajaran');
        //select mapel berdasarkan id yang dimiliki
    }

    public function insertdatajadwalpelajaran($data) {
        $this->db->insert('jadwalpelajaran', $data);
    }

    public function updatedatajadwalpelajaran($data) {
        $this->db->where('kode_jadwal', $data['kode_jadwal']);
        $this->db->update('jadwalpelajaran', $data);
    }

    public function deletedatajadwalpelajaran($kodeJadwal) {
        $this->db->delete('jadwalpelajaran', $kodeJadwal);
    }

    public function tampilNIP() {
        $query = $this->db->query("select nip,nama_guru from GURU");
        return $query;
    }

    public function tampilIdMapel() {
        $query = $this->db->query("select id_mapel,nama_mapel from mapel");
        return $query;
    }

    public function tampildKelas() {
        $query = $this->db->query("select id_kelas,nama_kelas from kelas");
        return $query;
    }

}
