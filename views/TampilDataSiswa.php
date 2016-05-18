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
        <h1 align="center">Tabel Data Siswa</h1>
        <form method="post" action="<?= base_url() ?>index.php/DataAbsensi/InsertAbsen">                               
            <table>
                <tr> 
                    <td>Kelas : </td>
                    <td>
                        <?php
                        if (isset($id)) {
                            ?>
                        <td><input name="id_kelas"value="<?php echo $id ?>" type="hidden"><?php echo $nama ?></td>
                        <?php
                    }
                    ?> 
                    </td>
                <tr>
                    <td>Mata Pelajaran : </td>
                    <td>
                        <?php
                        if (isset($idMapel)) {
                            ?>
                        <td> <input name="id_mapel"value="<?php echo $idMapel ?>" type="hidden"><?php echo $namaMapel ?></td>
                        <?php
                    }
                    ?> 
                    </td>
                </tr>
                <tr>
                    <td>Tanggal : </td>
                    <td><td>Tahun   <select name=year value=''>
                            <option value='2016'>2016</option>
                            <option value='2017'>2017</option>
                            <option value='2018'>2018</option>
                            <option value='2019'>2019</option>
                            <option value='2020'>2020</option>
                        </select> </td>
                    <td>Bulan   <select name=mounth >
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
                    <td>Hari   <select name=date >
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
                <td>Angkatan : </td>
                <td><td><select name="angkatan">
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                    </select></td>

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
                            <td><input readonly name="no_induk[]" value="<?php echo $data->no_induk; ?>" ></td>
                            <td><?php echo $data->nama_siswa; ?></td>
                            <?php ?>
                            <td> <input type="checkbox" name="status[]" value='hadir'></td>
                            <td> <input type="checkbox" name="status[]" value='alfa'></td>
                            <td> <input type="checkbox" name="status[]" value='izin'></td>
                            <td> <input type="checkbox" name="status[]" value='sakit'></td>
                        <tr></tr>
                        <?php
                    }
                }
                ?>      
                </tr>

            </table>

<!--            <table align='center'>
                <tr>
                    <td></td>
                    <td align=center>
                        <input type='button' name='pilih' onclick='for (i = 0; i < ; i++) {
                                    document.getElementById(i).checked = true;
                                }' value='Check All'>
                    </td>
                    <td align=center>
                        <input type='button' name='pilih' onclick='for (i = 0; i < $no; i++) {
                                    document.getElementById(i).checked = false;
                                }' value='Uncheck All'>
                    </td>
                </tr>
            </table>-->

            <input type="submit" value="Simpan" /></form>
    <tr><a href="MasukKemajuanKelas.php">KEMAJUAN KELAS</a></tr>

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
