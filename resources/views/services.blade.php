@extends('layout')

@section('content')
<div class="container my-5 text-center">
  <h2 class="fw-bold mb-4">Our Services</h2>

    <div class="row justify-content-center">
    @foreach($services as $service)
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100 border-0">
          @if(filter_var($service->image, FILTER_VALIDATE_URL))
            <img src="{{ $service->image }}" class="card-img-top" alt="{{ $service->name }}" style="height:200px; object-fit:cover;">
          @else
            <img src="/images/{{ $service->image }}" class="card-img-top" alt="{{ $service->name }}" style="height:200px; object-fit:cover;">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $service->name }}</h5>
            <p class="card-text text-muted">Starting from Rs {{ number_format($service->price) }}</p>
            <a href="{{ route('book', ['service' => $service->name, 'price' => $service->price]) }}" class="btn btn-success btn-sm">Book Now</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
