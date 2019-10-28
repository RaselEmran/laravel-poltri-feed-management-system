@extends('welcome')
@section('title','Feed-System:Calan-statement')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
      <link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('backend/dist/css/datatable.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
@endpush

@section('content')
<div id="div1">
<div class="row"> 
  <div class="col-md-5" >
    <div class="card" style="margin-left: 5px">
    <h3>মোট খরচঃ {{$colman->sum('total')}}</h3>
    <h3>কমিশনঃ {{$invo->sum('input_dis')}}</h3>
    <h3>কমিশনের পরিমানঃ {{$invo->sum('output_dis')}}</h3>
    <h3>ছারের পরিমানঃ {{$invo->sum('less')}}</h3>
    <?php 
  $to =$colman->sum('total');
  $com =$invo->sum('output_dis');
  $less=$invo->sum('less');
  $sum= $com+$less;
  $pay =$invo->sum('paid');
  $ne_pay =$cus_cash->sum('amount');
  $payble =$pay+$ne_pay;
  $final =$to-$sum;
 
     ?>
    <h3>সব্মোটঃ {{$final}}</h3>

    <h3>পন্য কেনার সময় পরিশোধঃ {{$invo->sum('paid')}}</h3>
    <h3>নতুন করে পরিশোধঃ {{$cus_cash->sum('amount')}}</h3>

    <hr>
    @if($payble>$final)
    <h3>লাভ: {{ $jer =$payble-$final}}</h3>
    @else
    
    <h3>জেরঃ {{$jer =$final-$payble}}</h3>

    @endif
   

      <h4  style="text-align: center;">নতুন করে জমা দিন</h4><br>
         
               <form method="POST" action="{{route('admin.save-cash')}}">
           {{ @csrf_field()}}
            <div class="form-group container">
              <input type="hidden" name="buyer_id" value="{{$bid}}">
              <input type="hidden" name="calan_id" value="{{$id}}">
              <input type="text"  class="form-control" name="amount" placeholder="পরিমান প্রবেশ করুন " required></div>
              <button type="submit" class="btn btn-success" style="margin-left: 35%">সংরক্ষণ করুন </button><br><br>
            </form>

  </div>
</div>
   <div class="col-md-7">
         <div class="card">
             
                                    

                                  <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="p-20">
                                  <div class="table-responsive">
                                     
                                    <table id="myTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                  <th>চালান</th>
                                                  <th>ক্যাটাগরি</th>
                                                  <th>পণ্য </th>
                                                  <th>পরিমান</th>
                                                  <th>দাম</th>
                                                  <th>মোট</th>
                                            </tr>
                                        </thead>
                               
                                        <tbody>
                                         
                                       @foreach($colman as $value)
                                    <tr>
                                       <td>{{$value->calan_name}}</td>
                                       <td>{{$value->category_name}}</td>
                                       <td>{{$value->pid}}</td>
                                       <td>{{$value->qty}}</td>
                                       <td>{{$value->price}}</td>
                                       <td>{{$value->total}} </td>

                                    </tr>




                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>চালান</th>
                                                <th>ক্যাটাগরি</th>
                                                <th>পণ্য </th>
                                                <th>পরিমান</th>
                                                <th>দাম</th>
                                                <th>মোট</th>
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
         </div>
            <div class="text-center">
                <button class="btn btn-danger"onclick="printContent('div1')" type="button"> প্রিন্ট করুন </button>
            </div>
             
         <div class="col-md-12">
         <div class="card">
             
                                    
<h2 style="text-align: center;">নতুন করে জমার পরিমান</h2>
                             <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="p-20">
                                  <div class="table-responsive">
                                     
                                    <table id="myTable1" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                  <th>তারিখ</th>
                                                  <th>পরিমান</th>
                                                  
                                            </tr>
                                        </thead>
                               
                                        <tbody>
                             <?php $cus_cash =DB::table('customer_cashes')->where('buyer_id',$bid)->where('calan_id',$id)->get()?>            
                                       @foreach($cus_cash as $value1)
                                    <tr>
                                       <td>{{$value1->date}}</td>
                                       <td>{{$value1->amount}}</td>
                                 

                                    </tr>




                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                             <th>তারিখ</th>
                                              <th>পরিমান</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                  </div>
                                </div>
                              </div>
                          
                            </div>

                  </div>
                </div>
            
              <form method="POST" action="{{route('admin.customer.sells-end')}}">
       {{ @csrf_field()}}
         
              <input type="hidden" name="buyer_id" value="{{$bid}}">
              <input type="hidden" name="calan_id" value="{{$id}}">
              <input type="hidden" name="khoroc" value="{{$final}}">
              <input type="hidden" name="porishod" value="{{$payble}}">
              <input type="hidden" name="jer" value="{{$jer}}">
              <button type="submit" class="btn btn-success" style="margin-left: 41%">চালান শেষ করুন </button>
            </form>
              
            
          


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

     @if(session('emsg'))
        
                toastr.success('{{session('emsg')}}');
                      <?php 
          Session::put('emsg',null);
                 ?>
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


  </script>

  <script>
  function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
@endpush