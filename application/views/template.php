<!DOCTYPE html>
<html lang="en">
    <head>
      <!-- top navigation -->
<?php $this->load->view('_partials/header') ?>
      <!-- /top navigation -->
    </head>

    <body class="nav-md">
      <div class="container body">
        <div class="main_container"> 
          <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
              <div class="navbar nav_title" style="border: 0;">
                <a href="javascript:;" class="site_title"><i class="fa fa-institution"></i> <span><?php echo $this->fungsi->user_login()->level == 1 ? 'Admin' : 'Kasir'  ?></span> POS</a>
              </div>

              <div class="clearfix"></div>

              <!-- menu profile quick info -->
              <div class="profile clearfix">
                <div class="profile_pic">
                  <img src="<?php echo base_url() ?>assets/images/<?= $this->fungsi->user_login()->foto ?>" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2><?= $this->fungsi->user_login()->name ?></h2>
                  <?php
                  date_default_timezone_set('Asia/Jakarta');//Menyesuaikan waktu dengan tempat kita tinggal
                  echo $timestamp = date('H:i:s');//Menampilkan Jam Sekarang
                  ?>
                </div>
              </div>
              <!-- /menu profile quick info -->
                
              <br />
                
              <!-- sidebar menu -->
              <?php $this->load->view('_partials/side_bar') ?> <!-- /sidebar menu -->
              </div>
          </div>
              <!-- /side menu -->
              <!-- top navigation -->
              <?php $this->load->view('_partials/top_navigation') ?>
              <!-- /top navigation -->
              <!-- Flash Data -->
              <?php if($this->session->flashdata('flash')) { ?>
                <div class="flash-data" data-flashdatasucces="<?= $this->session->flashdata('flash'); ?>"></div>
              <?php }elseif ($this->session->flashdata('flash-info')) { ?>
                  <div class="flash-data" data-flashdatainfo="<?= $this->session->flashdata('flash-info'); ?>"></div>
              <?php }elseif ($this->session->flashdata('flash-delete')) { ?>
                  <div class="flash-data" data-flashdatadelete="<?= $this->session->flashdata('flash-delete'); ?>"></div>
              <?php }elseif ($this->session->flashdata('flash-error')) { ?>
                  <div class="flash-data" data-flashdataerror="<?= strip_tags(str_replace('</p>', '', $this->session->flashdata('flash-error'))); ?>"></div>
              <?php } ?>
              <!-- page content -->
              <div class="right_col" role="main">
                <div class="">
                  <div class="page-title">
                    <div class="title_left mb-2 w-100">
                      <h3>
                          <?php echo $judul; ?>
                          <small><?php echo $sub_judul; ?></small> 
                      </h3>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <?php echo $contents; ?>
                  <br />
                </div>
              </div>
              <!-- /page content -->
            <!-- footer content -->
            <?php $this->load->view('_partials/footer') ?>
              <!-- /footer content -->
          </div>
      </div>
  <!-- javascript -->
  <?php $this->load->view('_partials/javascript') ?>
  <!-- /javascript -->
  </body>
  </html>

