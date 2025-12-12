@extends('layout')

@section('content')
<section class="container my-5 pb-5">
  <div class="text-center mb-5">
    <h2 class="fw-bold display-5 mb-3 text-white">Available <span class="text-accent">Parts</span></h2>
    <p class="text-muted lead">Upgrade your bike with top-tier components.</p>
  </div>

  {{-- 🔍 Search & Filter --}}
  <div class="row justify-content-center mb-5">
  {{-- 🔍 Search & Filter --}}
  {{-- 🔍 Search & Filter --}}
  <div class="row justify-content-center mb-5" style="position: relative; z-index: 50;">
      <div class="col-md-8">
          <div class="card bg-dark-card border border-secondary p-3" style="overflow: visible;">
              <div class="row g-3">
                  <div class="col-md-7 position-relative">
                      <input type="text" id="searchInput" class="form-control" placeholder="Search for parts..." autocomplete="off">
                      {{-- Autocomplete Dropdown --}}
                      <div id="searchDropdown" class="list-group position-absolute w-100 shadow-lg" style="display:none; z-index: 9999; top: 100%; left: 0; background: #0F1219; border: 1px solid rgba(255,255,255,0.1); max-height: 300px; overflow-y: auto;"></div>
                  </div>
                  <div class="col-md-5">
                      <select id="categoryFilter" class="form-control form-select">
                          <option value="">All Categories</option>
                          @foreach($categories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="row g-4 justify-content-center" id="productsGrid">
    @include('partials.products_grid', ['products' => $products])
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    
    // Function to perform search and update Dropdown + Grid
    function performSearch() {
        let query = $('#searchInput').val();
        let category = $('#categoryFilter').val();

        $.ajax({
            url: "{{ route('products.search') }}",
            type: "GET",
            data: { query: query, category: category },
            success: function(response) {
                // 1. Update Dropdown logic
                let dropdownHtml = '';
                if(query.length > 0 && response.length > 0) {
                     response.forEach(product => {
                        let imageUrl = product.image;
                        if (!imageUrl.startsWith('http')) {
                            imageUrl = '/images/' + imageUrl;
                        }
                        dropdownHtml += `
                            <a href="/product/${product.id}" class="list-group-item list-group-item-action d-flex align-items-center gap-3 text-white" style="background: #0F1219; border-color: rgba(255,255,255,0.1);">
                                <img src="${imageUrl}" class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                <div>
                                    <h6 class="mb-0 fw-bold">${product.name}</h6>
                                    <small class="text-muted">Rs ${product.price}</small>
                                </div>
                            </a>
                        `;
                    });
                    $('#searchDropdown').html(dropdownHtml).show();
                } else {
                    $('#searchDropdown').hide();
                }

                // 2. Update Grid logic (Keep explicit filtering for better UX)
                let gridHtml = '';
                if(response.length > 0) {
                    response.forEach(product => {
                        let imageUrl = product.image;
                        if (!imageUrl.startsWith('http')) {
                            imageUrl = '/images/' + imageUrl;
                        }
                        gridHtml += `
                        <div class="col-md-4 col-sm-6">
                            <div class="card h-100 product-card border-0">
                                <div class="position-relative overflow-hidden">
                                    <a href="/product/${product.id}">
                                        <img src="${imageUrl}" class="card-img-top w-100" alt="${product.name}" style="height:250px; object-fit:cover;">
                                    </a>
                                </div>
                                <div class="card-body text-center p-4">
                                    <h5 class="card-title fw-bold mb-2">${product.name}</h5>
                                    <div class="mb-3">
                                        <span class="badge bg-primary me-1">${product.category || 'Uncategorized'}</span>
                                        <span class="badge ${product.stock > 0 ? 'bg-success' : 'bg-danger'}">${product.stock > 0 ? 'In Stock: ' + product.stock : 'Out of Stock'}</span>
                                    </div>
                                    <p class="text-primary fw-bold fs-5 mb-3">Rs ${product.price}</p>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary" onclick="addToCart(${product.id}, '${product.name}', ${product.price}, 'product')">Add to Cart</button>
                                        <a href="/product/${product.id}" class="btn btn-outline-primary">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    });
                } else {
                    gridHtml = '<div class="col-12 text-center text-muted"><p>No parts found matching your criteria.</p></div>';
                }
                $('#productsGrid').html(gridHtml);
            }
        });
    }

    $('#searchInput').on('keyup', performSearch);
    $('#categoryFilter').on('change', performSearch);

    // Hide dropdown when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#searchInput').length && !$(e.target).closest('#searchDropdown').length) {
            $('#searchDropdown').hide();
        }
    });
});

function addToCart(id, name, price, type) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.push({ id: id, name: name, price: price, type: type, quantity: 1 });
  localStorage.setItem('cart', JSON.stringify(cart));
  Swal.fire({
    background: '#1f2937',
    color: '#fff',
    title: "Added To Cart!",
    text: `${name} of RS.${price} added to cart!`,
    icon: "success",
    confirmButtonColor: '#3B82F6'
  });
}
</script>
@endsection
