@extends('layouts.main')
@section('content')

    <div class="container" style="text-align: center;">
        </br></br></br>
        <h3>Update {{$data->reason}} Case   </h3>
    </div>
    <div class="container">
        <div class="row">
            <form method="post" action="{{route('cases.update',[$data->id])}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put"> 
        </div>
         <div class="row">        
            <div class="col-6 col-sm-4 themed-grid-col">
                <label>GPF No.</label>
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <label>Employee Name</label>
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <label>Designation</label>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-6 col-sm-4 themed-grid-col">
                <input  class="form-control form-control-sm" 
                    type="text" name="gpf_no_txt" 
                    id="gpf_no_txt" 
                    placeholder="GPF No." 
                    {{-- disabled="true" --}} 
                    readonly="true" 
                    required value="{{ $data->gpf_number }}">
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <input  class="form-control form-control-sm"
                        type="text" name="emp_name_txt" 
                        id="emp_name_txt" 
                        placeholder="Employee Name" 
                        disabled="true" 
                        required value="{{ $data->name }}">
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <input  class="form-control form-control-sm"
                        type="text" name="emp_desingation_txt" 
                        id="emp_designation_txt" 
                        placeholder="Employee Designation" 
                        disabled="true" 
                        required value="{{ $data->designation }}">
            </div>
        </div>
        <div class="row" style="margin-top: 10px;"></div>
        <div class="row">
            <div class="col-6 col-sm-4 themed-grid-col">
                <label>Status</label>
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <label>Approved By</label>
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <label>Certificate Issued</label>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-4 themed-grid-col">
                <select name="status_cbo" 
                        id="status_cbo" 
                        class="form-control form-control-sm" 
                        autofocus="autofocus" 
                        required >

                    <option value=""  Selected hidden >Select Status</option>
<option value="0" {{$data->status == '0' ? 'selected' : ''}}>Pending</option>
<option value="1" {{$data->status == '1' ? 'selected' : ''}}>Approved</option>
<option value="2" {{$data->status == '2' ? 'selected' : ''}}>Under Proccessing</option>
<option value="3" {{$data->status == '3' ? 'selected' : ''}}>Objection Raised Reply awaited</option>
<option value="4" {{$data->status == '4' ? 'selected' : ''}}>Under Checking</option>
<option value="5" {{$data->status == '5' ? 'selected' : ''}}>Submitted for Approval</option>
                </select>
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <select name="approvedby_cbo" 
                        id="approvedby_cbo" 
                        class="form-control form-control-sm" 
                        autofocus="autofocus" required
                        >
                    <option value=""  Selected hidden >
                        Select Approved By
                    </option>
                    <option value="11" selected>HOD</option>
                    <option value="12">SE</option>
                    <option value="13">XEN</option>
                </select>
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <select name="certificate_cbo" 
                        id="certificate_cbo" 
                        class="form-control form-control-sm" 
                        disabled="true" 
                        autofocus="autofocus" required>
                    <option value=""  Selected hidden >Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No"  selected="true">No</option>
                    
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;"></div>
        <div class="row">
            <div class="col-6 col-sm-4 themed-grid-col">
                <label>Approval Order No.</label>
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <label>Approval Letter No.</label>
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <label>Approval Date</label>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-4 themed-grid-col">
                <input  class="form-control form-control-sm"
                        type="text" name="approval_order_txt" 
                        id="approval_order_txt" 
                        placeholder="Approval Order No."  
                        disabled="true" required 
                        value="{{ $data->approval_no }}">
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <input  class="form-control form-control-sm" 
                        type="text" name="approval_letter_no_txt" 
                        id="approval_letter_no_txt" 
                        placeholder="Approval Letter No."  
                        disabled="true" required 
                        value="{{ $data->app_letter_no }}">
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <input  class="form-control form-control-sm" 
                        type="date" 
                        name="approval_letter_dt_txt" 
                        id="approval_letter_dt_txt"
                        disabled="true" 
                        required value="{{ $data->approval_dt }}">
            </div>
        </div>
        <div class="row" style="margin-top: 10px;"></div>
        <div class="row">
            <div class="col-6 col-sm-4 themed-grid-col">
                <label>Approved Amount</label>
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <label>Certificate Letter No.</label>
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <label>Certificate Letter Date</label>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-4 themed-grid-col">
                <input  class="form-control form-control-sm" 
                        type="text" name="approved_amt_txt" 
                        id="approved_amt_txt" 
                        placeholder="Approved Amount"  
                        disabled="true"
                        required value="{{ $data->approved_amt }}">
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <input  class="form-control form-control-sm" 
                        type="text" name="certificate_letter_no_txt" 
                        id="certificate_letter_no_txt" 
                        placeholder="Certificate Letter No."  
                        disabled="true"
                        required value="{{ $data->certificate_no }}" >
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
                <input  class="form-control form-control-sm" 
                        type="date" 
                        name="certificate_letter_dt_txt" 
                        id="certificate_letter_dt_txt" 
                        disabled="true" 
                        required value="{{ $data->certificate_dt }}" >
            </div>
        </div>
    </br>
        <div class="row">
            <div class="col-md-5 offset-5 ">
                <button type="submit" 
                        name="update-btn" 
                        id="update-btn"
                        class="btn btn-primary btn-sm">Update
                </button>
                
                <button type="button" 
                        class="btn btn-primary btn-sm"
                        {{-- class="btn btn-primary mb-2" --}} 
                        onclick="window.location='{{route("cases.index") }}'">Report
                </button>
                
                 
            </div>
            {!! Form::close()!!}
        </div>    
         {{--    <div class="col-md-4 offset-4 ">
                <button type="button" name="reset-btn" id="reset-btn" class="btn btn-primary input-sm">Reset</button>
                    <button type="button" name="update-btn" id="update-btn" class="btn btn-primary input-sm">Update</button>
                    <button type="button" class="btn btn-primary input-sm" onclick="window.location='{{ route("cases.index") }}'">Report</button>
            </div>
        </div> --}}
    </div>
