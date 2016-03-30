<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JadwalPelajaran
 *
 * @author Asih
 */
class JadwalPelajaran extends CI_Model {

    var $kodeJadwal;
    var $hari;
    var $jam;
    var $namaKelas;
    var $mataPelajaran;

    function getKodeJadwal() {

        return $this->kodeJadwal;
    }

    function setKodeJadwal() {

        $this->kodeJadwal = $this->kodeJadwal;
    }

    function getHari() {

        return $this->hari;
    }

    function getJam() {

        return $this->jam;
    }

    function getNamaKelas() {

        return $this->namaKelas;
    }

    function getMataPelajaran() {

        return $this->mataPelajaran;
    }

    function Insert($data) {
        $this->db->insert('jadwalpelajaran', $data);
    }

    public function edit($kodeJadwal, $data) {
        $this->db->where($kodeJadwal);
        $this->db->update('jadwalpelajaran', $data);
    }

    public function tampilDataJadwal() {
        $query = $this->db->query("select * from jadwalpelajaran")->result();
        return $query;
    }
 public function delete($kodeJadwal) {
        $this->db->where('kodejadwal',$kodeJadwal);
        $this->db->delete('jadwalpelajaran');
    }

}
