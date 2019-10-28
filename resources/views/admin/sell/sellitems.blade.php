@extends('welcome')
@section('title','Feed-System:Sell-Items')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
      <link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('backend/dist/css/datatable.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
@endpush

@section('content')
<div class="row"> 
   <div class="col-md-12">
         <div class="card">
                           <div style="margin-top: 25px">
                                 <button type="button" class="btn btn-success margin-5" data-toggle="modal" data-target="#Modal1">
                                  নিয়মিত কাস্টমার কতৃক বিক্রিত পণ্য
                                </button>
                         
                                </button>
                                <!-- Button trigger modal -->
                               <a href="{{route('admin.sell-product.regular')}}" class="btn btn-info margin-5" style="float: right;"> নতুন পণ্য বিক্রয় করুন  </a>
                           </div>
                            <!-- Tab panes -->
                             <?php 
                             $users = DB::table('sell_totals')
                                    ->join('buyers', 'sell_totals.cust_name', '=', 'buyers.id')
                                    ->select('sell_totals.*', 'buyers.name as bname')
                                    ->where('sell_totals.type','regular')
                                    ->get();
                               ?>  
                             
                                   <div class="row">
                                         <div class="col-md-3"  style="background: #555555;padding: 18px;margin: 25px;color: #fff;font-size: 22px">
                                           <p>সর্বমোট</p>
                                           {{$users->sum('sub_total')}}
                                        </div>

                                        <div class="col-md-3"  style="background: #555555;padding: 18px;margin: 25px;color: #fff;font-size: 22px">
                                           <p>গ্র্যান্ড টোটাল</p>
                                           {{$users->sum('grand_total')}}
                                        </div>
                                   </div>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="p-20">
                                  <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>সেল আইডি</th>
                                                <th>তারিখ</th>

                                                <th>কাস্টমার নাম</th>
                                                <th>সর্বমোট</th>
                                                <th>গ্র্যান্ড টোটাল</th>
                                                <th>বিবরণ</th>
                                            </tr>
                                        </thead>
                               
                                        <tbody>
                                            @foreach($users as $key=> $all)
                                            <tr>
                                        
                                              <td>{{$key+1}}</td>
                                              <td>{{$all->date}}</td>
                                              <td>{{$all->bname}}</td>
                                              <td>{{$all->sub_total}}</td>
                                              <td>{{$all->grand_total}}</td>
                                              <td><a href="{{route('admin.regular-view',$all->id)}}" class="btn btn-info">View</a></td>

                                            </tr>

                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                 <th>সেল আইডি</th>
                                                <th>তারিখ</th>

                                                <th>কাস্টমার নাম</th>
                                                <th>সর্বমোট</th>
                                                <th>গ্র্যান্ড টোটাল</th>
                                                <th>বিবরণ</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                             <div style="margin-top: 25px">
                                 <button type="button" class="btn btn-success margin-5" data-toggle="modal" data-target="#Modal1">
                                  অনিয়মিত কাস্টমার কতৃক বিক্রিত পণ্য
                                </button>
                         
                                </button>
                                <!-- Button trigger modal -->
                            
                                  <a href="{{route('admin.sell-product.mobile')}}" class="btn btn-info margin-5" style="float: right;"> নতুন পণ্য বিক্রয় করুন  </a>
                                   
                               
                           </div>
                             <?php 
                              $allcus =DB::table('sell_totals')->where('type','mobile')->get();
                               ?> 

                                   <div class="row">
                                         <div class="col-md-3"  style="background: #555555;padding: 18px;margin: 25px;color: #fff;font-size: 22px">
                                           <p>সর্বমোট</p>
                                           {{$allcus->sum('sub_total')}}
                                        </div>

                                        <div class="col-md-3"  style="background: #555555;padding: 18px;margin: 25px;color: #fff;font-size: 22px">
                                           <p>গ্র্যান্ড টোটাল</p>
                                           {{$allcus->sum('grand_total')}}
                                        </div>
                                   </div>
                          <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="p-20">
                                  <div class="table-responsive">
                                    <table id="myTable1" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               <th>সেল আইডি</th>
                                               <th>তারিখ</th>
                                                <th>কাস্টমার নাম</th>
                                                <th>সর্বমোট</th>
                                                <th>গ্র্যান্ড টোটাল</th>
                                                <th>বিবরণ</th>
                                            </tr>
                                        </thead>
                                     
                                        <tbody>
                                            @foreach($allcus as  $all)
                                            <tr>
                                              <td>{{$loop->index+1}}</td>
                                              <td>{{$all->date}}</td>

                                              <td>{{$all->customer}}</td>
                                              <td>{{$all->sub_total}}</td>
                                              <td>{{$all->grand_total}}</td>
                                              <td><a href="{{route('admin.mobile-view',$all->id)}}" class="btn btn-info">View</a></td>


                                            </tr>

                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               <th>সেল আইডি</th>
                                               <th>তারিখ</th>
                                                <th>কাস্টমার নাম</th>
                                                <th>সর্বমোট</th>
                                                <th>গ্র্যান্ড টোটাল</th>
                                                <th>বিবরণ</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

          


@endsection
@push('js')
    <!-- <script src="{{asset('backend/assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('backend/assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script> -->
    <script src="{{asset('backend/assets/extra-libs/DataTables/datatables.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('backend/assets/extra-libs/datatables_button.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/assets/extra-libs/datatables_flash.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/assets/extra-libs/datatables_jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/assets/extra-libs/datatables_pdfmake.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="{{asset('backend/assets/extra-libs/datatables_buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/assets/extra-libs/datatables_print.min.js')}}"></script>
<!--   <script src="{{asset('backend/assets/libs/toastr/build/toastr.min.js')}}"></script> -->
<script type="text/javascript">
   $(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
        ]
    } );


        $('#myTable1').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
        ]
    } );


} );
</script>

  <script>
   
     @if(session('msg'))
        
                toastr.success('{{session('msg')}}');
     @endif

      @if ($errors->any())
      @foreach ($errors->all() as $error)
        
                toastr.error('{{$error}}');
      @endforeach
     @endif
           
  </script>

  <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

  $(".edit-cus").click(function(){
    var cus_id =$(this).attr('cus_id');
 
          $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/customer/edit')}}",
              data : {cus_id:cus_id},
              dateType: 'json',
              success: function(data){
             
               $("#id").val(data.id);
               $("#name").val(data.name);
               $("#phone").val(data.phone);
               $("#address").val(data.address);
               $("#nid").val(data.nid);
               $("#fb_link").val(data.fb_link);
                $("#output_image1").attr("src",'/'+
                    data.image);

                  
               }
              
            });

        
  });
  </script>
@endpush