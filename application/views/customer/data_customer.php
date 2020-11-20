<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Customer <small></small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <a href=<?=site_url('customer/add_customer') ?> class="btn btn-primary btn-sm" >
              <i class="fa fa-plus-circle"></i> Tambah Data Customer
          </a>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap " cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Nomor Handphone</th>
            <th>Alamat</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1; foreach ($row->result() as $key => $data): ?>
          <tr>
            <td style="width:5%;"><?= $no++; ?></td>
            <td><?= $data->name ?></td>
            <td> <?php 
                  $oke = $data->gender; 
                  if($oke == 'L'){
                    echo "Laki- Laki";
                  }else{
                    echo 'Perempuan';
                  } ?>
            </td>
            <td><?= $data->phone ?></td>
            <td><?= $data->addres ?></td>
            <td class="text-center" width="160px">
                <a href="<?=site_url('customer/edit_customer/'.$data->customer_id) ?>" class="btn btn-info btn-xs"> <i class="fa fa-trash"></i> Edit </a> 
                <a href="<?=site_url('customer/del/'.$data->customer_id) ?>" class="btn btn-danger btn-xs tombol-verifikasi"><i class="fa fa-trash"></i> Delete
                </a> 
            </td>
          </tr>
          <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>  