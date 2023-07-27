@extends('Master.Master')
@section('content')
<style>
    /* Other styles... */

    .profile-card {
        /* Set the desired width for each card */
        width: 220px;
        /* Add some space between the cards using margin */
        margin: 1rem;
    }

    /* Other styles... */
</style>

<style>
    /* Other styles... */

    .container-fluid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center; /* To center the cards horizontally */
    }

    /* Other styles... */
</style>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }

    .main {
        /* Your main styles... */
    }

    .profile-card {
        /* Your card styles... */
        width: 220px;
        margin: 1rem;
    }

    /* Other styles... */

    .container-fluid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
</style>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Exo;
    }

    .main {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #0c5db9;
    }

    .profile-card {
        position: relative;
        font-family: sans-serif;
        width: 220px;
        height: 240px;
        background: #fff;
        padding: 30px;
        border-radius: 5%;
        box-shadow: 0 0 22px #3336;
        transition: .6s;
        margin: 5rem;

    }

    .profile-card:hover {
        border-radius: 10px;

    }

    .profile-card .img {
        position: relative;
        width: 100%;
        height: 100%;
        transition: .6s;
        z-index: 99;
    }

    .img img {
        width: 100%;
        border-radius: 5%;
        position: relative;
        bottom: 55px;
        box-shadow: 0 0 22px #3336;

    }
   .caption {
        text-align: center;
    position: relative;
    top: 28px;
        transform: translateY(-80px);
    }

    .profile-card:hover .caption {
        opacity: 1;
    }

    .caption h3 {
        font-size: 21px;
        font-family: sans-serif;
    }

    .caption p {
        font-size: 15px;
        color: #0c52a1;
        font-family: sans-serif;
        margin: 2px 0 9px 0;
    }


    .caption .social-links a {
        color: #333;
        margin-right: 15px;
        font-size: 21px;
        transition: .6s;
    }

    .social-links a:hover {
        color: #0c52a1;
    }
</style>
<style>
    /* Other styles... */

    .profile-card .img {
        position: relative;
        width: 100%;
        height: 100%;
        max-width: 150px; /* Set the maximum width for the image */
        max-height: 150px; /* Set the maximum height for the image */
        transition: .6s;
        z-index: 99;

    }

    .img img {
        width: 100%;
        height: 100%;
        border-radius: 5%;
        position: relative;
        bottom: 55px;
        box-shadow: 0 0 22px #3336;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }

    /* Other styles... */
</style>
<div class="content-body">
    <div class="container-fluid">

        <div class="col-xl-4 col-lg-12 col-sm-12">
            <div class="card overflow-hidden" style="height: 85%">
                <div class="text-center p-5 overlay-box" style="background-image: url(images/big/img5.jpg);">
                    <img src="https://image.shutterstock.com/image-photo/head-shot-portrait-close-smiling-260nw-1714666150.jpg" width="100" class="img-fluid " alt="" style="border-radius: 25px;
                    width: 300px;
                    height: 200px;
                    margin-top: -30px
                px
                ;">
                    <h3 class="mt-3 mb-0 text-white">Deangelo Sena</h3>
                </div>
            </div>
        </div>

        @foreach ($Details as $index => $obj)
        <div class="profile-card">
            <div class="img">
                @if (!file_exists($obj->image))
                                                    <img class="person-img"
                                                        src="{{ url('assets\images\user\no img.png') }}" alt="">
                                                @else
                                                    <img class="person-img" src="{{ url($obj->image) }}" alt="">
                                                @endif
            </div>
            <div class="caption">
                <h3>{{ $obj->name }}</h3>
                <p>{{ $obj->email }}</p>

            </div>
        </div>
        @endforeach
        <div>{{ $Details->links() }}
        </div>
    </div>
</div>

@endsection


