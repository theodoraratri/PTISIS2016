<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="<?= base_url() ?>index.php/DataAbsensi/tampilCoba">
        <table>
             
            <td>Matapelajaran : </td>
                
                <?php
                if (isset($ddata)) {
                    foreach ($ddata as $row) {
                        ?>

                    <tr>
                        
                        <td><input name="id_kelas" value="<?php echo $row->id_kelas; ?>" disabled>
                            <?php echo $row->nama_kelas; ?></td>
                        <td><?php echo $row->nama_mapel; ?></td>
                        <td><input type="submit" value="pilih" /></td>                           
                    </tr>
                    <?php
                }
            }
            ?> 
             
    </table></form>
</body>
</html>
