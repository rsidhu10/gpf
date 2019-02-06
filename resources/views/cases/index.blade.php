@extends('layouts.app')
@section('content')

	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <div class="container">
      <!-- Adding Modal Code here let us check wheather it is working or not --> 
      <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
      <!-- Code ends here-->  
      <div class="row">

        <div class="col-md-12 ">
          <div class="panel panel-primary">
            <div class="panel-heading">
                <a href="#" data-toggle="modal" data-target="#exampleModal"> Pending Cases List </a>
                {{-- <button type="button" class="btn btn-primary input-sm" onclick="window.location='{{ route("cases.index") }}'">Report</button> --}}
                <button class="btn btn-info pull-right btn-xs" id="addnew" onclick="window.location='{{ route("cases.create") }}'">Add New</button>
                
            </div>            
            <div class="panel-body">
              <table class="table table-bordered table-striped table-condensed table-hover">
                <thead>
                	{{-- {{ $cases->links() }} --}}
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
      
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"> 
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>




  <script type="text/javascript">
// Rest Button
    window.load=$(document).ready(function(){

    	// alert('hi');
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






