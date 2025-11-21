@extends('products.layout')
  
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center;">
    <h2>Add New Product</h2>
    <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
</div>
   
@if ($errors->any())
    <div class="alert" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" placeholder="Name">
    </div>
    <div class="form-group">
        <label>Description:</label>
        <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
    </div>
    <div class="form-group">
        <label>Price:</label>
        <input type="number" step="0.01" name="price" class="form-control" placeholder="Price">
    </div>
    <div class="form-group">
        <label>Stock:</label>
        <input type="number" name="stock" class="form-control" placeholder="Stock">
    </div>
    <div class="form-group">
        <label>Image:</label>
        <input type="file" name="image" class="form-control" placeholder="image">
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
   
</form>
@endsection
