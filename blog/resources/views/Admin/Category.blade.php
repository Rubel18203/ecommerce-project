<!DOCTYPE html>
<html lang="en">
   <head>
       <!-- Required meta tags -->
     @include('Admin.Css')
     <style>
      .div{
        padding-top:100px;
      }
       .h2{
         font-size:40px;
         padding-bottom:100px;
       }
       .form{
        padding-bottom:1000px;
       }
     </style>
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
           <div class="div">
            
                <form>
                <h2>Add Category</h2>
                  <input type="text" name="username" placeholder="write category name">
                  <input type="submit"  class="btn btn primary" value="Submit"  value="Add category">


                </form>
              
            </div>
          
          </div>

        
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('Admin.Script')
    <!-- End custom js for this page -->
  </body>
</html>