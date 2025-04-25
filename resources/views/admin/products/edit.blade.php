@extends('admin.layouts.master')

@section('content')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
      <h1>Products</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Update Products</h4>
            </div>
            <form action="{{route('admin.products.update', $products->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div id="previewContainer" style="margin-top: 10px;">
                                <label>New Image Preview</label><br>
                                <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 100px; display: none;">
                            </div>
                            <div style="margin-top: 10px;margin-left:15px;">
                                <label>Old Image Preview</label><br>
                                <img src="{{ asset($products->thumb_image)}}" alt="Image Preview" style="max-width: 100px;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="image" class="form-control" id="imageInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" value="{{$products->name}}" name="name" placeholder="Enter Product Name...">
                              </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select id="" class="form-control main-category" name="category">
                                  <option value="">Select Category</option>
                                  @foreach ($categories as $category)
                                  <option {{$category->id == $products->category_id ? 'Selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Sub Category</label>
                                <select id="" class="form-control sub-category" name="sub_category">
                                  <option value="">Select Sub Category</option>
                                  @foreach ($subCategories as $subCategory)
                                        <option {{$subCategory->id == $products->sub_category_id ? 'selected' : ''}} value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Child Category</label>
                                <select id="" class="form-control child-category" name="child_category">
                                  <option value="">Select Child Category</option>
                                  @foreach ($childCategories as $childCategory)
                                       <option {{$childCategory->id == $products->child_category_id ? 'selected' : ''}} value="{{$childCategory->id}}">{{$childCategory->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Brand</label>
                                <select id="" class="form-control" name="brand">
                                  <option value="0">Select Brand</option>
                                  @foreach ($brands as $brand)
                                  <option {{$brand->id == $products->brand_id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Stock Quantity</label>
                                <input type="number" min="0" class="form-control" value="{{$products->qty}}" name="qty" placeholder="Enter Product Qty...">
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product SKU</label>
                                <input type="text" class="form-control" value="{{$products->sku}}" name="sku" placeholder="Enter Product SKU...">
                              </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" class="form-control" value="{{$products->price}}" name="price" placeholder="Enter Product Price...">
                              </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Product Offer Price</label>
                                <input type="text" class="form-control" value="{{$products->offer_price}}" name="offer_price" placeholder="Enter Product Offer Price...">
                              </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Product Offer Start Date</label>
                                <input type="text" class="form-control datepicker" value="{{$products->offer_start_date}}" name="offer_start_date">
                              </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Product Offer End Date</label>
                                <input type="text" class="form-control datepicker" value="{{$products->offer_end_date}}" name="offer_end_date">
                              </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Video Link</label>
                                <input type="text" class="form-control" value="{{$products->video_link}}" name="video_link" placeholder="Enter Video Link">
                              </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select id="" class="form-control" name="status">
                                  <option {{$products->status == '1' ? 'selected' : ''}} value="1">Active</option>
                                  <option {{$products->status == '0' ? 'selected' : ''}} value="0">Inactive</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Product Type</label>
                                <select id="" class="form-control" name="product_type">
                                  <option value="0">Select Product Type</option>
                                  <option {{$products->product_type == 'new_arrival' ? 'selected' : ''}} value="new_arrival">New Arrival</option>
                                  <option {{$products->product_type == 'featured_product' ? 'selected' : ''}} value="featured_product">Featured Product</option>
                                  <option {{$products->product_type == 'top_product' ? 'selected' : ''}} value="top_product">Top Product</option>
                                  <option {{$products->product_type == 'best_product' ? 'selected' : ''}} value="best_product">Best Product</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seo Title</label>
                                <input type="text" class="form-control" value="{{$products->seo_title}}" name="seo_title" placeholder="Enter Seo Title">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seo Description</label>
                                <textarea name="seo_description" class="form-control" id="">{!!$products->seo_description!!}</textarea>
                              </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Short Description</label>
                               <textarea name="short_description" class="form-control" id="">{!!$products->short_description!!}</textarea>
                              </div>
                        </div>
    
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Long Description</label>
                               <textarea name="long_description" class="form-control summernote" id="">{!!$products->long_description!!}</textarea>
                              </div>
                        </div>
    
                    </div>
                    <div class="btnn">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                       </div>
                </div>
            </form>
          
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
        $('.child-category').html('<option value="">Select Child Category</option>');
        let id = $(this).val();
         $.ajax({
           method : 'GET',
           url : "{{route('admin.product.get-subcategories')}}",
           data : {
                id:id
           },
           success:function(data){
             $('.sub-category').html('<option value="">Select Sub Category</option>')
             $.each(data, function(i, item){
                $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
             })
           },
           error: function(xhr, status, error){}
         })
      })
     })

     //Get Child Categories
     $(document).ready(function(){
      $('body').on('change', '.sub-category', function(e){
        let id = $(this).val();
         $.ajax({
           method : 'GET',
           url : "{{route('admin.product.get-child_categories')}}",
           data : {
                id:id
           },
           success:function(data){
             $('.child-category').html('<option value="">Select Child Category</option>')
             $.each(data, function(i, item){
                $('.child-category').append(`<option value="${item.id}">${item.name}</option>`)
             })
           },
           error: function(xhr, status, error){}
         })
      })
     })

     //image preview after upload script
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
        }
    });
  </script>
@endpush