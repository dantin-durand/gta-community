@extends('layouts.app')

@section('content')
<style>
    .banner {
        background-image: linear-gradient(29deg, #c9000fd9 42%, #ffffff54 100%), url(/img/bg-home.jpeg);
        clip-path: polygon(0 0, 100% 0, 100% 86%, 0 100%);
        background-position: center;
        background-size: cover;
        height: 80vh;
        width: 100%;
        margin-top: -1.5rem;
        z-index: -1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 0px 5%;
    }

    .banner h1 {
        font-weight: 600;
        color: #fff;
        font-size: 50px;
        font-family: "Montserrat", sans-serif !important;
    }

    .banner h1>b {
        background-color: #fff;
        color: #c9000f;
        padding: 0px 10px;
    }

    .banner p {
        font-weight: 300;
        color: #fff;
        font-size: 16px;
        font-family: "Montserrat", sans-serif !important;
    }

    .spacer-line {
        height: 3px;
        width: 50px;
        background-color: #000;
        margin: 20px 0;
    }

    .banner .spacer-line {
        background-color: #fff;
    }

    .about {
        min-height: 80vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .about h1 {
        color: #c9000f;
        font-weight: 700;
        margin-bottom: 40px;
    }

    .statistic {
        background-color: #c9000f;
        clip-path: polygon(0 7%, 100% 0%, 100% 100%, 0 91%);
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 80vh;
    }

    .statistic h2 {
        color: #fff;
        font-size: 50px;
        font-weight: 800;
    }

    .statistic p {
        color: #fff;
        font-weight: 400;
        font-size: 20px;
    }

    .cta_register {
        height: 80vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .cta_register h2 {
        color: transparent;
        font-weight: 700;
        font-size: 40px;
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: #c9000f;
        margin-bottom: 40px;
    }

    .cta_register a {
        background-color: #c9000f;
        color: #fff;
    }
</style>
<header class="banner">
    <h1>Bienvenue sur <br /><b>GTA Community</b></h1>
    <div class="spacer-line"></div>
    <p>Découvrez de nouveaux joueurs</p>
</header>
<main class="">
    <section class="about container">
        <div class="col-12 col-md-6">

            <h1>Comment ça marche ?</h1>
            <p><b>Inscrivez-vous</b> facilement et commencez à <b>discuter !</b><br /><b>Rencontrez</b> de nouveaux joueurs et <b>partagez</b> votre passion autour de la <b>licence GTA.</b></p>
        </div>
    </section>
    <section class=" statistic">
        <div class="container row">
            <div class="col-12 col-md-4">
                <h2 class="text-center">{{ strval($userCount) }}</h2>
                <p class="text-center">Membres</p>
            </div>
            <div class="col-12 col-md-4">
                <h2 class="text-center">{{ strval($postCount) }}</h2>
                <p class="text-center">Postes</p>
            </div>
            <div class="col-12 col-md-4">
                <h2 class="text-center">{{ strval($likeCount) }}</h2>
                <p class="text-center">Interractions</p>
            </div>
        </div>
    </section>
    <section class="cta_register">
        <h2>A vous de jouer !</h2>
        <a class="btn btn-lg rounded-pill bg-default-theme" href="{{ route('register') }}">{{ __('Register') }}</a>
    </section>
</main>
@endsection