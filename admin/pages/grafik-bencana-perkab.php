  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->
<?php

include '../koneksi/koneksi.php';


if(empty($_POST['thn'])){
  $y=date('Y');
}else{
  $y=$_POST['thn'];
}

$arrayData=array();
$arrayNilai=array();

 $sql13=mysqli_query($koneksi,"SELECT Kabupaten.nm_kab,(SELECT count(*) FROM bencana 
      WHERE bencana.kd_kab = Kabupaten.kd_kab) AS jumlah FROM kabupaten,bencana WHERE YEAR(bencana.tgl_kejadian)='$y' GROUP BY kabupaten.nm_kab");
while($nh=mysqli_fetch_array($sql13)){

$arrayData[]='"'.$nh['nm_kab'].'"';

$arrayNilai[]=''.$nh['jumlah'].'';
}
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
              text: '(Tahun <?php echo date('Y'); ?>)'
            
            },
            xAxis: {
              categories: [<?php echo join($arrayData, ',') ?>],
               labels: {
                style: {
                    fontSize:'7px'
                }
            }
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
              layout: 'vertikal',
              align: 'right',
              verticalAlign: 'top',
              x: -40,
              y: 80,
              borderWidth: 1
            },
             series: [{
        name: 'Jumlah Bencana',
        data: [<?php echo join($arrayNilai, ',') ?>]
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

                    <div class="panel panel-warning">
                      <div class="panel-heading">Grafik Data Bencana Berdasarkan Kabupaten</div>
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