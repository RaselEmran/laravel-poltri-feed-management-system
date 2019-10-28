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
    <form action="{{route('admin.sell.regcusstore')}}" method="post">
      {{@csrf_field()}}

      <div class="row">
  
          <div class="col-md-5" style="padding-top: 15px;margin-left: 10px">
            <label>কাস্টমারের নাম </label>
            <?php 
$cus =DB::table('buyers')->get();
             ?>
            <div class="form-group">
             <select class="select2 form-control custom-select" name="cust_name" id="cust_name" style="width: 100%; height:36px;">
              <option value="">Select One</option>
              @foreach($cus as $allcus)
              <option value="{{$allcus->id}}">{{$allcus->name}}</option>
              @endforeach
             </select>
            </div>
        </div>

        <div class="col-md-5" style="padding-top: 15px">
            <label>date </label>
            <div class="form-group">
             <input type="text" name="date" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" value="<?php echo date('m/d/Y')?>">
            </div>
        </div>
          <div class="col-md-5" style="margin-left: 10px">
          <label for="">চালান</label>
          <div class="form-group">
            <select class="select2 form-control custom-select category_name" name="calan_name" id="category_name" style="width: 100%; height:36px;">
              <option value="">Select One</option>
            </select>
           </div> 
        </div>
      
      </div>

  <div style="padding-top: 18px;background: #fff">
        <table class="table">
        <thead>

          <th>ধরন</th>
          <th>পণ্য</th>
          <th>পরিমান</th>
          <th>দাম</th>
          <th>মোট</th>
          <th><button type="button" id="add" class="btn btn-info">Add</button></th>
        </thead>
        <tbody id="invoice_items">
          
        </tbody>
      </table>
  </div>
    <table class="table table-hover" style="width: 65%;float: right;">
        <tbody>
        
          <tr>
            <th class="text-center">সর্বমোট</th>
            <td class="text-center"><input type="text" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/>
            <input type="hidden" name='bsub_total' placeholder='0.00' class="form-control" id="buy_total" readonly/>
            <input type="hidden" name='profit' placeholder='0.00' class="form-control" id="profit" readonly/></td>
          </tr>
          <tr>
            <th class="text-center"> ছাড় </th>
            <td class="text-center">
              <div class="input-group mb-2 mb-sm-0">
            <input type="text" class="form-control" name="input_dis" id="discount" placeholder="0">
            <div class="input-group-addon">%</div>
            </div></td>
          </tr>
          <tr>
            <th class="text-center">ছাড়ের পরিমান</th>
            <td class="text-center"><input type="text" name='output_dis' id="dis_amt" placeholder='0.00' class="form-control" readonly/></td>
            </tr>
              <tr>
            <th class="text-center">লেস </th>
            <td class="text-center"><input type="text" name='less' id="les" placeholder='0.00' class="form-control"/></td>
            </tr>
            <tr>
            <th class="text-center"> গ্র্যান্ড টোটাল  </th>
            <td class="text-center"><input type="text" name='grand_total' id="net_total" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">পরিশোধের পরিমান</th>
            <td class="text-center"><input type="text" name='paid' id="paid" placeholder='0.00' class="form-control" /></td>
          </tr>
          <tr>
            <th class="text-center">বাকির পরিমান</th>

            <td class="text-center"><input type="text" style="cursor: not-allowed;" name='due' id="due" placeholder='0.00' class="form-control" />
            </td>
        </tbody>
            <tfoot>
      <tr>
        <td colspan="6">  <button type="submit" style="float: right;" class="btn btn-success">সংরক্ষণ করুন </button></td>
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
//........dependent customer with calan
$("#cust_name").change(function(){
  var cust_name=$("#cust_name").val();
   $.ajax({
  type: 'POST',
  url: "{{URL::to('/admin/regsell/cust-name')}}",
  dateType: 'text',
  data:{'cust_name':cust_name},
  success:function(data)
  { 

$("#category_name").html(data);
$("#category_name").find('select').select2();
  }
})
});
//.................................appaend
 addNewRow();
$('#add').click(function(){

   var tr =$(this).parent().parent();
   var qty = $(".qtyyy").val();
   var price = $(".price").val();
   if (qty != '' && price != '') {
  addNewRow();
}
else
{
  alert('ফাকা ঘরটি পূরণ করুন');
}
  })

 function addNewRow()
{
  var cust_name=$("#cust_name").val();
  $.ajax({
  type: 'POST',
  url: "{{URL::to('/admin/regsell/invoice')}}",
  dateType: 'text',
  data:{changeNewOrderItem:1},
  success:function(data)
  { 
  
  $('#invoice_items').append(data);
$("#sell").find('select').select2();
   $("#invoice_items").find('select').select2();


  }
})
}

  $("#invoice_items").on('click','#del',function(){
  $(this).closest('tr').remove();
  call();       
   });


   $("#invoice_items").delegate(".price,.qtyyy","keyup",function(){
   var tr =$(this).parent().parent();
   var qty = tr.find(".qtyyy").val();
   var price = tr.find(".price").val();
    tr.find(".amt").text(price*qty);
    call();
 
  });

 function  call(){

    var bsub_total=0;
    $(".amt").each(function(){
    bsub_total =bsub_total + ($(this).text() * 1);
      })
    $("#sub_total").val(bsub_total); 
    $("#net_total").val(bsub_total);
    $("#due").val(bsub_total);

   }

    $("#discount").keyup(function(){
    var discount =parseInt($("#discount").val());
    var sub_total =parseInt($("#sub_total").val());
    tax_sum=sub_total/100*discount;
    var net_total =sub_total-tax_sum;
    $("#dis_amt").val(tax_sum);
    $("#net_total").val(net_total);
    $("#due").val(net_total);
    //console.log(net_total);
 });

     $("#les").on('keyup',function(){
  var les =parseInt($("#les").val());
    var sub_total =parseInt($("#sub_total").val());
                 // var totalaa =$("#nomann").val();
                 var less = sub_total - les;
                // var net_total =sub_total - les;
    // $("#les").val(less);
    $("#net_total").val(less);
    $("#due").val(less);
              });

 $("#paid").keyup(function(){
    var paid =$("#paid").val();

    var net_total =$("#net_total").val();
    
    var due=net_total-paid;
    $("#due").val(due);
   console.log(due);

 });
  </script>
@endpush