  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->
<?php

include '../koneksi/koneksi.php';

  $sql2=mysqli_query($koneksi,"SELECT * FROM bencana where YEAR(tgl_kejadian)='2010'");
 $feb=mysqli_num_rows($sql2);

  $sql3=mysqli_query($koneksi,"SELECT * FROM bencana where YEAR(tgl_kejadian)='2011'");
 $mar=mysqli_num_rows($sql3);

  $sql4=mysqli_query($koneksi,"SELECT * FROM bencana where YEAR(tgl_kejadian)='2012'");
 $apr=mysqli_num_rows($sql4);

  $sql5=mysqli_query($koneksi,"SELECT * FROM bencana where YEAR(tgl_kejadian)='2013'");
 $may=mysqli_num_rows($sql5);

  $sql6=mysqli_query($koneksi,"SELECT * FROM bencana where YEAR(tgl_kejadian)='2014'");
 $jun=mysqli_num_rows($sql6);

  $sql7=mysqli_query($koneksi,"SELECT * FROM bencana where YEAR(tgl_kejadian)='2015'");
 $jul=mysqli_num_rows($sql7);

  $sql8=mysqli_query($koneksi,"SELECT * FROM bencana where YEAR(tgl_kejadian)='2016'");
 $ags=mysqli_num_rows($sql8);

  $sql9=mysqli_query($koneksi,"SELECT * FROM bencana where YEAR(tgl_kejadian)='2017'");
 $sep=mysqli_num_rows($sql9);

  $sql10=mysqli_query($koneksi,"SELECT * FROM bencana where YEAR(tgl_kejadian)='2018'");
 $oct=mysqli_num_rows($sql10);


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
              text: '(Total Pertahun)'
            
            },
            xAxis: {
              categories: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018']
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
        data: [<?php echo $feb ?>,<?php echo $mar ?>, <?php echo $apr ?>, <?php echo $may ?>, <?php echo $jun ?>, <?php echo $jul ?>, <?php echo $ags ?>,<?php echo $sep ?>,<?php echo $oct ?>]
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