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
              <h4>Edit Sub Category</h4>
            </div>
            <div class="card-body">
             <form action="{{route('admin.sub-category.update', $subCategory->id)}}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$subCategory->name}}">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="Slug">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{$subCategory->slug}}">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Category</label>
                    <select id="" class="form-control" name="category">
                      <option value="">Select</option>
                      @foreach ( $categories as $category)
                      <option value="{{$category->id}}" {{ $subCategory->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Status</label>
                    <select id="" class="form-control" name="status">
                      <option value="1" {{$subCategory->status == 1 ? 'selected' : ''}}>Active</option>
                      <option value="0" {{$subCategory->status == 0 ? 'selected' : ''}}>Inactive</option>
                    </select>
                  </div>
                </div>

              </div>

              <div class="btnn">
                <button type="submit" class="btn btn-primary">Update Category</button>
               </div>

             </form>
            </div>
          
          </div>
        </div>
      </div>
      
    </div>
  </section>

@endsection

