<?php

date_default_timezone_set('America/Mexico_City');

$meses = array(1=>'Enero',2=>'Febrero',3=>'Marzo',4=>'Abril',5=>'Mayo',6=>'Junio',7=>'Julio',8=>'Agosto',9=>'Septiembre',10=>'Octubre',11=>'Noviembre',12=>'Diciembre');

$dias = array(0=>'Domingo',1=>'Lunes',2=>'Martes',3=>'Miercoles',4=>'Jueves',5=>'Viernes',6=>'Sabado');

$anio_actual = date("Y");
$mes_actual = date("n");
$dia_actual = date("d");
$mk_actual = mktime(0,0,0,$mes_actual,$dia_actual,$anio_actual);

$anio = (array_key_exists('anio',$_GET))? $_GET['anio'] : date("Y");
$mes = (array_key_exists('mes',$_GET))? $_GET['mes'] : date("n");
$dia = date("d");

$mk = mktime(0,0,0,$mes,$dia,$anio);
$mk_ini = mktime(0,0,0,$mes,1,$anio);

$dias_mes = date("t",$mk);
$dia_semana = date("w",$mk);
$dia_semana_ini = date("w",$mk_ini);

$calendar = array(
	'anio_actual' => $anio_actual,
	'mes_actual' => $mes_actual,
	'dia_actual' => $dia_actual,
	'mk_actual' => $mk_actual,
	'anio' => $anio,
	'mes' => $mes,
	'dia' => $dia,
	'mk' => $mk,
	'mk_ini' => $mk_ini,
	'dias_mes' => $dias_mes,
	'dia_semana' => $dia_semana,
	'dia_semana_ini' => $dia_semana_ini,
	'meses' => $meses,
	'dias' => $dias
);

?>

<table id="calendario" cellpadding="0px">
	<tr class="weak_days">
		<?php
		for($d=0;$d<=6;$d++){
			echo '<td>'.$calendar['dias'][$d].'</td>';
		}
		?>
	</tr>
	<?php
	$n = 0;
	for($i=1;$i<=$calendar['dias_mes'];$i++){
		if($n == 0){echo '<tr>';}
		$n++;

		if($i == 1 && $calendar['dia_semana_ini'] > 0){
			for($a=1;$a<=$calendar['dia_semana_ini'];$a++){
				echo '<td></td>';
				$n++;
			}
		}

		$mk_now = mktime(0,0,0,$calendar['mes'],$i,$calendar['anio']);
		
		$weakend = '';
		$weakend .= ($n == 1)? 'sunday' : ''; 
		$weakend .= ($n == 7)? 'saturday' : '';

		$actual_day = ($mk_now == $calendar['mk_actual'])? 'actual_day' : '';

		echo '<td class="day '.$actual_day.' '.$weakend.'">'.$i.'</td>';

		if($n == 7){echo '</tr>';$n = 0;}
	}
	?>
</table>