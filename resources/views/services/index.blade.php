@extends('services.layout')
 
@section('content')
    <!-- Page Header -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Service Management</h2>
                <p class="text-gray-500 mt-1">Manage your services and details</p>
            </div>
            <a class="flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold rounded-lg shadow-md transition duration-200 transform hover:scale-105" 
               href="{{ route('admin.services.create') }}">
                <i class="fas fa-plus"></i>
                <span>Add New Service</span>
            </a>
        </div>
    </div>
   
    <!-- Success Message -->
    @if ($message = Session::get('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-lg mb-6 shadow-sm">
            <div class="flex items-center gap-2">
                <i class="fas fa-check-circle text-green-500"></i>
                <p class="font-medium">{{ $message }}</p>
            </div>
        </div>
    @endif
   
    <!-- Services Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($services as $service)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $service->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if(filter_var($service->image, FILTER_VALIDATE_URL))
                                <img src="{{ $service->image }}" 
                                     class="w-16 h-16 rounded-lg object-cover shadow-sm border border-gray-200" 
                                     alt="{{ $service->name }}">
                            @else
                                <img src="/images/{{ $service->image }}" 
                                     class="w-16 h-16 rounded-lg object-cover shadow-sm border border-gray-200" 
                                     alt="{{ $service->name }}">
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-semibold text-gray-900">{{ $service->name }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600 max-w-xs truncate">{{ $service->description }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm font-semibold text-indigo-600">PKR {{ number_format($service->price) }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.services.edit',$service->id) }}" 
                                   class="inline-flex items-center gap-1 px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition duration-150 shadow-sm">
                                    <i class="fas fa-edit text-xs"></i>
                                    <span>Edit</span>
                                </a>
                                <form action="{{ route('admin.services.destroy',$service->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure you want to delete this service?')"
                                            class="inline-flex items-center gap-1 px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition duration-150 shadow-sm">
                                        <i class="fas fa-trash text-xs"></i>
                                        <span>Delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  
@endsection
