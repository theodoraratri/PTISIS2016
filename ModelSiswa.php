<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelSiswa
 *
 * @author Ratri
 */
class ModelSiswa extends BaseModel {

//put your code here
    public $nomorinduk;
    public $namasiswa;
    public $keterangan;

    public function __construct($nomorinduk, $namasiswa, $keterangan) {
        $this->nomorinduk = $nomorinduk;
        $this->namasiswa = $namasiswa;
        $this->keterangan = $keterangan;
    }

    public static function insertdatasiswa($nomorinduk, $namasiswa, $keterangan) {
        $nomorinduk = htmlspecialchars($_POST['nomor']);
        $namasiswa = htmlspecialchars($_POST['nama']);
        $keterangan = htmlspecialchars($_POST['ket']);
        $queryinsertsiswa = mysql_query("INSERT INTO SISWA VALUES('$nomorinduk','$namasiswa','$keterangan')");
        mysql_select_db('mysql');
        $tambahdatasiswa = mysql_query($queryinsertsiswa);
        if (!$tambahdatasiswa) {
            die('Data gagal ditambahkan' . mysql_error());
        }
    }

    public static function getSiswa() {
        $query = self::getDB()->prepare("SELECT * FROM 'siswa'");
        $query->execute();
        $result = array();
        while ($row = $query->fetch()) {
            array_push($result, new Pengguna($row["nomorinduk"], $row["namasiswa"], $row["keterangan"]));
        }
        return $result;
    }

    public static function updateDataSiswa($nomorinduk, $namasiswa, $keterangan) {
        $nomorinduk = htmlspecialchars($_POST['nomor']);
        $namasiswa = htmlspecialchars($_POST['nama']);
        $keterangan = htmlspecialchars($_POST['ket']);
        $queryupdatesiswa = "UPDATE SISWA SET nomorinduk= '" . $_POST['nomor'] . "', namasiswa = '" . $_POST['nama'] . "', keterangan = '" . $_POST['ket'] . "' WHERE nomorinduk = '" . $_GET['nomor'] . "'";
        $simpan = mysql_query($sql);
        $query = $this->db->get('siswa');
        return $query->result();
    }
    public static function deleteDataSiswa($nomorinduk) {
        $nomorinduk = htmlspecialchars($_POST['nomor']);
        $querydeletesiswa = "DELETE FROM SISWA SET nomorinduk= '" . $_POST['nomor'] . "', namasiswa = '" . $_POST['nama'] . "', keterangan = '" . $_POST['ket'] . "' WHERE nomorinduk = '" . $_GET['nomor'] . "'";
        $simpan = mysql_query($sql);
        $query = $this->db->get('siswa');
        return $query->result();
    }
}
?>