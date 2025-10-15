<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .form_div label {
            width: 200px;
        }

        .form_div {
            width: 100%;

        }

        .form_field {
            width: 60%;
        }

        .form_wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            flex-direction: column;
        }

        .form_wrapper h2 {
            padding: 10px;
            margin-top: 20px;
        }

        form {
            width: 90%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 30px;
        }
    </style>
</head>

<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">

            <div class="container-fluid">
                <div class="form_wrapper">
                    <h2>Gallary</h2>

                    <div class="row" style="margin-bottom:20px">
                        {{-- display gallary images --}}

                        @foreach ($gallery as $item)
                            <div class="col-md-4">
                                <img src="/gallary/{{ $item->image }}" height="200" width="300">
                                <a class="btn btn-danger" href="{{ url('delete_gallery',$item->id) }}">Delete gallary</a>
                            </div>
                        @endforeach

                    </div>




                    <form action="{{ url('upload_gallary') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form_div">
                            <label for="room_title">Add Gallary</label>
                            <input class='form_field' type="file" name="image">
                        </div>

                        <div class="form_div">
                            <input style="width:200px; padding:10px" class='form_field btn btn-primary' type="submit"
                                value="Add Gallary">
                        </div>

                    </form>
                </div>
            </div>

            @include('admin.footer')

        </div>
    </div>

</body>

</html>
