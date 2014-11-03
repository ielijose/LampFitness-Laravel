@extends('layouts.master')

@section('css')
<!--data-table css-->
<link href="plugins/data-tables/DT_bootstrap.css" rel="stylesheet">
<link href="plugins/advanced-datatable/css/demo_table.css" rel="stylesheet">
<link href="plugins/advanced-datatable/css/demo_page.css" rel="stylesheet">

@section('container')

<!--margin-container start-->
<div class="margin-container"> 
	<!--scrollable wrapper start-->
	<div class="scrollable wrapper"> 
		<!--row start-->
		<div class="row"> 
			<!--col-md-12 start-->
			<div class="col-md-12">
				<div class="page-heading">
					<h1>Clientes <small> </small> 				<div class="pull-right"> <a class="btn btn-success" href="/clientes/imprimir"> Imprimir </a></div>
</h1>

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
						<table  class="display table table-bordered table-striped" id="dynamic-table">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Ingreso</th>
									<th>Plan</th>
									<th class="center">Status</th>
									<th class="center">Corte</th>
									<th class="center">Acciones</th>
								</tr>
							</thead>
							<tbody>
								@if(count($clientes) > 0)
								@foreach($clientes as $cliente)
								<tr class="gradeA">
									<td> {{ $cliente->Name }} </td>
									<td> {{ $cliente->getInicio() }} ( {{ $cliente->getAntiguedad() }} días ) </td>								
									
									<td class="center"> 
										@if(isset($cliente->plan->id)) 
											{{ $cliente->plan->plan() }} 
										@endif 
									</td>
									<td class="center"> {{ $cliente->status() }} </td>

									@if(isset($cliente->plan->id) && $cliente->plan->id == 5) 
										<td> No vence </td>
									@else
										<td> {{ $cliente->getCorte() }} ( {{ $cliente->getRestante() }} días ) </td>
									@endif


									<td class="center"> 
										<a class="btn btn-success " href="/cliente/{{ $cliente->Userid }}"><i class="fa fa-eye"></i> Ver</a>
										{{-- 
										<a class="btn btn-info " href="/facturar/{{ $cliente->Userid }}"><i class="fa fa-credit-card"></i> Facturar</a>
										--}}
									</td>

								</tr>
								@endforeach
								@endif
								
							</tbody>
							<tfoot>
								<tr>
									<th>Nombre</th>
									<th>Ingreso</th>
									<th>Plan</th>
									<th class="center">Status</th>
									<th class="center">Corte</th>
									<th class="center">Acciones</th>
								</tr>
							</tfoot>
						</table>
					</div><!--adv-table end-->
				</div><!--box-info end-->
			</div><!--col-md-12 end-->


		</div>


	</div>
	<!--scrollable wrapper end--> 
</div>
<!--margin-container end--> 

@stop

@section('js')

<script src="plugins/data-tables/DT_bootstrap.js"></script> 
<script src="plugins/data-tables/jquery.dataTables.js"></script> 
<script src="plugins/data-tables/dynamic_table_init.js"></script>

@stop