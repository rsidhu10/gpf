@extends('layouts.main')
@section('content')

   <div class="row" style="margin-top: 5px;">
      <div class="btn-group" role="group">
         <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export Report
         </button>
         <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" id="export-to-excel" href="#">Export to Excel</a>
            <a class="dropdown-item" id="export-to-pdf" href="{{ url('getPDF') }}">Export to PDF</a>
         </div>
      </div>

     
      <div class="col-md-12">
         <div>
            <h5 style="text-align: center;">List of Pending Cases of GPF Advances/ Final Payments</h5> 
         </div>
         <table class="table table-condensed table-bordered table-hover table-striped" >
            <tr style="font-size: 12px; text-align: left;">
               <th>Sr.</th>
               <th>GPF Number</th>
               <th>Employee Name</th>
               <th >Designation</th>
               <th>Advance Type</th>
               <th width="8%">Retirement</th>
               <th>Received on</th>
               <th>Relates To</th>
               <th>Status</th>
               <th>Action</th> <!--  Graphql Javascript -->
            </tr>
            @php $num =   (($cases->currentpage() - 1) * $cases->perpage())+1; @endphp
            @foreach($cases as $data)
               <tr style="font-size: 12px;">
                  <td style="text-align: center;">{{ $num        }}</td>
                  <td style="text-align: left;">  {{ $data->gpf  }}</td>
                  <td style="text-align: left;">  {{ $data->name          }}</td>
                  <td style="text-align: left;">  {{ $data->designation   }}</td>
                  <td style="text-align: left;">  {{ $data->reason        }}</td>
                  <td style="text-align: center;">  {{ \Carbon\Carbon::parse($data->retirement_dt)->format('M-y')}}</td> 
                  <td style="text-align: left;">  {{ \Carbon\Carbon::parse($data->diary_dt)->diffForHumans() }}</td>      
                  <td style="text-align: left;">  {{ substr($data->dname, 0, 8)}}</td>
                  <td style="text-align: left;">  {{ $data->status }}</td>  
                  <td style="text-align: right;">
                     <a href="{{'/cases/' .$data->id. '/edit'}}" class="btn btn-primary btn-sm" id="edit" data="{{$data->id}}" >Edit</a>
                  </td>
               </tr>
               <?php $num++; ?>
            @endforeach
         </table>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         {!! $cases->links() !!}
      </div>
   </div>
   


@endsection






