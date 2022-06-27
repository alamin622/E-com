

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{Auth::user()->name}}</h3>
        </div>
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" style="width: 8rem";height="8rem"; src="{{ asset('public/frontend') }}/images/heart.png" alt="User profile picture">
            <hr>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="{{route('profile.home')}}"><span><i class="fas fa-book mr-1"></i> Dashboard</span></a>
            <hr>
            <a href="{{route('wishlist.home')}}"><span><i class="fas fa-book mr-1"></i> Wishlist</span></a>
            <hr>
            <a href="{{route('profile.setting')}}"><span><i class="fas fa-book mr-1"></i> Setting</span></a>
            <hr>
            <a href=""><span><i class="fas fa-book mr-1"></i>  MyOrder</span></a>
            <hr>
            <a href=""><span><i class="fas fa-book mr-1"></i> Open Ticket</span></a>
            <hr>
            <a href="{{route('customer.logout')}}"><span><i class="fas fa-book mr-1"></i> Logout</span></a>
        </div>
        <!-- /.card-body -->
    </div>

