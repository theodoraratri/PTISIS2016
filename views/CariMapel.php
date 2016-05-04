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
        <form method="post" action="<?= base_url() ?>index.php/DataAbsensi/tampilMapel">
            <table>

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
                        </select></td>
                    <td>Hari : </td>
                    <td><select name="hari">
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jum'at">Jum'at</option>
                            <option value="sabtu">Sabtu</option></select></td>
                    <td>
                        <input type="submit" value="Submit" /></td></tr>
            </table></form>
    </body>
</html>
