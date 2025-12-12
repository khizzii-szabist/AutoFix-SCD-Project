@foreach ($products as $product)
    <div class="col-md-4 col-sm-6">
      <div class="card h-100 product-card border-0">
          <div class="position-relative overflow-hidden">
            <a href="{{ route('product.detail', $product->id) }}">
                <img src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : '/images/' . $product->image }}" 
                     class="card-img-top w-100" alt="{{ $product->name }}" style="height:250px; object-fit:cover;">
            </a>
          </div>
          
          <div class="card-body text-center p-4">
            <h5 class="card-title fw-bold mb-2">{{ $product->name }}</h5>
            <div class="mb-3">
                <span class="badge bg-primary me-1">{{ $product->category ?? 'Uncategorized' }}</span>
                <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                    {{ $product->stock > 0 ? 'In Stock: ' . $product->stock : 'Out of Stock' }}
                </span>
            </div>
            <p class="text-primary fw-bold fs-5 mb-3">Rs {{ $product->price }}</p>
            
            <div class="d-grid gap-2">
                <button class="btn btn-primary" onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, 'product')">Add to Cart</button>
                <a href="{{ route('product.detail', $product->id) }}" class="btn btn-outline-primary">View Details</a>
            </div>
        </div>
      </div>
    </div>
@endforeach
