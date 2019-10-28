@extends('welcome')
@section('title','profile')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
@endpush

@section('content')
<div class="row">
    <div class="col-md-8" style="width: 80%;margin: auto; padding-top: 20px">
                      <div class="card">
                            <form class="form-horizontal" action="{{route('admin.profile-from',$admin->id)}}" method="post">
                                {{@csrf_field()}}
                                <div class="card-body">
                                    <h4 class="card-title">Personal Info</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="username" class="form-control" id="fname" placeholder="User Name" value="{{$admin->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email Address</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" value="{{$admin->email}}" readonly class="form-control" id="lname" placeholder="Last Name Here">
                                        </div>
                                    </div>
                    
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Company</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="company" value="{{$admin->company}}" class="form-control" id="email1" placeholder="Company Name Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="contact" value="{{$admin->contact}}" class="form-control" id="cono1" placeholder="Contact No Here">
                                        </div>
                                    </div>
                    
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                       
    </div>
</div>

@endsection
@push('js')
  <!-- <script src="{{asset('backend/assets/libs/toastr/build/toastr.min.js')}}"></script> -->
  <script>
     @if(session('msg'))
        
                toastr.success('{{session('msg')}}');
     @endif
           
  </script>
@endpush