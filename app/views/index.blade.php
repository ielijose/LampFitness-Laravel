@extends('layouts.master')

@section('css')
	<style>
		.title-box{
			cursor: pointer;
		}
	</style>
@stop

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
					<h1>Estadisticas <small> </small></h1>
				</div>
			</div>
			<!--col-md-12 end-->
			<div class="col-sm-6 col-md-3">
				<div class="box-info">
					<div class="title-box" data-id='activos'>
						<h3>Clientes activos</h3>
						<div class="blue-bg">
							<h1> {{ count($estadisticas['activos']) }} </h1>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-3">
				<div class="box-info">
					<div class="title-box" data-id='inactivos'>
						<h3>Clientes inactivos</h3>
						<div class="maroon-bg">
							<h1> {{ count($estadisticas['inactivos']) - count($estadisticas['caducados'])}} </h1>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-3">
				<div class="box-info">
					<div class="title-box" data-id='caducados'>
						<h3>Clientes caducados</h3>
						<div class="red-bg">
							<h1> {{ count($estadisticas['caducados']) }} </h1>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="box-info">
					<div class="title-box" data-id='vencer'>
						<h3>Clientes por vencer</h3>
						<div class="green-bg">
							<h1> {{ count($estadisticas['vencer'])  }} </h1>
						</div>
					</div>
				</div>
			</div>
			
		</div>


		<div class="row status status-default">
			<!--col-md-6 start-->
			<div class="col-md-12">
				<div class="box-info">
					<h4>Proximos cumpleaños</h4>
					<div style="overflow-x:auto" class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th width="35%">Cliente</th>
									<th width="25%">Días</th>
									<th width="25%">Edad</th>
									<th width="15%">Ver mas</th>
								</tr>
							</thead>
							<tbody class="selects">
								@foreach($estadisticas['cumple'] as $cumple)
								<tr>
									<td>{{ $cumple->Name }}</td>
									@if($cumple->dias == 0)
									<td><button class="btn btn-success" data-toggle="button"> <i class="fa fa-gift text-info"></i> Hoy </button></td>
									@elseif($cumple->dias == 1)
									<td>Mañana</td>
									@else
									<td>{{ $cumple->dias }}</td>
									@endif
									<td>{{ $cumple->anos }}</td>
									<td class="center"> 
										<a class="btn btn-success " href="/cliente/{{ $cumple->Userid }}"><i class="fa fa-eye"></i> Ver</a>
									</td>
								</tr>
								@endforeach                   
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--col-md-6 end--> 
		</div>

		<!-- ACTIVOS -->

		<div class="row hide status status-activos">
			<!--col-md-6 start-->
			<div class="col-md-12">
				<div class="box-info">
					<h4>Clientes Activos</h4>
					<div style="overflow-x:auto" class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Ingreso</th>
									<th>Plan</th>
									<th class="center">Status</th>
									<th class="center">Corte</th>
									<th class="center">Acciones</th>
								</tr>
							</thead>
							<tbody class="selects">
								<?php $index = 0; ?>
								@foreach($estadisticas['activos'] as $cliente)
								@if(!$cliente->getCaducado())
								<?php $index++; ?>

								<tr>
									<td>{{ $index }}</td>
									<td> {{ $cliente->Name }} </td>
									<td> {{ $cliente->getInicio() }} ( {{ $cliente->getAntiguedad() }} días ) </td>
									<td class="center"> 
										@if(isset($cliente->plan->id)) 
											{{ $cliente->plan->plan() }} 
										@endif 
									</td>
									<td class="center"> {{ $cliente->status() }} </td>
									<td> {{ $cliente->getCorte() }} ( {{ $cliente->getRestante() }} días ) </td>
									<td class="center"> 
										<a class="btn btn-success " href="/cliente/{{ $cliente->Userid }}"><i class="fa fa-eye"></i> Ver</a>
										{{-- 
										<a class="btn btn-info " href="/facturar/{{ $cliente->Userid }}"><i class="fa fa-credit-card"></i> Facturar</a>
										--}}
									</td>
								</tr>
								@endif
								@endforeach                   
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--col-md-6 end--> 
		</div>

		<!-- INACTIVOS -->

		<div class="row hide status status-inactivos">
			<!--col-md-6 start-->
			<div class="col-md-12">
				<div class="box-info">
					<h4>Clientes Inactivos</h4>
					<div style="overflow-x:auto" class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Ingreso</th>
									<th>Plan</th>
									<th class="center">Status</th>
									<th class="center">Corte</th>
									<th class="center">Acciones</th>
								</tr>
							</thead>
							<tbody class="selects">
								<?php $index = 0; ?>
								@foreach($estadisticas['inactivos'] as $cliente)
								@if(!$cliente->getCaducado())
								<?php $index++; ?>
								<tr>
									<td>{{ $index }}</td>
									<td> {{ $cliente->Name }} </td>
									<td> {{ $cliente->getInicio() }} ( {{ $cliente->getAntiguedad() }} días ) </td>
									<td class="center"> 
										@if(isset($cliente->plan->id)) 
											{{ $cliente->plan->plan() }} 
										@endif 
									</td>
									<td class="center"> {{ $cliente->status() }} </td>
									<td> {{ $cliente->getCorte() }} ( {{ $cliente->getRestante() }} días ) </td>
									<td class="center"> 
										<a class="btn btn-success " href="/cliente/{{ $cliente->Userid }}"><i class="fa fa-eye"></i> Ver</a>
										{{-- 
										<a class="btn btn-info " href="/facturar/{{ $cliente->Userid }}"><i class="fa fa-credit-card"></i> Facturar</a>
										--}}
									</td>
								</tr>
								@endif
								@endforeach                   
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--col-md-6 end--> 
		</div>


		<!-- CADUCADOS -->

		<div class="row hide status status-caducados">
			<!--col-md-6 start-->
			<div class="col-md-12">
				<div class="box-info">
					<h4>Clientes Caducados</h4>
					<div style="overflow-x:auto" class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Ingreso</th>
									<th>Plan</th>
									<th class="center">Status</th>
									<th class="center">Corte</th>
									<th class="center">Acciones</th>
								</tr>
							</thead>
							<tbody class="selects">
								<?php $index = 0; ?>
								@foreach($estadisticas['all'] as $cliente)
								@if($cliente->getCaducado())
								<?php $index++; ?>
								<tr>
									<td>{{ $index }}</td>
									<td> {{ $cliente->Name }} </td>
									<td> {{ $cliente->getInicio() }} ( {{ $cliente->getAntiguedad() }} días ) </td>
									<td class="center"> 
										@if(isset($cliente->plan->id)) 
											{{ $cliente->plan->plan() }} 
										@endif 
									</td>
									<td class="center"> {{ $cliente->status() }} </td>
									<td> {{ $cliente->getCorte() }} ( {{ $cliente->getRestante() }} días ) </td>
									<td class="center"> 
										<a class="btn btn-success " href="/cliente/{{ $cliente->Userid }}"><i class="fa fa-eye"></i> Ver</a>
										{{-- 
										<a class="btn btn-info " href="/facturar/{{ $cliente->Userid }}"><i class="fa fa-credit-card"></i> Facturar</a>
										--}}
									</td>
								</tr>
								@endif
								@endforeach                   
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--col-md-6 end--> 
		</div>

		<!-- PROXIMOS -->

		<div class="row hide status status-vencer">
			<!--col-md-6 start-->
			<div class="col-md-12">
				<div class="box-info">
					<h4>Clientes por Vencer</h4>
					<div style="overflow-x:auto" class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Ingreso</th>
									<th>Plan</th>
									<th class="center">Status</th>
									<th class="center">Corte</th>
									<th class="center">Acciones</th>
								</tr>
							</thead>
							<tbody class="selects">
								<?php $index = 0; ?>
								@foreach($estadisticas['vencer'] as $cliente)
								@if(1)
								<?php $index++; ?>
								<tr>
									<td>{{ $index }}</td>
									<td> {{ $cliente->Name }} </td>
									<td> {{ $cliente->getInicio() }} ( {{ $cliente->getAntiguedad() }} días ) </td>
									<td class="center"> 
										@if(isset($cliente->plan->id)) 
											{{ $cliente->plan->plan() }} 
										@endif 
									</td>
									<td class="center"> {{ $cliente->status() }} </td>
									@if($cliente->getRestante() === '+0')
										<td> {{ $cliente->getCorte() }} ( Hoy ) </td>
									@else
										<td> {{ $cliente->getCorte() }} ( {{ $cliente->getRestante() }} días ) </td>
									@endif
									<td class="center"> 
										<a class="btn btn-success " href="/cliente/{{ $cliente->Userid }}"><i class="fa fa-eye"></i> Ver</a>										
									</td>
								</tr>
								@endif
								@endforeach                   
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--col-md-6 end--> 
		</div>
	</div>
	<!--scrollable wrapper end--> 
</div>
<!--margin-container end--> 

@stop

@section('js')
	
	<script>

		$(document).on('ready', function(){
			var def = $('.status-default');
			$('.title-box').on('click', function(){
				var id = $(this).data('id');

				$('.status').slideUp('slow', function(){
					$('.status-' + id).removeClass('hide').slideDown('slow');
				});

			});
		});

	</script>


@stop