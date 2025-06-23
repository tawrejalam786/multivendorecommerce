@extends('admin.layouts.master')

@section('content')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
      <h1>Flash Sale</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>Flash Sale End Date</h4>
            </div>
            <div class="card-body">
              <form action="{{route('admin.flash-sale.update')}}" method="post">
                @csrf
                @method('PUT')
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Sale End Date</label>
                        <input type="text" class="form-control datepicker" value="{{$flashSaleDate->end_date}}" name="end_date">
                      </div>
                      <button type="submit" class="btn btn-primary pl-5 pr-5">Save</button>
                    </div>
              </form>
            </div>
          
          </div>
        </div>
{{-- another form --}}
        <div class="col-12 col-md-12 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>Add Flash Sale Products</h4>
            </div>
            <div class="card-body">
               <form action="{{route('admin.flash-sale.add-product')}}" method="post">
                @csrf
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Add Product</label>
                         <select name="product" class="form-control select2" id="">
                               <option value="">Select Product</option>
                            @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                          </select>
                      </div>

                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                        <label>Show At Home?</label>
                         <select name="show_at_home" class="form-control" id="">
                               <option value="">Select</option>
                               <option value="1">Yes</option>
                               <option value="0">No</option>
                          </select>
                      </div>
                        </div>
                       <div class="col-md-6">
                        <div class="form-group">
                        <label>Status</label>
                         <select name="status" class="form-control" id="">
                               <option value="">Select Status</option>
                               <option value="1">Active</option>
                               <option value="0">Inactive</option>
                          </select>
                      </div>
                       </div>
                       </div>
                      <button type="submit" class="btn btn-primary pl-5 pr-5">Save</button>
                    </div>
              </form>
            </div>
          
          </div>
        </div>
      </div>
      
    </div>


    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>All Flash Sale Products</h4>
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

    <script>
      $(document).ready(function(){
        //change status of flash sale
        $('body').on('click', '.change-status', function(){
          let isChecked = $(this).is(':checked');
          let id = $(this).data('id');

          $.ajax({
            url: "{{route('admin.flash-sale-status')}}",
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

        // Change show at home status

        $('body').on('click', '.change-at-home-status', function(){
          let isChecked = $(this).is(':checked');
          let id = $(this).data('id');

          $.ajax({
            url: "{{route('admin.flash-sale.show-at-home.change-status')}}",
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