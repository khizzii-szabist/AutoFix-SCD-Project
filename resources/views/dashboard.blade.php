<x-app-layout>
    <x-slot name="header">
        <!-- Dashboard Header -->
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                    <div>
                        <h3 class="text-2xl font-bold mb-2">Welcome back, {{ Auth::user()->name }}! 👋</h3>
                        <p class="text-gray-600 dark:text-gray-400">Manage your products and services from here.</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 flex items-center transform hover:scale-105">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Management Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Product Management Card -->
                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:shadow-2xl group">
                    <div class="p-8 text-white">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-16 h-16 bg-white bg-opacity-20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                                <i class="fas fa-box-open text-3xl"></i>
                            </div>
                        </div>
                        <a href="{{ route('products.index') }}" class="block">
                            <h3 class="text-2xl font-bold mb-2 hover:underline">Product Management</h3>
                        </a>
                        <p class="text-blue-100 mb-4">Manage your bike parts inventory</p>
                        <div class="flex items-center gap-4 text-sm">
                            <a href="{{ route('products.create') }}" class="bg-white bg-opacity-20 px-3 py-1 rounded-full backdrop-blur-sm hover:bg-white hover:text-blue-600 transition">
                                <i class="fas fa-plus mr-1"></i> Add Products
                            </a>
                            <a href="{{ route('products.index') }}" class="bg-white bg-opacity-20 px-3 py-1 rounded-full backdrop-blur-sm hover:bg-white hover:text-blue-600 transition">
                                <i class="fas fa-edit mr-1"></i> Edit & Delete
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('products.index') }}" class="block bg-white bg-opacity-10 px-8 py-4 backdrop-blur-sm hover:bg-opacity-20 transition">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-white font-semibold">Click to manage products</p>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                </div>

                <!-- Service Management Card -->
                <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:shadow-2xl group">
                    <div class="p-8 text-white">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-16 h-16 bg-white bg-opacity-20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                                <i class="fas fa-tools text-3xl"></i>
                            </div>
                        </div>
                        <a href="{{ route('admin.services.index') }}" class="block">
                            <h3 class="text-2xl font-bold mb-2 hover:underline">Service Management</h3>
                        </a>
                        <p class="text-purple-100 mb-4">Manage your bike services</p>
                        <div class="flex items-center gap-4 text-sm">
                            <a href="{{ route('admin.services.create') }}" class="bg-white bg-opacity-20 px-3 py-1 rounded-full backdrop-blur-sm hover:bg-white hover:text-purple-600 transition">
                                <i class="fas fa-plus mr-1"></i> Add Services
                            </a>
                            <a href="{{ route('admin.services.index') }}" class="bg-white bg-opacity-20 px-3 py-1 rounded-full backdrop-blur-sm hover:bg-white hover:text-purple-600 transition">
                                <i class="fas fa-edit mr-1"></i> Edit & Delete
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('admin.services.index') }}" class="block bg-white bg-opacity-10 px-8 py-4 backdrop-blur-sm hover:bg-opacity-20 transition">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-white font-semibold">Click to manage services</p>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                </div>

            </div>

            <!-- Quick Stats (Optional) -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                            <i class="fas fa-box text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Products</p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ \App\Models\Product::count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                            <i class="fas fa-tools text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Services</p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ \App\Models\Service::count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
