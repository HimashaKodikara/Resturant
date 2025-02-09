<!DOCTYPE html>
<html>

<head>
    <base href="/public">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="admin/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="admin/css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="admin/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="admin/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="admin/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <style>
        .div_deg {
            padding: 10px;
        }

        label {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1>Update Food</h1>


                <form action="{{url('edit_food',$food->id)}}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="div_deg">
                        <label for="">Food Title</label>
                        <input type="text" name="title" value="{{ $food->title }}">
                    </div>

                    <div class="div_deg">
                        <label for="">Details</label>
                        <textarea type="text" name="details" id="" >{{$food->details}}</textarea>
                    </div>

                    <div class="div_deg">
                        <label for="">Price</label>
                        <input type="text" name="price" value="{{ $food->price}}">
                    </div>

                    <div class="div_deg">
                        <label for="">Current Image</label>
                        <img width="150" src="food_img/{{$food->image}}" alt="">
                    </div>

                    <div class="div_deg">
                        <label for="">Change Image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="div_img">
                         <input class="btn btn-warning" type="submit" value="Update Food">
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/popper.js/umd/popper.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="admin/vendor/chart.js/Chart.min.js"></script>
    <script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admin/js/charts-home.js"></script>
    <script src="admin/js/front.js"></script>
</body>

</html>
