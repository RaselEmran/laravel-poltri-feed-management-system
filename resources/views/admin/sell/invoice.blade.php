@extends('welcome')
@section('title','Feed-System:invoice')
@push('css')
<link rel="stylesheet" href="{{asset('css/print.css')}}" media = "print">
@endpush

@section('content')

   <div class="row" id="div1">
                    <div class="col-md-6" id="first">
                        <div class="card card-body printableArea">
                            <h3><b>INVOICE</b> <span class="pull-right">#{{$purchases->id}}</span><span>:দোকান কপি</span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                              <address>
                                            <h3>এস ট্রেডাস্</h3>
                                            <h4 class="font-bold"><b>প্রোপাইটার: </b>মোঃইসমাইল আলী(বিপ্লব)</h4>
                                            <p class="text-muted m-l-30"><b>Phone: </b>
                                                <br/><b>ঠিকানা: </b> মোসলেমের মোড়,মতিহার,রাজশাহী
                                                <br/><b>মোবাঃ01798-868301</b>
                                           
                                        </address>
                                        </div>
                                        <div class="col-md-6">
                                             <address>
                                            <h3>কাস্টোমার</h3>
                                            <h4 class="font-bold"><b>নাম: </b>{{$buyers->name}}</h4>
                                            <p class="text-muted "><b>ফোন: </b>{{$buyers->phone}},
                                                <br/><b>এনআইডি: </b> {{$buyers->nid}}
                                                <br/><b>ঠিকানা</b> {{$buyers->address}}
                                            
                                            <p class=""><b>Invoice Date :</b> <i class="fa fa-calendar"></i> {{$purchases->date}}</p>
                                           
                                        </address>
                                        </div>
                                    </div>
                               
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover" >
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                    
                                                    <th class="text-center">পণ্য</th>
                                                    <th class="text-right">বিবরন</th>
                                            
                                                    <th class="text-right">মোট</th>

                                                </tr>
                                            </thead>
                                            <tbody id="ftbody">
                                              @foreach($details as $key=> $all)
                                                <tr class="fisttr">
                                                    <td class="text-center">{{$key+1}}</td>
                                                   
                                                    <td class="text-right">{{$all->calan_name}}, {{$all->category_name}}, {{$all->pid}} </td>
                                                   
                                                    <td class="text-right">  {{$all->qty}} x {{$all->price}} </td>
                                                    <td class="text-right"> {{$all->qty*$all->price}} </td>

                                                </tr>
                                                @endforeach
                                     
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <p>সর্বমোট: {{$purchases->sub_total}}</p>
                                        <p>ছাড় ({{$purchases->input_dis}}%) : {{$purchases->output_dis}} </p>
                                        <p>লেস: {{$purchases->less}}</p>
                                        <p>গ্র্যান্ড টোটাল: {{$purchases->grand_total}}</p>
                                        <p>পরিশোধের পরিমান: {{$purchases->paid}}</p>
                                        <p>বাকির পরিমান: {{$purchases->due}}</p>
                                        <hr>
                                        <h3><b>Total :</b> {{$purchases->grand_total}}</h3>
                                    </div>
                                    <div class="clearfix">
                                        
                                    </div>
                                   
                                    <hr>
                                
                                </div>
                               
                            </div>
                               <div class="row">
                                    <div class="col-md-6">ক্রেতার সাক্ষরঃ........</div>
                                    <div class="col-md-6">বিক্রেতার সাক্ষরঃ......</div>
                                </div>
                        </div>
                    
                    </div>


                    <!--  -->
                            <div class="col-md-6" id="sceond">
                        <div class="card card-body printableArea" >
                            <h3><b>INVOICE</b> <span class="pull-right">#{{$purchases->id}}</span> <span>:কাস্টোমার কপি</span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                              <address>
                                            <h3>এস ট্রেডাস্</h3>
                                            <h4 class="font-bold"><b>প্রোপাইটার: </b>মোঃইসমাইল আলী(বিপ্লব)</h4>
                                            <p class="text-muted m-l-30"><b>Phone: </b>{{$buyers->phone}},
                                                <br/><b>ঠিকানা: </b> মোসলেমের মোড়,মতিহার,রাজশাহী
                                                <br/><b>মোবাঃ01798-868301</b>
                                           
                                        </address>
                                        </div>
                                        <div class="col-md-6">
                                             <address>
                                            <h3>কাস্টোমার</h3>
                                            <h4 class="font-bold"><b>নাম: </b>{{$buyers->name}}</h4>
                                            <p class="text-muted "><b>ফোন: </b>{{$buyers->phone}},
                                                <br/><b>এনআইডি: </b> {{$buyers->nid}}
                                                <br/><b>ঠিকানা</b> {{$buyers->address}}
                                            
                                            <p class=""><b>Invoice Date :</b> <i class="fa fa-calendar"></i> {{$purchases->date}}</p>
                                           
                                        </address>
                                        </div>
                                    </div>
                               
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover" >
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                    
                                                    <th class="text-center">পণ্য</th>
                                                    <th class="text-right">বিবরন</th>
                                            
                                                    <th class="text-right">মোট</th>

                                                </tr>
                                            </thead>
                                            <tbody id="ftbody">
                                              @foreach($details as $key=> $all)
                                                <tr class="fisttr">
                                                    <td class="text-center">{{$key+1}}</td>
                                                   
                                                    <td class="text-right">{{$all->calan_name}}, {{$all->category_name}}, {{$all->pid}} </td>
                                                   
                                                    <td class="text-right">  {{$all->qty}} x {{$all->price}} </td>
                                                    <td class="text-right"> {{$all->qty*$all->price}} </td>

                                                </tr>
                                                @endforeach
                                     
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <p>সর্বমোট: {{$purchases->sub_total}}</p>
                                        <p>ছাড় ({{$purchases->input_dis}}%) : {{$purchases->output_dis}} </p>
                                        <p>লেস: {{$purchases->less}}</p>
                                        <p>গ্র্যান্ড টোটাল: {{$purchases->grand_total}}</p>
                                        <p>পরিশোধের পরিমান: {{$purchases->paid}}</p>
                                        <p>বাকির পরিমান: {{$purchases->due}}</p>
                                        <hr>
                                        <h3><b>Total :</b> {{$purchases->grand_total}}</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                
                                </div>
                            </div>
                             <div class="row">
                                    <div class="col-md-6">ক্রেতার সাক্ষরঃ........</div>
                                    <div class="col-md-6">বিক্রেতার সাক্ষরঃ......</div>
                                </div>
                        </div>
                         
                    </div>
                      
                </div>
                 <div class="text-right">
                                        <button class="btn btn-danger"onclick="printContent('div1')" type="button"> প্রিন্ট করুন </button>
                                    </div>
          

@endsection
@push('js')
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