<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Free Responsive Admin Theme - ZONTAL</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?= base_url('assets/admin/css/bootstrap.css') ?>" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?= base_url('assets/admin/css/font-awesome.css') ?>" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?= base_url('assets/admin/css/style.css') ?>" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            
        </div>
    </div>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line-purple text-center">Aplikasi Ph Checker</h4>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-purple text-center">
                    Mengecek kadar air kolam renang sangatlah penting untuk menjaga kualitas air kolam agar selalu stabil. Kualitas air yang stabil yaitu jika air memiliki kadah pH yang ideal. Selain itu, kolam juga harus selalu bersih dan juga jernih. \n Ayo cek pH air dengan CEK PH!
                    </div>
                </div>

            </div>
            <div class="row">
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <i  class="fa fa-venus dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            </div>
                           
                        </div>
                         <h5>Simple Text Here </h5>
                    </div>
                </div>

                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <i  class="fa fa-edit dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                            </div>
                           
                        </div>
                         <h5>Simple Text Here </h5>
                    </div>
                </div>

                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-three">
                        <i  class="fa fa-cogs dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            </div>
                           
                        </div>
                         <h5>Simple Text Here </h5>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-four">
                        <i  class="fa fa-bell-o dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                            </div>
                        </div>
                         <h5>Simple Text Here </h5>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Ref. No.</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Delivery On </th>
                            <th># #</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td># 2501</td>
                            <td>01/22/2015 </td>
                            <td>
                                <label class="label label-info">300 USD </label>
                            </td>
                            <td>
                                <label class="label label-success">Delivered</label></td>
                            <td>01/25/2015</td>
                                <td> <a href="#"  class="btn btn-xs btn-danger"  >View</a> </td>
                        </tr>
                        <tr>
                            <td># 15091</td>
                            <td>12/12/2014 </td>
                            <td>
                                <label class="label label-danger">7000 USD </label>
                            </td>
                            <td>
                                <label class="label label-warning">Shipped</label></td>
                            <td>N/A</td>
                                <td> <a href="#"  class="btn btn-xs btn-success"  >View</a> </td>
                        </tr>
                        <tr>
                            <td># 11291</td>
                            <td>12/03/2014 </td>
                            <td>
                                <label class="label label-warning">7000 USD </label>
                            </td>
                            <td>
                                <label class="label label-success">Delivered</label></td>
                            <td>01/23/2015</td>
                                <td> <a href="#"  class="btn btn-xs btn-primary"  >View</a> </td>
                        </tr>
                        <tr>
                            <td># 1808</td>
                            <td>11/10/2014 </td>
                            <td>
                                <label class="label label-success">2000 USD </label>
                            </td>
                            <td>
                                <label class="label label-info">Returned</label></td>
                            <td>N/A</td>
                                <td> <a href="#"  class="btn btn-xs btn-danger"  >View</a> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= site_url('logoutuser') ?>" class="btn btn-purple"> Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="<?= base_url('assets/admin/js/jquery-1.11.1.js') ?>"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?= base_url('assets/admin/js/bootstrap.js') ?>"></script>
</body>
</html>
