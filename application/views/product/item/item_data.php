<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
            <h2>Data Product <small>Item</small></h2>
            <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
            <a href=<?=site_url('item/add_item') ?> class="btn btn-primary btn-sm" >
                <i class="glyphicon glyphicon-ok"></i> Create Product Items
            </a> 
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <p class="text-muted font-13 m-b-30">
            Data Master Product Item
            </p>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barcode</th>
                    <th>Name</th>
                    <th>Cateogry </th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Images</th>
                    <th>Stock</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($row->result() as $key => $data): ?>
                <tr>
                <td style="width:5%;"><?= $no++ ?></td>
                <td>
                    <?= $data->barcode ?> <br>
                    <a href="<?php echo base_url('item/barcode_qrcode/'.$data->item_id) ?>" class="btn btn-default btn-xs"> <i class="fa fa-barcode"> </i> Generate</a>
                </td>
                <td><?= $data->name ?></td>
                <td><?= $data->category_name ?></td>
                <td><?= $data->category_unit ?></td>
                <td><?= $data->price ?></td>
                <td>
                <?php if($data->images != null){ ?>
                    <img src="<?php echo base_url() ?>uploads/product/<?= $data->images; ?>" width="100" height="100">
                <?php } ?>
                </td>
                <td><?= $data->stock ?></td>
                <td class="text-center" width="160px">
                <a href="<?=site_url('item/edit_item/'.$data->item_id) ?>" class="btn btn-info btn-xs">
                        <i class="glyphicon glyphicon-edit"></i> Edit
                    </a> 
                    <a href="<?=site_url('item/del/'.$data->item_id) ?>" class="tombol-verifikasi btn btn-danger btn-xs">
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