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
        <h2>Rekap Absensi</h2>
        <form method="post" action="<?= base_url(); ?>index.php/RekapController/Cetak">
            <table> 

                <tr><td>Tahun Ajaran</td>
                    <td><select name="tahun">

                            <?php
                            if (isset($tahunajaran)) {
                                foreach ($tahunajaran->result() as $row) {
                                    ?>
                                    <option value="<?php echo $row->tahun_ajaran; ?>"><?php echo $row->tahun_ajaran; ?></option>
                                    <?php
                                }
                            }
                            ?>             
                        </select>                                        
                    </td></tr>

                <tr><td>ID Kelas</td>
                    <td><select name="id">

                            <?php
                            if (isset($idkelas)) {
                                foreach ($idkelas->result() as $row) {
                                    ?>
                                    <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->id_kelas; ?></option>
                                    <?php
                                }
                            }
                            ?>             
                        </select>                                        
                    </td></tr>
            </table>
            <input type="submit" value="Lihat">
        </form>
        <h1 align="center">SMA PANGUDI LUHUR</h1>
        <h2 align="center">TAHUN AJARAN  </h2>
        <h3 align="center">Nama Kelas</h3>
        <table width="80%" border="1" cellpading="2">
            <thead>
                <tr>
                    <td><b>No Induk Siswa</b></td>
                    <td><b>Nama Siswa</b></td>
                    <td><b>Hadir</b></td>
                    <td><b>Sakit</b></td>
                    <td><b>Ijin</b></td>
                    <td><b>Alfa</b></td>
                   
                </tr>
            </thead>

            <?php
            if (isset($rekap)) {
                foreach ($rekap as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->nama_kelas; ?></td>
                        <td><?php echo $row->nama_siswa; ?></td>
                        <td><?php echo $row->status; ?></td>
                       
                    </tr>
                    <?php
                }
            }
            ?> 
        </table>
    </body>
</html>
