@extends('vendor.layouts.master')


@section('content')

 <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('vendor.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <a href="{{route('vendor.products.index')}}" class="btn btn-primary mb-2"><i class="fas fa-arrow-left"></i> Back</a>
            <h3><i class="fas fa-images"></i> Product : {{$product->name}}</h3>
            <div class="create_button">
              {{-- <a href="{{route('vendor.products.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Product Gallery</a> --}}
            </div>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <form action="{{route('vendor.products-image-gallery.store')}}" enctype="multipart/form-data" method="post">
                  @csrf
                 <div class="form-group wsus_input">
                    <label for="Select Image">Select Image <code>(Multiple Image Supported!)</code> </label>
                    <input type="file" name="image[]" class="form-control" multiple>
                    <input type="hidden" name="product" value="{{$product->id}}">
                 </div>
                 <button type="submit" class="btn btn-primary pl-5 pr-5"><i class="fas fa-cloud"></i> Upload</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="fas fa-images"></i> Product Images</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
               {{ $dataTable->table() }}
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush