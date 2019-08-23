<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit User
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">User</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form User</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            include '../koneksi/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                               $tgl=$_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal'];

                            if(empty($_POST['id']) or empty($_POST['nm']) or empty($_POST['hp']) or empty($_POST['em']) or empty($_POST['jk']) or empty($tgl) or empty($_POST['alm'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                              if($_POST['pass']==$_POST['pass_lama']){
                                $pass=$_POST['pass_lama'];
                              }else{
                                $pass=md5($_POST['pass']);
                              }

                            
                                $sql=mysqli_query($koneksi,"UPDATE user SET nm_us='$_POST[nm]',nohp='$_POST[hp]',email='$_POST[em]',tgl_lhr='$tgl',jk='$_POST[jk]',alm='$_POST[alm]',level='$_POST[level]',group_operator='$_POST[group]',username='$_POST[user]',password='$pass' where kd_us='$id'");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> User berhasil diedit.
                                  </div>';
                                  echo "<meta http-equiv=refresh content=1;url=index.php?p=list-user>";
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post">
                      <?php 
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM user WHERE kd_us='$id'"));
                      ?>
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>KD User</label>
                                        <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $q['kd_us']; ?>" placeholder="K
                                        D User" readonly>
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-6 ">
                                <label>Nama lengkap</label>
                                   <input type="text" name="nm" class="form-control" maxlength="100" placeholder="Nama lengkap" value="<?php echo $q['nm_us']; ?>">
                                      </div>
                                      <div class="col-lg-6">
                                        <label>Nomor Telepon</label>
                                        <input type="text" name="hp" class="form-control" maxlength="100" value="<?php echo $q['nohp']; ?>" placeholder="Nomor Telepon" >
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Email</label>
                                        <input type="email" name="em" class="form-control" maxlength="100" placeholder="Email" value="<?php echo $q['email']; ?>">
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
?>
<option value="<?php echo $no; ?>" <?php if(date('d',strtotime($q['tgl_lhr']))==$no) echo "selected"; else echo ""; ?>><?php echo $no; ?></option>

<?php } ?>
</select></div>

<?php
$nm_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" );

echo "<div class='col-md-4'><label>Bulan Lahir</label><select name=bulan class='form-control'>
<option value=''>-Pilih Bulan-</option>";
for ($bln=1; $bln<=12; $bln++)
{
?>
<option value="<?php echo $bln; ?>"<?php if(date('m',strtotime($q['tgl_lhr']))==$bln) echo "selected"; else echo ""; ?>><?php echo $nm_bulan[$bln]; ?></option> ";
<?php } ?>
</select></div>

<?php
$thn_skrg=2005;
echo "<div class='col-md-4'><label>Tahun Lahir</label><select name=tahun class='form-control'>
<option value='' selected>-Pilih Tahun-</option>";
for ($thn=1950;$thn<=$thn_skrg;$thn++)
{
?>
<option value="<?php echo $thn; ?>" <?php if(date('Y',strtotime($q['tgl_lhr']))==$thn) echo "selected"; else echo ""; ?>><?php echo $thn; ?></option>
<?php } ?>
</select></div>

                                  
                                </div>
                            </div>
                              <br>
                               <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Jenis Kelamin</label>
                                         <br>
                                        <input type="radio" name="jk" id="radio" value="Laki-laki" <?php if($q['jk']=="Laki-laki") echo "checked"; else echo ""; ?>/> Laki-Laki <input type="radio" name="jk" id="radio2" value="Perempuan" <?php if($q['jk']=="Perempuan") echo "checked"; else echo ""; ?>/> Perempuan
                                    </div>
                                      
                                </div>
                            </div>
                              <br>
                              <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Alamat</label>
                                        <textarea id="Alamat" class="form-control" name="alm" rows="2" cols="10" data-msg-required="Please enter your Alamat." maxlength="5000" placeholder="Alamat"><?php echo $q['alm']; ?></textarea>    
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
                                          <option value="Operator" <?php if($q['level']=="Operator") echo "Selected"; else echo ""; ?>>Operator</option>
                                          <option value="Supervisor" <?php if($q['level']=="Supervisor") echo "Selected"; else echo ""; ?>>Supervisor</option>
                                          <option value="Petugas" <?php if($q['level']=="Petugas") echo "Selected"; else echo ""; ?>>Petugas</option>
                                          <option value="Pimpinan" <?php if($q['level']=="Pimpinan") echo "Selected"; else echo ""; ?>>Pimpinan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                     <label>Group Operator</label>
                                        <select name="group" class="form-control">
                                          <option value="">-Group-</option>
                                          <option value="1" <?php if($q['group_operator']=="1") echo "Selected"; else echo ""; ?>>1</option>
                                          <option value="12" <?php if($q['group_operator']=="12") echo "Selected"; else echo ""; ?>>12</option>
                                          <option value="B" <?php if($q['group_operator']=="B") echo "Selected"; else echo ""; ?>>B</option>
                                          <option value="C" <?php if($q['group_operator']=="C") echo "Selected"; else echo ""; ?>>C</option>
                                          <option value="D" <?php if($q['group_operator']=="D") echo "Selected"; else echo ""; ?>>D</option>
                                          <option value="I" <?php if($q['group_operator']=="I") echo "Selected"; else echo ""; ?>>I</option>
                                          <option value="II" <?php if($q['group_operator']=="II") echo "Selected"; else echo ""; ?>>II</option>
                                          <option value="III" <?php if($q['group_operator']=="III") echo "Selected"; else echo ""; ?>>III</option>
                                          <option value="IV" <?php if($q['group_operator']=="IV") echo "Selected"; else echo ""; ?>>IV</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              <br>
                              <div class="row">
                                <div class="form-group">
                            <div class="col-md-6">
                                     <label>Username</label>
                                       <input type="text" name="user" class="form-control" placeholder="Username" value="<?php echo $q['username']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                     <label>Password</label>
                                     <input type="hidden" name="pass_lama" class="form-control" placeholder="Password" value="<?php echo $q['password']; ?>">
                                       <input type="Password" name="pass" class="form-control" placeholder="Password" value="<?php echo $q['password']; ?>">
                                    </div>
                                  </div>
                                </div>
                              <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-success"><i class="fa fa-save"></i> Edit User</button>
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