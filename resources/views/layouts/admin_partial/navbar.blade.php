<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="" data-toggle="tooltip" data-placement="bottom" data-original-title="Browse Frontend" style="margin-top: .5rem">
            <a target="_blank" href="{{url('/')}}" class="">
                <i class="fa fa-globe"></i>
            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Profile -->
        <li class="nav-item dropdown" ">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
            <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right " >

            <span class="dropdown-item "><i class="far fa-user" style="margin-right: .7rem"></i> {{Auth::user()->name}} </span>

            <div class="dropdown-divider"></div>
            <a href="{{ route('admin.logout') }}" class="dropdown-item ">Logout</a>

            <div class="dropdown-divider"></div>
            <a href="{{ route('admin.password.change') }}" class="dropdown-item ">Password Change</a>
        </div>
        </li>
    </ul>
</nav>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

</div>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

</body>
</html>
