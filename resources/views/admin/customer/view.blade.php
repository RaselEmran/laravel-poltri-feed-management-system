@extends('welcome')
@section('title','Feed-System:customer-view')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
      <link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('backend/dist/css/datatable.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
@endpush

@section('content')
<div class="row"> 
  <div class="col-md-4"></div>
    <div class=" col-md-6 col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="card-block">
            <img class="img-fluid mb-1" src="{{asset($cat->image)}}" alt="img22" width="150px" style="display: block;margin: auto;" />
                  <h4 class="card-title" style="text-align: center;">কাস্টমারের তথ্য </h4>
            <table class="table">
              <tbody>
                <tr>
                  <th>কাস্টমারের নাম :</th>
                  <th>{{ $cat->name}}</th>
                </tr>
                   <tr>
                  <th>ঠিকানা :</th>
                  <th>{{ $cat->address}}</th>
                </tr>
                   <tr>
                  <th>ফোন নাম্বার  :</th>
                  <th>{{ $cat->phone}}</th>
                </tr>
                   <tr>
                  <th>ফেসবুক আইডি:</th>
                  <th>{{ $cat->fb_link}}</th>
                </tr>
                   <tr>
                  <th>জাতীয় পরিচয়পত্র নাম্বার :</th>
                  <th>{{ $cat->nid}}</th>
                </tr>
                <tr>
                  <td>
                     <a style="margin-left: 5%;color: #009688"  data-toggle="modal" data-target="#noman" class="btn btn-outline-primary">চালান যোগ করুন</a>
                  </td>
                  <td>
                    <a style="margin-left: 3%" href="{{route('admin.view-cash',$cat->id)}}" class="btn btn-outline-info">ক্যাশ কাউন্টার</a>
                  </td>
                 
                </tr>
                <tr>
                    <td>
                  <a style="margin-left: 13%;margin-top: 4px" href="{{route('admin.statement',$cat->id)}}" class="btn btn-outline-warning">স্টেটমেন্ট</a>
                  </td>
                   <td>
                   <a style="margin-left: 3%;margin-top: 4px" href="{{route('admin.urinvoice',$cat->id)}}" class="btn btn-outline-primary">শেষ হওয়া চালান</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


               <div class="modal fade" id="noman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel">নতুন চালান যোগ করুন </h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                       </button>
                                </div>
                      <div class="modal-body">
                           <form method="POST" action="{{route('admin.add-calan')}}">
                           {{ csrf_field() }}
                            <div class="modal-body">

                              <input type="hidden" name="buyer_id" value="{{$cat->id}}">
                            
                           <label>নাম </label>
                           <div class="form-group">
                             <input type="text" id="email_address" class="form-control" name="calan_name" placeholder="চালানের নাম">
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
          <div class="table-responsive">
                         <?php 
                          $calan =DB::table('calans')->where('buyer_id',$cat->id)->where('hidde_id','colman')->get();
                           ?> 
                           @if($calan)
                               <div class="card">
                                <div class="card-body">
                                  <h2 style="text-align: center;">চলমান চালান সূমহ</h2>
                                <table id="myTable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>চালানের নং</th>
                                            <th>চালানের নাম</th>
                                            <th>চালান শুরুর তারিখ</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
         
                                    <tbody>
                                        @foreach($calan as $key=> $allcalan)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$allcalan->calan_name}}</td>
                                            <td>{{$allcalan->date}}</td>
                                             <td>
                                             <a href="{{URL::to('admin/view-calan/'.$cat->id.'/calan/'.$allcalan->id)}}" class="btn btn-info margin-5 edit-cus">view</a>
                                  
                                            </td>
                                          

                                        </tr>

                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>চালানের নং</th>
                                            <th>চালানের নাম</th>
                                            <th>চালান শুরুর তারিখ</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                              </div>
                            </div>
                                @endif
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