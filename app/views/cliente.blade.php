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
					<h1>Perfil del Cliente</h1>
				</div>
			</div>
		</div>





		<div class="row">
			<div class="profile-nav col-lg-3">
				<div class="panel">
					<div class="user-heading round">
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
				<div>
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
			</div>
		</div>


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
								</tr>
							</thead>
							<tbody class="selects">
								@foreach($pagos as $pago)
								<tr>
									<td>{{ $pago->Descripcion }}</td>	                        
									<td>{{ $pago->Monto }}</td>
									<td>{{ $pago->Fecha }}</td>
									<td>{{ $pago->Modo }}</td>
									<td>{{ $pago->NDocumento }}</td>
									<td>{{ $pago->Plan }}</td>
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
{{ HTML::script('js/sliders.js" type="text/javascript') }}
{{ HTML::script('plugins/knob/jquery.knob.min.js') }}
{{ HTML::script('plugins/demo-slider/demo-slider.js') }}
@stop