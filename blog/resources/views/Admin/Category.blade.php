<!DOCTYPE html>
<html lang="en">
   <head>
       <!-- Required meta tags -->
     @include('Admin.Css')
    </head>
  <body>
    <div class="container-scroller">
     @include('Admin.sidber')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
         @include('Admin.header')
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
            
          
        

        
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('Admin.Script')
    <!-- End custom js for this page -->
  </body>
</html>