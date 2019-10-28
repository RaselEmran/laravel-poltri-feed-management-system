@extends('welcome')
@section('title','Feed-System:Mobile-customer')
@push('css')

@endpush

@section('content')

   <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea" id="div1">
                            <h3><b>INVOICE</b> <span class="pull-right">#{{$purchases->id}}</span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3>To,</h3>
                                            <h4 class="font-bold"><b>Name: </b>{{$purchases->cust_name}}</h4>
                                            <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> {{$purchases->date}}</p>
                                            <p><b>Today :</b> <i class="fa fa-calendar"></i> <?php echo date('Y/m/d') ?></p>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>চালান</th>
                                                    <th class="text-right">ধরন</th>
                                                    <th class="text-right">পণ্য</th>
                                                    <th class="text-right">পরিমান</th>
                                                    <th class="text-right">দাম</th>
                                                    <th class="text-right">মোট</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($details as $key=> $all)
                                                <tr>
                                                    <td class="text-center">{{$key+1}}</td>
                                                    <td>{{$all->calan_name}}</td>
                                                    <td class="text-right">{{$all->category_name}} </td>
                                                    <td class="text-right"> {{$all->pid}} </td>
                                                    <td class="text-right"> {{$all->qty}} </td>
                                                    <td class="text-right"> {{$all->price}} </td>
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
                        </div>
                            <div class="text-right">
                                        <button class="btn btn-danger"onclick="printContent('div1')" type="button"> Proceed to payment </button>
                                    </div>
                    </div>
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