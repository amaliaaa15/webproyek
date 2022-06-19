<?php  
require 'fungsi.php';
$kategori = query("SELECT * FROM kategori WHERE k_flag=1");
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
        <title>Kelola Kategori</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="font-awesome.css">
        <script src="https://kit.fontawesome.com/5fd8a6de94.js" crossorigin="anonymous"></script>
        <style media="screen">
            *{
                margin: 0; padding: 0;
                box-sizing: border-box;
                font-family: tahoma;
                transition: all .2s linear;
                text-transform: capitalize;
            }

            .container{
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                width: 100vw;
                background: url();
                background-size: cover;
                background-position: center;
            }


            .model-container{
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                width: 100vw;
                position: fixed;
                top: 0; left: 0;
                background: rgba(0, 0, 0, 3);
                transform: scale(0);
            }

            .model-container .model{
                height: 400px;
                max-width: 350px;
                margin: 0 10px;
                padding: 20px;
                background: #fff;
                border-radius: 5px;
                text-align: center;
                position: relative;
            }

            .model-container .model .fa-trash{
                font-size: 150px;
                color: red;
                text-shadow: 0 3px 5px rgba(0, 0, 0, 3),
                            5px 5px 0 #ccc;
                padding-bottom: 50px;
                margin: 10px 0;
            }

            .model-container .model h3{
                color: #333;
                font-size: 25px;
                font-weight: bold;
            }

            .model-container .model p{
                color: #666;
                margin: 25px 0;
                font-size: 15px;
            }

            .model-container .model .a button{
                height: 28px;
                width: 85px;
                background: #333;
                color: #fff;
                outline: none;
                border: none;
                border-radius: 53px;
                font-size: 10px;
                cursor: pointer;
                box-shadow: 0 5px 15px rgba(0, 0, 0, .3);
            }

            .model-container .model .a button:hover{
                opacity: .8;
            }

            .model-container .model .fa-times{
                position: absolute;
                top: 15px; right: 15px;
                font-size: 20px;
                cursor: pointer;
                color: #333;
            }


        </style>
    </head>
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
                            <li class="breadcrumb-item">Produk</li>
                            <li class="breadcrumb-item">Kategori</li>
                            <li class="breadcrumb-item active">Kategori Tersedia</li>
                        </ol>
                        <a href="tambahkat.php" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</a><br>
                        <br><div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kategori</th>
                                                <th>Jumlah Produk</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 1; ?>
                                        <?php
                                        foreach( $kategori as $row): ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $row["nama_kat"]; ?></td>
                                                <td>
                                                <?php
                                                $idkat=$row["id_kategori"];
                                                
                                                $sql = "SELECT count(id_produk) as jumlahprod FROM produk WHERE id_kategori=$idkat"; 
                                                $result = mysqli_query($conn, $sql);
                                                $baris = mysqli_fetch_array($result);
                                                echo $baris['jumlahprod'];
                                                ?>
                                                    
                                                </td>
                                                <td>
                                                    <a href="updatekat.php?id_kat=<?= $row['id_kategori'];?>" class="btn btn-warning"><i class="fa fa-pen" aria-hidden="true"></i></a>
                                                    <a id="open" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        <div class="model-container">
                                                            <div class="model">
                                                                <i class="fas fa-trash"></i>
                                                                <h3>Hapus Kategori ?</h3>
                                                                <p>Dengan menghapus kategori ini maka seluruh produk dengan kategori ini akan "-". Anda bisa pilih Edit jika ingin mengedit Kategori.</p>
                                                                <a href="hapuskat.php?id_kat=<?= $row['id_kategori'];?>">
                                                                    <button>Ya</button>
                                                                </a>
                                                                <a>
                                                                    <button>Tidak</button>
                                                                </a>
                                                                <a>
                                                                    <button>Edit</button>
                                                                </a>
                                                                <i id="close" class="fas fa-times"></i>
                                                            </div>
                                                        </div>
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
        <!-- ::::::::::::::All JS Files here :::::::::::::: -->
        <!-- Global Vendor -->
        <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
        <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
        <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
        <script src="assets/js/vendor/jquery-ui.min.js"></script>

        <!--Plugins JS-->
        <script src="assets/js/plugins/jquery.nice-select.js"></script>
        <script src="assets/js/plugins/swiper-bundle.min.js"></script>
        <script src="assets/js/plugins/ion.rangeSlider.min.js"></script>
        <script src="assets/js/plugins/venobox.min.js"></script>
        <script src="assets/js/plugins/ajax-mail.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#open').click(function(){
                    $('.model-container').css('transform', 'scale(1)');
                });
                
                $('#close').click(function(){
                        $('.model-container').css('transform', 'scale(0)');
                    });
            });
        </script>
    </body>
</html>