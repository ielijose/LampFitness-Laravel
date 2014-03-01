@extends('layouts.master')

@section('container')

<!--margin-container start-->
<div class="margin-container"> 
	<!--scrollable wrapper start-->
	<div class="scrollable wrapper"> 
		<!--row start-->
		<div class="row">
			<div class="col-md-12">
				<div class="page-heading">
					<h1>
						Perfil del Cliente
					</h1>

				</div>
			</div>
		</div>

		<div class="row">
			<div class="profile-nav col-lg-3">
				<div class="panel">
					<div class="user-heading">
						<a href="#">
							<img src="/images/avatar1.jpg" alt=""> 
						</a>
						<h1> {{ $cliente->Name }} </h1>
						<p>{{ $cliente->IDCard }}</p>
						<hr/>
						@if(isset($cliente->plan->id))
						<h2>{{ $cliente->plan->plan() }}</h2>
						<hr/>
						@endif
						<h2>{{ $cliente->status() }}</h2>
						@if(Auth::user()->admin)
						<hr/>						
						<h2>
							<a class="label label-success" id="facturar" href="javascript:void(0)"><i class="fa fa-credit-card"></i> Facturar </a>
						</h2>
						@endif
					</a>
				</div>

			</div>
		</div>
		<div class="profile-info col-lg-9">
			<div class="panel">
					<!-- <div class="bio-graph-heading">
						Lobortis orci ac, consequat erat. Ut feugiat, quam id tempus tempor, nunc est malesuada libero. 
					</div> -->
					<div class="panel-body bio-graph-info">
						<h1>Datos Personales</h1>
						<div class="row">
							<div class="bio-row">
								<p><span>ID </span>: {{ $cliente->Userid }}</p>
							</div>
							<div class="bio-row">
								<p><span>Sexo </span>: {{ $cliente->Sex }}</p>
							</div>
							<div class="bio-row">
								<p><span>Nacionalidad </span>: {{ $cliente->Nation }}</p>
							</div>
							<div class="bio-row">
								<p><span>Cumpleaños</span>: {{ $cliente->getToday() }} {{ $cliente->getCumple() }}  ({{ $cliente->getEdad() }} años)</p>
							</div>
							<div class="bio-row">
								<p><span>Teléfonos: </span>: {{ $cliente->Telephone }} / {{ $cliente->Mobile }}</p>
							</div>
							<div class="bio-row">
								<p><span>Ocupación </span>: {{ $cliente->Educated }}</p>
							</div>
							<div class="bio-row">
								<p><span>Nacimiento </span>: {{ $cliente->NativePlace }}</p>
							</div>
							<div class="bio-row">
								<p><span>Dirección </span>: {{ $cliente->Address }}</p>
							</div>
						</div>
					</div>
				</div>
				<div id="fechas" >
					<div class="row">
						<div class="col-lg-12">
							<div class="panel">
								<div class="panel-body">
									<div class="bio-chart">
										<input type="text" class="dial" value="{{ $cliente->getAntiguedad() }}" data-angleoffset="-125" data-max="{{ $cliente->getIntervalo() }}" data-anglearc="250" data-width="150" data-fgcolor="#e74949" data-thickness=".15" />
									</div>
									<div class="bio-desk">
										<h4 class="red">En LampFitness</h4>
										<p>
											Desde : {{ $cliente->getInicio() }}
											( {{ $cliente->getAntiguedad() }} días )
										</p>
										<p>
											Corte : {{ $cliente->getCorte() }} 
											@if($cliente->getRestante() == 0)
												( Hoy )
											@else
												( {{ $cliente->getRestante() }} días )
											@endif

										</p>
									</div>
								</div>
							</div>
						</div>												
					</div>
				</div>
				@if(Auth::user()->admin)
				<div id="factura-box" style="display:none;">
					<div class="row">
						<div class="col-md-12"> 
							<!--box-info start-->
							<div class="box-info">
								<h3>Factura</h3>
								<hr>
								<!--form-horizontal row-border start-->
								<form action="/facturar" method="POST" class="form-horizontal row-border">

									<!--form-group start-->
									<div class="form-group">
										<label class="col-sm-3 control-label">Tipo de pago:</label>
										<div class="col-sm-9">
											<select name="pago" id="">
												<option value="Efectivo">Efectivo</option>
												<option value="Cheque">Cheque</option>
												<option value="Transferencia">Transferencia</option>
												<option value="Debito">Debito</option>
												<option value="Credito">Credito</option>
											</select>
										</div>
									</div>
									<!--form-group end--> 
									<!--form-group start-->
									<div class="form-group">
										<label class="col-sm-3 control-label">N° Documento:</label>
										<div class="col-sm-9">
											<input type="text" name="documento" class="form-control">
										</div>
									</div>
									<!--form-group end--> 								

									<!--form-group start-->
									<div class="form-group">
										<label class="col-sm-3 control-label">Descripción:</label>
										<div class="col-sm-9">
											<textarea name="descripcion" class="form-control" autofocus="autofocus" placeholder="Pago de mensualidad."></textarea>
										</div>
									</div>
									<!--form-group end-->

									<!--form-group start-->
									<div class="form-group">
										<label class="col-sm-3 control-label">Plan:</label>
										<div class="col-sm-3">
											<select name="plan" id="planes">
												<?php $pagar = 0; ?>
												@foreach($planes as $plan)
												<option value="{{ $plan->id }}"  
													data-mensualidad="{{ $plan->mensualidad }}"
													data-inscripcion="{{ $plan->inscripcion }}"
													@if($plan->id == $cliente->Duty) 
													selected="selected" 
													<?php $pagar = $plan->mensualidad; ?>  
													@endif
													>  {{ $plan->nombre }} </option>
													@endforeach
												</select>
											</div>

											<div class="col-sm-2">
												<div class="input-group"> <span class="input-group-addon">
													<input type="checkbox" name="inscripcion" value="1" id="inscripcion">
												</span>
												<input type="text" class="form-control" value="Inscripción" disabled="disabled">
											</div>
										</div>
									</div>
									<!--form-group end--> 

									<div class="form-group">
										<label class="col-sm-3 control-label">Total a pagar:</label>
										<div class="col-sm-9">
											<input type="text" name="total" id="total-pagar" class="form-control" readonly="" value="{{ $pagar }}">
										</div>
									</div>


								
								<!--form-horizontal row-border end--> 
								<!--row start-->
								<div class="row">
									<div class="col-sm-9 col-sm-offset-3">
										<div class="btn-toolbar">
											<button type="submit" class="btn-primary btn">Generar Factura</button>
										</div>
									</div>
								</div>
								{{ Form::hidden('id', $cliente->Userid) }}
								</form>
								<!--row end--> 
							</div>
							<!--box-info end--> 
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>

		@if(count($pagos) > 0)
		<div class="row">

			<!--col-md-6 start-->
			<div class="col-md-12">
				<div class="box-info">
					<h4>Pagos</h4>
					<div style="overflow-x:auto" class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th width="16%">Descripcion</th>
									<th width="16%">Monto</th>
									<th width="16%">Fecha</th>
									<th width="16%">Modo</th>
									<th width="16%">NDocumento</th>
									<th width="16%">Plan</th>
									<th width="16%">Ver Recibo</th>
								</tr>
							</thead>
							<tbody class="selects">
								@foreach($pagos as $pago)
								<tr>
									<td>{{ $pago->Descripcion }}</td>	                        
									<td>{{ $pago->Monto }}</td>
									<td>{{ $pago->getFecha() }}</td>
									<td>{{ $pago->Modo }}</td>
									<td>{{ $pago->NDocumento }}</td>
									<td>{{ $pago->Plan }}</td>
									<td> <a href="/factura/{{$pago->Id}}" target="_blank" class="btn btn-success"> Recibo </a> </td>
								</tr>
								@endforeach                   
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--col-md-6 end--> 
		</div>
		@endif

	</div>
	<!--scrollable wrapper end--> 
</div>
<!--margin-container end--> 

@stop

@section('js')
{{ HTML::script('js/sliders.js" type="text/javascript') }}
{{ HTML::script('plugins/knob/jquery.knob.min.js') }}
{{ HTML::script('plugins/demo-slider/demo-slider.js') }}

<script>

$(document).on("ready", function(){
	$("#facturar").on("click", function(){
		$('#fechas').slideUp('slow');
		$("#factura-box").slideDown('slow');
	});

	
	$("#inscripcion").on("click", function(){
		var pagar = $("#total-pagar").val();
		var selected = $("#planes").find('option:selected');
		var extra = selected.data('inscripcion');
		if($(this).is(":checked")){
			$("#total-pagar").val((pagar*1) + (extra*1));	       	
		}else{
			$("#total-pagar").val((pagar*1) - (extra*1));
		}       	
	});

	$("#planes").on("change", function(){
		var selected = $("#planes").find('option:selected');
		var men = selected.data('mensualidad');		
		var ins = selected.data('inscripcion');

		if($("#inscripcion").is(":checked")){
			$("#total-pagar").val((men*1) + (ins*1));	       	
		}else{
			$("#total-pagar").val((men*1));
		}   
	})
});

</script>


@stop