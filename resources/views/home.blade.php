<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Broadcast Testing</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>
    <div class="container w-full mx-auto pt-20">
        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

            <div class="flex flex-wrap">
                <div class="w-full md:w-2/2 xl:w-3/3 p-3">
                    <div class="bg-white border rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-yellow-600"><i
                                        class="fas fa-user-plus fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Latest Message</h5>
                                <h3 class="font-bold text-3xl">
                                    <p>
                                        Message: <span id="latest_message_id"></span>
                                    </p>
                                </h3>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

            <div class="flex flex-wrap">
                <div class="w-full md:w-2/2 xl:w-3/3 p-3">
                    <div class="flex flex-row items-center">
                        <div class="flex-1 md:text-center">
                            <h5 class="font-bold uppercase text-gray-500">Testing Button</h5>
                            <form action="">
                                <input class="form-control" type="hidden" value="Hello" name="name" id="name">
                                <button type="button" id="testBtn" class="btn btn-primary">Click Here</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

<script src="{{ asset('js/app.js') }}"></script>

<script>
    const userId = {{ Auth::id() }};
    const btn = document.getElementById("testBtn");

    //On clicking the button
    btn.addEventListener("click", (e) => {
        e.preventDefault();

        //calling the test route
        axios.get("{{ route('test') }}")
            .then((response) => {
                console.log(response);
            })
            .catch((error) => console.log(error));
    });

    //Listening to Private Channel Event
    Echo.private(`notifications.${userId}`)
        .listen('NotificationEvent', (e) => {
            console.log(e.message);
            toastr.success(e.message);
            document.getElementById('latest_message_id').innerText = e.message;
        })
</script>

</html>
