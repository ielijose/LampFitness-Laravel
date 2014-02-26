@extends('layouts.master')

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
					<h1>Planes <small> </small></h1>
				</div>
			</div>
			<!--col-md-12 end-->			
		</div>

		
		<div class="row">
			<!--col-md-6 start-->
			<div class="col-md-8">
				<div class="box-info">
					<h4>Planes</h4>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Plan</th>
								<th>Inscripción</th>
								<th>Mensualidad</th>
							</tr>
						</thead>
						@if(isset($planes))
						<tbody>
							@foreach($planes as $plan)
							<tr>
								<td> {{ $plan->id }} </td>
								<td>{{ $plan->plan() }}</td>
								<td>{{ $plan->inscripcion }}</td>
								<td>{{ $plan->mensualidad }}</td>
							</tr>	
							@endforeach						
						</tbody>
						@endif
					</table>
				</div>
			</div><!--col-md-6 end-->

			<div class="col-md-4"> 
				<!--box-info start-->
				<div class="box-info">
					<h3>Nuevo Plan</h3>
					<hr>
					<!--form-horizontal row-border start-->
					<form action="/plan" class="form-horizontal row-border" method="post">

						<!--form-group start-->
						<div class="form-group">
							<label class="col-sm-3 control-label">Nombre</label>
							<div class="col-sm-9">
								<input type="text" name="nombre" class="form-control" required="required">
							</div>
						</div>
						<!--form-group end--> 
						<!--form-group start-->
						<div class="form-group">
							<label class="col-sm-3 control-label">Inscripción</label>
							<div class="col-sm-9">
								<input type="text" name="inscripcion" class="form-control" required="required">
							</div>
						</div>
						<!--form-group end--> 
						<!--form-group start-->
						<div class="form-group">
							<label class="col-sm-3 control-label">Mensualidad</label>
							<div class="col-sm-9">
								<input type="text"  name="mensualidad" class="form-control" required="required">
							</div>
						</div>
						<!--form-group end--> 
						

					
					<!--form-horizontal row-border end--> 
					<!--row start-->
					<div class="row">
						<div class="col-sm-9 col-sm-offset-3">
							<div class="btn-toolbar">
								<input type="submit" class="btn-primary btn" value="Guardar"/>
							</div>
						</div>
					</div>
				</form>
					<!--row end--> 
				</div>
				<!--box-info end--> 
			</div>


		</div>







	</div>
	<!--scrollable wrapper end--> 
</div>
<!--margin-container end--> 

@stop