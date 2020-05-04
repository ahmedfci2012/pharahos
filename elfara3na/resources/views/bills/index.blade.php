@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
انشاء فاتورة          
 <small>انشاء فاتورة</small>
      </h1>
      
    </section>
    <br/>
    @if (Session :: has ('bills') && count (Session :: get ('bills'))>0 )
        <a class="btn btn-success" href='{{url("/bills/bill")}}' >
                        انهاء الفاتورة
          </a> 
        @endif
<div class="box">
             
            <!-- /.box-header -->
            <div class="box-body">
              <table dir="rtl" id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center"> القطاع </th>
                  <th style="text-align:center" > الصنف </th>
                  <th style="text-align:center" >الرقم </th>
                  <th style="text-align:center"> الكمية  </th>
                  <th style="text-align:center" >الاكشن </th>
                </tr>
                </thead>
                <tbody>
                 @foreach( $subs as $sub )   
                <tr>
                <td style="text-align:center">
                  {{$sub->section_name}}
                  </td>
                  <td style="text-align:center">
                  {{$sub->name}}
                  </td>
                  <td style="text-align:center">
                  {{$sub->num}}
                  </td>
                  <td style="text-align:center">
                  <strong>
                  {{$sub->quantity}}
                  </strong>
                  </td>
                  <td style="text-align:center">
                  <a class="btn btn-app" href='{{url("/bills/add/$sub->id")}}'>
                        <i class="fa fa-cart-arrow-down" style="color:green"></i> اضافة الصنف الي الفاتورة
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