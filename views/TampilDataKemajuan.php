<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<meta charset="UTF-8">
<title>Sistem Informasi Siswa</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="<?php echo base_url(); ?>layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="<?php site_url('layout/scripts/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php site_url('layout/scripts/jquery.slidepanel.setup.js') ?>"></script>
<script type="text/javascript" src="<?php site_url('layout/scripts/jquery.ui.min.js') ?>"></script>
<script type="text/javascript" src="<?php site_url('layout/scripts/jquery.tabs.setup.js') ?>"></script>
</head>
<body>
    <!-- ####################################################################################################### -->
    <div class="wrapper col1">
        <div id="header">
            <div id="logo">
                <h1><?php echo anchor('FilterLoginGuru/indexGuru/', 'Sistem Informasi Siswa'); ?></h1>
                <p>SMA Pangudi Luhur Yogyakarta</p>
            </div>
            <div class="fl_right">
                <form method="post" action="<?= base_url() ?>index.php/FilterLoginGuru/logout">
                    <p>Tel: xxxxx xxxxxxxxxx | Mail: info@domain.com</p>
                    <p><b>I'm <?= $this->session->userdata('NIP') ?></b>|<input type="submit" value="Logout"></form> </p>
            </div>
            <br class="clear" />
        </div>
    </div>
    <!-- ####################################################################################################### -->
    <div class="wrapper col2">
        <div id="topnav">
            <ul>
                <li><?php echo anchor('FilterLoginGuru/indexGuru/', 'Halaman Guru'); ?>
                    <ul>
                    </ul>
                </li>
                <li><?php echo anchor('DataAbsensi/tampilInsert/', 'Memasukkan Absensi'); ?>
                    <ul>
                    </ul>
                </li>
                <li   class="active"><?php echo anchor('DataKemajuanKelas/tampilInsert/', 'Memasukkan Kemajuan Kelas'); ?>
                    <ul>
                    </ul>
                </li>
                <li><?php echo anchor('RekapController/tampilIdKelas/', 'Mencetak Absensi'); ?>
                    <ul>
                    </ul>
                </li>
                <li><?php echo anchor('RekapController/tampilIdKelasKemajuan', 'Mencetak Kemajuan Kelas'); ?>
                    <ul>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- ####################################################################################################### -->
    <div class="wrapper col3">
        <h3>MEMASUKKAN KEMAJUAN KELAS</h3>
        <form method="post" action="<?= base_url() ?>index.php/DataKemajuanKelas/InsertData">  
            <table>

                <tr>
                    <td>Tanggal : </td>
                    <td>
                        <?php
                        if (isset($tg)) {
                            ?>
                            <input name="tgl"value="<?php echo $tg ?>" type="hidden"><?php echo $tg ?>
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
                        if (isset($kode_jadwal)) {
                            ?>
                            <input name="kode_jadwal"value="<?php echo $kode_jadwal ?>" type="hidden"><?php echo $kode_jadwal ?>
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
            </table>
        </form>
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
