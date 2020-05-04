@extends('layouts.master')

@section('content')

@if (session()->has('message'))
    
<div class="alert alert-success alert-dismissible" style="font-size:20px;font-weight:bold">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> تنبيه!</h4>
                {!! session('message') !!}
              </div>
    
@endif

<div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">بتعديل اسم القطاع  </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form   role="form" method="POST" action="{{ url('/customer/edit') }}">
                        {{ csrf_field() }}
              <div class="box-body">
                
                
                <div class="form-group">
                  <label for="exampleInputPassword1">اسم العميل</label>
                  <input type="text" name="name" value="{{$customer->name}}" class="form-control"  placeholder="اسم العميل" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">التليفون</label>
                  <input type="text" name="phone" value="{{$customer->phone}}" class="form-control"  placeholder="التليفون" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">العنوان</label>
                  <input type="text" name="address" value="{{$customer->address}}" class="form-control"  placeholder="العنوان" required>
                </div>

                
               <input type="hidden" name="customer_id" value="{{$customer->id}}" class="form-control"  required>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
              </div>
            </form>
          </div>    
</div>
         
      </div>

@endsection