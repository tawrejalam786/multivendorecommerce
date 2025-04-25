@extends('admin.layouts.master')

@section('content')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
      <h1>Edit Slider</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Create Slider</h4>
            </div>
            <form action="{{route('admin.slider.update', $slider->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Preview</label><br>
                                <img src="{{asset($slider->banner)}}" width="200px" />
                              </div>
                        </div>
                        <div class="col-md-8 aligns-item-center">
                            <div class="form-group">
                                <label>Banner</label>
                                <input type="file" name="banner" class="form-control">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" class="form-control" name="type" value="{{ $slider->type }}" placeholder="Type">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $slider->title }}" placeholder="Enter Title">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Starting Price</label>
                                <input type="text" class="form-control" name="starting_price" value="{{ $slider->starting_price }}" placeholder="Enter Starting Price">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Button Url</label>
                                <input type="text" class="form-control" name="btn_url" value="{{ $slider->btn_url }}" placeholder="Enter Button Url">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Serial</label>
                                <input type="text" class="form-control" name="serial" value="{{ $slider->serial }}" placeholder="Enter Slider Serial">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select id="" class="form-control" name="status">
                                  <option {{$slider->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                  <option {{$slider->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                                </select>
                              </div>
                        </div>
    
    
                    </div>
                    <div class="btnn">
                        <button type="submit" class="btn btn-primary">Update Slider</button>
                       </div>
                </div>
            </form>
          
          </div>
        </div>
      </div>
      
    </div>
  </section>

@endsection