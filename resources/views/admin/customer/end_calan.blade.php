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
<div class="row" style="max-width: 98%;margin: auto;padding: 5px;border: 2px solid #555555">
  <div class="col-md-12">
    <div class="card">
    <form action="{{route('admin.sell.sell-end-store')}}" method="post">
      {{@csrf_field()}}

      <div class="row">
  
          <div class="col-md-5" style="padding-top: 15px;margin-left: 10px">
            <label>কাস্টমারের নাম </label>

            <div class="form-group">
       <input type="text" name="cust_name" class="form-control" value="{{$sell->customer}}" readonly>
       <input type="hidden" name="id" value="{{$sell->id}}">
       <input type="hidden" name="cust_id" value="{{$sell->cust_name}}">

            </div>
        </div>
        <div class="col-md-5" style="padding-top: 15px">
            <label>date </label>
            <div class="form-group">
             <input type="text" name="date" class="form-control"  value="{{$sell->date}}" readonly>
            </div>
        </div>
      
      </div>

  <div style="padding-top: 18px;background: #fff">
        <table class="table">
        <thead>
          <th>চালান</th>
          <th>ধরন</th>
          <th>পণ্য</th>
          <th>পরিমান</th>
          <th>দাম</th>
          <th>মোট</th>
        </thead>
        <tbody id="invoice_items">
      @foreach($items as $item)  
   <tr>
     <td>{{$item->calan_name}}</td>
     <td>{{$item->category_name}}</td>
     <td>{{$item->pid}}</td>
     <td>{{$item->qty}}</td>
     <td>{{$item->price}}</td>
     <td>{{$item->price*$item->qty}}</td>


   </tr>
      @endforeach
        </tbody>
      </table>
  </div>
    <table class="table table-hover" style="width: 65%;float: right;">
        <tbody>
        
          <tr>
            <th class="text-center">সর্বমোট</th>
            <td class="text-center"><input type="text" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" value="{{$sell->sub_total}}" readonly/>
            <input type="hidden" name='bsub_total' placeholder='0.00' class="form-control" id="buy_total" readonly/>
            <input type="hidden" name='profit' placeholder='0.00' class="form-control" id="profit" readonly/></td>
          </tr>
          <tr>
            <th class="text-center"> ছাড় </th>
            <td class="text-center">
              <div class="input-group mb-2 mb-sm-0">
            <input type="text" class="form-control" name="input_dis" id="discount" value="{{$sell->input_dis}}" readonly placeholder="0">
            <div class="input-group-addon">%</div>
            </div></td>
          </tr>
          <tr>
            <th class="text-center">ছাড়ের পরিমান</th>
            <td class="text-center"><input type="text" name='output_dis' id="dis_amt" placeholder='0.00' class="form-control" value="{{$sell->output_dis}}" readonly/></td>
            </tr>
              <tr>
            <th class="text-center">লেস </th>
            <td class="text-center"><input type="text" name='less' id="les" value="{{$sell->les}}" readonly placeholder='0.00' class="form-control"/></td>
            </tr>
            <tr>
            <th class="text-center"> গ্র্যান্ড টোটাল  </th>
            <td class="text-center"><input type="text" name='grand_total' id="net_total" placeholder='0.00' class="form-control" value="{{$sell->grand_total}}" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">পূবে পরিশোধের পরিমান</th>
            <td class="text-center"><input type="text" name='past_paid' id="past_paid" placeholder='0.00' class="form-control" value="{{$sell->paid}}" readonly /></td>
          </tr>

              <tr>
            <th class="text-center">নতুন করে পরিশোধের করুন</th>
            <td class="text-center"><input type="text" name='paid' id="paid" placeholder='0.00' class="form-control" value="" />
              <input type="hidden" name='payable' id="payable" placeholder='0.00' class="form-control" value="{{$sell->paid}}" /></td>
          </tr>
          <tr>
            <th class="text-center">বাকির পরিমান</th>

            <td class="text-center"><input type="text" style="cursor: not-allowed;" name='due' id="due" placeholder='0.00' class="form-control" value="{{$sell->due}}" />
            </td>
        </tbody>
            <tfoot>
      <tr>
        <td colspan="6">  <button type="submit" style="float: right;" class="btn btn-success">হিসাব শেষ করুন </button></td>
      </tr>
    </tfoot>
      </table>

    </form>
    </div>
  </div>
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
@endpush