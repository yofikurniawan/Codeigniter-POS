<div class="clearfix"></div>
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
          <div class="x_title">
          <h2><?= ucfirst($page) ?> Data Customer</h2>
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

        <form action="<?= site_url('customer/process') ?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required text-danger">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="hidden" name="id" value="<?= $row->customer_id?>">
                  <input type="text" name="name" value="<?= $row->name ?>" required="" id="first-name" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gender 
                <span class="required text-danger">*</span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="gender" class="form-control" required> 
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" <?= $row->gender == 'L' ? 'selected' : null  ?>>Laki-Laki</option>
                    <option value="P" <?= $row->gender == 'P' ? 'selected' : null  ?>>Perempuan</option>
                    </select>
                  </div>  
              </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomor Handphone 
              <span class="required text-danger">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="number" name="phone" value="<?= $row->phone ?>" required="" id="first-name" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat <span class="required text-danger">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control" name="addres" rows="3"><?= $row->addres ?></textarea>
                </div>
              </div>

            <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href=<?=site_url('pelanggan') ?> class="btn btn-primary btn-sm" ><i class="fa fa-backward"></i> Back</button> </a>
                  <button type="submit" name="<?=$page?>" class="btn btn-success btn-sm"> <i class="fa fa-paper-plane"></i> Submit</button>
              </div>
            </div>
            
        </form>
      </div>
    </div>
  </div>
</div>


