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
					<h1>Caja <small> </small></h1>
				</div>
			</div>			
		</div>


		<div class="row status status-default">
			<!--col-md-6 start-->
			<div class="col-md-12">
				<div class="box-info">
					<h4>Pagos de hoy</h4>
					<div style="overflow-x:auto" class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th width="35%">Cliente</th>
									<th width="25%">Descripcion</th>
									<th width="25%">Monto</th>
									<th width="15%">Ver Recibo</th>
								</tr>
							</thead>
							<tbody class="selects">
								@foreach($pagos as $pago)
								<tr>
									<td>{{ $pago->cliente->Name }}</td>
									<td>{{ $pago->Descripcion }}</td>
									<?php 
										
									?>
									<td>{{ $pago->Monto }}</td>
									<td class="center"> 
										<a class="btn btn-success " href="/factura/{{ $pago->Id }}" target="_blank"><i class="fa fa-eye"></i> Ver</a>
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