# AutoFix - E-Commerce Platform for Bike Parts & Services

## Project Overview
AutoFix is a comprehensive web application developed for the SCD Theory Final Project. It serves as an e-commerce platform where users can browse and purchase bike parts, as well as book maintenance services. The system features a robust Admin Dashboard for inventory and service management.

## Features
-   **User Role Management**: Admin and Customer roles.
-   **CRUD Operations**: Full management of Products and Services.
-   **Search & Filter**: Dynamic AJAX-based search and filtering for products (Frontend & Admin).
-   **Relationships**: `Booking` belongs to `Service`, `User` has many `order`, etc.
-   **Image Upload**: Local file upload with validation and preview.
-   **Cart System**: Session-based shopping cart.
-   **Responsive Design**: "Electric Midnight" theme using Bootstrap 5.

## Modules
1.  **Authentication**: Login/Register with Role-Based Access Control.
2.  **Products**: Browse, Search, Add to Cart, Admin CRUD.
3.  **Services**: View, Book, Admin CRUD.
4.  **Cart/Checkout**: Manage items, calculate total, place order.

## Setup Instructions
1.  **Clone Repository**:
    ```bash
    git clone <repo-url>
    cd myapp
    ```
2.  **Install Dependencies**:
    ```bash
    composer install
    npm install
    ```
3.  **Environment Setup**:
    -   Copy `.env.example` to `.env`
    -   Configure database credentials in `.env`
4.  **Database Migration & Seeding**:
    ```bash
    php artisan migrate
    php artisan db:seed
    ```
5.  **Run Application**:
    ```bash
    php artisan serve
    npm run dev
    ```

## Usage Guide
-   **Admin**: Access `/dashboard` to manage Products and Services.
-   **Customer**:
    -   Go to `/parts` to search and buy components.
    -   Go to `/services` to book maintenance.
    -   Use the Search Bar on the Parts page (`/parts`) for quick product access.

## API Documentation
The application exposes the following API endpoints:
-   `GET /api/products`: List all products.
-   `POST /api/products`: Create a new product.
-   `GET /api/products/{id}`: Get specific product details.
-   `PUT/PATCH /api/products/{id}`: Update a product.
-   `DELETE /api/products/{id}`: Delete a product.
-   `GET /api/services`: List all services.
-   `POST /api/services`: Create a new service.
-   `GET /api/services/{id}`: Get specific service details.
-   `PUT/PATCH /api/services/{id}`: Update a service.
-   `DELETE /api/services/{id}`: Delete a service.

## Credits
Developed by Khizar Iqbal Fazil for SCD Project.