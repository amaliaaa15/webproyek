<?php  
require 'fungsi.php';
$transaksi = query("SELECT * FROM transaksi WHERE status_trans='Menunggu Konfirmasi' AND jenispem='Full Payment'");
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
        <title>Pesanan Pending</title>
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
                        <h1 class="mt-4">Full Payment</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Transaksi</li>
                            <li class="breadcrumb-item">Pesanan Pending</li>
                            <li class="breadcrumb-item active">Full Payment</li>
                        </ol>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Transaksi</th>
                                                <th>Username</th>
                                                <th>Tanggal</th>
                                                <th>Status Transaksi</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 1; ?>
                                        <?php
                                        foreach( $transaksi as $row): ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><a href="buktitf.php?id=<?= $row["id_transaksi"]; ?>">#<?= $row["id_transaksi"]; ?></a></td>
                                                <td><a href="detailuser.php?username=<?= $row["u_username"]; ?>">
                                                <?= $row["u_username"]; ?></a></td>
                                                <td><?= $row["tgl_transaksi"]; ?></td>
                                                <td><i><?= $row["status_trans"]; ?></i></td>
                                                <td>Rp. <?php echo number_format($row["tarif"],2,",",".");?></td>
                                                <td>
                                                    <a href="batalkan.php?id=<?= $row["id_transaksi"]; ?>"onclick= "return confirm('yakin?');"   class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                    <a href="confirm.php?id=<?= $row["id_transaksi"]; ?>"onclick= "return confirm('yakin?');"   class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                </td>
                                                
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