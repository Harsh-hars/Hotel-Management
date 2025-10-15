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
                            <th>Actions</th>
                            <th>Status Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->room_id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->room->room_title }}</td>
                                <td>{{ $item->room->price }}</td>
                                <td>{{ $item->room->room_type }}</td>
                                <td>{{ $item->start_date }}</td>
                                <td>{{ $item->end_date }}</td>
                                <td>{{ $item->status }}</td>
                                <td><a onclick="return confirm('Are you sure to delete');"
                                        href="{{ url('delete_booking', $item->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ url('approve_booking',$item->id) }}">Approve</a>
                                    <a class="btn btn-warning" href="{{ url('delete_booking',$item->id) }}">Reject</a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            @include('admin.footer')

</body>

</html>
