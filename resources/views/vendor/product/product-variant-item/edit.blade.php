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
            {{-- <a href="{{route('vendor.product-variant-item.index', ['productId' => $product->id, 'variantId' => $variant->id])}}" class="btn btn-primary mb-2"><i class="fas fa-arrow-left"></i> Back</a> --}}
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i>Update Variant Items</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area"> 
                 <form action="{{route('vendor.product-variant-item.update', $variantItem->id)}}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group wsus_input">
                    <label for="variant_name">Variant Name</label>
                    <input type="text" class="form-control" name="variant_name" value="{{$variantItem->productVariant->name}}" readonly>
                    {{-- <input type="hidden" class="form-control" name="variant_id" value="{{$variant->id}}">
                    <input type="hidden" class="form-control" name="product_id" value="{{$product->id}}"> --}}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group wsus_input">
                    <label for="item name">Item Name</label>
                    <input type="text" class="form-control" name="name" value="{{$variantItem->name}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group wsus_input">
                    <label for="Price">Price <code>(Set 0 for make it free)</code></label>
                    <input type="text" class="form-control" name="price" value="{{$variantItem->price}}">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group wsus_input">
                    <label for="">Is Default</label>
                    <select id="" class="form-control" name="is_default">
                      <option value="">Select</option>
                      <option {{$variantItem->is_default == 1 ? 'selected' : ''}} value="1">Yes</option>
                      <option {{$variantItem->is_default == 0 ? 'selected' : ''}} value="0">No</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group wsus_input">
                    <label for="">Status</label>
                    <select id="" class="form-control" name="status">
                      <option {{$variantItem->status == '1' ? 'selected' : ''}} value="1">Active</option>
                      <option {{$variantItem->status == '0' ? 'selected' : ''}} value="0">Inactive</option>
                    </select>
                  </div>
                </div>

              </div>

              <div class="btnn">
                <button type="submit" class="btn btn-primary">Update</button>
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