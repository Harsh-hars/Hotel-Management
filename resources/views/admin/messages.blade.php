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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Actions</th>
                            <th>Send Mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}$</td>
                                <td>{{ $data->message }}</td>

                                <td><a href="{{ url('delete_contact', $data->id) }}"><button
                                            class="btn btn-danger">Delete</button></a>
                             
                                </td>
                                <td><a href="{{ url('send_mail', $data->id) }}"><button
                                            class="btn btn-success">Send Mail</button></a></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('admin.footer')

</body>

</html>
