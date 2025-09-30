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
                    <h2>Create Room</h2>
                    <form action="{{ url('add_room') }}" method="POST" enctype="multipart/form-data">

                       @csrf

                        <div class="form_div">
                            <label for="room_title">Room Title</label>
                            <input class='form_field' type="text" name="title">
                        </div>
                        <div class="form_div">
                            <label for="room_description">Room Description</label>
                            <textarea class='form_field' name="room_description"></textarea>

                        </div>
                        <div class="form_div">
                            <label for="price">Price</label>
                            <input class='form_field' type="number" name="price">

                        </div>

                        <div class="form_div">
                            <label for="room_type">Room Type</label>
                            <select class='form_field' name="type">
                                <option selected value="regular">Regular</option>
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
