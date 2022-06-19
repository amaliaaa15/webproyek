<?php  
require 'fungsi.php';
$artikel = query("SELECT * FROM artikel");
?>

<!DOCTYPE html>
<html>   
    <?php
    session_start();
    ?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Artikel</title>
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
                        <h1 class="mt-4">Kelola Artikel</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Pengaturan</li>
                            <li class="breadcrumb-item active">Artikel</li>
                        </ol>
                        <p><a href="tambahmet.php" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</a><br></p>
                        <?php
                            $sql = "SELECT * FROM artikel";

                            $result = mysqli_query($conn,$sql);

                            $row = mysqli_fetch_array($result);
                                foreach( $artikel as $row):
                            
                        ?>
                        <div class="card">
                            <div class="card-header mb-2">
                                <a style="padding-left: 1030px;" href="hapusart.php?idart=<?php echo $id_transaksi; ?>"onclick= "return confirm('yakin?');"><i class="fa fa-times fa-sm" aria-hidden="true"></i> </a>
                                <h2><a href="detailart.php?id=<?php echo $row['id_artikel']; ?>"><?php echo $row['nama_art'];?></a></h2>
                                <div class="card-body">
                                <p class="breadcrumb-item active"><a href="detailtoko.php?id=<?php echo $row['penulis']; ?>"><?php echo $row['penulis'];?></a> <br> <?php echo $row['tanggal'];?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </main>
                <?php require "footer.php"; ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>