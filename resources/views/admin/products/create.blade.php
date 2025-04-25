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
              <h4>Add Products</h4>
            </div>
            <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="previewContainer" style="margin-top: 10px;">
                                <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 100px; display: none;">
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
                                <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Enter Product Name...">
                              </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select id="" class="form-control main-category" name="category">
                                  <option value="">Select Category</option>
                                  @foreach ($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Sub Category</label>
                                <select id="" class="form-control sub-category" name="sub_category">
                                  <option value="">Select Sub Category</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Child Category</label>
                                <select id="" class="form-control child-category" name="child_category">
                                  <option value="">Select Child Category</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Brand</label>
                                <select id="" class="form-control" name="brand">
                                  <option value="0">Select Brand</option>
                                  @foreach ($brands as $brand)
                                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Stock Quantity</label>
                                <input type="number" min="0" class="form-control" value="{{old('qty')}}" name="qty" placeholder="Enter Product Qty...">
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product SKU</label>
                                <input type="text" class="form-control" value="{{old('sku')}}" name="sku" placeholder="Enter Product SKU...">
                              </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" class="form-control" value="{{old('price')}}" name="price" placeholder="Enter Product Price...">
                              </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Product Offer Price</label>
                                <input type="text" class="form-control" value="{{old('offer_price')}}" name="offer_price" placeholder="Enter Product Offer Price...">
                              </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Product Offer Start Date</label>
                                <input type="text" class="form-control datepicker" value="{{old('offer_start_date')}}" name="offer_start_date">
                              </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Product Offer End Date</label>
                                <input type="text" class="form-control datepicker" value="{{old('offer_end_date')}}" name="offer_end_date">
                              </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Video Link</label>
                                <input type="text" class="form-control" value="{{old('video_link')}}" name="video_link" placeholder="Enter Video Link">
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Product Type</label>
                                <select id="" class="form-control" name="product_type">
                                  <option value="0">Select Product Type</option>
                                  <option value="new_arrival">New Arrival</option>
                                  <option value="featured_product">Featured Product</option>
                                  <option value="top_product">Top Product</option>
                                  <option value="best_product">Best Product</option>
                                </select>
                              </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seo Title</label>
                                <input type="text" class="form-control" value="{{old('seo_title')}}" name="seo_title" placeholder="Enter Seo Title">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seo Description</label>
                                <textarea name="seo_description" class="form-control" id="">Product Seo Description...</textarea>
                              </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Short Description</label>
                               <textarea name="short_description" class="form-control" id="">Product Short Description...</textarea>
                              </div>
                        </div>
    
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Long Description</label>
                               <textarea name="long_description" class="form-control summernote" id="">Product Long Description...</textarea>
                              </div>
                        </div>
    
                    </div>
                    <div class="btnn">
                        <button type="submit" class="btn btn-primary">Add Product</button>
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