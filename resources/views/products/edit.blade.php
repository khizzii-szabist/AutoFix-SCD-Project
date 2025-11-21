@extends('products.layout')
   
@section('content')
    <!-- Page Header -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Edit Product</h2>
                <p class="text-gray-500 mt-1">Update product information</p>
            </div>
            <a class="flex items-center gap-2 px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg shadow-sm transition duration-150" 
               href="{{ route('products.index') }}">
                <i class="fas fa-arrow-left"></i>
                <span>Back to List</span>
            </a>
        </div>
    </div>
   
    <!-- Error Messages -->
    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-lg mb-6 shadow-sm">
            <div class="flex items-start gap-2">
                <i class="fas fa-exclamation-circle text-red-500 mt-0.5"></i>
                <div>
                    <strong class="font-semibold">Whoops!</strong> There were some problems with your input.
                    <ul class="mt-2 list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
  
    <!-- Edit Form -->
    <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-200">
        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
   
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Product Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="name" 
                           value="{{ $product->name }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150" 
                           placeholder="Enter product name">
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Description
                    </label>
                    <textarea name="description" 
                              rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150" 
                              placeholder="Enter product description">{{ $product->description }}</textarea>
                </div>

                <!-- Price -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Price (PKR) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-500">PKR</span>
                        <input type="number" 
                               step="0.01" 
                               name="price" 
                               value="{{ $product->price }}" 
                               class="w-full pl-14 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150" 
                               placeholder="0.00">
                    </div>
                </div>

                <!-- Stock -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Stock Quantity <span class="text-red-500">*</span>
                    </label>
                    <input type="number" 
                           name="stock" 
                           value="{{ $product->stock }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150" 
                           placeholder="Enter stock quantity">
                </div>

                <!-- Current Image Preview -->
                @if($product->image)
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Current Image
                    </label>
                    <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                        <img src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : '/images/' . $product->image }}" 
                             class="w-full max-w-md h-64 object-cover rounded-lg shadow-sm" 
                             alt="Product Image">
                    </div>
                </div>
                @endif

                <!-- Image URL -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-link text-indigo-500"></i> Image URL
                    </label>
                    <input type="url" 
                           name="image_url" 
                           value="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : '' }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150" 
                           placeholder="https://example.com/image.jpg">
                    <p class="mt-2 text-sm text-gray-500">Provide an image URL <strong>OR</strong> upload a file below to replace the current image</p>
                </div>

                <!-- File Upload -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-upload text-indigo-500"></i> Upload New Image
                    </label>
                    <input type="file" 
                           name="image" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-8 flex justify-end gap-3">
                <a href="{{ route('products.index') }}" 
                   class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition duration-150">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold rounded-lg shadow-md transition duration-200 transform hover:scale-105 flex items-center gap-2">
                    <i class="fas fa-save"></i>
                    <span>Update Product</span>
                </button>
            </div>
   
        </form>
    </div>

@endsection
