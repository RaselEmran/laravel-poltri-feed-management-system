  <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item {{Request::is('admin/dashboard') ?'active':''}}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">ড্যাশবোর্ড</span></a></li>
                        <li class="sidebar-item {{Request::is('admin/customer*') ?'active':''}}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.customer')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">কাস্টমার</span></a></li>

                          <li class="sidebar-item {{Request::is('admin/category*') ?'active':''}}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.category')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">ক্যাটাগরি</span></a></li>
                        <li class="sidebar-item {{Request::is('admin/sell-product*') ?'active':''}}"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">প্রতিদিনের হিসাব  </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                             <!--    <li class="sidebar-item"><a href="{{route('admin.sell-product.regular')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> নিয়মিত </span></a></li> -->

                                 <li class="sidebar-item"><a href="{{route('admin.sell-product.regular-cust')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> নিয়মিত </span></a></li>
                                <li class="sidebar-item"><a href="{{route('admin.sell-product.mobile')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> অনিয়মিত </span></a></li>
                            </ul>
                        </li>

                            <li class="sidebar-item {{Request::is('admin/sellinfo*') ?'active':''}}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.sellinfo')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">বিক্রিত পণ্য</span></a></li>

                            <li class="sidebar-item {{Request::is('admin/allsellinfo*') ?'active':''}}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.allsellinfo')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">সকল বিক্রিত পণ্য</span></a></li>
          
         
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>