@extends('layouts.master')

@section('content')

<div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user1-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">{{$customer->name}}</h3>

              <p class="text-muted text-center">{{$customer->adress}}</p>
              <p class="text-muted text-center">{{$customer->phone}}</p>
               <h2 class="text-center">
                  <b class="pull-right" style="margin-right:300px">المحفظة</b> 
                  <a class="pull-left" style="margin-left:300px"> <strong> {{$customer->payment}} </strong></a>
              </h2>
             
             </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
 </div>
        
        <div class="box">
             
             <!-- /.box-header -->
             <div class="box-body">
               <table dir="rtl" id="example2" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th style="text-align:center"> رقم الفاتوره </th>
                   <th style="text-align:center"> التاريخ </th>
                   
                   <th style="text-align:center" >الشحن </th>
                   <th style="text-align:center"> سعر الفاتورة  </th>
                   <th style="text-align:center"> الدفع  </th>
                   <th style="text-align:center"> الاكشن  </th>
                   </tr>
                 </thead>
                 <tbody>
                  @foreach( $customer_all_bills as $bill )   
                 <tr>
                 <td style="text-align:center">
                 <a  href='{{url("/bills/print/$bill->id")}}'>
                   {{$bill->id}}
                   </a>
                 </td>
                   <td style="text-align:center">
                   
                   {{date('d-m-Y', strtotime($bill->created_at)) }}
                   </td>
                   
                   <td style="text-align:center">
                   {{$bill->transport}}
                   </td>
                   <td style="text-align:center">
                   <strong>
                   {{$bill->total_bill_price}}
                   </strong>
                   </td>
                   <td style="text-align:center">
                   <strong>
                   {{$bill->payments}}
                   </strong>
                   </td>
                  
                   <td style="text-align:center">
                   <a  href='{{url("/bill/delete/$bill->id/$customer->id")}}' onclick="return confirm('  هل تريد مسح الفاتورة ؟  ')">
                   <strong>
                    مسح
                   </strong>
                   </a>
                   </td>
                 </tr>
                 @endforeach
                 </tbody>
                 
               </table>
             </div>
             <!-- /.box-body -->
           </div>
 
 


     

@endsection