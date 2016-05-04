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
        <table>
            <tr>
                <td>Id Kemajuan Kelas : </td>
                <td><input name="id_kemajuan" type="text" class="textbox"></td>
            </tr>

            <tr>
                <td>Tanggal : </td>
                <td><input type='datepicker' name='tgl' type='text'value=''>
                </td>
            </tr>
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
            </tr><tr>
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
                <td>Jumlah Kehadiran : </td>
                <td>
                    <?php
                    if (isset($jhadir)) {
                        foreach ($jhadir as $hadir) {
                            ?>
                            <input name="jumlah_kehadiran" value="<?php echo count($hadir); ?>">
                            <?php
                        }
                    }
                    ?> 


                </td></tr>

            <tr>
                <td>NIP : </td>
                <td><select name="nip">
                        <?php
                        if (isset($dnip)) {
                            foreach ($dnip->result() as $row) {
                                ?>
                                <option value="<?php echo $row->nip; ?>"><?php echo $row->nama_guru; ?></option>
                                <?php
                            }
                        }
                        ?>  
                    </select></tr>
            <tr>
                <td>Id Jadwal : </td>
                <td><select name="id_jadwal">
                        <?php
                        if (isset($djadwal)) {
                            foreach ($djadwal->result() as $row) {
                                ?>
                                <option value="<?php echo $row->id_jadwal; ?>"><?php echo $row->id_jadwal; ?></option>
                                <?php
                            }
                        }
                        ?>  
                    </select></tr>
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
    </body>
</html>
