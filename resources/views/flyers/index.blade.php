@extends('layouts.main')

@section('content')
	<div class="pages">
		<ol class="breadcrumb">
	      <li><a href="/home">HOME</a></li>
	      <li class="active">FLYERS</li>
	    </ol>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h1>List of Flyers</h1>
			<br>
			<table class="table table-striped">
				<thead>
			        <tr>
			             <th>Adddress</th>
			              <th>City</th>
			              <th>State</th>
			              <th>Country</th>
			              {{-- <th>Owner</th> --}}
			        </tr>
			 	</thead>
				<tbody id="myTable" class="searchable">
					@foreach($flyers as $flyer)
				    	<tr>
				        	<td>{!! $flyer->street !!}</td>
				            <td>{!! $flyer->city !!}</td>
			               	<td>{!! $flyer->state !!}</td>
			               	<td>{!! $flyer->country !!}</td>
			               	{{-- <td>{!! $flyer->user()->name !!}</td> --}}
				        </tr>
				    @endforeach
			</table>
		</div>
	</div>

	<hr>
	
	<div class="row">
		<div class="col-md-12">
			{{-- @foreach($flyers as $flyer)
				<div class="panel panel-default">
					<div class="panel-heading">{!! $flyer->street !!}</div>
					<div class="panel-body">
						<h2>{!! $flyer->price !!}</h2>
						<hr>
						{!! nl2br($flyer->description) !!}
					</div>
				</div>
			@endforeach --}}
			@foreach($flyers->chunk(4) as $set)
				<div class="row">
					@foreach($set as $flyer)
						<div class="col-md-3">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<div class="panel-title">
										{!! $flyer->street !!}
									</div>
								</div>
								<div class="panel-body">
									<h2>{!! $flyer->price !!}</h2>
									{{-- <img src="/{{ $flyer->photos->thumbnail_path }}" alt=""> --}}
									<hr>
									{!! nl2br(substr($flyer->description, 0, 80))  !!}...
								</div>
								<div class="panel-body">
									<a href="/{{ flyer_path($flyer) }}" class="btn btn-primary btn-block">View Details</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			@endforeach
		</div>
@stop

