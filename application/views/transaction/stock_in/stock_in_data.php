<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Data Stock In<small>Barang</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
                <a href=<?=site_url('stock/in/add') ?> class="btn btn-primary btn-sm" >
                <i class="glyphicon glyphicon-ok"></i> Tambah Data Stock In
                </a> 
            </ul>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <p class="text-muted font-13 m-b-30">
                Data Master Stock In 
            </p>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Barcode</th>
                    <th>Product Item</th>
                    <th>Qty</th>
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
                        <td class="text-center"><?= date_indo($data->date) ?></td>
                        <td class="text-center" width="160px">
                            <a id="detail1" class="btn btn-default btn-xs" 
                            data-toggle="modal" data-target="#modal-detail"
                            data-barcode="<?=$data->barcode ?>"
                            data-itemname="<?=$data->item_name ?>"
                            data-detail="<?=$data->detail ?>"
                            data-suppliername="<?=$data->sup_name ?>"
                            data-qty="<?=$data->qty ?>"
                            data-date="<?=date_indo($data->date) ?>">
                                <i class="fa fa-eye"></i>Details
                            </a>    
                            <a href="<?=site_url('stock/in/del/'.$data->stock_id.'/'.$data->item_id) ?>" class="tombol-verifikasi btn btn-danger btn-xs">
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

<!-- Modal Select -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Stock in Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-dark">
                    <tbody>
                        <tr>
                            <th style="">Barcode</th>
                            <td> <span id="barcode"> </span></td>
                        </tr>
                        <tr>
                            <th style="">Item Name</th>
                            <td> <span id="item_name"> </span></td>
                        </tr>
                        <tr>
                            <th style="">Detail</th>
                            <td> <span id="detail"> </span></td>
                        </tr>
                        <tr>
                            <th style="">Supplier Name</th>
                            <td> <span id="supplier_name"> </span></td>
                        </tr>
                        <tr>
                            <th style="">Qty</th>
                            <td> <span id="qty"> </span></td>
                        </tr>
                        <tr>
                            <th style="">Date</th>
                            <td> <span id="date"> </span></td>
                        </tr>
                    </tbody>
                </table>
            </div>    
        </div>
    </div>
</div>
<!-- Akhir Modal SeLect -->
<!-- Script  -->
<script>
$(document).ready(function() {
    $(document).on('click', '#detail1', function() {
        var barcode = $(this).data('barcode');
        var itemname = $(this).data('itemname');
        var detail = $(this).data('detail');
        var suppliername = $(this).data('suppliername');
        var qty = $(this).data('qty');
        var date = $(this).data('date');
        $('#barcode').text(barcode);
        $('#item_name').text(itemname);
        $('#detail').text(detail);
        $('#supplier_name').text(suppliername);
        $('#qty').text(qty);
        $('#date').text(date);
        $('#modal-item').modal('hide');
    })
})
</script>