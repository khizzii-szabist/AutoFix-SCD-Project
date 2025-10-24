@extends('layout')

@section('content')
<div class="container my-5 text-center">
  <h2 class="fw-bold mb-4">Our Services</h2>

  <div class="row justify-content-center">
    @php
      $services = [
        [
          'name' => 'Maintenance & Repair Services',
          'price' => 5000,
          'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEYwYNwJysJlrHMbg-vuJdpLAUheWUzw7eqpwYUy4ULw4oBRITBgHdjtAAyE55AZUWEWs&usqp=CAU'
        ],
        [
          'name' => 'Customization',
          'price' => 1500,
          'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmZQ224X5MBBPIPvRNopxGAjiM99w28_q2nQ&s'
        ],
        [
          'name' => 'Cleaning & Detailing Services',
          'price' => 2000,
          'image' => 'https://t4.ftcdn.net/jpg/03/75/47/61/360_F_375476190_A6SPPQNxgcv5aytI7aXbew95eQWflC6m.jpg'
        ],
      ];
    @endphp

    @foreach($services as $service)
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100 border-0">
          <img src="{{ $service['image'] }}" class="card-img-top" alt="{{ $service['name'] }}" style="height:200px; object-fit:cover;">
          <div class="card-body">
            <h5 class="card-title">{{ $service['name'] }}</h5>
            <p class="card-text text-muted">Starting from Rs {{ number_format($service['price']) }}</p>
            <a href="{{ route('book', ['service' => $service['name'], 'price' => $service['price']]) }}" class="btn btn-success btn-sm">Book Now</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
