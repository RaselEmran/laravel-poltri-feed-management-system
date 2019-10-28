@extends('welcome')
@section('title','Feed-System:Calan-statement')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
      <link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('backend/dist/css/datatable.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
@endpush

@section('content')
<div class="row"> 
  <div class="col-md-5">
    <div class="card" id="div1">
      <h2 style="background: #5A9599;color: #fff;text-align: center;margin-top: 15px">ক্যাশ কাউন্টার</h2> <?php
         $bb = DB::table('jer_profiles')->where('buyer_id', $buyer->id)->sum('amount');
    ?>
      <h3 style="margin-left: 2%" > পূর্বের জের: <?php echo number_format($bb,2); ?> </h3>
      <?php $total =DB::table('sell_totals')->where('cust_name',$buyer->id)->sum('grand_total'); ?>
      <h3 style="margin-left: 2%" > চালান বাবদ লাভ: <?php echo number_format($lav,2); ?> </h3>
      <?php $paid =DB::table('sell_totals')->where('cust_name',$buyer->id)->sum('paid'); ?>
      <h3 style="margin-left: 2%" > চালান বাবদ লস: <?php echo number_format($loss,2); ?> </h3>


      <h3 style="margin-left: 2%">নতুন করে পরিশোধঃ {{number_format($cat->sum('d_amount'),2)}}
      <h3 style="margin-left: 2%">নতুন করে উওোলন {{number_format($mat->sum('w_amount'),2)}}
        <hr>
        <?php $koroc= $bb+$mat->sum('w_amount')+$loss?>
       <h3 style="margin-left: 2%">মোট জের  {{number_format($koroc,2)}}
        <?php $mot=$lav+$cat->sum('d_amount') ?>
       <h3 style="margin-left: 2%">লাভ সহ পরিশোধঃ {{number_format($mot,2)}}</h3>
        
        <hr><hr>
        @if($mot>$koroc)
        <h3 style="margin-left: 2%;color: green">আপনার আছেঃ <?php echo $mot-$koroc ?> টাকা  </h3>
        @else
        <h3 style="margin-left: 2%">আপনার বাকীঃ <?php echo $mot-$koroc ?> টাকা</h3>

        @endif
  <h2 style="background: #5A9599;color: #fff;text-align: center;margin-top: 15px">আজকের দিনে উওোলন পরিশোধঃ <?php echo date('d-m-Y') ?></h2>
  <?php
  $date =date('d-m-Y');
   $todaywith =DB::table('profile_withdraws')->where('buyer_id',$buyer->id)->where('date',$date)->sum('w_amount');
   $todaydepo =DB::table('profile_deposits')->where('buyer_id',$buyer->id)->where('date',$date)->sum('d_amount');

    ?>
  <h3 style="margin-left: 2%">উওোলেনর পরিমানঃ{{$todaywith}}</h3>
  <h3 style="margin-left: 2%">পরিশোধের পরিমানঃ{{$todaydepo}}</h3> 


    </div>
    <div class="text-right">
        <button class="btn btn-danger"onclick="printContent('div1')" type="button"> প্রিন্ট করুন </button>
    </div>
  </div>
   <div class="col-md-7">
         <div class="card">
              <div class="card-header">
                 <p style="margin-left: 20%;" data-toggle="modal" data-target="#noman" class="btn btn-outline-danger">বকেয়া  পরিশোধ করুন </p><p style="margin-left: 2%" data-toggle="modal" data-target="#withdraw" class="btn btn-outline-primary">উত্তোলন করুন </span></p><p style="margin-left: 2%" data-toggle="modal" data-target="#nomani" class="btn btn-outline-info">পুর্বের জের </span></p>
</div>
  <h4 class="card-title" style="text-align: center;">উত্তোলন পরিশোধের  পরিমান </h4>
                                  <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="p-20">
                                  <div class="table-responsive">
                                     
                                    <table id="myTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                  <th>তারিখ</th>
                                                  <th>ধরন</th>
                                                  <th>পরিমান</th>
                                               
                                            </tr>
                                        </thead>
                               
                                        <tbody>
                                            @foreach($mat as $d)
                                            <tr style="color: red">
                                              <td>{{$d->date}}</td>
                                             
                                              <td>উত্তোলনের পরিমান</td>
                                              <td>{{$d->w_amount}}</td>
                                            </tr>
                                           @endforeach
                                    @foreach($cat as $w)
                                          <tr style="color: green">
                                            <td>{{$w->date}}</td>
                                            
                                            <td>পরিশোধের পরিমান</td>
                                            <td>{{$w->d_amount}}</td>
                                          </tr>
                                     @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>তারিখ</th>
                                            <th>ধরন</th>
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
                <div class="col-md-12">
                   <div class="card">
              <div class="card-header">
              
</div>
  <h4 class="card-title" style="text-align: center;">চালনে লাভ লসের পরিমান </h4>
                                  <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="p-20">
                                  <div class="table-responsive">
                                     
                                    <table id="myTable4" class="table table-striped table-bordered">
                                        <thead>
                                            <tr >
                                                  <th>তারিখ</th>
                                                  <th>চালান নং</th>
                                                  <th>চালানের নাম</th>
                                                  <th>খরচ</th>
                                                  <th>পরিশোধ</th>
                                                  <th>ধরন</th>
                                                  <th>লাভ/লসের/পরিমান</th>
                                               
                                                  
                                               
                                            </tr>
                                        </thead>
                               
                                        <tbody>
                                            @foreach($end as $endc)
                                            <tr >
                                              <td>{{$endc->date}}</td>
                                             
                                              <td>{{$endc->calan_id}}</td>
                                      <?php $name=DB::table('calans')->where('id',$endc->calan_id)->first(); ?>
                                      <td>{{$name->calan_name}}</td>
                                              <td>{{$endc->khoroc}}</td>
                                              <td>{{$endc->porishod}}</td>
                                              <td>
                                                @if($endc->status=='lav')
                                                <span>লাভ</span>
                                                @else
                                                <span>লস</span>
                                                @endif
                                              </td>
                                              <td>{{$endc->jer}}</td>

                                            </tr>
                                           @endforeach
                              
                                        </tbody>
                                        <tfoot>
                                            <tr >
                                               <th>তারিখ</th>
                                                  <th>চালান নং</th>
                                                  <th>চালানের নাম</th>
                                                  <th>খরচ</th>
                                                  <th>পরিশোধ</th>
                                                  <th>ধরন</th>
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

                <div class="col-md-12">
                   <div class="card">
              <div class="card-header">
              
</div>
  <h4 class="card-title" style="text-align: center;">জেরের পরিমান </h4>
                                  <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="p-20">
                                  <div class="table-responsive">
                                     
                                    <table id="myTable1" class="table table-striped table-bordered">
                                        <thead>
                                            <tr >
                                                  <th>তারিখ</th>
                                                  <th>পরিমান</th>
                                                  <th>আকশন</th>
                                                  
                                               
                                            </tr>
                                        </thead>
                               
                                        <tbody>
                                            @foreach($jer as $jers)
                                            <tr >
                                              <td>{{$jers->date}}</td>
                                             
                                              <td>{{$jers->amount}}</td>
                                              <td><span class="btn btn-info">পরিশোধিত</span></td>
                                            </tr>
                                           @endforeach
                              
                                        </tbody>
                                        <tfoot>
                                            <tr >
                                            <th>তারিখ</th>
                                            <th>পরিমান</th>
                                            <th>আকশন</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                </div>
              </div>
                <div class="col-md-12">
                                     <div class="card">
              <div class="card-header">
              
</div>
  <h4 class="card-title" style="text-align: center;">শেষ করা ইনভয়েজে টাকা পরিশোধের পরিমান  </h4>
                                  <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="p-20">
                                  <div class="table-responsive">
                                     
                                    <table id="myTable2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr >
                                                  <th>তারিখ</th>
                                                  <th>ইনভয়েজ নং</th>
                                                  <th>পরিমান</th>
                                                  <th>আকশন</th>
                                                  
                                               
                                            </tr>
                                        </thead>
                               <?php 
$first = DB::table('sell_ends')
            ->whereNotNull('amount')
            ->where('cust_id',$buyer->id)
            ->get();
           
                                ?>
                                        <tbody>
                                            @foreach($first as $invo)
                                            <tr >
                                              <td>{{$invo->date}}</td>
                                              <td>{{$invo->sell_id}}</td>
                                             
                                              <td>{{$invo->amount}}</td>
                                              <td><span class="btn btn-info">পরিশোধিত</span></td>
                                            </tr>
                                           @endforeach
                              
                                        </tbody>
                                        <tfoot>
                                            <tr >
                                            <th>তারিখ</th>
                                            <th>ইনভয়েজ নং</th>

                                            <th>পরিমান</th>
                                            <th>আকশন</th>
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

        
  <div class="container-fluid">
                  <div class="modal fade text-xs-left" id="noman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                         <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> বকেয়া পরিশোধ</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                
                          <form method="POST" action="{{route('admin.save-profile_deposit')}}">
                           {{ csrf_field() }}
                            <div class="modal-body">
                           <input type="hidden" name="buyer_id" value="{{$buyer->id}}">
                            
                          <label>পরিমান  </label>
                          <div class="form-group">
                            <input type="text" id="email_address" class="form-control" name="d_amount" placeholder="পরিশোধের  পরিমান " >
                          </div>
                          <button class="btn btn-danger" type="reset" data-dismiss="modal" >বাতিল</button>
                          <button class="btn btn-primary" type="submit">এড</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>    
          

                  <div class="container-fluid">
                  <div class="modal fade text-xs-left" id="nomani" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">

                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> পূর্বের জের</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                
                          <form method="POST" action="{{route('admin.save-jer_profile')}}">
                           {{ csrf_field() }}
                            <div class="modal-body">
                           <input type="hidden" name="buyer_id" value="{{$buyer->id}}">
                            
                          <label>জেরের পরিমান  </label>
                          <div class="form-group">
                            <input type="text" id="email_address" class="form-control" name="amount" placeholder="জেরের   পরিমানপ্রবেশ করুন  " >
                          </div>
                          <button class="btn btn-danger" type="reset" data-dismiss="modal" >বাতিল</button>
                          <button class="btn btn-primary" type="submit">এড</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>



  <div class="container-fluid">
                  <div class="modal fade text-xs-left" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">

                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> বকেয়া পরিশোধ </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                    
                          <form method="POST" action="{{route('admin.save-profile_withdraw')}}">
                           {{ csrf_field() }}
                            <div class="modal-body">
                           <input type="hidden" name="buyer_id" value="{{$buyer->id}}">
                            
                          <label>পরিমান  </label>
                          <div class="form-group">
                            <input type="text" id="email_address" class="form-control" name="w_amount" placeholder="উত্তোলনের  পরিমান " >
                          </div>
                          <button class="btn btn-danger" type="reset" data-dismiss="modal" >বাতিল</button>
                          <button class="btn btn-primary" type="submit">এড</button>
                          </div>
                        </form>
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

      $('#myTable2').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
        ]
    } );

      $('#myTable4').DataTable( {
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