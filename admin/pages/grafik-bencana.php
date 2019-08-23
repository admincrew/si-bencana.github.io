  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->
<?php

include '../koneksi/koneksi.php';

if(empty($_POST['thn'])){
  $y=date('Y');
}else{
  $y=$_POST['thn'];
}


 $sql1=mysqli_query($koneksi,"SELECT * FROM bencana where MONTH(tgl_kejadian)=1 and YEAR(tgl_kejadian)=$y");
 $jan=mysqli_num_rows($sql1);

  $sql2=mysqli_query($koneksi,"SELECT * FROM bencana where MONTH(tgl_kejadian)=2 and YEAR(tgl_kejadian)=$y");
 $feb=mysqli_num_rows($sql2);

  $sql3=mysqli_query($koneksi,"SELECT * FROM bencana where MONTH(tgl_kejadian)=3 and YEAR(tgl_kejadian)=$y");
 $mar=mysqli_num_rows($sql3);

  $sql4=mysqli_query($koneksi,"SELECT * FROM bencana where MONTH(tgl_kejadian)=4 and YEAR(tgl_kejadian)=$y");
 $apr=mysqli_num_rows($sql4);

  $sql5=mysqli_query($koneksi,"SELECT * FROM bencana where MONTH(tgl_kejadian)=5 and YEAR(tgl_kejadian)=$y");
 $may=mysqli_num_rows($sql5);

  $sql6=mysqli_query($koneksi,"SELECT * FROM bencana where MONTH(tgl_kejadian)=6 and YEAR(tgl_kejadian)=$y");
 $jun=mysqli_num_rows($sql6);

  $sql7=mysqli_query($koneksi,"SELECT * FROM bencana where MONTH(tgl_kejadian)=7 and YEAR(tgl_kejadian)=$y");
 $jul=mysqli_num_rows($sql7);

  $sql8=mysqli_query($koneksi,"SELECT * FROM bencana where MONTH(tgl_kejadian)=8 and YEAR(tgl_kejadian)=$y");
 $ags=mysqli_num_rows($sql8);

  $sql9=mysqli_query($koneksi,"SELECT * FROM bencana where MONTH(tgl_kejadian)=9 and YEAR(tgl_kejadian)=$y");
 $sep=mysqli_num_rows($sql9);

  $sql10=mysqli_query($koneksi,"SELECT * FROM bencana where MONTH(tgl_kejadian)=10 and YEAR(tgl_kejadian)=$y");
 $oct=mysqli_num_rows($sql10);

  $sql11=mysqli_query($koneksi,"SELECT * FROM bencana where MONTH(tgl_kejadian)=11 and YEAR(tgl_kejadian)=$y");
 $nov=mysqli_num_rows($sql11);

  $sql12=mysqli_query($koneksi,"SELECT * FROM bencana where MONTH(tgl_kejadian)=12 and YEAR(tgl_kejadian)=$y");
 $des=mysqli_num_rows($sql12);



?>
  <script src="../plugins/grafik/highcharts.js"></script>
   <script type="text/javascript">
    $(function () {
      var chart;
      $(document).ready(function() {
      
          chart = new Highcharts.Chart({
            chart: {
              renderTo: 'mygraph',
              type: 'column'
              
            },
            title: {
              text: 'Laporan Data Bencana Alam'
              
            },
            subtitle: {
              text: '(Tahun <?php echo $y; ?>)'
            
            },
            xAxis: {
              categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Dec']
            },
            yAxis: {
              title: {
                text: 'Jumlah Bencana Alam'
              },
              plotLines: [{
                value: 1,
                width: 1,
                color: '#808080'
              }]
            },

            tooltip: {
              formatter: function() {
                  return '<b>'+ this.series.name +'</b><br/>'+
                  this.x +': '+ this.y;
              }
            },
            legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'top',
              x: -10,
              y: 120,
              borderWidth: 0
            },
             series: [{
        name: 'Jumlah Bencana',
        data: [<?php echo $jan ?>,<?php echo $feb ?>,<?php echo $mar ?>, <?php echo $apr ?>, <?php echo $may ?>, <?php echo $jun ?>, <?php echo $jul ?>, <?php echo $ags ?>,<?php echo $sep ?>,<?php echo $oct ?>,<?php echo $nov ?>,<?php echo $des ?>]
          }],
          });
       
      
      });
      
    });
    </script>
    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Grafik Data Bencana
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Grafik Data Bencana</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>  
                </div><!-- /.box-header -->
                <div class="box-header">
                    <div class="row">
                     <form action="#" method="post">
                      <div class="col-md-12">
                    
                        <div class="col-md-4">
                         
                    <select name=thn class='form-control'>
                    <option value='' selected>-Pilih Tahun-</option>
                    <?php
                    $thn_skrg=date('Y');

                    for ($thn=2000;$thn<=$thn_skrg;$thn++)
                    { ?>
                   <option value="<?php echo $thn; ?>" <?php if(!empty($_POST["thn"]) and $_POST["thn"]==$thn){ echo "Selected"; }else{ echo""; } ?>><?php echo $thn; ?></option>
                   <?php } ?>
                    </select>

                        </div>
                      
                          <div class="col-md-1"><button type="submit" name="b1" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                          </div>
                         
                    
                    </div>
                      </form>
                  </div>
                </div>
                <div class="box-body">

                    <div class="panel panel-primary">
                      <div class="panel-heading">Grafik Laporan Data Bencana Alam</div>

                        <div class="panel-body">
                          <div id ="mygraph"></div>
                        </div>
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

            </section><!-- /.content -->
      </div><!-- /.content-wrapper -->