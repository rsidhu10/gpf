@extends('layouts.main')
@section('content')

   <div class="row" style="margin-top: 80px;">
      <div class="col-md-12" >
         <div class="pull-right">
             <button  class="btn btn-info pull-right btn-xs" 
                        id="back" 
                        onclick="window.location='{{ "/reports" }}'">Back
               </button>
         </div>
         <div><h3 style="text-align: center;">{{ 'hi '}} </h3> </div>
         <table class="table table-condensed table-bordered table-hover table-striped">
            <tr style="font-size: 12px; text-align: center;">
               <th>Sr.</th>
               <th style="text-align: left;">GPF Number</th>
               <th style="text-align: left;">Employee Name</th>
               <th style="text-align: left;">Designation</th>
               <th>Advance Type</th>
               <th>Retirement Date</th>
               <th>Received on</th>
               <th>Status</th>
            </tr>
            </tr>
            <?php $num =1;  
            ?>
            @foreach($data as $data)
            <tr style="font-size: 12px;" >
               <td style="text-align: center;">
                  {{ $num}}
               </td>
                <td style="text-align: left;">
                  {{ $data->gpf_number }}
               </td>
               <td style="text-align: left;">
                  {{ $data->cname }}
               </td>
              <td style="text-align: left;">  
                  {{ $data->designation  }}
               </td>
               <td style="text-align: center;">  
                  {{ $data->reason    }}
               </td>
               <td style="text-align: center;">  
                  {{ \Carbon\Carbon::parse($data->retirement_dt)->format('d-M-y')}}
               </td>
               <td style="text-align: left; ">  
                  {{ \Carbon\Carbon::parse($data->diary_dt)->diffForHumans() }}
               </td>
               <td style="text-align: left;">  
                  {{ $data->status    }}
               </td>
            </tr>
          <?php $num++; ?>
         @endforeach
         </table>
      </div>
   </div>
@endsection            