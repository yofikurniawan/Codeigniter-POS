<div class="x_panel">
  <div class="x_title">
    <h2>Form Tambah Data Users <small></small></h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br>
    <form action="<?= site_url('user/add_user') ?>" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        <input name="name" type="text" value="<?= set_value('name')?>" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Name * ">
        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
        <?= form_error('name'); ?>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        <input name="username" type="text" value="<?= set_value('username')?>" class="form-control" id="inputSuccess3" placeholder="Username *">
        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
        <?= form_error('username'); ?>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        <input name="password" type="password" value="<?= set_value('password')?>" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Password *">
        <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
        <?= form_error('password'); ?>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        <input name="passwordcon" type="password" value="<?= set_value('passwordcon')?>" class="form-control" id="inputSuccess2" placeholder="Konfirmasi Password *">
        <span class="glyphicon glyphicon-repeat form-control-feedback right" aria-hidden="true"></span>
        <?= form_error('passwordcon'); ?>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        <textarea class="form-control has-feedback-left" name="alamat" rows="3" placeholder="Alamat *"><?= set_value('alamat') ?></textarea>
        <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
      </div>
    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
      <select name="level" class="form-control">
        <option value="">Pilih Level * </option>
        <option value="1" <?= set_value('level') == 1 ? "selected" : null ?> >Admin</option>
        <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>  >Kepala Gudang</option>
        <option value="3" <?= set_value('level') == 3 ? "selected" : null ?>  >Kasir </option>
      </select>
      <?= form_error('level'); ?>
    </div> 
      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        <input name="nohp" type="text" value="<?= set_value('nohp')?>" class="form-control" id="inputSuccess5" 
        placeholder="Phone *">
        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"> </span>
        <?= form_error('nohp'); ?>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        <select name="jenis_kelamin" class="form-control">
          <option value="">Pilih Jenis Kelamin *</option>
          <option value="1" <?= set_value('jenis_kelamin') == 1 ? "selected" : null ?> >Laki-Laki</option>
          <option value="2" <?= set_value('jenis_kelamin') == 2 ? "selected" : null ?>  >Perempuan</option>
        </select>
        <?= form_error('jenis_kelamin'); ?>
      </div> 
      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        <input name="email" value="<?= set_value('email')?>" type="email" class="form-control" id="inputSuccess" placeholder="Email *">
      <span class="glyphicon glyphicon-envelope form-control-feedback right" aria-hidden="true"></span>
      <?= form_error('email'); ?>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        <select name="pendidikan" class="form-control">
          <option value="">Pilih Pendidikan *</option>
          <option value="Tidak Sekolah" <?= set_value('pendidikan') == "Tidak Sekolah" ? "selected" : null ?> >Tidak Sekolah</option>
          <option value="SD" <?= set_value('pendidikan') == "SD" ? "selected" : null ?> >Sekolah Dasar</option>
          <option value="SMP" <?= set_value('pendidikan') == "SMP" ? "selected" : null ?> >Sekolah Menegah Pertama</option>
          <option value="SMA" <?= set_value('pendidikan') == "SMA" ? "selected" : null ?> >SMA</option>
          <option value="D3" <?= set_value('pendidikan') == "D3" ? "selected" : null ?> >D3</option>
          <option value="S1" <?= set_value('pendidikan') == "S1" ? "selected" : null ?> >S1</option>
          <option value="S2" <?= set_value('pendidikan') == "S2" ? "selected" : null ?> >S2</option>
        </select>
        <?= form_error('pendidikan'); ?>
      </div> 
      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        <input name="foto" value="<?= set_value('foto')?>" type="file" class="form-control" id="inputSuccess" placeholder="Foto">
      <span class="fa fa-photo form-control-feedback right" aria-hidden="true"> * </span>
      <?= form_error('foto'); ?>
      </div>
      <div class="form-group"></div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 btn-center col-sm-6 col-xs-6">
          <a href=<?=site_url('user') ?> class="btn btn-primary btn-sm" ><i class="fa fa-backward"></i> Back</button> </a>
          <button class="btn btn-default" type="reset"><i class="fa fa-times-circle"></i>Reset</button>
          <button type="submit" class="btn btn-success"> <i class="fa fa-paper-plane"></i> Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>