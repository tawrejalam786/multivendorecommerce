@extends('admin.layouts.master')

@section('content')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
      <h1>Products Image Gallery</h1>
    </div>
  <div class="mb-3 ml-2">
    <a href="{{route('admin.products.index')}}" class="btn btn-primary">Back</a>
  </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <div><h4>Product : {{$product->name}}</h4></div>
                  {{-- <h4>Upload Image</h4> --}}
                </div>
                <div class="card-body">
                <form action="{{route('admin.products-image-gallery.store')}}" enctype="multipart/form-data" method="post">
                  @csrf
                 <div class="form-group">
                    <label for="Select Image">Select Image <code>(Multiple Image Supported!)</code> </label>
                    <input type="file" name="image[]" class="form-control" multiple>
                    <input type="hidden" name="product" value="{{$product->id}}">
                 </div>
                 <button type="submit" class="btn btn-primary pl-5 pr-5">Upload</button>
                </form>
                </div>
              </div>
            </div>
          </div>

      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>All Images</h4>
              {{-- <div class="card-header-action">
                <a href="{{route('admin.products.create')}}" class="btn btn-primary"> <i class="fas fa-plus"></i> Create New</a>
              </div> --}}
            </div>
            <div class="card-body">
              {{ $dataTable->table() }}
            </div>
          
          </div>
        </div>
      </div>
      
    </div>
  </section>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush