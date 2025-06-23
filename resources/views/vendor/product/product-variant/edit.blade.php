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
             <a href="{{route('vendor.products-variant.index', ['product' => $variant->product_id])}}" class="btn btn-primary mb-2"><i class="fas fa-arrow-left"></i> Back</a>
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i>Update Products Variant</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area"> 
            <form action="{{route('vendor.products-variant.update', $variant->id)}}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group wsus_input">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$variant->name}}">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group wsus_input">
                    <label for="">Status</label>
                    <select id="" class="form-control" name="status">
                      <option {{$variant->status == 1 ? 'selected' : ''}} value="1">Active</option>
                      <option {{$variant->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                    </select>
                  </div>
                </div>

              </div>

              <div class="btnn mt-3">
                <button type="submit" class="btn btn-primary">Update Variant</button>
               </div>

             </form>
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

    <script>
      $(document).ready(function(){
        $('body').on('click', '.change-status', function(){
          let isChecked = $(this).is(':checked');
          let id = $(this).data('id');

          $.ajax({
            url: "{{route('admin.product.change-status')}}",
            method: 'PUT',
            data: {
              status: isChecked,
              id: id
            },
            success: function(data){
              toastr.success(data.message);
            },
            error: function(xhr, status, error){
              console.log(error);
            }
          })
        })
      })
    </script>
@endpush