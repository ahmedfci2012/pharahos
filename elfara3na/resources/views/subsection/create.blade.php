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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">القطاع الحالي </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                                   <th>اسم القطاع</th>
                 
                </tr>
                
                <tr style="font-size:20px;font-weight:bold;color:blue">
                   
                  <td><h3>  {{$section->name}}</h3></td>

                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" > مكونات قطاع  <span style="font-size:20px;font-weight:bold;color:blue">{{$section->name}}</span> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th><h3>رقم المكون</h3>   </th>
                  <th><h3>اسم المكون</h3> </th>
                  <th><h3>الكمية</h3> </th>
                  <th> <h3>الاكشن</h3> </th>
                </tr>
                
                
                @foreach($sub_sections as $sub)
                <tr style="font-size:20px;font-weight:bold;color:green">
                  <td>{{$sub->num}}</td>
                  <td>{{$sub->name}}</td>
                  <td>{{$sub->quantity}}</td>
                  <td>
                   

  <a class="btn btn-warning" href='{{url("/subsection/edit/$sub->id")}}'>
                        <i class="fa fa-edit" style="color:blue;"></i> تعديل
                  </a> 
 <a class="btn btn-danger" href='{{url("/subsection/delete/$section->id/$sub->id")}}' onclick="return confirm('  هل تريد مسح المكون !   ؟  ')">
                        <i class="fa fa-trash" style="color:red;"></i> مسح
                  </a> 
                  </td>
                </tr>
                @endforeach


              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box">
            <div class="box-header" >
              <h3 class="box-title">ادخل الاجزاء في  قطاع  <span style="font-size:20px;font-weight:bold;color:blue">{{$section->name}}</span>   </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form   role="form" method="POST" action="{{ url('/subsections/create') }}">
                        {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                   <label for="exampleInputEmail1">رقم المكون</label>
                  <input type="text" name="num"  class="form-control"  placeholder=" أدخل رقم المكون " required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">اسم المكون</label>
                  <input type="text" name="name" class="form-control"  placeholder="أدخل اسم المكون " required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"> كمية المكون </label>
                  <input type="number" min="0" name="quantity" class="form-control"  placeholder="كمية المكون أدخل " required>
                </div>
                <input type="number" min="1" name="section_id"  value={{$section->id}} hidden>                 
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