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
        <h1 align="center">Tabel Data Siswa</h1>
        <form method="post" action="<?= base_url() ?>index.php/DataAbsensi/InsertAbsen">                               
            <table>
<!--                <tr> 
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
                        </select></td>
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
                </tr>-->
                <tr>
                    <td>Tanggal : </td>
                    <td><select name='tgl' 
                                <option value=""></select></td>
                </tr>
            </table>
            <table width="80%" border="1" cellpading="2">
                <thead>
                    <tr>
                        <td><b>Nomor Induk</b></td>
                        <td><b>Nama Siswa</b></td>
                        <td>Hadir (H)</td>
                        <td>Alfa (A)</td>
                        <td>Ijin (I)</td> 
                        <td>Sakit (S)</td>
                    </tr>
                </thead>
                <tr>
                    <?php
                    if (isset($ukelas)) {
                        foreach ($ukelas as $data) {
                            ?>
                        <tr>
                            <td><input name="no_induk[]" value="<?php echo $data->no_induk; ?>"></td>
                            <td><?php echo $data->nama_siswa; ?></td>
                            <?php
                            ?>
                            <td> <input type="checkbox" name="status[]" value='hadir'></td>
                            <td> <input type="checkbox" name="status[]" value='alfa'></td>
                            <td> <input type="checkbox" name="status[]" value='izin'></td>
                            <td> <input type="checkbox" name="status[]" value='sakit'></td>
                            <?php
                        }
                    }
                    ?>      
                </tr>
            </table>
            <input type="submit" value="Submit" /></form>
    </table>
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
