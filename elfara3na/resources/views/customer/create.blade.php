@extends('layouts.master')

@section('content')

@if (session()->has('message'))
    
<div dir="rtl" class="alert alert-success alert-dismissible" style="font-size:20px;font-weight:bold">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> تنبيه!</h4>
                {!! session('message') !!}
              </div>
    
@endif

<div class="row" dir="rtl">
        <!-- left column -->
       
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">أضافة عميل جديد  </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form   role="form" method="POST" action="{{ url('/customer/create') }}">
                        {{ csrf_field() }}
              <div class="box-body">
                
                
                <div class="form-group">
                  <label for="exampleInputPassword1">اسم العميل</label>
                  <input type="text" name="name" class="form-control"  placeholder="أدخل أسم العميل" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">التليفون</label>
                  <input type="number" name="phone" class="form-control"  placeholder="أدخل رقم التليفون" required>
                </div>


                <div class="form-group">
                  <label for="exampleInputPassword1">العنوان</label>
                  <input type="text" name="address" class="form-control"  placeholder="أدخل العنوان" required>
                </div>

                     
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
                <span style="margin:20px">  محفظة العميل الأن فارغة <span>
              </div>
            </form>
          </div>    

        </div>
         
      </div>

@endsection