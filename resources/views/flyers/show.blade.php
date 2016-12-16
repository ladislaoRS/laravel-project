@extends('layouts.main')

@section('content')

	<div class="row pages">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">{!! $flyer->street !!}</div>
				</div>
				<div class="panel-body"><h1>{!! $flyer->price !!}<h1></div>
				<div class="panel-body">{!! nl2br($flyer->description) !!}</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-body">
					@foreach($flyer->photos->chunk(4) as $set)
						<div class="row">
							@foreach($set as $photo)
								<div class="col-md-3">
									<a href="/{{ $photo->path }}" data-lity>
										<img src="/{{ $photo->thumbnail_path }}" class="thumbnail" alt="">
									</a>
								</div>
							@endforeach
						</div>
					@endforeach
					
					@if($currentUser && $currentUser->owns($flyer))
						<hr>

						{{-- Uploading Photos --}}
						<form id="addPhotosForm" action="{{ photos_path($flyer) }}" method="POST" class="dropzone">
							{{ csrf_field() }}
						</form>
					@endif
				</div>
			</div>
		</div>
	</div>
@stop

@section('scripts.footer')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
	<script>
		Dropzone.options.addPhotosForm = {
			paramName: 'photo',
			maxFilesize: 3,
			acceptedFiles: '.jpg, .jpeg, .png, .bmp',
		};
	</script>
@stop