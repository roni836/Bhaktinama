@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Service</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Service Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $service->title) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $service->category) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $service->price) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration', $service->duration) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $service->location) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="service_type">Service Type</label>
                                    <input type="text" class="form-control" id="service_type" name="service_type" value="{{ old('service_type', $service->service_type) }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="short_description">Short Description</label>
                            <textarea class="form-control" id="short_description" name="short_description" rows="3">{{ old('short_description', $service->short_description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="description">Full Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $service->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="introduction">Introduction</label>
                            <textarea class="form-control" id="introduction" name="introduction" rows="3">{{ old('introduction', $service->introduction) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="importance">Importance of Service</label>
                            <textarea class="form-control" id="importance" name="importance" rows="3">{{ old('importance', $service->importance) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="traditions">Traditions</label>
                            <textarea class="form-control" id="traditions" name="traditions" rows="3">{{ old('traditions', $service->traditions) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="images">Service Images</label>
                            <input type="file" class="form-control-file" id="images" name="images[]" accept="image/*" multiple>
                            @if($service->images && is_array($service->images))
                                <div class="mt-2">
                                    @foreach($service->images as $image)
                                        <img src="{{ asset($image) }}" alt="Service Image" style="max-width: 150px; height: auto; margin: 5px;">
                                    @endforeach
                                    <p class="text-muted">Current Images</p>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="featured" name="featured" value="1" {{ old('featured', $service->featured) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="featured">Featured</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Update Service</button>
                            <a href="{{ route('admin.services') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection