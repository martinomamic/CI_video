<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
              rel="stylesheet">
        <link href="<?php echo base_url() ?>css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>css/pages/dashboard.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url() ?>js/jwplayer/jwplayer.js"></script>
    </head>
    <body>           
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                            class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="player">Abridged</a>
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                                <ul class="dropdown-menu">                
                                    <?php if (!$this->session->userdata('logged_in')) : ?>        
                                        <li><a href="<?php echo site_url("login/login"); ?>">Login</a></li>
                                        <li><a href="<?php echo site_url("login/register"); ?>">Register</a></li>              
                                    <?php else : ?>
                                        <li><a href="<?php echo site_url("login/logout"); ?>">Logout</a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>         
                        </ul>
                        <?php 
                        /*$form=array('class'=>'navbar-search pull-right');
                        echo form_open('search/index',$form);
                        $search = array('class'=>'search_query');
                        echo form_input('search', set_value('search'), $search);
                        echo form_submit('search', 'Go');
                        form_close();*/
                        ?>
                        <!--<form class="navbar-search pull-right" action="home/search_result">
                            <input type="text" class="search-query" placeholder="Search">
                        </form>-->
                    </div>
                    <!--/.nav-collapse --> 
                </div>
                <!-- /container --> 
            </div>
            <!-- /navbar-inner --> 
        </div>
        <!-- /navbar -->
        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <ul class="mainnav">
                        <li><a href="<?php echo site_url("home/player"); ?>"></i><span>Dashboard</span></a></li>
                        <li><a href="<?php echo site_url("home/dbz"); ?>"></i><span>Dragon Ball Z</span></a></li>
                        <li><a href="<?php echo site_url("home/yugioh"); ?>"></i><span>Yugioh</span></a></li>
                        <li><a href="<?php echo site_url("home/naruto"); ?>"></i><span>Naruto</span></a></li>
                        <li><a href="<?php echo site_url("table"); ?>"><span>Table</span> </a></li>
<?php if ($this->session->userdata('logged_in') && $this->session->userdata('role') != '0') : ?>
                            <li><a href="<?php echo site_url("user"); ?>"><span>Users</span> </a> </li>
                            <li><a href="<?php echo site_url("video"); ?>"><span>Videos</span></a></li>
                            <li><a href="<?php echo site_url("category"); ?>"><span>Categories</span></a></li>
                            

<?php endif; ?>
                    </ul>
                </div>
                <!-- /container --> 
            </div>
            <!-- /subnavbar-inner --> 
        </div>
        <!-- /subnavbar -->
        <div class="main">
            <div class="main-inner">
                <div class="container">
                    <div class="row">
<?php echo $body; ?>
                    </div>
                    <!-- /row --> 
                </div>
                <!-- /container --> 
            </div>
            <!-- /main-inner --> 
        </div>
        <div class="footer">
            <div class="footer-inner">
                <div class="container">
                    <div class="row">
                        <div class="span12"> &copy; 2013 <a href="http://www.egrappler.com/">Bootstrap Responsive Admin Template</a>. </div>
                        <!-- /span12 --> 
                    </div>
                    <!-- /row --> 
                </div>
                <!-- /container --> 
            </div>
            <!-- /footer-inner --> 
        </div>
        <!-- /footer --> 
        <!-- Le javascript
        ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <script src="<?php echo base_url() ?>js/jquery-1.7.2.min.js"></script> 
        <script src="<?php echo base_url() ?>js/excanvas.min.js"></script> 
        <script src="<?php echo base_url() ?>js/chart.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url() ?>js/bootstrap.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url() ?>js/full-calendar/fullcalendar.min.js"></script>

        <script src="<?php echo base_url() ?>js/base.js"></script> 

    </body>
</html>