<!doctype html>
<html lang="en">
   @include('partials._head')  
   <body>
      @include('partials._navbar')
      <div class="row" style="margin-top: 70px;"></div>
      <div class="container">
         @yield('content')
         @include('partials._footer')   
      </div>
	   @include('partials._javascripts')
	   @yield('scripts')
   </body>
</html>