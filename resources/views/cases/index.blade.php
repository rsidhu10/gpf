@extends('layouts.main')
@section('content')

   <div class="row justify-content-center">
     <div class="col-md-12">
         </br></br></br>
         <div class="card">
            <div class="card-header">Pending Cases List
               <button  class="btn btn-info pull-right btn-xs" 
                        id="addnew" 
                        onclick="window.location='{{ route("cases.create") }}'">Add New
               </button>
            </div>
            <div class="card-body">
               @if (session('status'))
                  <div class="alert alert-success" role="alert">
                     {{ session('status') }}
                  </div>
               @endif
               <table class="table table-bordered table-striped table-condensed table-hover">
               <thead>
                  <tr>
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
               </thead>
               <tbody id="empdata">
               </tbody>

            </table>

            </div>
         </div>
      </div>
   </div>

{{-- <div class="row">
   <div class="col-md-12 ">
      <div class="card card-primary">
         <div class="card-heading">
            </br></br></br>
            <a href="#"> Pending Cases List </a>
            <button  class="btn btn-info pull-right btn-xs" 
                     id="addnew" 
                     onclick="window.location='{{ route("cases.create") }}'">Add New
            </button>
         </div>            
         <div class="card-body">
            <table class="table table-bordered table-striped table-condensed table-hover">
               <thead>
                  <tr>
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
               </thead>
               <tbody id="empdata">
               </tbody>

            </table>
        </div>
      </div>
   </div>
</div>
 --}}





<script type="text/javascript">
// Rest Button
   window.load=$(document).ready(function(){
      console.log('document loaded Complete');
   });



    $('#reset-btn').click(function(){
        document.location.reload();
    });	

    

    window.load=$(document).ready(function(){
    // $('#show-data').on('click', function(){
    	// alert('hi there');
        $.get('show-gpf-adv', function(data){  
          console.log(data);
          	$('#empdata').empty().html(data);
       	})

      });

    $('#frm-insert').on('submit',function(e){
        //alert("hi");
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data)
        var url  = $(this).attr('action');
        var post = $(this).attr('method');
        $.ajax({
          type : post,
          url  : url,
          data : data,
          dataTy : 'json',
          success:function(data)
          {
            console.log('i m back');
            console.log(data);
          }
        })

      })
    


  </script>


@endsection






