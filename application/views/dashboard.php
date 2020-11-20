 <!-- page content -->
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-shopping-cart"></i></div>
        <div class="count green"><?= $this->fungsi->count_item() ?></div>
        <h3>Items</h3>
        <p>Lorem ipsum psdea itgum rixt.</p>
    </div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-truck"></i></div>
        <div class="count "><?= $this->fungsi->count_supplier() ?></div>
        <h3>Supplier</h3>
        <p>Lorem ipsum psdea itgum rixt.</p>
    </div>
</div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-users"></i></div>
        <div class="count green"><?= $this->fungsi->count_customer() ?></div>
        <h3>Customer</h3>
        <p>Lorem ipsum psdea itgum rixt.</p>
    </div>
    </div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-user-plus"></i></div>
        <div class="count "><?= $this->fungsi->count_user() ?></div>
        <h3>Users</h3>
        <p>Lorem ipsum psdea itgum rixt.</p>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="dashboard_graph x_panel">
        <div class="row x_title">
        <div class="col-md-6">
            <h3>Statistic Penjualan <small>Toko Silaberanti</small></h3>
        </div>
        <div class="col-md-6">
            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
            </div>
        </div>
        </div>
        <div class="x_content">
        <div class="demo-container" style="height:250px">
            <div id="chart_plot_03" class="demo-placeholder"></div>
        </div>
        </div>
    </div>
    </div>
</div>
