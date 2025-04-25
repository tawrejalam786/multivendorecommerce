@extends('admin.layouts.master')

@section('content')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
      <h1>Slider</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Create Slider</h4>
            </div>
            <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Banner</label>
                                <input type="file" name="banner" class="form-control">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" class="form-control" value="{{old('type')}}" name="type" placeholder="Type">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Enter Title">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Starting Price</label>
                                <input type="text" class="form-control" name="starting_price" value="{{old('starting_price')}}" placeholder="Enter Starting Price">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Button Url</label>
                                <input type="text" class="form-control" name="btn_url" value="{{old('btn_url')}}" placeholder="Enter Button Url">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Serial</label>
                                <input type="text" class="form-control" name="serial" value="{{old('serial')}}" placeholder="Enter Slider Serial">
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
                        <button type="submit" class="btn btn-primary">Create Slider</button>
                       </div>
                </div>
            </form>
          
          </div>
        </div>
      </div>
      
    </div>
  </section>

@endsection