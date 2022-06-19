<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }

    require "fungsi.php";

    $sql = "SELECT * FROM seller WHERE s_username='".$_GET['username']."'";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result);
    $user = $row['s_username'];
    $email = $row['s_email'];
    $name = $row['s_nama'];
    $nohp = $row['s_nohp'];
    $alamat = $row['s_alamat'];
    $image =$row['s_image'];
?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Detail Transaksi</title>
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
                        <h1 class="mt-4">Profil Pengguna</h1>
                    </div>
                    <div class="container mt-3">
                        <div class="row">
                            <div class="col-5">
                                <div id="accordion">
                                    <div class="card">
                                      <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <p><img src="assets/img/<?=$image; ?>" width="300"></p><br><br>
                                            <p><span class="fw-bold"> Username: </span>
                                                <?php echo $user ?></p>
                                            <p><span class="fw-bold"> Email: </span>
                                                <?php echo $email ?></p>
                                            <p><span class="fw-bold"> Nama Lengkap: </span>
                                                <?php echo $name ?></p>
                                            <p><span class="fw-bold"> No. Handphone: </span>
                                                <?php echo $nohp ?></p>
                                            <p><span class="fw-bold"> Alamat: </span>
                                                <?php echo $alamat ?></p>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php require "footer.php"; ?>
            </div>
    </body>
</html>