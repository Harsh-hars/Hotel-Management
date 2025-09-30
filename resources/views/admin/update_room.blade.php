<!DOCTYPE html>
<html>

<head>
    <base href="/public">
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

        .form_wrapper h2{
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
                    <h2>Update Room</h2>
                    <form action="{{ url('edit_room', $data->id) }}" method="POST" enctype="multipart/form-data">

                       @csrf

                        <div class="form_div">
                            <label for="room_title">Room Title</label>
                            <input value="{{ $data->room_title }}" class='form_field' type="text" name="title">
                        </div>
                        <div class="form_div">
                            <label for="room_description">Room Description</label>
                            <textarea class='form_field' name="description">{{ $data->description }}</textarea>

                        </div>
                        <div class="form_div">
                            <label for="price">Price</label>
                            <input value="{{ $data->price }}" class='form_field' type="number" name="price">

                        </div>

                        <div class="form_div">
                            <label for="room_type">Room Type</label>
                            <select  class='form_field' name="type">
                                <option selected value="{{ $data->room_type }}">{{ $data->room_type }}</option>
                                <option value="regular">Regular</option>
                                <option value="premium">Premium</option>
                                <option value="deluxe">Deluxe</option>
                            </select>
                        </div>

                        <div class="form_div">
                            <label for="free_wifi">Free Wifi</label>
                            <select class='form_field' name="wifi">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form_div d-flex gap-3">
                            <div class="current">
                                <label for="Current_image">Current Image</label>
                                <img src="/room/{{ $data->image }}" width="50px" />
                            </div>
                            <div class="new">
                                <label for="New_image">New Image</label>
                                <img src="/room/{{ $data->image }}" width="50px" />
                            </div>
                        </div>

                        <div class="form_div">
                            <label for="upload_image">Upload Image</label>
                            <input class='form_field' type="file" name="image">
                        </div>
                        <div class="form_div">
                            <input style="width:200px; padding:10px" class='form_field btn btn-primary' type="submit" value="Add Room">
                        </div>
                    </form>
                </div>
            </div>

            @include('admin.footer')

        </div>
    </div>

</body>

</html>
