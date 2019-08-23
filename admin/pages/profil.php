<div class="content-wrapper">
 <section class="content-header">
          <h1>
            Profil
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Profil</li>
          </ol>
        </section>

    <section class="content">
     

      <div class="row">
          <?php 
                         include './../koneksi/koneksi.php'; 

                           

                            if(isset($_POST['b1'])){

                            if(empty($_POST['id']) or empty($_POST['nm'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                                  $tmpf=$_FILES['ft']['tmp_name'];
                                  $nmf=$_FILES['ft']['name'];

                                  if(!empty($nmf)){
                                    $ft=$nmf;
                                    move_uploaded_file($tmpf,"../images/".$nmf);
                                  }else{
                                    $ft=$_POST['ft_lama'];
                                  }

                                if($_POST['pas_lama']==$_POST['pas']){
                                  $pass=$_POST['pas'];
                                }else{
                                  $pass=md5($_POST['pas']);
                                }
                                 $tgl=$_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal'];
                              
                                $sql=mysqli_query($koneksi,"UPDATE user SET nm_us='$_POST[nm]',tgl_lhr='$tgl',jk='$_POST[jekel]',alm='$_POST[alm]',nohp='$_POST[telp]',email='$_POST[email]',username='$_POST[user]',password='$pass',foto='$ft' where kd_us='$_POST[id]'");

                                
                            

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
               
                             <?php 
                       
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM user where kd_us='$_SESSION[id]'"));
                      ?>
              <img class="profile-user-img img-responsive img-circle" src="../images/<?php echo $q['foto']; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $q['nm_us']; ?></h3>

              <p class="text-muted text-center"></p>
              
              
               
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                   <input type="file" class="form-control" name="ft" id="foto">
                   <input type="hidden" class="form-control" name="ft_lama" id="foto" value="<?php echo $q['foto']; ?>">
                  
                </li>
                
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Biodata</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
             
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama</label>

                    <div class="col-sm-10">
                       <input type="hidden" class="form-control" name="id" id="inputName" value="<?php echo $q['kd_us']; ?>" placeholder="kd">
                      <input type="text" class="form-control" name="nm" id="inputName" value="<?php echo $q['nm_us']; ?>" placeholder="Name">
                     
                    </div>
                  </div>
                     <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Tanggal Lahir</label>
                  <?php
                                      
                    echo "<div class='col-md-3'><select name=tanggal class='form-control'> 
                    <option value=''>-Pilih Tanggal-</option>";
                    for ($no=1;$no<=31;$no++)
                    {
                    ?>
                    <option value="<?php echo $no; ?>" <?php if(date('d',strtotime($q['tgl_lhr']))==$no) echo "selected"; else echo ""; ?>><?php echo $no; ?></option>

                    <?php } ?>
                    </select></div>

                    <?php
                    $nm_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" );

                    echo "<div class='col-md-3'><select name=bulan class='form-control'>
                    <option value=''>-Pilih Bulan-</option>";
                    for ($bln=1; $bln<=12; $bln++)
                    {
                    ?>
                    <option value="<?php echo $bln; ?>"<?php if(date('m',strtotime($q['tgl_lhr']))==$bln) echo "selected"; else echo ""; ?>><?php echo $nm_bulan[$bln]; ?></option> ";
                    <?php } ?>
                    </select></div>

                    <?php
                    $thn_skrg=2005;
                    echo "<div class='col-md-3'><select name=tahun class='form-control'>
                    <option value='' selected>-Pilih Tahun-</option>";
                    for ($thn=1950;$thn<=$thn_skrg;$thn++)
                    {
                    ?>
                    <option value="<?php echo $thn; ?>" <?php if(date('Y',strtotime($q['tgl_lhr']))==$thn) echo "selected"; else echo ""; ?>><?php echo $thn; ?></option>
                    <?php } ?>
                    </select>
                    
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Jenis Kelamin</label>

                    <div class="col-sm-10">
                      
                      <select name="jekel" class="form-control">
                        <option>-Jenis Kelamin-</option>
                        <option value="Laki-laki" <?php if($q['jk']=="Laki-laki"){echo "Selected";}else{echo "";}?>>Laki-laki</option>
                        <option value="Perempuan" <?php if($q['jk']=="Perempuan"){echo "Selected";}else{echo "";}?>>Perempuan</option>
                      </select>
                     
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Alamat</label>

                    <div class="col-sm-10">
                     
                      <textarea name="alm" class="form-control"><?php echo $q['alm']; ?></textarea>
                     
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nomor Telepon</label>

                    <div class="col-sm-10">
                     
                      <input type="text" class="form-control" name="telp" id="inputName" value="<?php echo $q['nohp']; ?>" placeholder="Name">
                     
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                     
                      <input type="text" class="form-control" name="email" id="inputName" value="<?php echo $q['email']; ?>" placeholder="Name">
                     
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" name="user" value="<?php echo $q['username']; ?>" placeholder="Username">
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputSkills" name="pas" value="<?php echo $q['password']; ?>" placeholder="Password">
                      <input type="hidden" class="form-control" id="inputSkills" name="pas_lama" value="<?php echo $q['password']; ?>" placeholder="Password">
                    
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="b1" class="btn btn-info">Update</button>
                    </div>
                  </div>
                
              </div>
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </form>
      </div>
    
      <!-- /.row -->

    </section>
  </div>
