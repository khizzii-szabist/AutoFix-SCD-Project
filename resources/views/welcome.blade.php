<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Product Store</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <style>
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f3f4f6;
                margin: 0;
                padding: 0;
            }
            .header {
                background-color: #fff;
                padding: 20px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .header h1 {
                margin: 0;
                color: #111827;
            }
            .header a {
                text-decoration: none;
                color: #4f46e5;
                font-weight: 600;
            }
            .container {
                max-width: 1200px;
                margin: 40px auto;
                padding: 0 20px;
            }
            .product-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 30px;
            }
            .product-card {
                background: #fff;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 4px 6px rgba(0,0,0,0.05);
                transition: transform 0.2s;
            }
            .product-card:hover {
                transform: translateY(-5px);
            }
            .product-image {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }
            .product-details {
                padding: 20px;
            }
            .product-title {
                font-size: 1.25rem;
                font-weight: 600;
                margin: 0 0 10px;
                color: #1f2937;
            }
            .product-description {
                color: #6b7280;
                font-size: 0.875rem;
                margin-bottom: 15px;
                height: 40px;
                overflow: hidden;
            }
            .product-price {
                font-size: 1.125rem;
                font-weight: 700;
                color: #059669;
            }
            .product-stock {
                font-size: 0.875rem;
                color: #9ca3af;
                float: right;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h1>My Product Store</h1>
            <a href="{{ route('dashboard') }}">Admin Panel</a>
        </div>

        <div class="container">
            <div class="product-grid">
                @foreach ($products as $product)
                <div class="product-card">
                    <img src="/images/{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
                    <div class="product-details">
                        <h3 class="product-title">{{ $product->name }}</h3>
                        <p class="product-description">{{ $product->description }}</p>
                        <div>
                            <span class="product-price">${{ $product->price }}</span>
                            <span class="product-stock">Stock: {{ $product->stock }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
