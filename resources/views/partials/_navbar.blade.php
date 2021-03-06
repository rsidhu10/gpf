<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
   <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
   </a>
   <button  class="navbar-toggler" 
            type="button" 
            data-toggle="collapse" 
            data-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" 
            aria-expanded="false" 
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
         <li class="{{ Request::is('home') ? "active" : ""}}">
            <a class="nav-link" 
               href="/home">Home 
               <span class="sr-only">(current)</span>
            </a>
         </li>
         <li class="{{ Request::is('aboutus')? "active" : ""}}">
            <a class="nav-link" href="/aboutus">About us</a>
         </li>
         <li class="{{ Request::is('contactus') ? "active" : ""}}">
            <a class="nav-link" href="/contactus">Contact us</a>
         </li>
         <li class="nav-item dropdown {{ Request::is('approvals') ? "active" : ""}}">
            <a class="nav-link dropdown-toggle" 
               href="#" 
               id="navbarDropdown" 
               role="button" 
               data-toggle="dropdown" 
               aria-haspopup="true" 
               aria-expanded="false">Data Entry
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="/approvals">Add New Case</a>
               <a class="dropdown-item" href="">Update Status</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="#">Something else here</a>
            </div>
         </li>
         <li class="nav-item dropdown {{ Request::is('cases') ? "active" : ""}}">
            <a class="nav-link dropdown-toggle" 
               href="#" 
               id="navbarDropdown" 
               role="button" 
               data-toggle="dropdown" 
               aria-haspopup="true" 
               aria-expanded="false">Reports
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="/cases">Pending Cases</a>
               <a class="dropdown-item" href="/reports">Abstract</a>
               <a class="dropdown-item" href="#">Case with Objection</a>
               <a class="dropdown-item" href="#">Approved Cases</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="#">Something else here</a>
            </div>
         </li>
         <li class="nav-item">
            <a class="nav-link disabled" 
               href="#" 
               tabindex="-1" 
               aria-disabled="true">Disabled
            </a>
         </li>
      </ul>
      <ul class="navbar-nav ml-auto">
       <!-- Authentication Links -->
         @guest
            <li class="nav-item">
               <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
               </li>
            @endif
         @else
            <li class="nav-item dropdown">
               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                   {{ Auth::user()->name }} <span class="caret"></span>
               </a>
               <div class="dropdown-menu dropdown-menu-right"aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" 
                     href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                       {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                  </form>
               </div>
           </li>
         @endguest
      </ul>
   </div>
</nav>  
<!-- Navbar Ends Here -->
