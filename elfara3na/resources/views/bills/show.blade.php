@extends('layouts.master')

@section('content')
     
<div class="box">
             
            <!-- /.box-header -->
            <div class="box-body">
              <table dir="rtl" id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center"> رقم الفاتوره </th>
                  <th style="text-align:center"> التاريخ </th>
                  
                  <th style="text-align:center" >الشحن </th>
                  <th style="text-align:center"> سعر الفاتورة  </th>
                  <th style="text-align:center"> الدفع  </th>
                  <th style="text-align:center" > اسم العميل </th>
                  </tr>
                </thead>
                <tbody>
                 @foreach( $bills as $bill )   
                <tr>
                <td style="text-align:center">
                <a  href='{{url("/bills/print2/$bill->id")}}'>
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
                  <a  href='{{url("/customer/details/$bill->customer_id")}}'>
                      {{$bill->name}}
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