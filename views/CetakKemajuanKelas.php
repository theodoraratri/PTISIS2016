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
                    <li><?php echo anchor('-/-/', 'Memasukkan Absensi dan Kemajuan Kelas'); ?>
                        <ul>
                        </ul>
                    </li>
                    <li><?php echo anchor('RekapController/tampilIdKelas/', 'Mencetak Absensi'); ?>
                        <ul>
                        </ul>
                    </li>
                    <li class="active"><?php echo anchor('RekapController/tampilIdKelasKemajuan', 'Mencetak Kemajuan Kelas'); ?>
                        <ul>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- ####################################################################################################### -->
      
 
        <h1>REKAP KEMAJUAN KELAS</h1>
        <form method="post" action="<?= base_url(); ?>index.php/RekapController/cetakKemajuanKelas">
            <table>
                <tr><td>Nama Kelas</td>
                    <td><select name="idKelas">

                            <?php
                            if (isset($tidkelas_cetakkemajuankelas)) {
                                foreach ($tidkelas_cetakkemajuankelas->result() as $row) {
                                    ?>
                                    <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->nama_kelas; ?></option>
                                    <?php
                                }
                            }
                            ?>             
                        </select>                                        
                    </td></tr>
                <tr><td>Bulan </td>
                    <td><select name="bln">
                            <option value="01"> Januari </option>
                            <option value="02"> Februari </option>
                            <option value="03"> Maret </option>
                            <option value="04"> April </option>
                            <option value="05"> Mei </option>
                            <option value="06"> Juni</option>
                            <option value="07"> Juli </option>
                            <option value="08"> Agustus </option>
                            <option value="09"> September </option>
                            <option value="10"> Oktober </option>
                            <option value="11"> November </option>
                            <option value="12"> Desember </option>
                        </select>
                    </td></tr>
                <tr><td>Tahun </td>
                    <td><select name="thn">
                            <option value="2016"> 2016 </option>
                            <option value="2017"> 2017</option>
                            <option value="2018"> 2018 </option>
                            <option value="2019"> 2019 </option>
                            <option value="2020">2020 </option>
                            <option value="2021"> 2021</option>
                            <option value="2022"> 2022 </option>
                            <option value="2023"> 2023 </option>
                            <option value="2024"> 2024 </option>
                            <option value="2025"> 2025 </option>
                            <option value="2026"> 2026 </option>
                            <option value="2027"> 2027 </option>
                            <option value="2028"> 2028 </option>
                            <option value="2029"> 2029 </option>
                            <option value="2030"> 2030 </option>
                        </select>
            </table>
            <input type="submit" value="Lihat Detail">
        </form>
        <form method="post" action="<?= base_url(); ?>index.php/RekapController/cetakExcelKemajuanKelas">
            <h1 align="center"> SMA PANGUDI LUHUR</h1>
            <h2 align="center"> NAMA KELAS   :
                <?php
                if (isset($nkelas_cetakkemajuankelas)) {
                    ?>
                    <?php echo $nkelas_cetakkemajuankelas; ?>
                    <?php
                }
                ?>   

            </h2>
            <h3 align="center"> WALI KELAS   :
                
                <?php
                if (isset($walikelaskemajuan)) {
                    ?>
                    <?php echo $walikelaskemajuan; ?>
                    <?php
                }
                ?>     
                
            </h3>
            <h4>
            <?php
            if (isset($idKelasCetakK)) {
                ?>
                <input type="hidden" value="<?php echo $idKelasCetakK; ?>" name="idkelascetak" type="text" class="textbox" readonly="">
                        <?php
                    }
                    ?>   

            </h4>
            <h5>
            <?php
            if (isset($blntahun)) {
                ?>
                    <input type="hidden" value="<?php echo $blntahun; ?>" name="bulanThn" type="text" class="textbox" readonly="">
                    <?php
                }
                ?>   

            </h5>

            <table width="80%" border="1" cellpading="2">
                <thead>
                    <tr>
                        <td><b>Tanggal</b></td>
                        <td><b>Mata Pelajaran</b></td>
                        <td><b>Jumlah Hadir</b></td>
                        <td><b>Materi YD</b></td>
                        <td><b>Kegiatan BM</b></td>


                    </tr>
                </thead>

                <?php
                if (isset($tcetakkemajuankelas)) {
                    foreach ($tcetakkemajuankelas as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->tgl; ?></td>
                            <td><?php echo $row->nama_mapel; ?></td>

                            <td><?php echo $row->jumlah_kehadiran; ?></td>
                            <td><?php echo $row->materiYD ?></td>
                            <td><?php echo $row->kegiatanBM ?></td>


                        </tr>
                        <?php
                    }
                }
                ?> 
            </table>
            <input type="submit" value="Cetak ke Excel">
        </form>
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
