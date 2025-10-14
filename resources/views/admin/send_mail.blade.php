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
                    <h2>Send Mail to {{ $data->name }}</h2>
                    <form action="{{ url('add_room') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form_div">
                            <label for="Greeting">Greeting</label>
                            <input class='form_field' type="text" name="greeting">
                        </div>
                        <div class="form_div">
                            <label for="mail_body">Mail Body</label>
                            <textarea class='form_field' name="mail_body"></textarea>

                        </div>
                        <div class="form_div">
                            <label for="action_test">Action Test</label>
                            <input class='form_field' type="text" name="action_text">

                        </div>

                        <div class="form_div">
                            <label for="action_url">Action Url</label>
                            <input class='form_field' type="text" name="action_url">

                        </div>
                        <div class="form_div">
                            <label for="end_line">End Line</label>
                            <input class='form_field' type="text" name="end_line">

                        </div>

                       
                        <div class="form_div">
                            <input style="width:200px; padding:10px" class='form_field btn btn-primary' type="submit"
                                value="Send Mail">
                        </div>
                    </form>
                </div>
            </div>

            @include('admin.footer')

        </div>
    </div>

</body>

</html>
