<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
            <h2>Barcode Generator <i class="fa fa-barcode"></i></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                    <a href=<?=site_url('item') ?> class="btn btn-primary btn-sm" >
                        <i class="fa fa-arrow-left"></i> Back
                    </a> 
                </ul>
            <div class="clearfix"></div>
        </div>
            <div class="x_content">
            <?php
                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '" style="width:200px">';
            ?>    
            <br>
            <?= $row->barcode ?>
            <br><br>
            <a href="<?php echo base_url('item/barcode_print/'.$row->item_id) ?>" target="_blank" class="btn btn-default btn-xs"> <i class="fa fa-barcode"> </i> Print</a>
            </div>
        </div>   
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
            <h2>Qrcode Generator <i class="fa fa-qrcode"></i></h2>
            <div class="clearfix"></div>
        </div>
            <div class="x_content">
            <?php
                $qrCode = new Endroid\QrCode\QrCode($row->barcode);
                $qrCode->writeFile('uploads/qr-code/item-'.$row->barcode.'.png');
            ?>
            <img src="<?php echo base_url('uploads/qr-code/item-'.$row->barcode.'.png') ?>" style="width:200px">
            <br>
            <?= $row->barcode ?>
            <br><br>
            <a href="<?php echo base_url('item/qrcode_print/'.$row->item_id) ?>" target="_blank" class="btn btn-default btn-xs"> <i class="fa fa-qrcode"> </i> Print</a>
            </div>
        </div>   
    </div>
</div>


