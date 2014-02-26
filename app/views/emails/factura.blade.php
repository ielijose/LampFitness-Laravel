<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
</head>
<body style="font-family: sans-serif; background-color: #353637; margin: 0; color: #ecf0f1;"> 
	<div style="width: 100%; background-color: #f60; padding: 1em; text-align: center; border-bottom: 5px solid #c0392b;">
		<img src="http://eluniversodelsonido.com/logo.jpg" alt="">
	</div>

	<div style="padding: 0 1em;"> 
		<h1>Factura N# {{ $datos['id'] }} </h1>
		<hr>

		<h4>Datos de facturación: </h4>

		<p><strong>Nombre:</strong> {{ $datos['nombre'] }} </p>
		<p><strong>Teléfono:</strong> {{ $datos['telefono'] }} </p>
		<p><strong>Correo:</strong> {{ $datos['correo'] }}</p>
		<p><strong>Dirección:</strong> {{ $datos['direccion'] }} </p>
	
		<hr/>
		<h4>Compra: </h4>

		<table border="0" width="100%" style="border: 1px solid #fff ; text-align: center;">
			<tr>
				<th style="background-color: black;">Producto</th>
				<th style="background-color: black;">Cantidad</th>
				<th style="background-color: black;">Precio</th>
				<th style="background-color: black;">Subtotal</th>
			</tr>
			<?php $total = 0; ?>
			@foreach ($cart as $item)
			<tr>
				<td style="border: 1px solid #fff ;">{{ $item['name'] }}</td>
				<td style="border: 1px solid #fff ;">{{ $item['qty'] }}</td>
				<td style="border: 1px solid #fff ;">{{ $item['price'] }} Bs.</td>
				<td style="border: 1px solid #fff ;">{{ $item['subtotal'] }} Bs.</td>
			</tr>
			<?php $total += $item['qty'] * $item['price']; ?>
			@endforeach

		</table>
		<h4 align="right">Total: {{ $total }} Bs. </h4>
	
		<div align="center">
			<a href="http://joelblackberryzone.com.ve/factura/{{ $datos['slug'] }}" style="font-size: 28px; background-color: #f60; color: #ecf0f1; text-decoration: none; padding: .6em; border-bottom: 5px solid #f50; margin: 0 auto;"> Completar Pago </a>
		</div>
	</div>
	
</body>
</html>