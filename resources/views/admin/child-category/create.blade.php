@extends('admin.layouts.master')

@section('content')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
      <h1>Child Category</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Create Child Category</h4>
            </div>
            <div class="card-body">
             <form action="{{route('admin.child-category.store')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Category</label>
                    <select id="" class="form-control main-category" name="category">
                      <option value="">Select</option>
                      @foreach ( $categories as $category)
                      <option value="{{$category->id}}">{{{$category->name}}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Sub Category</label>
                    <select id="inputState" class="form-control sub-category" name="sub_category">
                      <option value="">Select</option>
                    
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="">
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
                <button type="submit" class="btn btn-primary">Add Child Category</button>
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