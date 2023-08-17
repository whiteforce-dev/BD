@extends('Master.Master')
@section('content')
    <style>

        @import url("https://fonts.googleapis.com/css?family=Poppins:300,400,600");

        * {
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            background: #F9F9F9;
            flex-direction: column;
        }

        /* color map */
        /* Note: CSS doesn't support maps, so we'll use custom CSS variables for colors instead. */
        :root {
            --prime-color: #3b70fc;
            --dark-color: #3c3c3c;
            --grey-color: #dddfe6;
            --white-color: #f9f9f9;
        }

        .container {
            margin: auto;
            font-family: "Poppins", Arial, san-serif;
            line-height: 1.4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        /* styles */
        .card {
            background: #fff url("https://storage.googleapis.com/chydlx/codepen/minimalist-profile-card/card-bg.jpg") top -10% center no-repeat;
            background-size: contain;
            border-radius: 10px;
            box-shadow: 0 .5rem .5rem -.25rem rgba(0, 0, 0, 0.2);
            text-align: center;
            padding: 30px 60px;
        }

        .card img {
            background-color: var(--grey-color);
            height: 120px;
            width: 120px;
            border-radius: 50%;
            margin: auto auto 15px;
            display: block;
        }

        .card h1 {
            font-size: 22px;
            margin: 10px auto 0;
            letter-spacing: 1px;
        }

        .card h2 {
            margin: auto;
            color: rgba(var(--dark-color), 0.85);
            font-weight: 300;
            font-size: 14px;
        }

        .card .button {
            display: block;
            text-decoration: none;
            background: var(--prime-color);
            color: var(--white-color);
            padding: 12px;
            border: none;
            border-radius: 25px;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 700;
            min-width: 200px;
            transition: 0.2s;
        }

        .card .button span {
            font-size: 20px;
            line-height: 1;
            vertical-align: top;
        }

        .card .button:hover {
            background: rgba(var(--prime-color), 0.93);
        }
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .content-body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;

        }

        .container-fluid {
            width: 100%;
            max-width: 1200px;
            /* Adjust the max width as needed */
            padding: 20px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Add some gap between cards */
            justify-content: center;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 270px;
            /* Set the desired width for each card */
            padding: 20px;
        }

        .avatar {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
            height: 100px;
            border-radius: 5px;
            overflow: hidden;
            margin: 0 auto 20px;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;

        }

        .name {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }

        .email,
        .mobile {
            margin: 5px 0;
            font-size: 16px;
            text-align: center;
        }
    </style>

    <div class="content-body">
        <div class="container-fluid">

            @if (Auth::user()->type == 'Admin')
                <div class="card-container">
                    @foreach ($Details as $index => $obj)
                    @if ($obj->is_active == 0)
                        <div class="card">
                            <div class="avatar">
                                @if (!file_exists($obj->image))
                                    <img class="rounded-full" src="{{ url('assets\images\user\no img.png') }}" alt="">
                                @else
                                    <img class="rounded-full" src="{{ url($obj->image) }}" alt="">
                                @endif
                            </div>
                            <h3 class="name">{{ $obj->name }}</h3>
                            <p class="email">{{ $obj->email }}</p>
                            <p class="mobile">{{ $obj->mobile }}</p>

                            <p class="card-text" style="color: red">Resigned/Left</p>
                        </div>
                        @endif
                    @endforeach
                  
            @else(Auth::user()->type == 'Manager')
                <div class="card-container">
                    @foreach ($Details as $index => $obj)
                    @if ($obj->is_active == 1)
                        <div class="card">
                            <div class="avatar">
                                @if (!file_exists($obj->image))
                                    <img class="rounded-full" src="{{ url('assets\images\user\no img.png') }}" alt="">
                                @else
                                    <img class="rounded-full" src="{{ url($obj->image) }}" alt="">
                                @endif
                            </div>
                            <h3 class="name">{{ $obj->name }}</h3>
                            <p class="email">{{ $obj->email }}</p>
                            <p class="mobile">{{ $obj->mobile }}</p>

                            <p class="card-text" style="color: red">Resigned/Left</p>

                        </div>
                     @endif
                    @endforeach

                </div>
            @endif


        </div>
    </div>
@endsection
