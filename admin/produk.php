<?php  
include 'fungsi.php';
$produk = query("SELECT * FROM produk");

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
        <title>Data Jual</title>
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
                        <h1 class="mt-4">PRODUK</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Data Produk</li>
                        </ol>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Produk</th>
                                                <th>Username</th> 
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 1; ?>
                                        <?php
                                        foreach( $produk as $row): ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><a href="detailproduk.php?id_produk=<?= $row["id_produk"];?>">#<?= $row["id_produk"]; ?></td>
                                                <td><a href="detailuser.php?username=<?php echo $row["s_username"];?>">
                                                <?php echo $row["s_username"];?></a></td>
                                                <td><?= $row["nama_produk"]; ?></td>
                                                <td>
                                                    <?php 

                                                    $idkat = $row['id_kategori'];

                                                    $kategori = "SELECT  * FROM kategori WHERE id_kategori='$idkat'";
                                                    $result = mysqli_query($conn,$kategori);
                                                    $baris = mysqli_fetch_array($result);
                                                    $namakat = $baris['nama_kat']; 

                                                    echo $namakat; ?>        
                                                </td>
                                                <td><?php echo "Rp.",number_format($row["harga"],2,",",".");?></td>
                                                <td><?= $row["stok"]; ?></td>       
                                            </tr>
                                            <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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