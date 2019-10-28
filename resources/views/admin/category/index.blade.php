@extends('welcome')
@section('title','Feed-System:password-change')
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
                                  সকল ক্যাটেগরি 
                                </button>
                         
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info margin-5" data-toggle="modal" data-target="#Modal3" style="float: right;">
                                     নতুন ক্যাটেগরি যোগ করুন 
                                </button>
                           </div>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="p-20">
                                  <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>আইডি নাম্বার </th>
                                                <th>ক্যাটেগরির নাম </th>
                                                <th>ক্যাটেগরির বিবরণ  </th>
                                                <th>ক্রিয়াফল </th>
                                            </tr>
                                        </thead>
                              <?php 
                              $allcus =DB::table('categories')->get();
                               ?>          
                                        <tbody>
                                            @foreach($allcus as $key=> $all)
                                            <tr>
                                              <td>{{$key+1}}</td>
                                                <td>{{$all->category_name}}</td>
                                                <td>{{$all->category_des}}</td>
                                        <td>
                                              <a href="" class="btn btn-info margin-5 edit-cate" data-toggle="modal" data-target="#editm"  cate_id="{{$all->id}}">Edit</a>
                                              <a href="{{route('admin.category.delete',$all->id)}}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger margin-5 edit-cus">Delete</a>
                                        </td>
                                              

                                            </tr>

                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>আইডি নাম্বার </th>
                                                <th>ক্যাটেগরির নাম </th>
                                                <th>ক্যাটেগরির বিবরণ  </th>
                                                <th>ক্রিয়াফল </th>
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

               <div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel"> নতুন ক্যাটেগরি</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                            <div class="modal-body">
                             <form method="POST" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
                               {{ csrf_field() }}
                            <div class="modal-body">
                              
                              <label> ক্যাটেগরির নাম </label>
                                 <div class="form-group">
                                 <input type="text" id="email_address" class="form-control" name="category_name" placeholder=" ক্যাটেগরির নাম প্রবেশ করুন " >
                           </div>
                                <label>ক্যাটেগরি বিবরণ </label>
                               <div class="form-group">
                                 <input type="text" class="form-control" name="category_des" placeholder="ক্যাটেগরির বিবরণ প্রবেশ করুন ">
                               </div>
                                <button class="btn btn-danger" type="reset" data-dismiss="modal" >বাতিল</button>
                                <button class="btn btn-primary" type="submit">এড</button>
                             </div>
                        </form>
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
          </div>

<!-- edit -->

               <div class="modal fade" id="editm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel"> নতুন ক্যাটেগরি</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                            <div class="modal-body">
                             <form method="POST" action="{{route('admin.category.update')}}" enctype="multipart/form-data">
                               {{ csrf_field() }}
                            <div class="modal-body">
                              <input type="hidden" name="id" id="id">
                              <label> ক্যাটেগরির নাম </label>
                                 <div class="form-group">
                                 <input type="text" id="category_name" class="form-control" name="category_name" placeholder=" ক্যাটেগরির নাম প্রবেশ করুন " >
                           </div>
                                <label>ক্যাটেগরি বিবরণ </label>
                               <div class="form-group">
                                 <input type="text" class="form-control" name="category_des" id="category_des" placeholder="ক্যাটেগরির বিবরণ প্রবেশ করুন ">
                               </div>
                                <button class="btn btn-danger" type="reset" data-dismiss="modal" >বাতিল</button>
                                <button class="btn btn-primary" type="submit">এড</button>
                             </div>
                        </form>
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

  $(".edit-cate").click(function(){
    var cate_id =$(this).attr('cate_id');
 
          $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/category/edit')}}",
              data : {cate_id:cate_id},
              dateType: 'json',
              success: function(data){
             $("#id").val(data.id);
             $("#category_name").val(data.category_name);
             $("#category_des").val(data.category_des);


                  
               }
              
            });

        
  });
  </script>
@endpush