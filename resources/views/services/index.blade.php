@extends('layout')

@section('content')
<!-- 
    Service Management Index
    Description: Lists available services for Admin management.
-->
<div class="container my-5 pb-5">
    <!-- Page Header -->
    <div class="card bg-dark-card border border-secondary mb-5">
        <div class="card-body p-4 d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold text-white mb-1">Service Management</h2>
                <p class="text-muted mb-0">Manage your services and details</p>
            </div>
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
                <i class="fas fa-plus"></i> Add New Service
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <div>{{ $message }}</div>
        </div>
    @endif

    <!-- Services Table -->
    <div class="card bg-dark-card border border-secondary overflow-hidden">
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0">
                <thead class="border-bottom border-secondary">
                    <tr>
                        <th class="py-3 ps-4">ID</th>
                        <th class="py-3">Image</th>
                        <th class="py-3">Name</th>
                        <th class="py-3">Description</th>
                        <th class="py-3">Price</th>
                        <th class="py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($services as $service)
                    <tr>
                        <td class="ps-4 fw-bold text-muted">#{{ $service->id }}</td>
                        <td>
                            @if(filter_var($service->image, FILTER_VALIDATE_URL))
                                <img src="{{ $service->image }}" class="rounded border border-secondary" style="width: 60px; height: 60px; object-fit: cover;" alt="{{ $service->name }}">
                            @else
                                <img src="/images/{{ $service->image }}" class="rounded border border-secondary" style="width: 60px; height: 60px; object-fit: cover;" alt="{{ $service->name }}">
                            @endif
                        </td>
                        <td class="fw-bold text-white">{{ $service->name }}</td>
                        <td class="text-muted" style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ $service->description }}
                        </td>
                        <td class="text-primary fw-bold">Rs {{ number_format($service->price) }}</td>
                        <td class="text-center">
                            <form id="delete-service-{{ $service->id }}" action="{{ route('admin.services.destroy',$service->id) }}" method="POST">
                                <a href="{{ route('admin.services.edit',$service->id) }}" class="btn btn-sm btn-primary me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('delete-service-{{ $service->id }}')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<script>
    function confirmDelete(formId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            background: '#1f2937', 
            color: '#fff'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        })
    }
</script>
