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
      <li><a href="MasukRekap.php">Memasukkan absensi dan kemajuan kelas</a>
      </li>
      <li><a href="CetakRekap.php">Mencetak absensi dan kemajuan kelas</a>
      </li>
      <li class="active"><a href="CariRekap.php">Mencari absensi</a>
      </li>
    </ul>
  </div>
</div>
        <!-- ####################################################################################################### -->
         <div class="wrapper col3">
            <div id="featured_slide">
                <div id="featured_wrap">
                    <h3>MENCARI ABSENSI</h3>
                    
                    <!--akan dibuat tampilan form untuk mencari absensi,
                        lalu sistem akan mengambil data dari database-->
                   
                        <h1 align="center">Tabel Absensi</h1>
                        <table width="80%" border="1" cellpading="2">
                            <thead>
                                <tr>
                                    <td><b>Nomor Induk</b></td>
                                    <td><b>Nama Siswa</b></td>
                                    <td><b>Keterangan</b></td>
                                    <td><b>IdKelas</b></td>

                                </tr>
                            </thead>

                            <?php
                            $this->db->select('*');
                            $this->db->from('SISWA');
                            $query = $this->db->get();
                            if ($query->num_rows() > 0) {
                                foreach ($query->result() as $siswa) {
                                    ?>
                                    <tr>
                                        <td><?php echo $siswa->nomorinduk; ?></td>
                                        <td><?php echo $siswa->namasiswa; ?></td>
                                        <td><?php echo $siswa->keterangan; ?></td>
                                        <td><?php echo $siswa->idkelas; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?> 
                                    <!--akan dibuat tampilan form untuk menambahkan data siswa,
                                    lalu data disimpan di database dan menampilkan seluruh data siswa-->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
