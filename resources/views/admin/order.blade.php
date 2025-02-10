<!DOCTYPE html>
<html>

<head>
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
        table
        {
           border:1px solid skyblue;
           margin:auto;
           width:1000px
        }
        th{
            color: white;
            font-weight: bold;
            font-size: 16px;
            text-align: center;
            background-color: red;
            padding: 10px
        }
        td{
            color: white;
            font-weight: bold;
            text-align: center;
            background-color: balck;
            padding: 10px
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

                 <table>
                    <tr>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Food Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Change Status</th>
                    </tr>

                    @foreach ($data as $data )


                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->address}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->quanity}}</td>
                        <td>{{$data->price}}</td>
                        <td><img src="food_img/{{$data->image}}" width="150" alt=""></td>
                        <td>{{$data->delivery_status}}</td>
                        <td>
                            <a class="btn btn-info" href="{{url('on_the_way',$data->id)}}">On the Way</a>
                            <a class="btn btn-warning" href="{{url('delivered',$data->id)}}">Delivered</a>
                            <a class="btn btn-danger" href="{{url('cancel',$data->id)}}">Cancel</a>
                        </td>
                    </tr>
                    @endforeach
                 </table>
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
