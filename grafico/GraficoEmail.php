<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>
		
		
		<!-- 1. Add these JavaScript inclusions in the head of your page -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/highcharts.js"></script>
		
		<!-- 1a) Optional: the exporting module -->
		<script type="text/javascript" src="js/modules/exporting.js"></script>
		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						margin: [50, 200, 60, 170]
					},
					title: {
						text: 'Envio de Emailmarketing'
					},
					plotArea: {
						shadow: null,
						borderWidth: null,
						backgroundColor: null
					},
					tooltip: {
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
						}
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								formatter: function() {
									if (this.y > 5) return this.point.name;
								},
								color: 'white',
								style: {
									font: '13px Trebuchet MS, Verdana, sans-serif'
								}
							}
						}
					},
					legend: {
						layout: 'vertical',
						style: {
							left: 'auto',
							bottom: 'auto',
							right: '50px',
							top: '100px'
						}
					},
				    series: [{
						type: 'pie',
						name: 'Browser share',
						data: [
							['Envio com confirmação',   1.34],
							['Aguardando Entrega',       27.58],
							['Envio sem confirmação',   70.95 ]						]
					}]
				});
			});
				
		</script>
		
	</head>
	<body>
		
		<!-- 3. Add the container -->
		<div id="container" style="width: 800px; height: 400px; margin: 0 auto"></div>
        <center>
        <table width="600" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td align="center">Status</td>
            <td align="center">Qtda.</td>
          </tr>
          <tr>
            <td>  &nbsp;Visualizados</td>
            <td align="center">138</td>
          </tr>
          <tr>
            <td>&nbsp;Erro</td>
            <td align="center">6658</td>
          </tr>
          <tr>
            <td>&nbsp;Entregue sem confirmação</td>
            <td align="center">2588</td>
          </tr>
          <tr>
            <td>Total</td>
            <td align="center">9384</td>
          </tr>
        </table>
    </center>
	</body>
</html>
