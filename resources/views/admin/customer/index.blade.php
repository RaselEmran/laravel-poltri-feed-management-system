@extends('welcome')
@section('title','Feed-System:customer')
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
                                  সকল কাস্টমার
                                </button>
                         
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info margin-5" data-toggle="modal" data-target="#Modal3" style="float: right;">
                                    নতুন কাস্টমার যোগ করুন  
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
                                                <th>নাম</th>
                                                <th>ফোন</th>
                                                <th>এনআইডি</th>
                                                <th>ছবি</th>
                                                <th>ফলাফল</th>
                                            </tr>
                                        </thead>
                              <?php 
                              $allcus =DB::table('buyers')->get();
                               ?>          
                                        <tbody>
                                            @foreach($allcus as $all)
                                            <tr>
                                                <td>{{$all->name}}</td>
                                                <td>{{$all->phone}}</td>
                                                <td>{{$all->nid}}</td>
                                                <td><img src="{{asset($all->image)}}" alt="" width="80px"></td>
                                        <td>
                                              <a href="" class="btn btn-info margin-5 edit-cus" data-toggle="modal" data-target="#editm"  cus_id="{{$all->id}}">Edit</a>
                                              <a href="{{route('admin.customer.view',$all->id)}}" class="btn btn-success">View</a>
                                              <a href="{{route('admin.customer.delete',$all->id)}}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger margin-5 edit-cus">Delete</a>
                                        </td>
                                              

                                            </tr>

                                            @endforeach
                                        </tbody>
                                  
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
                                                <h5 class="modal-title" id="exampleModalLabel">কাস্টমারের বিবরণ প্রদান করুন </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                             <form method="POST" action="{{route('admin.customer.store')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              

                          <label>নাম </label>
                          <div class="form-group">
                            <input type="text" id="email_address" class="form-control" name="name" placeholder="কাস্টমারের নাম" required>
                          </div>
                           <label> ফোন নাম্বার </label>
                          <div class="form-group">
                            <input type="text" id="email_address" class="form-control" name="phone" placeholder="কাস্টমারের ফোন নাম্বার" required>
                          </div>
                           <label> ঠিকানা </label>
                          <div class="form-group">
                            <input type="text" id="email_address" class="form-control" name="address" placeholder="কাস্টমারের ঠিকানা" required>
                          </div>
                           <label>জাতীয় নিবন্ধন  নং </label>
                          <div class="form-group">
                            <input type="text" id="email_address" class="form-control" name="nid" placeholder=" কাস্টমারের জাতীয় নিবন্ধন নং" required>
                           </div>
                         
                          <label>ফেসবুক লিংক </label>
                          <div class="form-group">
                            <input type="text" class="form-control" name="fb_link" placeholder="কাস্টমারের ফেসবুক লিংক">
                          </div>
                          <label>পাসয়ার্ড</label>
                          <div class="form-group">
                            <input type="text" class="form-control" name="pass" placeholder="কাস্টমারের পাসয়ার্ড" required>
                          </div>
                           <label>ছবি</label>
                          <div class="form-group">
                            <input type="file" class="form-control" name="image" placeholder="কাস্টমারের ছবি" required>
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
                                                <h5 class="modal-title" id="exampleModalLabel">কাস্টমারের বিবরণ প্রদান করুন </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                             <form method="POST" action="{{route('admin.customer.update')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              
                         <input type="hidden" name="id" id="id">
                          <label>নাম </label>
                          <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="কাস্টমারের নাম" required>
                          </div>
                           <label> ফোন নাম্বার </label>
                          <div class="form-group">
                            <input type="text"  class="form-control" name="phone" id="phone" placeholder="কাস্টমারের ফোন নাম্বার" required>
                          </div>
                           <label> ঠিকানা </label>
                          <div class="form-group">
                            <input type="text" id="address" class="form-control" name="address" placeholder="কাস্টমারের ঠিকানা" required>
                          </div>
                           <label>জাতীয় নিবন্ধন  নং </label>
                          <div class="form-group">
                            <input type="text" id="nid" class="form-control" name="nid" placeholder=" কাস্টমারের জাতীয় নিবন্ধন নং" required>
                           </div>
                         
                          <label>ফেসবুক লিংক </label>
                          <div class="form-group">
                            <input type="text" class="form-control" name="fb_link" id="fb_link" placeholder="কাস্টমারের ফেসবুক লিংক">
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                             <label>ছবি</label>
                          <div class="form-group">
                            <input type="file" class="form-control" name="image" placeholder="কাস্টমারের ছবি" >
                          </div>
                              </div>
                              <div class="col-md-6">
                                 <img id="output_image1"/ style="width: 90px;height: 90px" src="" class="">
                              </div>
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