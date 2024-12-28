<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  @include('Admin.Css')
  <style>
    table {
      color: red;
      width: 100%;
    }

    th,
    td {
      border: 1px solid red;
      padding: 8px;
    }

    th {
      background-color: rgb(244, 244, 244);
      text-align: left;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f1f1f1;
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

          <table>
            <thead>
              <tr>
                <th>titel</th>
                <th>description</th>
                <th>quantity</th>
                <th>price</th>
                <th>category</th>
                <th>image</th>
              </tr>
            </thead>
            <tbody>
              @foreach($product as $product)
              <tr>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category }}</td>
                <td>
                  @if($product->image)
                  <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" width="100" height="100">
                  @else
                  Image not found
                  @endif
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>


        </div>
      </div>

      <!-- container-scroller -->
      <!-- plugins:js -->
      @include('Admin.Script')
      <!-- End custom js for this page -->
</body>

</html>