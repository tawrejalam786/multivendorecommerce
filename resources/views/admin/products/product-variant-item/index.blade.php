@extends('admin.layouts.master')

@section('content')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
      <h1>Product Variant Items</h1>
    </div>
    <div class="mb-3 ml-2">
        <a href="{{route('admin.products-variant.index', ['product' => $product->id])}}" class="btn btn-primary">Back</a>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
             <div class="headingss">
               <h4 style="margin: 0px;line-height:0;">All Product Variant Items</h4><br>
               {{-- <h3 style="font-size: 14px;margin-top:0;">Product : {{$product->name}}</h3> --}}
             </div>
              <div class="card-header-action">
                <a href="{{route('admin.product-variant-item.create', ['productId' => $product->id, 'variantId' => $variant->id])}}" class="btn btn-primary"> <i class="fas fa-plus"></i> Create New</a>
              </div>
            </div>
            <div class="card-body">
              {{ $dataTable->table() }}
            </div>
          
          </div>
        </div>
      </div>
      
    </div>
  </section>

@endsection

{{-- @push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush --}}

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
     <script>
      $(document).ready(function(){
        $('body').on('click', '.change-status', function(){
          let isChecked = $(this).is(':checked');
          let id = $(this).data('id');

          $.ajax({
            url: "{{route('admin.products-variant.change-status')}}",
            method: 'PUT',
            data: {
              status: isChecked,
              id: id
            },
            success: function(data){
              toastr.success(data.message);
            },
            error: function(xhr, status, error){
              console.log(error);
            }
          })
        })
      })
    </script>
@endpush