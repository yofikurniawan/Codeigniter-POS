<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Data Stock Out<small>Barang Keluar</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
                <a href=<?=site_url('stock/out/add') ?> class="btn btn-primary btn-sm" >
                <i class="glyphicon glyphicon-ok"></i> Tambah Data Stock Out
                </a> 
            </ul>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <p class="text-muted font-13 m-b-30">
                Data Master Stock Out 
            </p>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Barcode</th>
                    <th>Product Item</th>
                    <th>Qty</th>
                    <th>Info</th>
                    <th>Date</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($row as $key => $data): ?>
                    <tr>
                        <td style="width:5%;"><?= $no++ ?></td>
                        <td><?= $data->barcode ?></td>
                        <td><?= $data->item_name ?></td>
                        <td class="text-right"><?= $data->qty ?></td>
                        <td class="text-left"><?= $data->detail ?></td>
                        <td class="text-center"><?= date_indo($data->date) ?></td>
                        <td class="text-center" width="160px">
                            <a href="<?=site_url('stock/out/del/'.$data->stock_id.'/'.$data->item_id) ?>" class="tombol-verifikasi btn btn-danger btn-xs">
                            <i class="glyphicon glyphicon-trash"></i> Delete
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
