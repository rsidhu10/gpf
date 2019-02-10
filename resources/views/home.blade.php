@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                </br></br></br>
                <div class="card">    
                    <div class="card border-primary mb-3" style="max-width: 80rem;">
                        <div class="card-header"><h4>Important Cases List</h4></div>
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
    </div>  

{{--         <div class="col-md-12">
            </br></br></br>
            <div class="card">
                <div class="card-header">GPFund</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    GPF Branch
                </div>
            </div>
        </div> --}}


@endsection
