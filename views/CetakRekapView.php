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
                <li><?php echo anchor('DataKemajuanKelas/tampilInsert/', 'Memasukkan Kemajuan Kelas'); ?>
                    <ul>
                    </ul>
                </li>
                <li    class="active"><?php echo anchor('RekapController/tampilIdKelas/', 'Mencetak Absensi'); ?>
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
        <h2>Rekap Absensi</h2>
        <form method="post" action="<?= base_url(); ?>index.php/RekapController/CetakAbsensi">
            <table> 


                <tr><td>Nama Kelas</td>
                    <td><select name="id">

                            <?php
                            if (isset($idkelas)) {
                                foreach ($idkelas->result() as $row) {
                                    ?>
                                    <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->nama_kelas; ?></option>
                                    <?php
                                }
                            }
                            ?>             
                        </select>  

                    </td></tr>
                <tr><td>Tahun Ajaran</td>
                    <td><select name="tahun">
                            <option value="2010/2011">2010/2011</option>
                            <option value="2012/2013">2012/2013</option>
                            <option value="2013/2014">2013/2014</option>
                            <option value="2014/2015">2014/2015</option>
                            <option value="2015/2016">2015/2016</option>
                            <option value="2016/2017">2016/2017</option>

                        </select>
            </table>
            <input type="submit" value="Lihat">
        </form>
        <form method="post" action="<?= base_url(); ?>index.php/RekapController/cetak">
            <h1 align="center"> SMA PANGUDI LUHUR YOGYAKARTA</h1>
            <h2 align="center"> TAHUN AJARAN 
                <?php
                if (isset($thnn)) {
                    ?>
                    <?php echo $thnn; ?>
                    <?php
                }
                ?>  

            </h2>

            <h3 align="center"> NAMA KELAS   :
                <?php
                if (isset($namakelas_cetakabsen)) {
                    ?>
                    <?php echo $namakelas_cetakabsen; ?>
                    <?php
                }
                ?>   

            </h3>
            <h4 align="center">WALI KELAS   :
                <?php
                if (isset($walikelasabsen)) {
                    ?>
                    <?php echo $walikelasabsen; ?>
                    <?php
                }
                ?>   

            </h4>
            <h5>
                <?php
                if (isset($idkelas_cetakabsen)) {
                    ?>
                    <input type="hidden" value="<?php echo $idkelas_cetakabsen; ?>" name="kelas" type="text" class="textbox" readonly="">
                    <?php
                }
                ?>   

            </h5><h6>
                <?php
                if (isset($thnn)) {
                    ?>
                    <input type="hidden" value="<?php echo $thnn; ?>" name="thn" type="text" class="textbox" readonly="">
                    <?php
                }
                ?>           
            </h6>

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
                if (isset($rekapa)) {
                    foreach ($rekapa as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->no_induk; ?></td>
                            <td><?php echo $row->nama_siswa; ?></td>


                            <td><?php echo $row->H ?></td>
                            <td><?php echo $row->S ?></td>
                            <td><?php echo $row->I ?></td>
                            <td><?php echo $row->A ?></td>

                        </tr>
                        <?php
                    }
                }
                ?> 
            </table>
            <input type="submit" value="Cetak ke Excel">
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
    <?php
    ?>
</body>
</html>
