@extends('welcome')
@section('title','Feed-System:all-sellinfo')
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
                                                <th>কাস্টমার টাইপ</th>
                                                <th>সর্বমোট</th>
                                                <th>গ্র্যান্ড টোটাল</th>
                                                <th>বিবরণ</th>
                                            </tr>
                                        </thead>
                               
                                        <tbody>
                                       @foreach($sell as $all)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$all->date}}</td>
                                              <td>{{$all->customer}}</td>
                                              <td>
                                                @if($all->type =='regular')
                                                নিয়মিত
                                                @else
                                                 অনিয়মিত
                                                @endif

                                              </td>
                                              <td>{{$all->sub_total}}</td>
                                              <td>{{$all->grand_total}}</td>
                                              <td><a href="{{route('admin.sellinfo.print',$all->id)}}" class="btn btn-info" target="blank">Print</a></td>
                                            </tr>




                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               <th>সেল আইডি</th>
                                               <th>তারিখ</th>
                                                <th>কাস্টমার নাম</th>
                                                <th>কাস্টমার টাইপ</th>
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


  </script>
@endpush