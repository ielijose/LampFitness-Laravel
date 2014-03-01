<!doctype html>
<html dir="ltr" lang="es" class="no-js">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width" />

<title>Lamp Fitness</title>

<link rel="stylesheet" href="/invoice/reset.css" media="all" />
<link rel="stylesheet" href="/invoice/style.css" media="all" />

<!-- give life to HTML5 objects in IE -->
<!--[if lte IE 8]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<!-- js HTML class -->
<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>

</head>
<body>
<!-- begin markup -->



<div id="invoice" class="new">

	<header id="header">
		<div class="invoice-intro">
			<h1 style="display:inline-block">Lamp Fitness </h1> <small>Spa Club</small>
			<p>Sector "Pele el Ojo", Calle Carabobo.</p>
		</div>

		<dl class="invoice-meta">
			<dt class="invoice-number">Recibo #</dt>
			<dd> {{ $pago->Id }} </dd>
			<dt class="invoice-date">Fecha</dt>
			<dd>{{ $pago->getFecha() }}</dd>
		</dl>
	</header>
	<!-- e: invoice header -->

	<div class="this-is">
		<strong>Recibo de Pago</strong>
	</div><!-- invoice headline -->

	<br>
	<section id="parties">

		<div class="invoice-to">
			<h2>Cliente:</h2>
			<div id="hcard-Hiram-Roth" class="vcard">
				<a class="url fn" href="#"> {{ $cliente->Name }} </a>
				<div class="org">{{ $cliente->IDCard }}</div>
				
				<div class="adr">
					<div class="street-address">{{ $cliente->Address }}</div>
				</div>

				<div class="tel">{{ $cliente->Mobile }}</div>
			</div><!-- e: vcard -->
		</div><!-- e invoice-to -->


		<div class="invoice-from">
			
		</div><!-- e invoice-from -->


		<div class="invoice-status">
			<h3>Estado de la Factura</h3>
			<strong> <em>PAGADA</em></strong>
		</div><!-- e: invoice-status -->

	</section><!-- e: invoice partis -->


	<section class="invoice-financials">

		<div class="invoice-items">
			<table>
				<caption>Servicios</caption>
				<thead>
					<tr>
						<th>Descripción</th>
						<th>Plan</th>
						<th>Precio</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th> {{ $pago->Descripcion }} </th>
						<td>{{ $pago->Plan }}</td>
						<td>{{ $pago->Monto }}</td>
					</tr>
					
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3"></td>
					</tr>
				</tfoot>
			</table>
		</div><!-- e: invoice items -->


		<div class="invoice-totals">
			<table>
				<caption>Total:</caption>
				<tbody>
					<tr>
						<th></th>
						<td></td>
						<td> Bs. {{ $pago->Monto }}  </td>
					</tr>					
				</tbody>
			</table>

	
		</div><!-- e: invoice totals -->

	</section><!-- e: invoice financials -->


	<footer id="footer">
		<p>
			Este documento no cumple con ningun requisito legal.
		</p>
	</footer>


</div><!-- e: invoice -->


</body>
</html>