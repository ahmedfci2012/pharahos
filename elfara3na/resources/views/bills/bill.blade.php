@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
قطاعات  الفاتورة          
 
      </h1>
      
    </section>
    <br/>
    
<div class="box">
             
             
            <!-- /.box-header -->
            <div class="box-body">
            <form dir="rtl" method="POST" action="{{ url('/bills/create') }}">
            {{ csrf_field() }}
              <table dir="rtl"  id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center">القطاع</th>
                  <th style="text-align:center">الصنف</th>
                  <th style="text-align:center">العدد </th>
                  <th style="text-align:center">اللون </th>
                  <th style="text-align:center">الوزن </th>
                  <th style="text-align:center">السعر </th>
                </tr>
                </thead>

                 <tbody>

                 
                
                 <?php
                 $ids = []; 
                 foreach($subs as $sub) {
                  ?>
                 <tr>
                 
                    <td style="text-align:center">{{$sub->section_name}}</td>
                    <td style="text-align:center">{{$sub->name}}</td>
                    <td style="text-align:center">
                    <input type="number" min="0.5" step="0.5" max="{{$sub->quantity}}" name="quantity{{$sub->id}}" id="{{$sub->id}}" placeholder= "" required>
                  
                  <?php 
                    if( array_search($sub->section_id, $ids) === false){
                  ?>
                 <td style="text-align:center">
                  <input type="text" name="color{{$sub->id}}" id="color{{$sub->id}}" placeholder= "" required>
                  </td>

                  <td style="text-align:center">
                  <input type="number" step="any" name="weight{{$sub->id}}" id="weight{{$sub->id}}" placeholder= ""  required>
                  </td>

                  <td style="text-align:center">
                  <input type="number" step="any"  name="price{{$sub->id}}" id="price{{$sub->id}}" placeholder= ""  required>
                  </td>
                    <?php
                  array_push( $ids , $sub->section_id );
                  } else {?>
                  <td ></td>
                  <td ></td>
                  <td ></td>
                  <?php } ?>
                </tr>
                
                <?php } ?>
                 
                            
                </tbody>
                      
                
              </table>

               
              <div class="form-group">
                   <label for="exampleInputEmail1">اسم العميل</label>
                <select class="form-control select2" style="width: 100%;" name="customer_id" required>
                @foreach($customers as $customer)
                  <option value="{{$customer->id}}">{{$customer->name}}</option>
                @endforeach
                </select>
                </div>


                <div class="form-group">
                   <label for="exampleInputEmail1">سعر الشحن</label>
                  <input type="number" step="any" name="transport"  class="form-control"  placeholder="سعر الشحن  " required>
                </div>

                <div class="form-group">
                <button type="submit" class="btn btn-success" >
                                    <i class="fa fa-btn btn-big fa-save"></i> حفظ الفاتورة
                                </button>
               </div>

               
                         

         
                   
              </form>
            </div>
            <!-- /.box-body -->
          </div>
<script>

</script>
@endsection