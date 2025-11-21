@extends('products.layout')
 
@section('content')
    <div class="flex justify-between items-center bg-white p-6 rounded-lg shadow-sm mb-6 border border-gray-100">
        <div>
            <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Product Management</h2>
            <p class="text-gray-500 mt-1">Manage your inventory and product details</p>
        </div>
        <a class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-5 rounded-lg shadow transition duration-150 ease-in-out flex items-center gap-2" href="{{ route('products.create') }}">
            <i class="fas fa-plus"></i> <span>Create New Product</span>
        </a>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table>
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td><img src="/images/{{ $product->image }}" width="100px"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>PKR {{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
@endsection
