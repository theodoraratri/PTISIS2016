<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Sistem Informasi Siswa</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
        <script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
        <script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
        <script type="text/javascript" src="layout/scripts/jquery.ui.min.js"></script>
        <script type="text/javascript" src="layout/scripts/jquery.tabs.setup.js"></script>
    </head>
    <body>
        <!-- ####################################################################################################### -->
        <div class="wrapper col1">
            <div id="header">
                <div id="logo">
                    <h1><a href="HalamanGuru.php">Sistem Informasi Siswa</a></h1>
                    <p>SMA Pangudi Luhur Yogyakarta</p>
                </div>
                <div class="fl_right">

                    <p>Tel: xxxxx xxxxxxxxxx | Mail: info@domain.com</p>
                </div>
                <br class="clear" />
            </div>
        </div>
        <!-- ####################################################################################################### -->
        <div class="wrapper col2">
            <div id="topnav">
                <ul>
                    <li><a href="HalamanGuru.php">Halaman Guru</a>
                    </li>
                    <li class="active"><a href="MasukRekap.php">Memasukkan absensi dan kemajuan kelas</a>
                    </li>
                    <li><a href="CetakRekap.php">Mencetak absensi dan kemajuan kelas</a>
                    </li>
                    <li class="last"><a href="CariRekap.php">Mencari absensi</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ####################################################################################################### -->
        <div class="wrapper col3">
            <div id="featured_slide">
                <div id="featured_wrap">
                    <h3>MEMASUKKAN KEMAJUAN KELAS</h3>
                    <form method="post" action="<?= base_url() ?>index.php/DataKemajuanKelas/insertData">
                        <table>
                            <tr>
                                <td>Id Kemajuan Kelas : </td>
                                <td><input name="passguru" type="text" class="textbox"></td>
                            </tr>
                            
                            <tr>
                                <td>Tanggal : </td>
                                <td><input type='datepicker' name='tgl' type='text'value=''>
                                </td>
                            </tr>
                            <tr>
                                <td>Mata Pelajaran : </td>
                                <td><select name="id_mapel">
                                        <?php
                                        if (isset($dmapel)) {
                                            foreach ($dmapel->result() as $row) {
                                                ?>
                                                <option value="<?php echo $row->id_mapel; ?>"><?php echo $row->nama_mapel; ?></option>
                                                <?php
                                            }
                                        }
                                        ?> 
                                    </select></td>
                            </tr><tr>
                                <td>Kelas : </td>
                                <td><select name="id_kelas">
                                        <?php
                                        if (isset($dkelas)) {
                                            foreach ($dkelas->result() as $row) {
                                                ?>
                                                <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->nama_kelas; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>  
                                    </select></tr>
                            <tr>
                                <td>Jumlah Kehadiran : </td>
                                <td> <?php
                                    if (isset($ukelas)) {
                                        foreach ($ukelas as $data) {
                                            ?>

                                            <input type="text" name="jumlah_kehadiran" maxlength="30" 
                                                   value="<?php echo $row->hadir; ?>"/> ?>
                                                   <?php
                                               }
                                           }
                                           ?>      
                                </td></tr>

                            <tr>
                                <td>NIP : </td>
                                <td><select name="nip">
                                        <?php
                                        if (isset($dnip)) {
                                            foreach ($dnip->result() as $row) {
                                                ?>
                                                <option value="<?php echo $row->nip; ?>"><?php echo $row->nama_guru; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>  
                                    </select></tr>

                            <tr>
                                <td>Materi yang Diampu : </td>
                                <td><textarea type="text" name="materiYD" rows="2"  cols="100"/></textarea>
                                </td>
                            </tr>                                
                            <tr>
                                <td>Kegiatan Belajar Mengajar : </td>
                                <td><textarea type="text" name="kegiatanBM" rows="2"  cols="100"/></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><br>
                                    <input type="submit" value="SIMPAN">
                                    <input type="reset" value="RESET" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <!-- ####################################################################################################### -->
        <div class="wrapper col5">
            <div id="footer">
                <div id="newsletter">
                    <h2>PENCARIAN GOOGLE</h2>
                    <p>Untuk melakukan pencarian <a href="http://www.google.com/">click here &raquo;</a></p>
                </div>
                <br class="clear" />
            </div>
        </div>
        <!-- ####################################################################################################### -->
        <div class="wrapper col6">
            <div id="copyright">
                <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="#">Domain Name</a></p>
                <br class="clear" />
            </div>
        </div>
        <?php ?>
    </body>
</html>