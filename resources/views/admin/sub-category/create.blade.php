@extends('admin.layouts.master')

@section('content')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
      <h1>Sub Category</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Create Sub Category</h4>
            </div>
            <div class="card-body">
             <form action="{{route('admin.sub-category.store')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Category</label>
                    <select id="" class="form-control" name="category">
                      <option value="">Select</option>
                      @foreach ( $categories as $category)
                      <option value="{{$category->id}}">{{{$category->name}}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-5">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="">
                  </div>
                </div>

                <div class="col-md-5">
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
                <button type="submit" class="btn btn-primary">Add Sub Category</button>
               </div>

             </form>
            </div>
          
          </div>
        </div>
      </div>
      
    </div>
  </section>

@endsection

