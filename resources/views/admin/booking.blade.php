<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">

            <div class="container mt-5">
                <h3 class="mb-3 text-center">View Rooms</h3>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>

                            <th>Room Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Room Title</th>
                            <th>Room Price</th>
                            <th>Room type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->room_id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->room->room_title }}</td>
                                <td>{{ $data->room->price }}</td>
                                <td>{{ $data->room->room_type }}</td>
                                <td>{{ $data->start_date }}</td>
                                <td>{{ $data->end_date }}</td>
                                <td>{{ $data->status }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            @include('admin.footer')

</body>

</html>
