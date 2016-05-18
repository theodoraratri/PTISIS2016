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
    <body><html>
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
                        <li class="active"><a href="MasukKemajuanKelas.php.php">Kemajuan kelas</a>
                        </li>
                        <li><a href="CetakRekap.php">Mencetak absensi dan kemajuan kelas</a>
                        </li>
                        <li class="last"><a href="CariRekap.php">Mencari absensi</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ####################################################################################################### -->
            <form method="post" action="<?= base_url() ?>index.php/DataKemajuanKelas/InsertData">  
                <table>

                    <tr>
                        <td>Tanggal : </td>
                        <td>
                            <?php
                            if (isset($tg)) {
                                ?>
                                <input name="id_kelas"value="<?php echo $tg ?>" type="hidden"><?php echo $tg ?>
                                <?php
                            }
                            ?> 
                        </td>
                    </tr>
                    <tr>
                        <td>Mata Pelajaran : </td>
                        <td>
                            <?php
                            if (isset($jhadir)) {
                                foreach ($jhadir as $hadir) {
                                    ?>
                                    <input name="id_mapel" value="<?php echo $hadir->id_mapel; ?>" type="hidden"><?php echo $hadir->id_mapel; ?>
                                    <?php
                                }
                            }
                            ?> 
                        </td>
                    </tr><tr>
                        <td>Kelas : </td>
                        <td>
                            <?php
                            if (isset($jhadir)) {
                                foreach ($jhadir as $hadir) {
                                    ?>
                                    <input name="id_kelas" value="<?php echo $hadir->id_kelas; ?>"type="hidden"><?php echo $hadir->id_kelas; ?>
                                    <?php
                                }
                            }
                            ?> 
                        </td></tr>
                    <tr>
                        <td>Jumlah Kehadiran : </td>
                        <td>
                            <?php
                            if (isset($jhadir)) {
                                foreach ($jhadir as $hadir) {
                                    ?>
                                    <input name="jumlah_kehadiran" value="<?php echo $hadir->hadir; ?>"type="hidden"><?php echo $hadir->hadir; ?>
                                    <?php
                                }
                            }
                            ?> 
                        </td></tr>

                    <tr>
                        <td>NIP : </td>
                        <td>
                            <?php
                            if (isset($nip)) {
                                ?>
                                <input name="nip"value="<?php echo $nip ?>" type="hidden"><?php echo $nip ?>
                                <?php
                            }
                            ?> 
                        </td></tr>
                    <tr>
                        <td>Id Jadwal : </td>
                        <td>
                            <?php
                            if (isset($id_jadwal)) {
                                ?>
                                <input name="id_jadwal"value="<?php echo $id_jadwal ?>" type="hidden"><?php echo $id_jadwal ?>
                                <?php
                            }
                            ?> 
                        </td></tr>
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
                </table></form>
        </div>
    </div>
    <iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
    </iframe>
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
