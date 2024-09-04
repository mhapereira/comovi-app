@extends('layout.app')
 
@section('title', 'Transparência')

<div class="container mt-5 pt-5">
	{!! $instituto->sobre !!}
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-6 col-sm-12">
			<p class="display-6 mb-4 montserrat-bold">Atas</p>
			<div class="row">
				@foreach($instituto->ata as $ata)
				<div class="col-lg-4 col-sm-6">
					<div class="card h-100">
						<div class="card-body text-center">
							<h5 class="card-title">{{ $ata['name'] }}</h5>
							<a href="{{ asset('storage/' . $ata['arquivo']) }}" target="_blank" class="btn btn-outline-primary">
								Ver {{ $ata['name'] }}
							</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="col-lg-6 col-sm-12">
			<p class="display-6 mb-4 montserrat-bold">Balanço</p>
			<div class="row">
				@foreach($instituto->balanco as $balanco)
				<div class="col-lg-4 col-sm-6">
					<div class="card h-100">
						<div class="card-body text-center">
							<h5 class="card-title">{{ $balanco['name'] }}</h5>
							<a href="{{ asset('storage/' . $balanco['arquivo']) }}" target="_blank" class="btn btn-outline-primary">
								Ver {{ $balanco['name'] }}
							</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
