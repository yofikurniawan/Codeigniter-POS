<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Users <small></small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <a href=<?=site_url('user/add_user') ?> class="btn btn-primary btn-sm" >
              <i class="fa fa-plus-circle"></i> Tambah User
          </a>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Name</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Level</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Pendidkan</th>
            <th>Foto</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1; foreach ($user->result() as $key => $data): ?>
          <tr>
            <td style="width:5%;"><?= $no++; ?></td>
            <td><?= $data->username ?></td>
            <td><?= $data->name ?></td>
            <td><?= $data->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' ?></td>
            <td><?= $data->addres ?></td>
            <td><?= $data->level == 1 ? 'Admin' : 'Kasir' ?></td>
            <td><?= $data->nohp ?></td>
            <td><?= $data->email ?></td>
            <td><?= $data->pendidikan ?></td>
            <td><img src="<?php echo base_url() ?>assets/images/<?= $data->foto; ?>" width="90" height="90"></td>
            <td class="text-center" width="160px">
                <a href="<?=site_url('user/edit/'.$data->user_id) ?>" class="btn btn-success btn-sm">
                    <i class="fa fa-edit"></i> Edit </a>
                <a href="<?=site_url('user/del/'.$data->user_id) ?>" class="btn btn-danger btn-sm tombol-verifikasi"><i class="fa fa-trash"></i> Delete </a>
            </td>
          </tr>
          <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>  