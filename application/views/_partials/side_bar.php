<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <h3>Menu</h3>
                  <ul class="nav side-menu">
                    <li>
                      <a href="<?=site_url('dashboard') ?>"><i class="fa fa-laptop"></i> Dashboard <span class="label label-success pull-right">News</span></a>
                    </li>
                    <li>
                      <a href="<?=site_url('supplier') ?>"><i class="fa fa-cubes"></i> Suppliers</a>
                    </li>
                    <li>
                      <a href="<?=site_url('pelanggan') ?>"><i class="fa fa-group"></i> Customers</a>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Products <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?=site_url('category') ?>">Categories</a></li>
                        <li><a href="<?=site_url('unit') ?>">Unit</a></li>
                        <li><a href="<?=site_url('item') ?>">Item</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> Transaction <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="general_elements.html">Sales</a></li>
                        <li><a href="<?=site_url('stock/in') ?>">Stock in</a></li>
                        <li><a href="<?=site_url('stock/out') ?>">Stock Out</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-bar-chart-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="chartjs.html">Sales</a></li>
                        <li><a href="chartjs2.html">Stock</a></li>
                      </ul>
                    </li>
<?php if($this->fungsi->user_login()-> level == 1 ) { ?>
                    <li><a><i class="fa fa-cogs"></i>Settings <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?= site_url('user') ?>">Users</a></li>
                      </ul>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>