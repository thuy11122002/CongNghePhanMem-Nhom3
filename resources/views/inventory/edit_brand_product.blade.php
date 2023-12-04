@extends('inventory_layout')
@section('inventory_content')

<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12 text-center">
            <h2 class="tm-block-title d-inline-block">Cập nhật thương hiệu</h2>
          </div>
        </div>
        @foreach($edit_brand_product as $key => $edit_value)
        <div class="row tm-edit-product-row justify-content-center">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="{{URL::to('/update-brand-product-inventory/'.$edit_value->brand_id)}}" class="tm-edit-product-form" method="get">
              {{ csrf_field() }}
              <div class="form-group mb-3">
                <label for="name">Tên thương hiệu</label>
                <input value="{{ $edit_value->brand_name }}" id="name" name="brand_product_name" type="text" class="form-control form-control-lg validate" required="">
              </div>

              <div class="form-group mb-3">
                <label for="description">Mô tả thương hiệu</label>
                <textarea name="brand_product_desc" class="form-control validate" rows="5" required="" style="width: 100%">
{{$edit_value->brand_desc }}
                </textarea>
              </div>
              <div class="col-12">
                <button name="update_brand_product" type="submit" class="btn btn-primary btn-block text-uppercase" fdprocessedid="yeyseq">Cập nhật thương hiệu</button>
              </div>
            </form>
          </div>
        </div>

        @endforeach
      </div>

      <div class="row">
      <div class="col-12 text-center">
        <h5 class="tm-block-title d-inline-block" style="color: red;">
          <?php
          $message = Session::get('message');
          if ($message) {
            echo $message;
            Session::put('message', null);
          }
          ?>
        </h5>
      </div>
    </div>

    </div>


    

  </div>
</div>

@endsection