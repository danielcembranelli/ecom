<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Grupo Osper</title>
<?php include("includes/header.html"); ?>
</head>

<body>
<?php include("includes/topo.html"); ?>
<div id="content_wrapper_home">
  <div id="content"> 
  	<!-- MENU LATERAL -->
        <?php include("includes/menu-lateral_2.html"); ?>
    <!-- -->
    <!-- LEFT -->
    <div id="left">
      <h1>Localização</h1>
      <p>Av. Presidente Vargas, 1.145 - Senador Valadares - Pará de Minas - MG | CEP: 35661-000</p>
<!--<iframe id="mapa" width="650" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Avenida+Pres.+Vargas,+1.145+%E2%80%93+Par%C3%A1+de+Minas&amp;aq=&amp;sll=-14.239424,-53.186502&amp;sspn=60.763643,82.177734&amp;vpsrc=6&amp;ie=UTF8&amp;hq=&amp;hnear=Av.+Pres.+Vargas,+1145+-+Par%C3%A1+de+Minas+-+Minas+Gerais,+35661-000&amp;t=m&amp;ll=-19.85222,-44.589214&amp;spn=0.032292,0.055704&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>-->
<? include('maps.php');?>
    </div>
    <!-- --> 
    <div class="clear"></div>
  </div>
</div>
</div>
<?php include("includes/rodape.html"); ?>
</body>
</html>
