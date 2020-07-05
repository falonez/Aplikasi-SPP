<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>css/my.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Icon Favicomatic -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= base_url('assets/img/favicomatic/') ?>apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/img/favicomatic/') ?>apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/img/favicomatic/') ?>apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/img/favicomatic/') ?>apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= base_url('assets/img/favicomatic/') ?>apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= base_url('assets/img/favicomatic/') ?>apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= base_url('assets/img/favicomatic/') ?>apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= base_url('assets/img/favicomatic/') ?>apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicomatic/') ?>favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicomatic/') ?>favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicomatic/') ?>favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicomatic/') ?>favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicomatic/') ?>favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />

</head>
<body>
<div class="login">
    <div class="card mb-5">
  <div class="card-header bg-primary  text-white">
    Welcome To Aplikasi Spp
  </div>
  <div class="card-body" style="background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
    background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
    background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );">


	<h1 style="font-size: 30px;">Login</h1>
	<?php echo $this->session->flashdata('message'); ?>
    <form method="post" action="<?= base_url('c_login'); ?>">
    	<?= form_error('username','<small class="text-danger pb-3" style="">','</small>'); ?>
        <input class="inputku" type="text" autocomplete="off" name="username" placeholder="Username" value="<?= set_value('username'); ?>" />
        <?= form_error('password','<small class="text-danger pb-3">','</small>'); ?>
        <input class="inputku" type="password" autocomplete="off" name="password" placeholder="Password" />
        <button type="submit" class="btn btn-primary btn-block btn-large">login</button>
    </form>


</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/'); ?>dist/js/bootstrap.min.js"></script>
    


    <script src="<?= base_url('assets/'); ?>js/chart.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/chart-data.js"></script>
    <script src="<?= base_url('assets/'); ?>js/easypiechart.js"></script>
    <script src="<?= base_url('assets/'); ?>js/easypiechart-data.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.js"></script>
    <script src="<?= base_url('assets/'); ?>js/custom.js"></script>
    <script>
        var startCharts = function () {
                    var chart1 = document.getElementById("line-chart").getContext("2d");
                    window.myLine = new Chart(chart1).Line(lineChartData, {
                    responsive: true,
                    scaleLineColor: "rgba(0,0,0,.2)",
                    scaleGridLineColor: "rgba(0,0,0,.05)",
                    scaleFontColor: "#c5c7cc "
                    });
                }; 
            window.setTimeout(startCharts(), 1000);
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
</body>
</html>