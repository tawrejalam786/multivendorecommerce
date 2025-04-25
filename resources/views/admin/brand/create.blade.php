@extends('admin.layouts.master')

@section('content')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
      <h1>Brands</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Create Brand</h4>
            </div>
            <form action="{{route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Brand Logo</label>
                                <input type="file" name="logo" class="form-control">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Brand Name">
                              </div>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Is Featured</label>
                                <select id="" class="form-control" name="is_featured">
                                  <option value="">Select Featured</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select id="" class="form-control" name="status">
                                  <option value="">Select Status</option>
                                  <option value="1">Active</option>
                                  <option value="0">Inactive</option>
                                </select>
                              </div>
                        </div>
    
    
                    </div>
                    <div class="btnn">
                        <button type="submit" class="btn btn-primary">Create Brand</button>
                       </div>
                </div>
            </form>
          
          </div>
        </div>
      </div>
      
    </div>
  </section>

@endsection