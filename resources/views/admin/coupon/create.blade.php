@extends('admin.layouts.master')

@section('content')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
      <h1>Coupon Codes</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Create Coupons</h4>
            </div>
            <div class="card-body">
             <form action="{{route('admin.coupons.store')}}" method="POST">
              @csrf
              <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="">
                  </div>
                </div>

                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Code</label>
                    <input type="text" class="form-control" name="code" value="">
                  </div>
                </div>

                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Quantity</label>
                    <input type="text" class="form-control" name="quantity" value="">
                  </div>
                </div>

                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Max Use Per Person</label>
                    <input type="text" class="form-control" name="max_use" value="">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Start Date</label>
                    <input type="text" class="form-control datepicker" name="start_date" value="">
                  </div>
                </div>

                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">End Date</label>
                    <input type="text" class="form-control datepicker" name="end_date" value="">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Discount Type</label>
                    <select id="inputState" class="form-control sub-category" name="discount_type">
                      <option value="">Select Discount Type</option>
                      <option value="percent">Percentage (%)</option>
                      <option value="amount">Amount ({{$settings->currency_icon}})</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Discount Value</label>
                    <input type="text" class="form-control" name="discount" value="">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Status</label>
                    <select id="" class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                </div>

              </div>

              <div class="btnn">
                <button type="submit" class="btn btn-primary">Create Coupons</button>
               </div>

             </form>
            </div>
          
          </div>
        </div>
      </div>
      
    </div>
  </section>

@endsection

@push('scripts')
  <script>
     $(document).ready(function(){
      $('body').on('change', '.main-category', function(e){
        let id = $(this).val();
         $.ajax({
           method : 'GET',
           url : "{{route('admin.get-Subcategories')}}",
           data : {
                id:id
           },
           success:function(data){
             $('.sub-category').html('<option value="">Select</option>')
             $.each(data, function(i, item){
                $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
             })
           },
           error: function(xhr, status, error){}
         })
      })
     })
  </script>
@endpush