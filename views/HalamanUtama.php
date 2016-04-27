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
                    <h1><?php echo anchor('Kelola/index/', 'Sistem Informasi Siswa'); ?></h1>
                    <p>SMA Pangudi Luhur Yogyakarta</p>
                </div>
                <div class="fl_right">
                    <p><b><?php echo anchor('FilterLoginGuru/index/', 'LOGIN'); ?></b> | <?php echo anchor('FilterLoginAdmin/index/', '*'); ?></p>
                    <p>Tel: xxxxx xxxxxxxxxx | Mail: info@domain.com</p>
                </div>
                <br class="clear" />
            </div>
        </div>
        <!-- ####################################################################################################### -->
        <div class="wrapper col2">
            <div id="topnav">
                <ul>
                    <li class="active"><?php echo anchor('Kelola/index/', 'Beranda'); ?>
                        <ul>
                            <li><a href="#">Tentang</a></li>
                            <li><a href="#">Galeri</a></li>
                            <li><a href="#">Kontak</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ####################################################################################################### -->
        <div class="wrapper col3">
            <div id="featured_slide">
                <div id="featured_wrap">
                    <ul id="featured_tabs">
                        <li><a href="#fc1">aaaaa<br />
                                <span>aaa</span></a></li>
                        <li><a href="#fc2">bbbbb<br />
                                <span>bbb</span></a></li>
                        <li><a href="#fc3">ccccc<br />
                                <span>ccc</span></a></li>
                        <li class="last"><a href="#fc4">ddddd<br />
                                <span>ddd</span></a></li>
                    </ul>
                    <div id="featured_content">
                        <div class="featured_box" id="fc1"><img src="images/demo/1.gif" alt="" />
                        </div>
                        <div class="featured_box" id="fc2"><img src="images/demo/2.gif" alt="" />
                        </div>
                        <div class="featured_box" id="fc3"><img src="images/demo/3.gif" alt="" />
                        </div>
                        <div class="featured_box" id="fc4"><img src="images/demo/4.gif" alt="" />
                        </div>
                    </div>
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
