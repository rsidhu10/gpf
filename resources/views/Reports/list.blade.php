@extends('layouts.main')
@section('content')

   <div class="row" style="margin-top: 80px;">
      <div class="col-md-12">
         <div><h3 style="text-align: center;">{{$data->reason}}</h3> </div>
         <table class="table table-condensed table-bordered table-hover table-striped">
            <tr style="font-size: 12px; text-align: center;">
               <th>Sr.</th>
               <th>GPF Number</th>
               <th>Employee Name</th>
               <th>Designation</th>
               <th>Advance Type</th>
               <th>Retirement Date</th>
               <th>Received on</th>
               <th>Relates To</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
         </table>
      </div>
   </div>
@endsection            