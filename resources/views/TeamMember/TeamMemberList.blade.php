@extends('Master.Master')
@section('content')
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
    @php
        $user = Auth::user();
    @endphp
    <div class="content-body">
        <div class="container-fluid">


            <div class="content-body">
                <div class="container-fluid">
                    <div class="profile-card">
                        <div class="img">
                            <img src="{{  }}">
                        </div>
                        <div class="caption">
                            <h3>Tom Cruise</h3>
                            <p>Full Stact Developer</p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

@endsection


