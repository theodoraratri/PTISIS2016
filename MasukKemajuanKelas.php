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
        <div class="wrapper col3">
            <div id="featured_slide">
                <div id="featured_wrap">
                    <h3>MEMASUKKAN KEMAJUAN KELAS</h3>
                    <form action="KemajuanKelas" method="post">
                        <table align="center" cellpadding = "10">
                            <tr>
                                <td>Kelas : </td>
                                <?php
                                echo"<input type=text name=nama_kelas value=$row[nama_kelas]/>";
                                ?>
                            </tr>
                            <tr>
                                <td>Matapelajaran : </td>
                                <?php
                                echo"<input type=text name=nama_matkul value=$row[nama_matapel]/>";
                                ?>
                            </tr>
                            <tr>
                                <td>Guru Matapelajaran : </td>
                                <td><input type="text" name="nama_guru" maxlength="30"  value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah Kehadiran : </td>
                                <td><input type="text" name="jumlah_kehadiran" maxlength="30"  value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td>Jam : </td>
                                <td><input type="text" name="nama_matkul" maxlength="30"  value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td>Hari : </td>
                                <td><input type="text" name="nama_matkul" maxlength="30"  value=""/>
                                </td>
                            </tr>
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