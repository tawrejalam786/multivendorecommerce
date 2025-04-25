@extends('admin.layouts.master')

@section('content')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
      <h1>Vendor Profile</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Update Vendor Profile</h4>
            </div>
            <form action="{{route('admin.vendor-profile.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Banner</label>
                                <input type="file" name="banner" class="form-control">
                                <img src="{{asset($profile->banner)}}" alt="Banner Img" width="100px" />
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" value="{{$profile->phone}}" name="phone" placeholder="Enter phone no...">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$profile->email}}" placeholder="Enter email...">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" value="{{$profile->address}}" placeholder="Enter addresss...">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Facebook Link</label>
                                <input type="text" class="form-control" name="fb_link" value="{{$profile->fb_link}}" placeholder="Enter Facebook Link...">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Twitter Link</label>
                                <input type="text" class="form-control" name="tw_link" value="{{$profile->tw_link}}" placeholder="Enter Twitter Link...">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Instagram Link</label>
                                <input type="text" class="form-control" name="insta_link" value="{{$profile->insta_link}}" placeholder="Enter Instagram Link...">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select id="" class="form-control" name="status">
                                  <option {{$profile->status == '1' ? 'selected' : ''}} value="1">Active</option>
                                  <option {{$profile->status == '0' ? 'selected' : ''}} value="0">Inactive</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="summernote">{{$profile->description}}</textarea>
                              </div>
                        </div>
    
                    </div>
                    <div class="btnn">
                        <button type="submit" class="btn btn-primary">Update Vendor Profile</button>
                       </div>
                </div>
            </form>
          
          </div>
        </div>
      </div>
      
    </div>
  </section>

@endsection