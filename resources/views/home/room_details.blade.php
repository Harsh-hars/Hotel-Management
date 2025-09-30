<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.css');
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        @include('home.header');
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <div class="container">
        <div class="row">

            <!-- Room Detail -->
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <img class="card-img-top" style="height: 350px; object-fit: cover;" src="room/{{ $room->image }}"
                        alt="Room Image">

                    <div class="card-body text-center">
                        <h4 class="card-title">{{ $room->room_title }}</h4>
                        <p class="card-text">{{ $room->description }}</p>
                        <ul class="list-group list-group-flush text-start">
                            <li class="list-group-item text-left"><b>Room Type:</b> {{ $room->room_type }}</li>
                            <li class="list-group-item text-left"><b>Free Wifi:</b> {{ $room->wifi }}</li>
                            <li class="list-group-item text-left"><b>Price:</b> ₹{{ $room->price }} / night</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Booking Form -->
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-dark text-white text-center">
                        <h3 class="text-white">Book This Room</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-bs-dismiss="alert">X</button>

                            @if (session()->has('message'))
                                {{ session()->get('message') }}
                            @endif
                        </div>

                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @endif

                        <form method="POST" action="{{ url('add_booking', $room->id) }}">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input @if (Auth::id()) value="{{ Auth::user()->name }}" @endif
                                    type="text" name="name" class="form-control" placeholder="Enter your name"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input @if (Auth::id()) value="{{ Auth::user()->email }}" @endif
                                    type="email" name="email" class="form-control" placeholder="Enter your email"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" name="phone" class="form-control"
                                    placeholder="Enter your phoneno" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Check-in Date</label>
                                <input type="date" name="start_date" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Check-out Date</label>
                                <input type="date" name="end_date" class="form-control" required>
                            </div>


                            <button type="submit" class="btn bg-dark text-white w-100">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--  footer -->
    <footer>
        @include('home.footer');
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>


</html>
