<?php if($this->session->has_userdata('succes')) { ?>
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
            <?= $this->session->flashdata('succes'); ?>
</div>
<?php } elseif ($this->session->has_userdata('delete')) { ?>
    <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <?= $this->session->flashdata('delete'); ?>
    </div>
<?php } ?> 