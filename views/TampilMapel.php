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
                <li  class="active"><?php echo anchor('DataAbsensi/tampilInsert/', 'Memasukkan Absensi'); ?>
                    <ul>
                    </ul>
                </li>
                <li><?php echo anchor('DataKemajuanKelas/tampilInsert/', 'Memasukkan Kemajuan Kelas'); ?>
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
        <h3>MEMASUKKAN ABSENSI</h3>

        <table width="60%" border="1" cellpading="1">

            <thead>
                <tr>
                    <td><b>Kelas</b></td>
                    <td><b>Matapelajaran</b></td>
                    <td><b>Pilih Matapelajaran</b></td>
                </tr>
            </thead>

            <tr>  <?php
                if (isset($ddata)) {
                    foreach ($ddata as $row) {
                        ?>
                    <tr>                        
                        <td><input name="id_kelas" value="<?php echo $row->id_kelas; ?>"type="hidden">
                            <?php echo $row->nama_kelas; ?></td>                        
                        <td><input name="id_mapel" value="<?php echo $row->id_mapel; ?>"type="hidden">
                            <?php echo $row->nama_mapel; ?></td>
                        <td>
                            <a href="<?= base_url() ?>index.php/DataAbsensi/tampilCoba/<?php echo $row->id_kelas; ?>/<?php echo $row->id_mapel; ?>">Pilih</a>  </td>
                    </tr>
                    <?php
                }
            }
            ?> 
        </table>
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
