<?php

include_once('koneksi.php');

    if (isset($_GET['act'])) {
        $nama         = $_POST['nama_usr'];
        $username     = $_POST['log_usr'];
        $email        = $_POST['email_usr'];
        $password     = $_POST['pas_usr'];
        $alamat       = $_POST['almt_usr'];
        $kodePos      = $_POST['kp_usr'];
        $kota         = $_POST['kota_usr'];
        $noTelpon     = $_POST['tlp'];

        $queryMember = "INSERT INTO member (nama_usr, log_usr, email_usr, pas_usr, almt_usr, kp_usr, kota_usr, tlp) VALUES ('$nama', '$username', '$email', '$password', '$alamat', '$kodePos', '$kota', '$noTelpon')";

        //mengalihkan ke halaman index
        //header("location : index.php");
    }
?>

<div id="page-title">
    <div id="page-title-inner">
        <div class="container">
                <h2><i class="ico-camera ico-white"></i>Form Member</h2>
        </div>
    </div>
</div>

<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <form id="formku" action="index.php?link=memberinsert" method="post">
                    <table class="table table-condensed">
                        <tr>
                            <td><label for="nama_usr">Nama Lengkap</label></td>
                            <td><input name="nama_usr" type="text" class="required" minlength="6" id="nama_usr" size="200" /></td>
                        </tr>
                        <tr>
                            <td><label for="log_usr">Username</label></td>
                            <td><input name="log_usr" type="text" class="required" minlength="6" id="log_usr" /></td>
                        </tr>
                        <tr>
                            <td><label for="email_usr">Email</label></td>
                            <td><input name="email_usr" type="text" class="email required" id="email_usr" /></td>
                        </tr>
                        <tr>
                            <td><label for="pas_usr">Password</label></td>
                            <td><input name="pas_usr" type="password" class="required" minlength="6" id="pas_usr" /></td>
                        </tr>
                        <tr>
                            <td><label for="almt_usr">Alamat</label></td>
                            <td><input name="almt_usr" type="text" class="required" id="almt_usr" /></td>
                        </tr>
                        <tr>
                            <td><label for="kp_usr">Kode Pos</label></td>
                            <td><input name="kp_usr" type="text" class="required number" minlength="5" maxlength="5" id="kp_usr" /></td>
                        </tr>
                        <tr>
                            <td><label for="kota_usr">Kota</label></td>
                            <td><input name="kota_usr" type="text" class="required" minlength="6" id="kota_usr" /></td>
                        </tr>
                        <tr>
                            <td><label for="tlp">No telepon</label></td>
                            <td><input name="tlp" type="text" class="required number" minlength="12" id="tlp" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Simpan Data" name="finish"  class="btn btn-sm btn-primary"/>&nbsp;<a href="index.php" class="btn btn-sm btn-primary">Kembali</a></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>