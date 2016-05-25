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
        <div class="wrapper col1">
            <div id="header">
                <div id="logo">
                    <h1><?php echo anchor('FilterLoginAdmin/indexAdmin/', 'Sistem Informasi Siswa'); ?></h1>
                    <p>SMA Pangudi Luhur Yogyakarta</p>
                </div>
                <div class="fl_right">
                    <form method="post" action="<?= base_url() ?>index.php/FilterLoginAdmin/logout">
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
                    <li class="active"><?php echo anchor('FilterLoginAdmin/indexAdmin/', 'Halaman Admin'); ?>
                        <ul>
                        </ul>
                    </li>
                    <li><?php echo anchor('DataGuru/index/', 'Kelola Data Guru'); ?>
                        <ul>
                            <li><?php echo anchor('DataGuru/tampilmasuk_guru/', 'Masukkan Data Guru'); ?></li>
                            <li><?php echo anchor('DataGuru/tampilhapus_guru/', 'Menghapus Data Guru'); ?></li>
                            <li class="last"><?php echo anchor('DataGuru/tampiledit_guru/', 'Mengedit Data Guru'); ?></li>
                        </ul>
                    </li>
                    <li><?php echo anchor('DataKelas/index/', 'Kelola Data Kelas'); ?>
                        <ul>
                            <li><?php echo anchor('DataKelas/tampilmasuk_kelas/', 'Masukkan Data Kelas'); ?></li>
                            <li><?php echo anchor('DataKelas/tampilhapus_kelas/', 'Menghapus Data Kelas'); ?></li>
                            <li class="last"><?php echo anchor('DataKelas/tampiledit_kelas/', 'Mengedit Data Kelas'); ?></li>
                        </ul>
                    </li>
                    <li><?php echo anchor('DataSiswa/index/', 'Kelola Data Siswa'); ?>
                        <ul>
                            <li><?php echo anchor('DataSiswa/tampilmasuk_siswa/', 'Masukkan Data Siswa'); ?></li>
                            <li><?php echo anchor('DataSiswa/tampilhapus_siswa/', 'Menghapus Data Siswa'); ?></li>
                            <li class="last"><?php echo anchor('DataSiswa/tampiledit_siswa/', 'Mengedit Data Siswa') ?></li>
                        </ul>
                    </li>
                    <li><?php echo anchor('DataMataPelajaran/index/', 'Kelola Data Mata Pelajaran'); ?>
                        <ul>
                            <li><?php echo anchor('DataMataPelajaran/tampilmasuk_mapel/', 'Masukkan Data Mata Pelajaran'); ?></li>
                            <li><?php echo anchor('DataMataPelajaran/tampilhapus_mapel/', 'Menghapus Data Mata Pelajaran'); ?></li>
                            <li class="last"><?php echo anchor('DataMataPelajaran/tampiledit_mapel/', 'Mengedit Data Mata Pelajaran') ?></li>
                        </ul>
                    </li>
                    <li class="active"><?php echo anchor('DataJadwalPelajaran/index/', 'Kelola Data Jadwal Pelajaran'); ?>
                        <ul>
                            <li><?php echo anchor('DataJadwalPelajaran/tampilmasuk_jadwalpelajaran/', 'Masukkan Data Jadwal Pelajaran'); ?></li>
                            <li><?php echo anchor('DataJadwalPelajaran/tampilhapus_jadwalpelajaran/', 'Menghapus Data Jadwal Pelajaran'); ?></li>
                            <li class="last"><?php echo anchor('DataJadwalPelajaran/tampiledit_jadwalpelajaran/', 'Mengedit Data Jadwal Pelajaran') ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ####################################################################################################### -->
        <div class="wrapper col3">
            <h2>TAMBAH DATA JADWAL PELAJAR</h2>
            <form method="post" action="<?= base_url(); ?>index.php/DataJadwalPelajaran/insertDataJadwalPelajaran">
                <?php echo validation_errors(); ?>
                <?php echo form_open('form'); ?>
                <table> 
                    <tr>
                        <td><label>Kode Jadwal &nbsp;&nbsp;</label></td>
                        <td><input name="kode" type="text" class="textbox" required=""></td>
                    </tr>
                    <tr><td>Nama Guru</td>
                        <td><select name="nip">

                                <?php
                                if (isset($inip_jp)) {
                                    foreach ($inip_jp->result() as $row) {
                                        ?>
                                        <option value="<?php echo $row->nip; ?>"><?php echo $row->nama_guru; ?></option>
                                        <?php
                                    }
                                }
                                ?>             
                            </select>                                        
                        </td></tr>

                    <tr><td>ID Mapel</td>
                        <td><select name="mapel">

                                <?php
                                if (isset($imapel_jp)) {
                                    foreach ($imapel_jp->result() as $row) {
                                        ?>
                                        <option value="<?php echo $row->id_mapel; ?>"><?php echo $row->nama_mapel; ?></option>
                                        <?php
                                    }
                                }
                                ?>             
                            </select>                                        
                        </td></tr>
                    <tr><td>Kelas</td>
                        <td><select name="kelas">

                                <?php
                                if (isset($ikelas_jp)) {
                                    foreach ($ikelas_jp->result() as $row) {
                                        ?>

                                        <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->nama_kelas; ?></option>
                                        <?php
                                    }
                                }
                                ?>             
                            </select>                                        
                        </td></tr>

                    <tr>
                        <td><label>Hari &nbsp;&nbsp;</label></td>
                        <td><select name="hr">
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jumat</option>
                                <option value="sabtu">Sabtu</option>
                            </select>
                    </tr>
                    <tr>
                        <td><label>Jam &nbsp;&nbsp;</label></td>
                        <td><input name="jam" type="text" class="textbox" required=""></td>
                    </tr>

                   
                </table>
                <input type="submit" value="Simpan">
            </form>
            <h1 align="center">Tabel Data Jadwal Pelajaran</h1>
            <table width="80%" border="1" cellpading="2">
                <thead>
                    <tr>
                        <td align="center"><b>Kode Jadwal</b></td>
                        <td align="center"><b>NIP</b></td>
                        <td align="center"><b>Nama Guru</b></td>                        
                        <td align="center"><b>ID Mapel</b></td>
                         <td align="center"><b>Nama Mapel</b></td>
                        <td align="center"><b>ID Kelas</b></td>
                         <td align="center"><b>Nama kelas</b></td>
                        <td align="center"><b>Hari</b></td>
                        <td align="center"><b>Jam</b></td>
                        
                    </tr>
                </thead>

                <?php
                if (isset($ijadwal)) {
                    foreach ($ijadwal as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->kode_jadwal; ?></td>
                            <td><?php echo $row->nip; ?></td>
                             <td><?php echo $row->nama_guru; ?></td>
                            <td><?php echo $row->id_mapel; ?></td>
                            <td><?php echo $row->nama_mapel; ?></td>
                            <td><?php echo $row->id_kelas; ?></td>
                            <td><?php echo $row->nama_kelas; ?></td>
                            <td><?php echo $row->hari; ?></td>
                            <td><?php echo $row->jam; ?></td>
                            
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
        <?php ?>
    </body>
</html>




