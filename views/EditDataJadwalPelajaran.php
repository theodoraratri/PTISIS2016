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
        <link rel="stylesheet" href="<?php echo base_url(); ?>layout/styles/layout.css" type="text/css" />
        <script type="text/javascript" src="<?php site_url('layout/scripts/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?php site_url('layout/scripts/jquery.slidepanel.setup.js') ?>"></script>
        <script type="text/javascript" src="<?php site_url('layout/scripts/jquery.ui.min.js') ?>"></script>
        <script type="text/javascript" src="<?php site_url('layout/scripts/jquery.tabs.setup.js') ?>"></script>
    </head>
    <body>
        <!-- ####################################################################################################### -->
        <!-- menampilkan kode jadwal,Nama kelas,Hari,Jam,NIP,mata pelajaran dari database dan untuk menekan 
        tombol edit -->
        
        <div class="wrapper col1">
            <div id="header">
                <div id="logo">
                    <h1><a href="HalamanAdmin.php">Sistem Informasi Siswa</a></h1>
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
        <li><a href="HalamanAdmin.php">Halaman Admin</a>
        <ul>
        </ul>
      </li>
      <li><a href="KelolaDataSiswa.php">Kelola Data Siswa</a>
        <ul>
            <li><a href="MasukDataSiswa.php">Masukkan Data Siswa</a></li>
            <li><a href="HapusDataSiswa.php">Menghapus Data Siswa</a></li>
            <li class="last"><a href="EditDataSiswa.php">Mengedit Data Siswa</a></li>
        </ul>
      </li>
      <li><a href="KelolaDataGuru.php">Kelola Data Guru</a>
        <ul>
            <li><a href="MasukDataGuru.php">Masukkan Data Guru</a></li>
            <li><a href="HapusDataGuru.php">Menghapus Data Guru</a></li>
            <li class="last"><a href="EditDataGuru.php">Mengedit Data Guru</a></li>
       </ul>
      </li>
       <li><a href="KelolaDataKelas.php">Kelola Data Kelas</a>
                        <ul>
                            <li><a href="MasukDataKelas.php">Masukkan Data Kelas</a></li>
                            <li><a href="HapusDataKelas.php">Menghapus Data Kelas</a></li>
                            <li class="last"><a href="EditDataKelas.php">Mengedit Data Kelas</a></li>
                        </ul>
                    </li>
      <li class="active"><a href="KelolaJadwalPelajaran.php">Kelola Data Jadwal Pelajaran</a><ul>
              <li><a href="MasukDataJadwalPelajaran.php">Masukkan Data Jadwal Pelajaran</a></li>
              <li><a href="HapusDataJadwalPelajaran.php">Menghapus Data Jadwal Pelajaran</a></li>
              <li class="last"><a href="EditDataJadwalPelajaran.php">Mengedit Data Jadwal Pelajaran</a></li>
       </ul>
      </li>
    </ul>
  </div>
</div>
        <!-- ####################################################################################################### -->
        <div class="wrapper col3">
            <div id="featured_slide">
                <div id="featured_wrap">
                    <h3>EDIT DATA JADWAL PELAJARAN</h3>
                     <h1 align="center">Tabel Data Jadwal Pelajaran</h1>
                        <table width="80%" border="1" cellpading="2">
                            <thead>
                                <tr>
                                    <td><b>Kode Jadwal</b></td>
                                    <td><b>NIP</b></td>
                                    <td><b>ID Mapel</b></td>
                                    <td><b>ID Kelas</b></td>
                                    <td><b>Hari</b></td>
                                    <td><b>Jam</b></td>
                                    <td><b>Tahun Ajaran</b></td>
                                </tr>
                            </thead>
                          
                            <?php
                           
                            if (isset($jad)) {
                                foreach ($jad->result() as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row->kode_jadwal; ?></td>
                                        <td><?php echo $row->id_mapel; ?></td>
                                        <td><?php echo $row->nip; ?></td>
                                        <td><?php echo $row->id_kelas; ?></td>
                                        <td><?php echo $row->hari; ?></td>
                                        <td><?php echo $row->jam; ?></td>
                                        <td><?php echo $row->tahun_ajaran; ?></td>
                                        <td><?php echo anchor('DataJadwalPelajaran/tampilFormEdit/' . $row->kode_jadwal, 'Edit'); ?></td>
                                   
                                    </tr>
                                    <?php
                                }
                            }
                            ?> 
                        </table>

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
        <?php
        ?>
    </body>
</html>