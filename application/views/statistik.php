<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/modules/series-label.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/modules/export-data.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/modules/acsessibility.js"></script>

    <title>Data corona</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-yellow bg-yellow">
	  <a class="navbar-brand" href="<?php echo base_url() ?>">Home</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
	      <a class="nav-item nav-link" href="<?php echo base_url('login') ?>">Dashboard</a>
	    </div>
	  </div>
	</nav>
    <div class="container mt-3">
    	<h1 class="text-center">Data terkini corona jepara</h1>
    	<div id="container"></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript">
    Highcharts.chart('container', {
    title: {
    text: '',
    y: 10
    },
    chart: {
    type: 'column'
    },
    tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
    '<td style="padding:0"><b>{point.y:1f} Jiwa</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
    },
    yAxis: {
    title: {
    text: 'Jumlah'
    }
    },
    xAxis: {
    categories: [
    <?php
    foreach ($chart as $column => $c) {
    echo strtoupper("'$c->kecamatan', ");
    }
    ?>
    ]
    },
    legend: {
    align: 'center',
    verticalAlign: 'top',
    floating: true,
    x: 0,
    y: 20
    },
    plotOptions: {
    series: {
    label: {
    connectorAllowed: false
    },
    }
    },
    series: [{
    name: 'Pelaku Perjalanan',
    data: [
    <?php
    foreach ($chart as $column => $c) {
    echo $c->pp.', ';
    }
    ?>
    ]
    }, {
    name: 'Positif',
    data: [
    <?php
    foreach ($chart as $column => $c) {
    echo $c->positif.', ';
    }
    ?>
    ]
    }, {
    name: 'ODP',
    data: [
    <?php
    foreach ($chart as $column => $c) {
    echo $c->odp.', ';
    }
    ?>
    ]
    }, {
    name: 'OTG',
    data: [
    <?php
    foreach ($chart as $column => $c) {
    echo $c->otg.', ';
    }
    ?>
    ]
    }, {
    name: 'PDP',
    data: [
    <?php
    foreach ($chart as $column => $c) {
    echo $c->pdp.', ';
    }
    ?>
    ]
    }],
    responsive: {
    rules: [{
    condition: {
    maxWidth: 500
    },
    chartOptions: {
    legend: {
    layout: 'horizontal',
    align: 'center',
    verticalAlign: 'bottom'
    }
    }
    }]
    }
    });
  </script>
  </body>
</html>