<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="<?= base_url(); ?>index.php/Welcome/insertDataSiswa">
            <h1 align="center">Menambahkan Data Siswa</h1>
            <table border="0"cellpading="2"cellspasing="1">
                <tr>
                    <td>Nomor Induk </td><td width="10" align="center">:</td>
                    <td> <textarea name = "no" cols = "40" align="center"></textarea></td></tr>
                <tr><td>Nama Siswa </td><td width="10" align="center">:</td>
                    <td> <textarea name = "nama" cols = "40" align="center"></textarea></td></tr>
                <tr><td>Keterangan </td><td width="10" align="center">:</td>
                    <td> <textarea name = "ket" cols = "40" align="center"></textarea></td></tr>
                <tr><td>IdKelas </td><td width="10" align="center">:</td>
                    <td> <textarea name = "id" cols = "40" align="center"></textarea></td></tr>
                <tr align="center"><td colspan="3"><input type = "submit" value = "Tambah" /></td></tr>
            </table>
        </form>

        <h1 align="center">Tabel Siswa</h1>
        <table width="80%" border="1" cellpading="2">
            <thead>
                <tr>
                    <td><b>Nomor Induk</b></td>
                    <td><b>Nama Siswa</b></td>
                    <td><b>Keterangan</b></td>
                    <td><b>IdKelas</b></td>

                </tr>
            </thead>

            <?php
            $this->db->select('*');
            $this->db->from('SISWA');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $siswa) {
                    ?>
                    <tr>
                        <td><?php echo $siswa->nomorinduk; ?></td>
                        <td><?php echo $siswa->namasiswa; ?></td>
                        <td><?php echo $siswa->keterangan; ?></td>
                        <td><?php echo $siswa->idkelas; ?></td>
                    </tr>
                    <?php
                }
            }
            ?> 
        </table>
    </body>
</html>