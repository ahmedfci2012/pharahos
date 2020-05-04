@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
طباعة الفاتورة 
      </h1>
      
    </section>
    <br/>
    <h3 style="color:black;text-align: center; "> 
       الفراعنة لبيع قطاعات الألمونيوم 
       <span style="margin-right:200px">
       رقم الفاتورة  {{ $bill->id }}
       </span>
    </h3>
<div class="box" style="padding-top:0px">
             
             
            <div class="box-body" style="padding-top:0px">
            <h3 dir="rtl" style="margin-right:5px">
            <div> اسم العميل : {{$customer->name}} </div>
            <div>التاريخ : {{date('d-m-Y', strtotime($bill->created_at)) }} </div>       
             
            </h3> 

            <table dir="rtl" id="example" class="table table-bordered table-striped" style="">
                <thead>
                <tr>
                <th style="text-align:center" >العدد</th>
                  <th style="text-align:center" >القطاع</th>
                  <th style="text-align:center" >الصنف</th>

                  <th style="text-align:center" >اللون </th>
                  <th style="text-align:center">الوزن </th>
                  <th style="text-align:center">السعر </th>
                  <th style="text-align:center">الأجمالي </th>

                </tr>
                </thead>

                 <tbody >

                 @foreach( $sub_bills as $sub )   
                <tr>

                  <td style="text-align:center ; padding-top:0; padding-bottom:0">
                  <strong>{{$sub->quantity}} </strong>
                  </td>

                  <td style="text-align:center; padding-top:0; padding-bottom:0">
                  <strong>{{$sub->section_name}}  </strong>
                  </td>

                  <td style="text-align:center ; padding-top:0; padding-bottom:0">
                  <strong>{{$sub->sub_name}} </strong>
                  </td>
                   
                  <td style="text-align:center ; padding-top:0; padding-bottom:0">
                  <strong>{{$sub->color}} </strong>
                  </td>

                  <td style="text-align:center ; padding-top:0; padding-bottom:0">
                  <strong>{{$sub->weight}} </strong>
                  </td>

                  <td style="text-align:center; padding-top:0; padding-bottom:0">
                  <strong>{{$sub->price}}  </strong>
                  </td>

                  <td style="text-align:center ; padding-top:0; padding-bottom:0">
                  <strong>{{$sub->total_price}}  </strong>
                  </td>

                </tr>
                @endforeach


                <tr>
                  
                  <td>
                  
                  </td>
                   
                  <td style="text-align:center;padding-top:0; padding-bottom:0" colspan="4">
                  <strong>
                  نقـــــــــــــــــل
                  </strong>
                  </td>

                  <td style="text-align:center;padding-top:0; padding-bottom:0" >
                  
                  <strong>
                  {{$bill->transport}}
                  </strong>
                  </td>
                  <td>
                  
                  </td>
                
                
                </tr>
                      <tr>
                  
                  <td>
                  
                  </td>
                   
                  <td style="text-align:center ; padding-top:0; padding-bottom:0" colspan="4">
                  <strong>
                    اﻷجمــــــالـــــــي 
                  </strong>
                  </td>

                   

                  <td style="text-align:center;padding-top:0; padding-bottom:0">
                  <strong>
                  {{ $total  }}
                  </strong>
                  </td>

                  <td>
                  
                  </td>

                </tr> 

                @if(!empty($show))
                <tr>
                  
                  <td>
                  
                  </td>
                   
                  <td style="text-align:center; padding-top:0; padding-bottom:0" colspan="4">
                  <strong>
                  حـســــــاب ســــــــــابق
                  </strong>
                  </td>

                  <td style="text-align:center; padding-top:0; padding-bottom:0" >
                  
                  @if($old_wallet > 0) 
                    <strong>  له   {{$old_wallet}}    </strong>                   
                  @else
                    <strong>عليه  {{$old_wallet }}  </strong>
                  @endif
                  </td>
                  <td>
                  
                  </td>
                </tr>
                <tr>
                  
                  <td>
                  
                  </td>
                   
                  <td style="text-align:center;padding-top:0; padding-bottom:0" colspan="4">
                  <strong>
                  اجمــــالــــي الفــــاتورة  
                  </strong>
                  </td>

                  <td style="text-align:center;padding-top:0; padding-bottom:0" >
                  
                  
                  @if($new_wallet > 0) 
                    <strong>   له  {{$new_wallet}}    </strong>                   
                  @else
                    <strong>   عليه  {{$new_wallet }}   </strong>
                  @endif

                 
                  
                  </td>
                  <td>
                  
                  </td>
                </tr>
                @endif

                </tbody>
                      
                
              </table>

               
               
                         
 
            </div>
           
          </div>
          <div dir="rtl" style="font-size: 10px; margin-right:10px">
          <p>
            <strong> 
            برجاء مراجعة الفاتورة عند الاستلام و المصنع غير مسؤل عن اي نقص بعد مغادرة السيارة
            </strong>
            </p> <br>
            <p>
            <strong> 
             العنوان : شارع ناهيا الرئيسي بجوار بنزينة مجدي الزمر  
            </strong>
            </p> 
            <p>
            <strong> 
              موبايل : 01009413395
            </strong>
            </p>
            <p>
            <strong> 
              موبايل : 01120103460 (مفعل بخدمة واتس اب) 
            </strong>
            </p>
           </div>
@endsection