@extends('layout')

@section('content')
<section class="container my-5 pb-5">
  <div class="text-center mb-5">
    <h2 class="fw-bold display-5 mb-3 text-white">Our <span class="text-primary">Services</span></h2>
    <p class="text-muted lead">Premium maintenance packages for your premium ride.</p>
  </div>

    <div class="row justify-content-center g-4">
    @foreach($services as $service)
      <div class="col-md-4 col-sm-6">
        <div class="card h-100 product-card border-0">
          <div class="position-relative overflow-hidden">
             @if(filter_var($service->image, FILTER_VALIDATE_URL))
                <img src="{{ $service->image }}" class="card-img-top w-100" alt="{{ $service->name }}" style="height:220px; object-fit:cover;">
             @else
                <img src="/images/{{ $service->image }}" class="card-img-top w-100" alt="{{ $service->name }}" style="height:220px; object-fit:cover;">
             @endif
             <div class="position-absolute bottom-0 start-0 w-100 p-2 background-glass">
                 <!-- Optional overlay content -->
             </div>
          </div>
          
          <div class="card-body p-4 text-center">
            <h4 class="card-title fw-bold mb-2">{{ $service->name }}</h4>
            <p class="text-accent fw-bold fs-5 mb-4">Starting from Rs {{ number_format($service->price) }}</p>
            <a href="{{ route('book', ['id' => $service->id, 'service' => $service->name, 'price' => $service->price]) }}" class="btn btn-primary w-100">Book Now</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>
@endsection
