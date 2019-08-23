<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="images/icn.png"/>
        <title>Sistem informasi Pengolahan Data Bencana Alam</title>
        <meta name="description" content="">
        <!-- CSS FILES -->
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css"/>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/font awesome/font-awesome.min.css">
        <link rel="stylesheet" href="plugins/user style/css/style.css">
        <link rel="stylesheet" href="plugins/user style/css/fractionslider.css"/>
        <link rel="stylesheet" href="plugins/user style/css/style-fraction.css"/>
        
    </head>
    <body>
        <!--Start Header-->
        <header id="header">
            <div id="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="logo">
                                <h1><img src="images/logo.png" alt="Everest"/></h1>
                            </div>
                            <div class="jd-logo">SI Pengolahan Data Bencana Alam</div>
                            <div class="jd-logo2">Prov. Kalimantan Timur Kabupaten Peser </div>
                        </div>
                      
                    </div>
                </div>
            </div>
            <div class="pixel-header">
                
            </div>
            
            <!-- Navigation
            ================================================== -->
            <div class="navbar navbar-default navbar-static-top container" role="navigation">
                <div class="row">
                    <span class="nav-caption"></span>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php?p=home"><i class="fa fa-home"></i> Home</a></li>
                         
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="login/login.php"><i class="fa fa-user"></i></a></li>
                        </ul>
                    </div>
                    </div><!--/.row -->
                    </div><!--/.container -->
                </header>
                <!--End Header-->
                <!--start wrapper-->
                <?php
                $page_dir='pages';
                if(!empty($_GET['p'])){
                $page=scandir($page_dir,0);
                unset($page[0],$page[1]);
                $p=$_GET['p'];
                if(in_array($p.'.php',$page)){
                include($page_dir.'/'.$p.'.php');
                }
                else{
                include ($page_dir.'/404-page.php');
                }
                }
                else{
                include ($page_dir.'/home.php');
                }
                ?>
                <!--start footer-->
                <footer class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="widget_title">
                                    <h4><span>Kontak Kami</span></h4>
                                </div>
                                <div class="widget_content">
                                    <p>Anda dapat menghubungi dan mengunjungi kami melalui kontak dibawah ini.</p>
                                    <ul class="widget_info_contact">
                                        <li><i class="fa fa-map-marker"></i> <p><strong>Address</strong>: Jl.Propinis KM.08 Komplek Graha Pemuda Kel. Nipah-nipah Kec. Penajam</p></li>
                                        <li><i class="fa fa-user"></i> <p><strong>Phone</strong>: +62 816-4975-3452</p></li>
                                        <li><i class="fa fa-envelope"></i> <p><strong>Email</strong>: info@kabupatenpp.go.id</p></li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!--end footer-->
                <section class="footer_bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="copyright">&copy; Copyright <?php echo date("Y"); ?> Copyright@2019 Universitas Mulia Balikpapan</p>
                            </div>
                        </div>
                    </div>
                </section>
                <script type="text/javascript" src="plugins/jquery/jQuery-2.1.4.min.js"></script>
                <script type="text/javascript" src="plugins/user style/js/bootstrapValidator.js"></script>
                <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
                <script src="plugins/user style/js/jquery.fractionslider.js" type="text/javascript" charset="utf-8"></script>
                <script src="plugins/user style/js/jflickrfeed.js"></script>
                <script src="plugins/user style/js/jquery.magnific-popup.min.js"></script>
                <script src="plugins/user style/js/main.js"></script>
            </body>
        </html>