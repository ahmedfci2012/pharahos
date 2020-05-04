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
              <h3 class="box-title">تعديل بيانات المكون  </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
    <form   role="form" method="POST" action="{{ url('/subsection/edit') }}">
                        {{ csrf_field() }}
              <div class="box-body">
                
                
                <div class="form-group">
                  <label for="exampleInputPassword1">رقم المكون</label>
                  <input type="text" name="num" value="{{$subsection->num}}" class="form-control"  placeholder="رقم المكون" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">اسم المكون</label>
                  <input type="text" name="name" value="{{$subsection->name}}" class="form-control"  placeholder="اسم المكون" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">كمية المكون</label>
                <input type="text" name="quantity" value="{{$subsection->quantity}}" class="form-control"  placeholder="كمية المكون" required>
                </div>
                
                
               <input type="hidden" name="subsection_id" value="{{$subsection->id}}" class="form-control"  required>
               
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