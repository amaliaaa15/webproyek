<?php  
require 'fungsi.php';

$id = $_GET["id_kat"];

$kategori = query("SELECT * FROM kategori WHERE id_kategori= $id")[0];

if( isset($_POST["edit"]) ){

    if( edit($_POST) > 0) {
        header ("location: kelolakat.php");
    } 
    else {
        echo "Error"; }
}
?>

<!DOCTYPE html>
<html>   
    <?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: loginform.php");
    }
    ?>


    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kelola Kategori</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php require "navbar.php"; ?>
        <div id="layoutSidenav">
            <?php require "sidebar.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kelola Kategori</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">UTAMA</li>
                            <li class="breadcrumb-item active">Kelola Kategori</li>
                            <li class="breadcrumb-item active">Edit Kategori</li>
                        </ol>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Edit Kategori</h4>
                            </div>
                            <form action="" method="post">
                                <input type="hidden" name="id_kat" value="<?= $kategori["id_kategori"]; ?>">
                                <div class="card-body">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Nama Kategori</label>
                                            <input type="text" name="kategori" class="form-control" required value="<?= $kategori["nama_kat"]?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="col">
                                        <button type="submit" name="edit" class="btn btn-primary btn-block"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <?php require "footer.php"; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>