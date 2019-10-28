@extends('welcome')
@section('title','Feed-System:password-change')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
@endpush

@section('content')
<div class="row">
    <div class="col-md-8" style="width: 80%;margin: auto;padding-top: 20px">
                      <div class="card">
                            <form class="form-horizontal" action="{{route('admin.pass-change',$admin->id)}}" method="post">
                                {{@csrf_field()}}
                                <div class="card-body">
                                    <h4 class="card-title">Password Change</h4>
                                    <div class="form-group row">
                                    
                                        <div class="col-sm-9">
                                            <input type="hidden" name="email" id="email" class="form-control" value="{{$admin->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Old password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="old" class="form-control" id="oldpass" placeholder="Old Password">
                                            <span id="show"></span>
                                        </div>
                                    </div>
                    
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">New Password </label>
                                        <div class="col-sm-9">
                                            <input type="password" name="new" class="form-control" id="new" placeholder="New Password">
                                        </div>
                                        
                                    </div>
                         
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                       
    </div>
</div>

@endsection
@push('js')
<!--   <script src="{{asset('backend/assets/libs/toastr/build/toastr.min.js')}}"></script> -->
  <script>
     @if(session('msg'))
        
                toastr.success('{{session('msg')}}');
     @endif

     @if(session('emsg'))
        
                toastr.error('{{session('emsg')}}');
     @endif
           
  </script>

  <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

  $("#oldpass").blur(function(){
    var oldpass =$("#oldpass").val();
    var email =$("#email").val();
          $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/sett/change')}}",
              data : {old:oldpass,email:email},
              dateType: 'text',
              success: function(data){
              $("#show").html(data);
                  
               }
              
            });

        
  });
  </script>
@endpush