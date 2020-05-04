@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
      جميع القطاعات
        <small>جميع القطاعات</small>
      </h1>
      
    </section>
    <br/>

<div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><h3> اسم القطاع </h3></th>
                  <th><h3> الأكشن </h3</th>
                </tr>
                </thead>
                <tbody>
                 @foreach( $sections as $section )   
                <tr>
                 
                  <td>{{$section->name}}
                  </td>
                   
                  <td>
                  <a class="btn btn-app" href='{{url("/subsection/index/$section->id")}}'>
                        <i class="fa fa-eye"></i> عرض
                  </a> 

            <a class="btn btn-app" href='{{url("/sections/edit/$section->id")}}'>
                        <i class="fa fa-edit" style="color:blue;"></i> تعديل
                  </a> 
        <a class="btn btn-app" href='{{url("/sections/delete/$section->id")}}' onclick="return confirm('  هل تريد مسح القطااع ! علما بأن سيتم مسح القطاع بالمكونات ؟  ')">
                        <i class="fa fa-trash" style="color:red;"></i> مسح
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
