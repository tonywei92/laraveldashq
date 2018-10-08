@extends('tonysong::layouts.master')
@section('title')Home @endsection
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class='page-title'>Home</h1>
                </div>
                @include('tonysong::partials.sidemenu')
                <div class="col-12 col-lg-9">
                    <div class="card">
                        <div class="row">
                            <div class="col-6 col-lg-4 col-xl-3 card__item">
                                <div class="card__item__content">
                                    <div class="card__item__content__title">
                                        Jobs
                                    </div>
                                    <div class="card__item__content__body">
                                        {{$jobCount}}
                                    </div>
                                </div>
                                <div class="card__item__action">
                                    <a href='{{route('dashq::jobs')}}' class="card__action__action btn">
                                        Show
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 col-xl-3 card__item">
                                <div class="card__item__content">
                                    <div class="card__item__content__title">
                                        Failed Jobs
                                    </div>
                                    <div class="card__item__content__body
                                    @if($failedJobCount>0)
                                        color-red
                                        @endif
                                        ">
                                        {{$failedJobCount}}
                                    </div>
                                </div>
                                <div class="card__item__action">
                                    <a href='{{route('dashq::failedjobs')}}' class="card__action__action btn">
                                        Show
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
