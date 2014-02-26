<!DOCTYPE html>
<html>
  <head>
    <title>LampFitness</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
    	body{
    		font-family: sans-serif;
    	}
    </style>
   
  </head>
<body>

<!--margin-container start-->
<div class="margin-container"> 
	<!--scrollable wrapper start-->
	<div class="scrollable wrapper"> 
		<!--row start-->
		<div class="row"> 
			<!--col-md-12 start-->
			<div class="col-md-12">
				<div class="page-heading">
					<h1>Clientes <small> </small></h1>
				</div>
			</div>
			<!--col-md-12 end-->

			<!--col-md-12 start-->
			<div class="col-md-12">
				<!--box-info start-->
				<div class="box-info">
					<h4>Listado de clientes</h4>
					<hr>
					<!--adv-table start-->
					<div class="adv-table">
						<table  class="display table table-bordered table-striped" id="dynamic-table" border="1">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nombre</th>
									<th>Ingreso</th>
									<th>Plan</th>
									<th class="center">Status</th>
									<th>Corte</th>
								</tr>
							</thead>
							<tbody>
								@if(count($clientes) > 0)
								@foreach($clientes as $cliente)
								<tr class="gradeA">
									<td>{{ $cliente->Userid }}</td>
									<td> {{ $cliente->Name }} </td>
									<td> {{ $cliente->getInicio() }} ( {{ $cliente->getAntiguedad() }} días ) </td>
									<td> {{ $cliente->plan() }} </td>
									<td class="center"> {{ $cliente->status() }} </td>
									<td> {{ $cliente->getCorte() }} ( {{ $cliente->getRestante() }} días ) </td>								

								</tr>
								@endforeach
								@endif
								
							</tbody>							
						</table>
					</div><!--adv-table end-->
				</div><!--box-info end-->
			</div><!--col-md-12 end-->


		</div>


	</div>
	<!--scrollable wrapper end--> 
</div>
<!--margin-container end--> 
</body>
</html>