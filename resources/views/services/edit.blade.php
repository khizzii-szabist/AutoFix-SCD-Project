@extends('layout')

@section('content')
<div class="container my-5 pb-5">
    <!-- Page Header -->
    <div class="card bg-dark-card border border-secondary mb-5">
        <div class="card-body p-4 d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold text-white mb-1">Edit Service</h2>
                <p class="text-muted mb-0">Update service details</p>
            </div>
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger d-flex align-items-start mb-4" role="alert">
            <i class="fas fa-exclamation-circle mt-1 me-2"></i>
            <div>
                <strong>Whoops!</strong> There were some problems with your input.
                <ul class="mb-0 mt-1 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <!-- Edit Form -->
    <div class="card bg-dark-card border border-secondary">
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <!-- Name -->
                    <div class="col-md-12">
                        <label class="form-label fw-bold text-light">Service Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ $service->name }}" class="form-control bg-dark border-secondary text-white" placeholder="e.g., Full Maintenance Package">
                    </div>

                    <!-- Description -->
                    <div class="col-md-12">
                        <label class="form-label fw-bold text-light">Description</label>
                        <textarea name="description" rows="4" class="form-control bg-dark border-secondary text-white" placeholder="Enter service description">{{ $service->description }}</textarea>
                    </div>

                    <!-- Price -->
                    <div class="col-md-12">
                        <label class="form-label fw-bold text-light">Price (PKR) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark border-secondary text-muted">PKR</span>
                            <input type="number" step="0.01" name="price" value="{{ $service->price }}" class="form-control bg-dark border-secondary text-white" placeholder="0.00">
                        </div>
                    </div>

                    <!-- Current Image Preview -->
                    @if($service->image)
                    <div class="col-md-12">
                        <label class="form-label fw-bold text-light">Current Image</label>
                        <div class="p-3 border border-secondary rounded bg-dark d-inline-block">
                             @if(filter_var($service->image, FILTER_VALIDATE_URL))
                                <img src="{{ $service->image }}" alt="{{ $service->name }}" class="rounded shadow-sm" style="max-height: 200px; max-width: 100%; object-fit: cover;">
                            @else
                                <img src="/images/{{ $service->image }}" alt="{{ $service->name }}" class="rounded shadow-sm" style="max-height: 200px; max-width: 100%; object-fit: cover;">
                            @endif
                        </div>
                    </div>
                    @endif



                    <!-- File Upload -->
                    <div class="col-md-12">
                        <label class="form-label fw-bold text-light"><i class="fas fa-upload text-primary me-1"></i> Upload New Image</label>
                        <input type="file" id="imageInput" accept="image/*" name="image" class="form-control bg-dark border-secondary text-white">
                        <div class="form-text text-muted">
                            <i class="fas fa-info-circle me-1"></i> Supported formats: JPEG, PNG, JPG, GIF, SVG. Max size: 2MB.
                        </div>

                        <div id="imagePreviewContainer" class="mt-3 d-none">
                            <p class="small text-muted mb-2">New Image Preview:</p>
                            <img id="imagePreview" src="#" alt="New Image Preview" class="rounded border border-secondary" style="max-width: 200px;">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-3 mt-5">
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary px-4 fw-bold">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4 fw-bold shadow-lg">
                        <i class="fas fa-save me-2"></i> Update Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('imageInput').onchange = function (evt) {
        var tgt = evt.target,
            files = tgt.files;

        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
                document.getElementById('imagePreview').src = fr.result;
                document.getElementById('imagePreviewContainer').classList.remove('d-none');
            }
            fr.readAsDataURL(files[0]);
        }
    }
</script>
@endsection
