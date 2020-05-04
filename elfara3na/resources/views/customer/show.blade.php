@extends('layouts.master')

@section('content')
<section class="content-header" dir="rtl">
      <h1>
     العملاء   
     <small>جميع العملاء</small>
      </h1>
      
    </section>
    <br/>

<div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" dir="rtl" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center"><h3> اسم العميل </h3></th>
                  <th style="text-align:center"><h3> التليفون </h3></th>
                  <th style="text-align:center"><h3> العنوان </h3></th>
                   <th style="text-align:center"><h3> الأكشن </h3></th>
                </tr>
                </thead>
                <tbody>
                 @foreach( $customers as $customer )   
                <tr>
                 
                  <td style="text-align:center">
                  <h4><strong> {{$customer->name}} </strong></h4>
                  </td>
                   
                  <td style="text-align:center">
                  <h4><strong> {{$customer->phone}} </strong></h4>
                  </td>
                  <td style="text-align:center">
                  <h4><strong> {{$customer->address}} </strong></h4>
                  </td>

                  <td style="text-align:center">
                  <h4>
                  <strong>
             
                    

                    <a class="btn btn-app" href='{{url("/customer/details/{$customer->id}")}}'>
                        <i class="fa fa-eye"></i> عرض
                  </a> 

            <a class="btn btn-app" href='{{url("/customer/edit/$customer->id")}}'>
                        <i class="fa fa-edit" style="color:blue;"></i> تعديل
                  </a> 

                  <a class="btn btn-app" href='{{url("/customer/delete/$customer->id")}}' onclick="return confirm('هل تريد مسح العميل ؟ علما بانه سيتم مسح جميع الفواتير الخاصة به و مسح الحساب الخاص به ؟ ')">
                        <i class="fa fa-trash" style="color:blue;"></i> مسح
                  </a> 

                  </strong><h4>
                  </td>
                </tr>
                @endforeach
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>

@endsection
