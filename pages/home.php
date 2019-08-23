<section class="wrapper">
<div class="slider-wrapper">
    <div class="slider">
        <div class="fs_loader"></div>
        <div class="slide">

            <img src="images/fraction-slider/base.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />

            <img src="images/berita/slide1.jpg" class="img-thumbnail" width="500" height="auto" data-position="60,1200" data-in="bottomLeft" data-out="fade" style="width:auto; height:auto" data-delay="500">

            <p class="slide-heading" data-position="130,380" data-in="top"  data-out="left" data-ease-in="easeOutBounce" data-delay="700">Selamat Datang</p>

            <p class="sub-line" data-position="230,380" data-in="right" data-out="left" data-delay="1500">Sistem Informasi Pengolahan Data Bencana Alam  </p>

            <a href=""	class="btn btn-default btn-lg" data-position="330,380" data-in="bottom" data-out="bottom" data-delay="2000">Provinsi Kalimantan Timur</a>
        </div>

        <div class="slide">
            <img src="images/fraction-slider/base_2.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />
             <p class="slide-heading" data-position="130,380" data-in="left"  data-out="left" data-ease-in="easeOutBounce" data-delay="700">Selamat Datang</p>

            <p class="sub-line" data-position="225,380" data-in="right" data-out="left"  data-delay="1500">Sistem Informasi Pengolahan Data Bencana Alam </p>

            <img src="images/berita/slide2.jpg" class="img-thumbnail" width="400" height="auto" data-position="50,1200" data-in="left" data-out="fade" style="width:auto; height:auto" data-delay="500">

            
        </div>

        <div class="slide">

            <img src="images/fraction-slider/base_3.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />

            <img src="images/berita/slide3.jpg" class="img-thumbnail" width="500" height="auto" data-position="60,1200" data-in="bottomLeft" data-out="fade" style="width:auto; height:auto" data-delay="500">

            <p class="slide-heading" data-position="130,380" data-in="top"  data-out="left" data-ease-in="easeOutBounce" data-delay="700">Selamat Datang</p>

            <p class="sub-line" data-position="230,380" data-in="right" data-out="left" data-delay="1500">Sistem Informasi Pengolahan Data Bencana Alam</p>

            <a href=""  class="btn btn-default btn-lg" data-position="330,380" data-in="bottom" data-out="bottom" data-delay="2000">Provinsi Kalimantan Timur</a>
        </div>
       
    </div>
</div>
<!--End Slider-->

        <section class="content blog">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="blog_medium">
                             <?php
                             error_reporting(0);
                             include './koneksi/koneksi.php';

                                 // Cek apakah terdapat data pada page URL
                $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                $limit = 3; // Jumlah data per halamanya

                // Buat query untuk menampilkan daa ke berapa yang akan ditampilkan pada tabel yang ada di database
                $limit_start = ($page - 1) * $limit;

                    $sql=mysqli_query($koneksi,"SELECT * FROM berita ORDER BY tgl_input DESC LIMIT ".$limit_start.",".$limit );

                     $no = $limit_start + 1;

                      while($q=mysqli_fetch_array($sql)){

                     ?>
                            <article class="post">
                                <div class="post_date">
                                    <span class="day"><?php echo date('d',strtotime($q['tgl_input'])); ?></span>
                                    <span class="month"><?php echo date('M',strtotime($q['tgl_input'])); ?></span>
                                </div>
                                <figure class="post_img">
                                    <a href="#">
                                        <img src="./images/berita/<?php echo $q['foto']; ?>" alt="blog post" style="min-width: 100%;max-height: 250px;">
                                    </a>
                                </figure>
                                <div class="post_content">
                                    <div class="post_meta">
                                        <h2>
                                            <a href="#"><?php echo $q['judul']; ?></a>
                                        </h2>
                                        <div class="metaInfo">
                                         
                                            <span><i class="fa fa-user"></i> By Admin </span>
                                            
                                        </div>
                                    </div>
                                    <div class="isi"><?php echo $q['isi']; ?></div>
                                    <a class="btn btn-small btn-default" href="index.php?p=single-post&id=<?php echo $q['kd_berita']; ?>">Lanjut Membaca</a>
                                    
                                </div>
                            </article>
                            
                            <?php $no++; } ?>
                            
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <ul class="pagination pull-left mrgt-0">
                                <?php
            if ($page == 1) { // Jika page adalah pake ke 1, maka disable link PREV
            ?>
                <li class="disabled"><a href="#">First</a></li>
                <li class="disabled"><a href="#">&laquo;</a></li>
            <?php
            } else { // Jika buka page ke 1
                $link_prev = ($page > 1) ? $page - 1 : 1;
            ?>
                <li><a href="index.php?p=home&&page=1">First</a></li>
                <li><a href="index.php?p=home&&page=<?php echo $link_prev; ?>">&laquo;</a></li>
            <?php
            }
            ?>

            <!-- LINK NUMBER -->
            <?php

            // Buat query untuk menghitung semua jumlah data
            $sql2 = mysqli_query($koneksi,"SELECT * FROM berita");
            $get_jumlah = mysqli_num_rows($sql2);

             if($get_jumlah==0){
                
                $jumlah_page==0;
            }
            else{
            $jumlah_page = $get_jumlah / $limit; // Hitung jumlah halamanya
        }
            $jumlah_number = 5; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
            $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
            $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

            for ($i = $start_number; $i <= $end_number; $i++) {
                $link_active = ($page == $i) ? 'class="active"' : '';
            ?>
                <li <?php echo $link_active; ?>><a href="index.php?p=home&&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            }
            ?>

            <!-- LINK NEXT AND LAST -->
            <?php
            // Jika page sama dengan jumlah page, maka disable link NEXT nya
            // Artinya page tersebut adalah page terakhir
            if ($page == $jumlah_page) { // Jika page terakhir
            ?>
                <li class="disabled"><a href="#">&raquo;</a></li>
                <li class="disabled"><a href="#">Last</a></li>
            <?php
            } else { // Jika bukan page terakhir
                $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
            ?>
                <li><a href="index.php?p=home&&page=<?php echo $link_next; ?>">&raquo;</a></li>
                <li><a href="index.php?p=home&&page=<?php echo $jumlah_page; ?>">Last</a></li>
            <?php
            }
            ?>
                            </ul>
                        </div>
                        
                    </div>

               
                </div><!--/.row-->
            </div> <!--/.container-->
        </section>
<!--end wrapper-->
