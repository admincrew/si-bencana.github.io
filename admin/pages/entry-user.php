<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Member
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Member</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Member</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../koneksi/koneksi.php';

                            $auto=rand(111111,999999);
                            $_POST['id']="US".$auto;

                            

                            if(isset($_POST['b1'])){

                              $tgl=$_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal'];
                              
                            if(empty($_POST['id']) or empty($_POST['nm']) or empty($_POST['hp']) or empty($_POST['em']) or empty($_POST['jk']) or empty($_POST['alm'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{
                              $pass=md5($_POST['pass']);
                                $sql=mysqli_query($koneksi,"INSERT INTO user values ('$_POST[id]','$_POST[nm]','$tgl','$_POST[jk]','$_POST[alm]','$_POST[hp]','$_POST[em]','$_POST[group]','$_POST[level]','$_POST[user]','$pass','user.png')");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> User berhasil ditambah.
                                  </div>';
                                  echo "<meta http-equiv=refresh content=1;url=index.php?p=list-user>";
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post">
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>KD user</label>
                                        <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $_POST['id']; ?>" placeholder="ID User" readonly>
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-6 ">
                                <label>Nama lengkap</label>
                                   <input type="text" name="nm" class="form-control" maxlength="100" value="" placeholder="Nama lengkap">
                                      </div>
                                      <div class="col-lg-6 ">
                                        <label>Nomor Telepon</label>
                                        <input type="text" name="hp" class="form-control" maxlength="100" value="" placeholder="Nomor Telepon">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Email</label>
                                        <input type="email" name="em" class="form-control" maxlength="100" placeholder="Email">
                                    </div>
                                    
                                      
                                </div>
                            </div>
                              <br>
                              <div class="row">
                                <div class="form-group">
                                     <?php
                                      
echo "<div class='col-md-4'><label>Tanggal Lahir</label><select name=tanggal class='form-control'> 
<option value=''>-Pilih Tanggal-</option>";
for ($no=1;$no<=31;$no++)
{
echo "<option value=$no>$no</option>";
}
echo "</select></div>";


$nm_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" );

echo "<div class='col-md-4'><label>Bulan Lahir</label><select name=bulan class='form-control'>
<option value=''>-Pilih Bulan-</option>";
for ($bln=1; $bln<=12; $bln++)
{
echo "<option value=$bln>$nm_bulan[$bln]</option> ";
}
echo "</select></div>";

$thn_skrg=2005;
echo "<div class='col-md-4'><label>Tahun Lahir</label><select name=tahun class='form-control'>
<option value='' selected>-Pilih Tahun-</option>";
for ($thn=1950;$thn<=$thn_skrg;$thn++)
{
echo "<option value=$thn>$thn</option>";
}
echo "</select></div>";
?>
                                  
                                </div>
                            </div>
                              <br>
                               <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Jenis Kelamin</label>
                                         <br>
                                        <input type="radio" name="jk" id="radio" value="Laki-laki"/> Laki-Laki <input type="radio" name="jk" id="radio2" value="Perempuan" /> Perempuan
                                    </div>
                                      
                                </div>
                            </div>
                              <br>
                              <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Alamat</label>
                                        <textarea id="Alamat" class="form-control" name="alm" rows="2" cols="10" data-msg-required="Please enter your Alamat." maxlength="5000" placeholder="Alamat"></textarea>    
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                            <div class="col-md-6">
                                     <label>Level</label>
                                        <select name="level" class="form-control">
                                          <option value="">-level-</option>
                                          <option value="Operator">Operator</option>
                                          <option value="Supervisor">Supervisor</option>
                                          <option value="Petugas">Petugas</option>
                                          <option value="Pimpinan">Pimpinan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                     <label>Group Operator</label>
                                        <select name="group" class="form-control">
                                          <option value="">-Group-</option>
                                          <option value="1">1</option>
                                          <option value="12">12</option>
                                          <option value="B">B</option>
                                          <option value="C">C</option>
                                          <option value="D">D</option>
                                          <option value="I">I</option>
                                          <option value="II">II</option>
                                          <option value="III">III</option>
                                          <option value="IV">IV</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              <br>
                              <div class="row">
                                <div class="form-group">
                            <div class="col-md-6">
                                     <label>Username</label>
                                       <input type="text" name="user" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="col-md-6">
                                     <label>Password</label>
                                       <input type="Password" name="pass" class="form-control" placeholder="Password">
                                    </div>
                                  </div>
                                </div>
                              <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Tambah User</button>
                                    <a href="index.php?p=list-user" class="btn btn-info"><i class="fa fa-table"></i> Lihat List</a>
                                    
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->

   </div>