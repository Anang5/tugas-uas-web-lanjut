<!DOCTYPE html>
<html>
<head>
<title>Jepara Tanggap CORONA COVID19</title>
<!-- bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<!-- highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>
<body>
<div class="container-fluid mt-5 mb-5">
<div id="container" class="mb-5"></div>
</div>
<script type="text/javascript">
Highcharts.chart('container', {
title: {
text: 'DATA TERBARU COVID-19 JEPARA RABU, 24 JUNI 2020, 21.00 WIB',
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
foreach ($chart as $corona => $c) {
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
foreach ($chart as $corona => $c) {
echo $c->pp.', ';
}
?>
]
}, {
name: 'Positif',
data: [
<?php
foreach ($chart as $corona => $c) {
echo $c->positif.', ';
}
?>
]
}, {
name: 'ODP',
data: [
<?php
foreach ($chart as $corona => $c) {
echo $c->odp.', ';
}
?>
]
}, {
name: 'PDP',
data: [
<?php
foreach ($chart as $corona => $c) {
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