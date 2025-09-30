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
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Wifi</th>
                            <th>Room Type</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->room_title }}</td>
                                <td>{!! Str::limit($data->description, 150) !!}</td>
                                <td>{{ $data->price }}$</td>
                                <td>{{ $data->wifi }}</td>      
                                <td>{{ $data->room_type }}</td>
                                <td><img width="50" height="50" src="/room/{{ $data->image }}" </td>
                                <td><a href="{{ url('delete_room', $data->id) }}"><button
                                            class="btn btn-danger">Delete</button></a>
                                    <a href="{{ url('update_room', $data->id) }}"><button
                                            class="btn btn-warning">Update</button></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('admin.footer')

</body>

</html>
