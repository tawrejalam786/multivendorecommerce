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
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <h4>basic information</h4>
                   <form action="{{route('vendor.shop-profile.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group wsus_input">
                                <label>Banner</label>
                                <input type="file" name="banner" class="form-control">
                                <img src="{{asset($profile->banner)}}" alt="Banner Img" width="100px" />
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group wsus_input">
                                <label>Shop Name</label>
                                <input type="text" class="form-control" value="{{$profile->shop_name}}" name="shop_name" placeholder="Enter Shope Name...">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group wsus_input">
                                <label>Phone</label>
                                <input type="text" class="form-control" value="{{$profile->phone}}" name="phone" placeholder="Enter phone no...">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group wsus_input">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$profile->email}}" placeholder="Enter email...">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group wsus_input">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" value="{{$profile->address}}" placeholder="Enter addresss...">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group wsus_input">
                                <label>Facebook Link</label>
                                <input type="text" class="form-control" name="fb_link" value="{{$profile->fb_link}}" placeholder="Enter Facebook Link...">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group wsus_input">
                                <label>Twitter Link</label>
                                <input type="text" class="form-control" name="tw_link" value="{{$profile->tw_link}}" placeholder="Enter Twitter Link...">
                              </div>
                        </div>
                        <div class="col-md-6 wsus_input">
                            <div class="form-group">
                                <label>Instagram Link</label>
                                <input type="text" class="form-control" name="insta_link" value="{{$profile->insta_link}}" placeholder="Enter Instagram Link...">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group wsus_input">
                                <label for="">Status</label>
                                <select id="" class="form-control" name="status">
                                  <option {{$profile->status == '1' ? 'selected' : ''}} value="1">Active</option>
                                  <option {{$profile->status == '0' ? 'selected' : ''}} value="0">Inactive</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group wsus_input my-2">
                                <label>Description</label>
                                <textarea name="description" class="summernote mb-3 mt-5">{{$profile->description}}</textarea>
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
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->

@endsection