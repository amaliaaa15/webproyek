<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }
    ?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tentang Kami</title>
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
                        <h1 class="mt-4">Pengaturan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><i class="fas fa-phone-alt"></i> Kontak</li>
                        </ol>
                        <?php
                            $sql = "SELECT * FROM contact_us";

                            $result = mysqli_query($conn,$sql);

                            $row = mysqli_fetch_array($result);
                            $name = $row['c_nama'];
                            $address = $row['c_address'];
                            $info = $row['c_contact'];
                        ?>
                        <div class="card">
                            <div class="card-header mb-2">
                                <h3>Prebens Company</h3>
                                <div class="card-body">
                                <h5>Nama Perusahaan</h5>
                                    <p><?php echo $name;?></p>
                                <h5>Alamat</h5>
                                    <p><?php echo $address;?></p>
                                <h5>Kontak</h5>
                                    <p><?php echo $info;?></p>

                                <a href="editcontact.php" class="btn btn-warning"><i class="fa fa-pen" aria-hidden="true"></i> Edit</a><br>
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