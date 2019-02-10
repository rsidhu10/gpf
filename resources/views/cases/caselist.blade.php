<?php $num =1; ?>
{{-- {{ $cases->links() }} --}}
@foreach($cases as $data)
    
    <tr>
        <td style="text-align: center;">  {{ $num}}</td>
        <td style="text-align: left;">  {{ $data->gpf  }}</td>
        <td style="text-align: left;">  {{ $data->name          }}</td>
        <td style="text-align: left;">  {{ $data->designation   }}</td>
        <td style="text-align: left;">  {{ $data->reason}}</td>
        <td style="text-align: left;">  {{ \Carbon\Carbon::parse($data->retirement_dt)->format('d-M-y')}}</td> 
        <td style="text-align: left;">  {{ \Carbon\Carbon::parse($data->diary_dt)->diffForHumans() }}</td>      
        <td style="text-align: left;">  {{ $data->relates_to}}</td>
        <td style="text-align: left;">  {{ $data->status }}</td> --}} 
       
       


        
        <td style="text-align: right;">
            <a href="#" class="btn btn-info btn-xs" id="edit" data="{{$data->id}}" >Edit</a>
        </td>
        
        
    </tr>
<?php $num++; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"> 
</script>

<script type="text/javascript">
window.load=$(document).ready(function(){
// alert('hi');
});
    function mstatus(e){
        var temp = e;
        if(temp == 0){
        return "Pending"
        }else{
            return "Approved"
        }   
    }
</script>

@endforeach

