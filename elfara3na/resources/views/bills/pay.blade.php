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
       
        
         


        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">الدفع علي الفاتورة  </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form   role="form" method="POST" action="{{ url('/payment/create') }}">
                        {{ csrf_field() }}
              <div class="box-body">
                
                
              
              

              <div class="form-group">
                   <label for="exampleInputEmail1">اسم العميل</label>
                <select class="form-control select2" style="width: 100%;" name="customer_id" required>
                @foreach($customers as $customer)
                  <option value="{{$customer->id}}">{{$customer->name}}</option>
                @endforeach
                </select>
                </div>
               
                <div class="form-group">
                  <label for="exampleInputPassword1">المدفوع</label>
                  <input type="number" step="any" name="payment" class="form-control"  placeholder=" فقط بالجنيه" required>
                </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
              </div>
            </form>
          </div>    

        </div>

      </div>

@endsection