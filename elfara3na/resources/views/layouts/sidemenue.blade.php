<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img   src="{{asset('dist/img/cc.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
       
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        
        
      <li>
          <a href="{{ url('/') }}">
            <i class="fa fa-eye"></i> <span>عرض القطاعات</span>
            
          </a>
        </li>

        <li>
          <a href="{{ url('/sections/index') }}">
            <i class="fa fa-plus"></i> <span>اضافة قطاع</span>
            
          </a>
        </li>
        <!-- -->
        <li>
          <a href="{{ url('/bills') }}">
            <i class="fa fa-calendar"></i> <span>انشاء فاتورة</span>
            
          </a>
        </li>
       
        <li>
          <a href="{{ url('/customers/index') }}">
            <i class="fa fa-user-plus"></i> <span>العملاء</span>
            
          </a>
        </li>

        <li>
          <a href="{{ url('/customer/add') }}">
            <i class="fa fa-user-plus"></i> <span>اضافة عميل</span>
            
          </a>
        </li>


        <li>
          <a href="{{ url('/bills/all') }}">
            <i class="fa fa-calendar"></i> <span>عرض الفواتير</span>
            
          </a>
        </li>

        <li>
          <a href="{{ url('/payment') }}">
            <i class="fa fa-money"></i> <span>الدفع</span>
            
          </a>
        </li>
        
       
         
         </ul>
    </section>
    <!-- /.sidebar -->
  </aside>