<script type="text/javascript">

window.load=$( document ).ready(function() {

    // Function for Approval Status Change
    $('#status_cbo').on('change',function(){
        var status_code = $(this).val();
        console.log("Status Changed : " + status_code);
        if(status_code =="1")
        {
            // $('#approvedby_cbo').removeAttr('disabled');
            $('#certificate_cbo').removeAttr('disabled');
            $('#approval_order_txt').removeAttr('disabled');
            $('#approval_letter_no_txt').removeAttr('disabled');
            $('#approval_letter_dt_txt').removeAttr('disabled');
            $('#approved_amt_txt').removeAttr('disabled');
            $('#approvedby_cbo').removeAttr('disabled');
            document.getElementById('approvedby_cbo').value = '11';
        }
        else
        {    
            document.getElementById('approvedby_cbo').value = '';
            $('#approvedby_cbo').attr('disabled', 'disabled');
            $('#certificate_cbo').attr('disabled', 'disabled');
            $('#approval_order_txt').attr('disabled', 'disabled');
            $('#approval_letter_no_txt').attr('disabled', 'disabled');
            $('#approval_letter_dt_txt').attr('disabled', 'disabled');
            $('#approved_amt_txt').attr('disabled', 'disabled');
            document.getElementById('approval_order_txt').value = '';
            document.getElementById('approval_letter_no_txt').value = '';
            document.getElementById('approval_letter_dt_txt').value = '';
            document.getElementById('approved_amt_txt').value = '';
        }
    });
    // Function for Certificate Status Change
    $('#certificate_cbo').on('change',function(){
        var status_code = $(this).val();
        console.log("Certificate Status Changed : " + status_code);
        if(status_code =="Yes")
        {
            $('#certificate_letter_no_txt').removeAttr('disabled');
            $('#certificate_letter_dt_txt').removeAttr('disabled');
        }
        else
        {    
            $('#certificate_letter_no_txt').attr('disabled', 'disabled');
            $('#certificate_letter_dt_txt').attr('disabled', 'disabled');
            document.getElementById('certificate_letter_no_txt').value = '';
            document.getElementById('certificate_letter_dt_txt').value = '';


        }
    });       
});
</script>


@endsection    
