@extends('admin.layouts.master')

@section('content')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
      <h1>Product Variant Items</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Update Variant Items</h4>
            </div>
            <div class="card-body">
             <form action="{{route('admin.product-variant-item.update', $variantItem->id)}}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="variant_name">Variant Name</label>
                    <input type="text" class="form-control" name="variant_name" value="{{$variantItem->productVariant->name}}" readonly>
                    {{-- <input type="hidden" class="form-control" name="variant_id" value="{{$variant->id}}">
                    <input type="hidden" class="form-control" name="product_id" value="{{$product->id}}"> --}}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="item name">Item Name</label>
                    <input type="text" class="form-control" name="name" value="{{$variantItem->name}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="Price">Price <code>(Set 0 for make it free)</code></label>
                    <input type="text" class="form-control" name="price" value="{{$variantItem->price}}">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Is Default</label>
                    <select id="" class="form-control" name="is_default">
                      <option value="">Select</option>
                      <option {{$variantItem->is_default == 1 ? 'selected' : ''}} value="1">Yes</option>
                      <option {{$variantItem->is_default == 0 ? 'selected' : ''}} value="0">No</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Status</label>
                    <select id="" class="form-control" name="status">
                      <option {{$variantItem->status == '1' ? 'selected' : ''}} value="1">Active</option>
                      <option {{$variantItem->status == '0' ? 'selected' : ''}} value="0">Inactive</option>
                    </select>
                  </div>
                </div>

              </div>

              <div class="btnn">
                <button type="submit" class="btn btn-primary">Update</button>
               </div>

             </form>
            </div>
          
          </div>
        </div>
      </div>
      
    </div>
  </section>

@endsection

