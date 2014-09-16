<?php

/**
 * Calendario PHP/HTML5
 *
 * Calendario muy básico desarrollado sobre PHP y HTML5, que nos muestra el mes
 * actual con la posibilidad de elegir otro.
 *
 * @author		Rubén Martín - www.rubenmartin.me | @hasdpk | skype: hasdpk
 * @copyright	CC BY-SA
 * @version		0.1 first release
 */

// Establecer el idioma al Español para strftime().
setlocale( LC_TIME, 'spanish' );

// Si no se ha seleccionado mes, ponemos el actual y el año
$month = isset( $_GET[ 'month' ] ) ? $_GET[ 'month' ] : date( 'Y-n' );

$week = 1;

for ( $i=1;$i<=date( 't', strtotime( $month ) );$i++ ) {
	
	$day_week = date( 'N', strtotime( $month.'-'.$i )  );
	
	$calendar[ $week ][ $day_week ] = $i;

	if ( $day_week == 7 )
		$week++;
	
}

?>

<!DOCTYPE html>

<html>

	<head>
	
		<title>Calendario PHP/HTML5</title>
		
		<style type="text/css">
		
			table { margin: auto; }
		
		</style>
	
	</head>
	
	<body>

		<table border="1">
		
			<thead>
		
				<tr>
				
					<td colspan="7"><?php echo strftime( '%B %Y', strtotime( $month ) ); ?></td>
				
				</tr>
			
				<tr>
				
					<td>Lunes</td>
					<td>Martes</td>			
					<td>Miércoles</td>			
					<td>Jueves</td>			
					<td>Viernes</td>			
					<td>Sábado</td>			
					<td>Domingo</td>			
				
				</tr>
				
			</thead>
			
			<tbody>
		
				<?php foreach ( $calendar as $days ) : ?>
				
					<tr>
					
						<?php for ( $i=1;$i<=7;$i++ ) : ?>
						
							<td>
							
								<?php echo isset( $days[ $i ] ) ? $days[ $i ] : ''; ?>
							
							</td>
						
						<?php endfor; ?>
					
					</tr>
				
				<?php endforeach; ?>
				
			</tbody>
			
			<tfoot>
			
				<tr>
				
					<td colspan="7">
			
						<form method="get">
						
							<input type="month" name="month">
							<input type="submit">
						
						</form>
						
					</td>
					
				</tr>
				
			</tfoot>
		
		</table>

	</body>
	
</html>