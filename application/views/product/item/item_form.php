<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
            <h2><?= ucfirst($page) ?> item <small></small></h2>
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
            <?php $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');?>
            <?php echo form_open_multipart('item/process',$attributes) ?>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Barcode <span class="required text-danger">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="hidden" name="id" value="<?= $row->item_id?>">
                <input type="text" name="barcode" value="<?= $row->barcode ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name 
                <span class="required text-danger">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="name" value="<?= $row->name ?>"  required="" id="first-name" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">category 
                <span class="required text-danger">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="category" class="form-control" required> 
                <option value="">-Pilih Category-</option>
                <?php foreach ($category->result() as $key => $data) : ?>
                <option value="<?= $data->category_id ?>" <?= $data->category_id == $row->category_id ? "selected" : null ?>> <?= $data->name ?> </option>
                <?php endforeach ?>
                </select>
                </div>  
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit 
                <span class="required text-danger">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <?php echo form_dropdown('unit', $unit, $selectedunit, ['class' => 'form-control', 'required' => 'required']) ?> 
                </div>  
            </div>


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Price 
                <span class="required text-danger">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="number" name="price" value="<?= $row->price ?>"  required="" id="first-name" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gambar 
                <span class="required text-danger">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <?php if($page == 'edit') {
                    if($row->images != null) { ?>
                    <div class="form-group">
                        <img src="<?php echo base_url() ?>uploads/product/<?= $row->images; ?>" width="100" height="100">
                    </div>
                  <?php  
                  }
                 } ?>   
                <input type="file" name="images" id="first-name" class="form-control col-md-7 col-xs-12">
                <small>(Biarkan Kosong jika tidak <?=$page == 'edit' ? 'diganti' : 'ada'?>) </small>
                </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a href="<?php echo base_url('item') ?>" class="btn btn-primary" >Back</a>
                <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" name="<?=$page?>" class="btn btn-success">Submit</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
        </div>
    </div>
</div>


