@extends('layouts.main')

@section('content')
    <div class="card-group" style="margin-top: 70px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">    
                    <div class="card border-primary mb-3" style="max-width: 25rem;">
                        <div class="card-header"><h4>Rajesh Kumar</h4></div>
                        <div class="card-body text-primary">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h5 class="card-title">Important Cases List</h5>
                            <ul id="S1" class="list-group list-group-flush">
                                {{-- <li class="list-group-item">MISC-1416</li> --}}
                                
                          </ul>
                        </div>
                    </div>
                </div>
            </div>  
        </div>  
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">    
                    <div class="card border-primary mb-3" style="max-width: 25rem;">
                        <div class="card-header"><h4>Rakesh Kumar</h4></div>
                        <div class="card-body text-primary">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h5 class="card-title">Important Cases List</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">MISC-1416</li>
                                <li class="list-group-item">Er. Kewal Krishan</li>
                                <li class="list-group-item">Er. Gurmail Singh</li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">    
                    <div class="card border-primary mb-3" style="max-width: 25rem;">
                        <div class="card-header"><h4>Nirmal Singh</h4></div>
                        <div class="card-body text-primary">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h5 class="card-title">Important Cases List</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">MISC-1416</li>
                                <li class="list-group-item">Er. Kewal Krishan</li>
                                <li class="list-group-item">Er. Gurmail Singh</li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">    
                    <div class="card border-primary mb-3" style="max-width: 25rem;">
                        <div class="card-header"><h4>Raj Kumar</h4></div>
                        <div class="card-body text-primary">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h5 class="card-title">Important Cases List</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Hajari Lal MISC-1416</li>
                                <li class="list-group-item">Harjinder Singh MISC-3782</li>
                                <li class="list-group-item">Surinder Singh MISC-3672</li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">    
                    <div class="card border-primary mb-3" style="max-width: 50rem;">
                        <div class="card-header"><h4>Amardeep Singh</h4></div>
                        <div class="card-body text-primary">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h5 class="card-title">Important Cases List</h5>
                            <ul class="list-group list-group-flush">
                                {{-- <li class="list-group-item">MISC-1416</li>
                                <li class="list-group-item">Er. Kewal Krishan</li>
                                <li class="list-group-item">Er. Gurmail Singh</li> --}}
                                @foreach($cases as $case)
                                    <li class="list-group-item">
                                        {{ $case->gpf. " - " . $case->name }}
                                    </li>
                                @endforeach 
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">    
                    <div class="card border-primary mb-3" style="max-width: 25rem;">
                        <div class="card-header"><h4>Shagufta Khanam</h4></div>
                        <div class="card-body text-primary">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h5 class="card-title">Important Cases List</h5>
                            <ul id="list6" class="list-group list-group-flush">
                                
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">    
                    <div class="card border-primary mb-3" style="max-width: 20rem;">
                        <div class="card-header"><h4>Rajinder Kaur</h4></div>
                        <div class="card-body text-primary">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h5 class="card-title">Important Cases List</h5>
                            <ul id="list7" class="list-group list-group-flush">
                                {{-- @foreach($cases as $case)
                                    <li class="list-group-item">
                                        {{ $case-> }}

                                    </li>
                                @endforeach --}}
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>



 <script type="text/javascript">
    window.load=$(document).ready(function(){
        // alert('hi');
        // $('#circle_cbo').empty();
        var id = 'C01';
        
       $.get("{{ URL::to('case/division?id=')}}" + id,function(data){
         
            console.log(data);
            $.each(data, function(index, dataObj){
                $('#list7').append('<li class="list-group-item">' + dataObj.division_name +'</li>');

            });    

        });
       var id = 'C02';
       $.get("{{ URL::to('case/division?id=')}}" + id,function(data){
         
            console.log(data);
            $.each(data, function(index, dataObj){
                $('#list6').append('<li class="list-group-item" >' + dataObj.division_name +'</li>');
            });    
        });
        
        var id = 'S1';
        $.get("{{ URL::to('home/importantcase?id=')}}" + id, function(data){
            console.log(data);
            $.each(data, function(index, dataObj){
                $('#S1').append('<li class="list-group-item">' 
                    + dataObj.name + '</li>' );    
            });
        });

    });    

    


 </script>

@endsection
