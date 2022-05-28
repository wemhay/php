<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "KTP";

session_start();



$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$nik        = "";
$nama       = "";
$alamat     = "";
$keperluan   = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}


if($op == 'selesai'){
    $id         = $_GET['id'];
    $sql1       = "delete from ktp where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil selesaikan data";
    }else{
        $error  = "Gagal menyelesaikan data";
    }
}


#if ($op == 'edit') {
#    $id         = $_GET['id'];
#    $sql1       = "select * from ktp where id = '$id'";
#    $q1         = mysqli_query($koneksi, $sql1);
#    $r1         = mysqli_fetch_array($q1);
#    $nik        = $r1['nik'];
#    $nama       = $r1['nama'];
#    $alamat     = $r1['alamat'];
#    $keperluan   = $r1['keperluan'];
#
#    if ($nik == '') {
#       $error = "Data tidak ditemukan";
#    }
#}


if (isset($_POST['simpan'])) { //untuk create
    $nik        = $_POST['nik'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $keperluan   = $_POST['keperluan'];

    if ($nik && $nama && $alamat && $keperluan) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update ktp set nik = '$nik',nama='$nama',alamat = '$alamat',keperluan='$keperluan' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into ktp(nik,nama,alamat,keperluan) values ('$nik','$nama','$alamat','$keperluan')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISDUKCAPIL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>



        <!-- untuk mengeluarkan data -->
        <?php if(isset($_SESSION["username"])) { ?>
            <div class="card">
            <div class="card-header text-white bg-secondary d-flex justify-content-between">
                <h4 class="pt-1">
                    Data KTP
                </h4>
                <a href="logout.php">
                    <button class="btn btn-danger">
                        LOGOUT
                    </button>
                </a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Keperluan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from ktp order by id desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $nik        = $r2['nik'];
                            $nama       = $r2['nama'];
                            $alamat     = $r2['alamat'];
                            $keperluan  = $r2['keperluan'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $nik ?></td>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $alamat ?></td>
                                <td scope="row"><?php echo $keperluan ?></td>
                                <td scope="row">
                                <a href="admin.php?op=selesai&id=<?php echo $id?>" onclick="return confirm('Yakin sudah selesai?')"><button type="button" class="btn btn-success">Selesai</button></a>
                                                
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } ?> 
    </div>
</body>

</html>