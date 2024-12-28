<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  @include('Admin.Css')
  <style>
    .center-div {
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 10px;

    }

    body,
    html {
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .form-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;

    }


    form {
      max-width: 400px;
      width: 100%;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: ;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    form label {
      font-weight: bold;
      margin-bottom: 5px;
      display: block;
    }

    form input,
    form select {
      width: 100%;
      margin-bottom: 15px;
      padding: 8px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    form button {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    form button:hover {
      background-color: #0056b3;
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
          <div class="center-div">
            <h1>Add Product</h1>
          </div>

          <div class="form-container">


            @if(session('success'))
            <div style="color: green;">
              {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div style="color: red;">
              {{ session('error') }}
            </div>
            @endif

            @if($errors->any())
            <div style="color: red;">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <form action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <label for="product_name">Title:</label>
              <input type="text" id="product_name" name="title" value="{{ old('title') }}">

              <label for="description">Description:</label>
              <input type="text" id="description" name="description" value="{{ old('description') }}" >

              <label for="price">Price:</label>
              <input type="number" id="price" name="price" value="{{ old('price') }}"  step="0.01">

              <label for="quantity">Quantity:</label>
              <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" >

              <label for="category">Category:</label>
              <select id="category" name="category_id" >
                <option disabled selected value="">Select Category</option>
                @foreach($Category as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                  {{ $category->name_category }}
                </option>
                @endforeach
              </select>

              <label for="image">Product Image:</label>
              <input type="file" name="image" accept="image/*">

              <button type="submit">Submit</button>
            </form>

          </div>



        </div>
      </div>


      @include('Admin.Script')

</body>

</html>