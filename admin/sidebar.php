<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="pengguna.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Pengguna
                </a>
                <a class="nav-link" href="toko.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-store-alt"></i></div>
                    Toko
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTrans" aria-expanded="false" aria-controls="collapseTrans">
                        <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                        Transaksi
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseTrans" aria-labelledby="heading" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseTrans" aria-expanded="false" aria-controls="pagesCollapseTrans"><i class="fas fa-th"></i>&nbsp;Pesanan Pending
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseTrans" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordionKat">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="pelunasan.php">Pelunasan</a>
                                <a class="nav-link" href="fullpayment.php">Full Payment</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="diproses.php"><i class="fas fa-shipping-fast"></i>&nbsp;Pesanan Dikirim</a>
                        <a class="nav-link" href="selesai.php"><i class="fas fa-check"></i>&nbsp;Pesanan Selesai</a>
                        <a class="nav-link" href="dibatalkan.php"><i class="fas fa-times"></i>&nbsp;Pesanan Dibatalkan</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                        Produk
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseKat" aria-expanded="false" aria-controls="pagesCollapseKat"><i class="fas fa-th"></i>&nbsp;Kategori
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseKat" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordionKat">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="kelolakat.php">Kategori Tersedia</a>
                                <a class="nav-link" href="katterhapus.php">Kategori Terhapus</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="produk.php"><i class="fas fa-shopping-cart"></i>&nbsp;Produk</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSetting" aria-expanded="false" aria-controls="collapseSetting">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    Pengaturan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSetting" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="artikel.php"><i class="fas fa-book"></i>&nbsp;Artikel</a>
                        <a class="nav-link" href="metode.php"><i class="fas fa-university"></i>&nbsp;Bank</a>
                        <a class="nav-link" href="about.php">Tentang Kami</a>
                        <a class="nav-link" href="kontak.php">Kontak</a>
                    </nav>
                </div>
            </div>
        </div>
        <!-- menampilkan nama admin yang login-->
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
                <?php 
                    require "koneksidb.php";

                    $sql = "SELECT * FROM admin WHERE a_username='".$_SESSION['username']."'";

                    $result = mysqli_query($conn,$sql);

                    $row = mysqli_fetch_array($result);
                    $nama = $row['a_nama'];

                    echo $nama;

                ?>
        </div>
    </nav>
</div>