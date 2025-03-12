<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="font/images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="font/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="font/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="font/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="font/css/responsive.css" rel="stylesheet" />
    <style>
        .body {
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background-color: #f9f9f9;
        }

        .table-form {
            width: 80%;
            max-width: 900px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;

        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #4CAF50;
            color: #fff;
        }

        th,
        td {
            padding: 12px 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>


<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('Home.Header')

        <!-- end header section -->
        <!-- slider section -->
        <!-- end slider section -->
    </div>

    <div class="table-form">
        <table>
            <?php $totalprice = 0; ?>
            < thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                   <a href="{{url(remove_cart)}}"><th>actiron<th></a>
                </tr>

                @foreach ($cart as $cart)
                    <tr>

                        <td>{{ $cart->id }}</td>
                        <td>{{ $cart->product_titel }}</td>
                        <td></td>
                        <td>{{ $cart->price }}</td>
                        <td></td>
                        <?php $totalprice = $totalprice + $cart->price; ?>

                    </tr>
                @endforeach

        </table>

    </div>
    <div>
    <h1 class="total_deg">total price:
        {{ $totalprice }}</h1>
    </div>
    <!-- footer start -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="full">
                        <div class="logo_footer">
                            <a href="#"><img width="210" src="images/logo.png" alt="#" /></a>
                        </div>
                        <div class="information_f">
                            <p><strong>ADDRESS:</strong> 28 White tower, Street Name New York City, USA</p>
                            <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                            <p><strong>EMAIL:</strong> yourmain@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="widget_menu">
                                        <h3>Menu</h3>
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">About</a></li>
                                            <li><a href="#">Services</a></li>
                                            <li><a href="#">Testimonial</a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="widget_menu">
                                        <h3>Account</h3>
                                        <ul>
                                            <li><a href="#">Account</a></li>
                                            <li><a href="#">Checkout</a></li>
                                            <li><a href="#">Login</a></li>
                                            <li><a href="#">Register</a></li>
                                            <li><a href="#">Shopping</a></li>
                                            <li><a href="#">Widget</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="widget_menu">
                                <h3>Newsletter</h3>
                                <div class="information_f">
                                    <p>Subscribe by our newsletter and get update protidin.</p>
                                </div>
                                <div class="form_sub">
                                    <form>
                                        <fieldset>
                                            <div class="field">
                                                <input type="email" placeholder="Enter Your Mail" name="email" />
                                                <input type="submit" value="Subscribe" />
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>
