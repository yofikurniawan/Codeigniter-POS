<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Stock In<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
            <div class="clearfix"></div>
        </div>
                <div class="x_content">
                    <br />

                    <div class="col-md-offset-4">
                        <form action="<?= site_url('stock/process') ?>" method="post" id="demo-form2" data-parsley-validate >

                        <div class="form-group">  
                            <label for="barcode">Barcode </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group input-group">
                                <input type="hidden" name="item_id" id="item_id" >
                                <input type="text" name="barcode" value="" class="form-control " id="barcode" required autofocus >
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                        <i class="fa fa-search"> </i>
                                    </button>
                                </span>
                            </div>
                        </div>    
                        <div class="form-group">        
                            <labe>Date *</labe>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group input-group">
                                <input type="text" name="date" class="form-control" id="single_cal3" placeholder="First Name" aria-describedby="inputSuccess2Status2">
                                
                            </div>
                        </div> 
                        <div class="form-group">        
                            <label for="item_name">Item Name </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group input-group">
                                <input type="text" name="item_name" class="form-control" id="item_name" readonly>
                            </div>
                        </div>
                        <div class="form-group">   
                            <div class="row input-group">
                                <div class="col-md-5 col-sm-6 col-xs-12">
                                    <label for="item_unit">Item Unit </label>
                                    <input type="text" name="item_unit" value="-" class="form-control" id="item_unit" readonly>
                                </div>
                                <div class="col-md-2 col-sm-10 col-xs-12">
                                    <label for="stock">Initial Stock</label>
                                    <input type="text" name="stock" class="form-control" id="stock" value="-" readonly>
                                </div>
                            </div>    
                        </div>
                        <div class="form-group">        
                            <label for="detail">Detail </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group input-group">
                                <input type="text" name="detail" class="form-control"  placeholder="Tambahan / Etc">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group input-group">        
                            <label for="item_unit">Supplier </label>
                            <select name="supplier" class="form-control">
                                <option value="">- Pilih - </option>
                                <?php foreach($supplier as $i => $data) { 
                                echo '<option value="'.$data->supplier_id.'">'.$data->name.'</option>';
                                } ?>
                            </select>    
                        </div>

                        <div class="form-group">        
                            <label for="qty">Qty </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group input-group">
                                <input type="number" name="qty" class="form-control" id="qty" reqiured>
                            </div>
                        </div>


                        <div class="form-group">
                                <a href="<?php echo base_url('stock/in') ?>" class="btn btn-primary" >Back</a>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" name="in_add" class="btn btn-success">Submit</button>
                        </div>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Select -->
<div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Select Product Item</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-striped table-bordered dt-responsive" id="datatable-buttons" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($item as $i => $data) { ?>
                        <tr>
                            <td><?= $no++; ?> </td>
                            <td><?= $data->barcode ?></td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->category_unit ?></td>
                            <td>Rp. <?= $data->price ?></td>
                            <td><?= $data->stock ?></td>
                            <td>
                                <button class="btn btn-info btn-xs" id="select" 
                                data-id="<?=$data->item_id ?>"
                                data-barcode="<?=$data->barcode ?>"
                                data-name="<?=$data->name ?>"
                                data-unit="<?=$data->category_unit ?>"
                                data-stock="<?=$data->stock ?>"> 
                                    <i class="fa fa-check"> </i> Select
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
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
    $(document).on('click', '#select', function() {
        var item_id = $(this).data('id');
        var barcode = $(this).data('barcode');
        var name = $(this).data('name');
        var category_unit = $(this).data('unit');
        var stock = $(this).data('stock');
        $('#item_id').val(item_id);
        $('#barcode').val(barcode);
        $('#item_name').val(name);
        $('#item_unit').val(category_unit);
        $('#stock').val(stock);
        $('#modal-item').modal('hide');
    })
})
</script>