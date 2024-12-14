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
       .center{
        margin-top:30px;
        width:50%;
        border:3px solid green;
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
      <div class="content-wrapper">
              @if(session()->has('message'))
                 <div class="alert alert-success">
                         <button type="button" class="close" data-dismiss="alert" aria-label="true">×</button>
                              {{ session()->get('message') }}
                  </div>
              @endif

            <div class="div">
            
                <form action="{{url('/Add_category')}}" method="get">
                    @csrf
                <h2>Add Category</h2>
                  <input type="text" name="name" placeholder="write category name">
                  <input type="submit"  class="btn btn primary" value="Submit"  value="Add category">
                 
                </form>
                <table class="center">
                  <tr>
                    <td>category</td>
                    <td>action</td>
                    
                  </tr>
                  @foreach($data as $data)
                    <tr>
                      <td>{{$data->name_category}}</td>
                      <td>
                        <a onclick="return confirm('are you sure to delect this')"class="btn btn-danger" href="{{url('delete',$data->id)}}">Delect</a>
                      </td>
                     
                      
                    </tr>
                  @endforeach   
                </table>
              
      </div>
          
    </div>

        
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('Admin.Script')
    <!-- End custom js for this page -->
  </body>
</html>