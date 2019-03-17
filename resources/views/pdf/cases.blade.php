   <div class="row" style="margin-top: 5px;">
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
            </tr>
            @php $num = 1; @endphp
            @foreach($mcases as $data)
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
               </tr>
               <?php $num++; ?>
            @endforeach
         </table>
      </div>
   </div>






