
  <div class="page-header container">
    <h1>Profile User</h1>
  </div>
  <div class="container-fluid">
  <div class="col-md-1"></div>
  <div class="col-md-10">
  <?php foreach($user as $user) : ?>
        <h4>ID User : <?=$user->id_user?></h4>
          	<table class="table table-hover">
                <tr>
                  <td><strong>Nama Lengkap</strong></td>
                  <td>:</td>
                  <td><?=$user->nama_user?></td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                  <td>:</td>
                  <td><?=$user->email?></td>
                </tr>
                <tr>
                  <td><strong>Username</strong></td>
                  <td>:</td>
                  <td><?=$user->username?></td>
                </tr>
                <tr>
                  <td><strong>Kecamatan</strong></td>
                  <td>:</td>
                  <td><?=$user->district_id?></td>
                </tr>
                <tr>
                  <td><strong>Kabupaten</strong></td>
                  <td>:</td>
                  <td><?=$user->regency_id?></td>
                </tr>
                <tr>
                  <td><strong>Provinsi</strong></td>
                  <td>:</td>
                  <td><?=$user->province_id?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td><?=anchor('user/edit_user/' . $user->id_user,'Ubah',['class'=>'btn btn-primary btn-sm pull-right'])?></td>
                </tr>
            </table>
        <?php endforeach; ?>
  </div>
  </div>
  <div class="col-md-1"></div>
  <hr>