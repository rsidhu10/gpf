@extends('layouts.main')
@section('content')

   <div class="row" style="margin-top: 20px;">
      <div class="col-md-12">
         <div><h3 style="text-align: center;">Assistantwise Status of GPF Advances</h3> </div>
         <table class="table table-condensed table-bordered table-hover table-striped">
            <tr style="font-size: 12px; text-align: center;">
               <th>Sr.</th>
               <th style="width: 15%; text-align: left; ">Assistant Name</th>
               <th>Received Cases</th>
               <th>Cases Complete</th>
               <th>Under Objections</th>
               <th>Under Prepration</th>
               <th>Under Checking</th>
               <th>Under Approval</th>
               <th>Approved Cases</th>
               <th>Pending Cases</th>
            </tr>
            <?php $num =1;  
                   $casetotal =0;
                   $complete =0;
                   $objection = 0;
                   $prepration = 0;
                   $checking = 0;
                   $underapproval = 0;
                   $approved = 0;

                  ?>
                  @foreach($cases as $data)
                  <?php  $casetotal  = $casetotal  + $data->total; 
                         $complete   = $complete   + $data->documents_complete;
                         $objection  = $objection  + $data->objection_raised;
                         $prepration = $prepration + $data->under_processing;
                         $checking = $checking + $data->under_checking;
                         $underapproval = $underapproval + $data->under_approval;
                         $approved = $approved + $data->approved; 
                  ?>
                  <tr>
                        <td style="text-align: center;">
                           {{ $num}}
                        </td>
                        <td style="text-align: left;">
                           {{ $data->name }}
                        </td>
                        <td style="text-align: right; padding-right: 40px;">
                           {{ $data->total }}
                        </td>
                        <td style="text-align: right; padding-right: 40px;">  
                           {{ $data->documents_complete    }}
                        </td>
                        <td style="text-align: right; padding-right: 40px;">  
                           {{ $data->objection_raised    }}
                        </td>
                        <td style="text-align: right; padding-right: 40px;">  
                           {{ $data->under_processing    }}
                        </td>
                        <td style="text-align: right; padding-right: 40px;">  
                           {{ $data->under_checking    }}
                        </td>
                        <td style="text-align: right; padding-right: 40px;">  
                           {{ $data->under_approval    }}
                        </td>
                        <td style="text-align: right; padding-right: 40px;">  
                           {{ $data->approved    }}</td>
                         
                        <th style="text-align: right; padding-right: 40px;"> 
                           <a href="{{'/reports/' .$data->id}}" data="{{$data->id}}">
                              {{ $data->total-$data->approved }} 
                           </a> 
                        </th>
                     </tr>
                   <?php $num++; ?>
                  @endforeach
                  <tr style="font-style: bold;">
                       <th colspan="2" style="text-align: Right;">  {{'Total'}}</th>
                       <th style="text-align: right; padding-right: 40px;">  {{ $casetotal       }}</th>
                       <th style="text-align: right; padding-right: 40px;">  {{ $complete        }}</th>
                       <th style="text-align: right; padding-right: 40px;">  {{ $objection       }}</th>
                       <th style="text-align: right; padding-right: 40px;">  {{ $prepration      }}</th>
                       <th style="text-align: right; padding-right: 40px;">  {{ $checking        }}</th>
                       <th style="text-align: right; padding-right: 40px;">  {{ $underapproval   }}</th>
                       <th style="text-align: right; padding-right: 40px;">  {{ $approved        }}</th>
                       <th style="text-align: right; padding-right: 40px;">{{$casetotal-$approved}}</th>
                  </tr>
               </table>
      </div>
   </div>


   

@endsection






