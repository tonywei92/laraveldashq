@extends('tonysong::layouts.master')
@section('content')
    <script>
        var page = 'failedjobs';
    </script>
    <div class="form">
        @csrf
        <input type="text">
    </div>
    <div class="content">
        <div class="container">
            <div class="row">

                @include('tonysong::partials.sidemenu')
                <div class="col-12 col-lg-9 card">

                    <h1 class='page-title'>Failed Jobs</h1>

                    <div class="card__list">
                        @if(session()->has('success'))
                            @foreach(session()->get('success') as $message)
                                <div class="well well--success">
                                    <a href="#" class="well__delete">&times;</a>
                                    {!! $message !!}
                                </div>
                            @endforeach
                        @endif
                        @if(session()->has('error'))
                            @foreach(session()->get('error') as $message)
                                <div class="well well--danger">
                                    <a href="#" class="well__delete">&times;</a>
                                    {!! $message !!}
                                </div>
                            @endforeach
                        @endif
                            <form>
                                <label for="search">Search</label>
                                <input type="text" id="search" name="keyword" placeholder="Keyword"
                                       value="{{isset($_GET['keyword']) ? $_GET['keyword'] : ''}}">
                                <input type="submit" value="go">
                            </form>
                        @if($failedJobs->total()==0)
                            <div class="card__list__no-record">
                                <div class="text-center text-jumbo">
                                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                                </div>
                                <div class='text-center'><em>No record found</em></div>
                            </div>
                        @endif

                        @if($failedJobs->total()>0)

                            <div class="row card__list__action">


                                <div class="col-6">
                                    <p>Total: {{$failedJobs->total()}}</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="#" class="btn btn-checkall"><i class="fa fa-check-square-o"
                                                                            aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-uncheckall"><i class="fa fa-square-o"
                                                                              aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger btn-delete-selected"><i class="fa fa-trash"
                                                                                              aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-success btn-retry-selected"><i class="fa fa-repeat"
                                                                                              aria-hidden="true"></i></a>
                                    <a href="{{route('dashq::deleteAllFailedJobs')}}"
                                       class="btn btn-danger btn-delete-all"><i class="fa fa-trash"
                                                                                aria-hidden="true"></i> All</a>
                                    <a href="{{route('dashq::retryAllFailedJobs')}}"
                                       class="btn btn-success btn-retry-all"><i class="fa fa-repeat"
                                                                                aria-hidden="true"></i> All</a>
                                </div>
                            </div>
                            @foreach($failedJobs as $failedJob)
                                <div class="row card__list__item card__list__item--collapsed"
                                     data-id="{{$failedJob->id}}">
                                    <div class="col-12">
                                        <div class="row card__list__item__header">
                                            <div class="col-12 col-sm-7 card__list__item__header__title">
                                                <span><input class='card__list__item__checkbox' type="checkbox"></span>
                                                <span>{{$failedJob->id}}{{ '@'. $failedJob->queue }}</span>
                                                <div class="thin">{{$failedJob->failed_at}}</div>
                                            </div>
                                            <div class="col-12 col-sm-5 card__list__item__header__action text-right">
                                                <a href="{{route('dashq::deleteFailedJob', ['id' => $failedJob->id])}}"
                                                   class="btn btn-danger card__list__item__header__action__delete"><i
                                                        class="fa fa-trash " aria-hidden="true"></i></a>
                                                <a href="{{route('dashq::retryFailedJob', ['id'=> $failedJob->id])}}"
                                                   class="btn btn-success card__list__item__header__action__retry"><i
                                                        class="fa fa-repeat" aria-hidden="true"></i></a>
                                                <a href="{{route('dashq::deleteFailedJob', ['id' => $failedJob->id])}}" class="btn btn-expand"><i class="fa fa-expand"
                                                                                      aria-hidden="true"></i></a>
                                                <a href="#" class="btn btn-compress"><i class="fa fa-compress"
                                                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 card__list__item__content">
                                        <p>Payload :</p>
                                        <textarea name="" id="" cols="30" rows="10">{{$failedJob->payload}}</textarea>
                                        <p>Exception:</p>
                                        <textarea name="" id="" cols="30" rows="10">{{$failedJob->exception}}</textarea>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @if(isset($_GET['keyword']))
                {{$failedJobs->appends(['keyword' => $_GET['keyword']])->links()}}
            @else
                {{$failedJobs->links()}}
            @endif
        </div>


    </div>

@endsection
