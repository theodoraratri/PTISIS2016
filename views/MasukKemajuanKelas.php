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
        <form method="post" action="<?= base_url() ?>index.php/DataKemajuanKelas/tampilInsertJumlah">
            <table>                            
                <tr>
                    <td>Tanggal : </td>
                    <td><select name=year value=''>
                            <option value='2016'>2016</option>
                            <option value='2017'>2017</option>
                            <option value='2018'>2018</option>
                            <option value='2019'>2019</option>
                            <option value='2020'>2020</option>
                        </select> </td>
                    <td>Mount<select name=mounth >
                            <option value='01'>January</option>
                            <option value='02'>February</option>
                            <option value='03'>March</option>
                            <option value='04'>April</option>
                            <option value='05'>May</option>
                            <option value='06'>June</option>
                            <option value='07'>July</option>
                            <option value='08'>August</option>
                            <option value='09'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                        </select>
                    <td>Date<select name=date >
                            <option value='01'>01</option>
                            <option value='02'>02</option>
                            <option value='03'>03</option>
                            <option value='04'>04</option>
                            <option value='05'>05</option>
                            <option value='06'>06</option>
                            <option value='07'>07</option>
                            <option value='08'>08</option>
                            <option value='09'>09</option>
                            <option value='10'>10</option>
                            <option value='11'>11</option>
                            <option value='12'>12</option>
                            <option value='13'>13</option>
                            <option value='14'>14</option>
                            <option value='15'>15</option>
                            <option value='16'>16</option>
                            <option value='17'>17</option>
                            <option value='18'>18</option>
                            <option value='19'>19</option>
                            <option value='20'>20</option>
                            <option value='21'>21</option>
                            <option value='22'>22</option>
                            <option value='23'>23</option>
                            <option value='24'>24</option>
                            <option value='25'>25</option>
                            <option value='26'>26</option>
                            <option value='27'>27</option>
                            <option value='28'>28</option>
                            <option value='29'>29</option>
                            <option value='30'>30</option>
                            <option value='31'>31</option>
                        </select>

                </tr>
                <tr>
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
                        </select></tr>
                <tr>
                    <td colspan="2" align="center"><br>
                        <input type="submit" value="submit">                                   
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