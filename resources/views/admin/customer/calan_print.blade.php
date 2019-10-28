@extends('welcome')
@section('title','Feed-System:Sell-product')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
      <link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('backend/dist/css/datatable.css')}}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{asset('/backend/assets/libs/select2/dist/css/select2.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('/backend/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
@endpush

@section('content')
<div id="div1">
<div class="row" style="max-width: 98%;margin: auto;padding: 5px; border: 1px dotted;background: #fff">
   <div class="col-md-12">
              <address>
            <h3>এস ট্রেডাস্</h3>
            <h4 class="font-bold"><b>প্রোপাইটার: </b>মোঃইসমাইল আলী(বিপ্লব)</h4>
            <p class="text-muted m-l-30"><b>Phone: </b>
                <br/><b>ঠিকানা: </b> মোসলেমের মোড়,মতিহার,রাজশাহী
                <br/><b>মোবাঃ01798-868301</b>
           
        </address>
         </div>
        <h3>ক্রয়কৃত পন্য</h3>
        <table class="table">
          <thead>
            <th>চালান</th>
            <th>ক্যাটাগরি</th>
            <th>পণ্য </th>
            <th>পরিমান</th>
            <th>দাম</th>
            <th>মোট</th>
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
        </table>

</div>

 <div class="row" style="max-width: 98%;margin: auto;padding: 5px;">
   <div class="col-md-5">
         <div class="card">
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
  $jer =$final-$payble;
     ?>
    <h3>সব্মোটঃ {{$final}}</h3>

    <h3>পন্য কেনার সময় পরিশোধঃ {{$invo->sum('paid')}}</h3>
    <h3>নতুন করে পরিশোধঃ {{$cus_cash->sum('amount')}}</h3>

    <hr>
    <h3>জেরঃ {{$jer}}</h3>
   
         


  </div>
   </div>
   <div class="col-md-7" >
    <h2>জমার পরিমানঃ</h2>
                               <table class="table" style="background: #fff;border: 2px dotted">
                                        <thead>
                                            <tr>
                                                  <th>তারিখ</th>
                                                  <th>পরিমান</th>
                                                  
                                            </tr>
                                        </thead>
                               
                                        <tbody>
                             <?php $cus_cash =DB::table('customer_cashes')->where('calan_id',$id)->get()?>            
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
                                        <div class="row ">
          <div class="col-md-6">ক্রেতার সাক্ষরঃ........</div>
          <div class="col-md-6">বিক্রেতার সাক্ষরঃ......</div>
      </div>
   </div>

 </div>
</div>
   <div class="text-center">
    <button class="btn btn-danger"onclick="printContent('div1')" type="button"> প্রিন্ট করুন </button>
</div>
          

@endsection
@push('js')
    <script src="{{asset('/backend/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('/backend/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('/backend/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
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
    $(".select2").select2();
    /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            // format: 'mm-dd-yyyy',
            // startDate: '-3d',
            autoclose: true,
            todayHighlight: true
        });
   $(document).ready(function() {
    $('#myTable').DataTable( {
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


 $("#paid").keyup(function(){
    var paid =$("#paid").val();

    var net_total =$("#net_total").val();
    var past_paid =$("#past_paid").val();

    var pay =past_paid+paid;
    var due=net_total-pay;
    $("#due").val(due);
    $("#payable").val(pay)
   console.log(pay);

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