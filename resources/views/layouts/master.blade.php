<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | DashQ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/tonysong/dashq/app.css">
    <script>
        var deleteFailedJobsUrl = "{{route('dashq::deleteFailedJobs')}}";
        var deleteJobsUrl = "{{route('dashq::deleteJobs')}}";
        var retryFailedJobsUrl = "{{route('dashq::retryFailedJobs')}}";
    </script>
</head>
<body>
<nav class='head nav'>
    <div class="container">
        <div class="row">
            <div class="col-3 d-block d-lg-none">
                <a href="#" class="btn btn-icon m-menu btn-toggle-menu">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>
            </div>
            <div class="col col-lg-9 nav__logo-container">
                <a href="#">
                    @include('tonysong::partials.logo')
                </a>
            </div>
            <div class="col-3 text-right">
                <a href="#" class='btn btn-icon toggle-about-modal'><i class="fa fa-question-circle"
                                                                       aria-hidden="true"></i></a>
            </div>
        </div>

    </div>
</nav>
@include('tonysong::partials.sidedrawer')

@yield('content')

<div class="modal" id="about-modal">
    <div class="modal__title">
        About LaravelDashQ
        <a href="#" class="modal__close modal__close__btn">
            &times;
        </a>
    </div>
    <div class="modal__body">
        <p>
            Made by Tony Song (<a href="mailto:tonywei92@gmail.com">tonywei92@gmail.com</a>)
        </p>
        <p>Checkout this project <a href="https://github.com/tonywei92/laraveldashq">GitHub</a> page</p>
    </div>
    <div class="modal__action">
        <a href="#" class="btn modal__close">Close</a>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="/tonysong/dashq/app.js"></script>
</html>
