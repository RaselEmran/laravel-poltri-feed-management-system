@extends('welcome')
@section('title','Feed-System:all-sellinfo')
@push('css')

@endpush

@section('content')
<div class="row"> 
   <div class="col-md-12">
         <div class="card" style="max-width: 90%;margin: auto;border: #555555" id="div1">
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
              <h2>কাস্টোমার নাম : <b>{{$purchases->customer}}</b></h2>
              <h2>Invoice Date : <b>{{$purchases->date}}</b></h2>
            </div>
           
          </div>

          <table class="table">
             <thead>
               <th class="text-center">#</th>
              <th>চালান</th>
              <th class="text-right">ধরন</th>
              <th class="text-right">পণ্য</th>
              <th class="text-right">পরিমান</th>
              <th class="text-right">দাম</th>
              <th class="text-right">মোট</th>
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

                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right" style="border: 1px dotted;padding: 8px">
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
                               <div class="row">
                                    <div class="col-md-6">ক্রেতার সাক্ষরঃ........</div>
                                    <div class="col-md-6">বিক্রেতার সাক্ষরঃ......</div>
                                </div>

                  </div>
                    <div class="text-center">
                        <button class="btn btn-danger"onclick="printContent('div1')" type="button"> প্রিন্ট করুন </button>
                    </div>
                </div>
              </div>

            
          


@endsection
@push('js')

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