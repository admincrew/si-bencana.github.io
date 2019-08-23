<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<section class="wrapper">
          <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Berita Lengkap</h2>
                           
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Berita</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
		
		<section class="content blog">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                         <?php
                             include './koneksi/koneksi.php';

                    $sql=mysqli_query($koneksi,"SELECT * FROM berita where kd_berita='$_GET[id]'");

                    $q=mysqli_fetch_array($sql);

                     ?>
						<div class="blog_single">
							<article class="post">
								<figure class="post_img">
									<a href="#">
										<img class="img-thumbnail" src="./images/berita/<?php echo $q['foto']; ?>" alt="blog post" style="max-width: 100%;min-width: 100%;max-height: 450px;">
									</a>
								</figure>
								<div class="post_date">
									<span class="day"><?php echo date('d',strtotime($q['tgl_input'])); ?></span>
									<span class="month"><?php echo date('M',strtotime($q['tgl_input'])); ?></span>
								</div>
								<div class="post_content">
									<div class="post_meta">
										<h2>
											<a href="#"><?php echo $q['judul']; ?></a>
										</h2>
										<div class="metaInfo">
											<span><i class="fa fa-calendar"></i> <a href="#"><?php echo date('M d, Y',strtotime($q['tgl_input'])); ?></a> </span>
                                           
											<span><i class="fa fa-user"></i> By Admin </span>
											
										</div>
									</div>
									<p><?php echo $q['isi']; ?></p>
								</div>
							
							</article>
						</div>	

				    </div>
                </div>
            </div>
        </section>
    </section>
