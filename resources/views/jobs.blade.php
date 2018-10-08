@extends('tonysong::layouts.master')
@section('title')Jobs @endsection
@section('content')
    <script>
        var page = 'jobs';
    </script>
    <div class="content">
        <div class="container">
            <div class="row">
                @include('tonysong::partials.sidemenu')
                <div class="col-12 col-lg-9 card">

                    <h1 class='page-title'>Jobs</h1>

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
                        @if($jobs->total()==0)
                            <div class="card__list__no-record">
                                <div class="text-center text-jumbo">
                                    <i class="fa fa-meh-o" aria-hidden="true"></i>
                                </div>
                                <div class='text-center'><em>No record found</em></div>
                            </div>
                        @endif

                        @if($jobs->total()>0)

                            <div class="row card__list__action">


                                <div class="col-6">
                                    <p>Total: {{$jobs->total()}}</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="#" class="btn btn-checkall"><i class="fa fa-check-square-o"
                                                                            aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-uncheckall"><i class="fa fa-square-o"
                                                                              aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger btn-delete-selected"><i class="fa fa-trash"
                                                                                              aria-hidden="true"></i></a>
                                    <a href="{{route('dashq::deleteAllJobs')}}" class="btn btn-danger btn-delete-all"><i
                                            class="fa fa-trash" aria-hidden="true"></i> All</a>
                                </div>
                            </div>
                            @foreach($jobs as $job)
                                <div class="row card__list__item card__list__item--collapsed" data-id="{{$job->id}}">
                                    <div class="col-12">
                                        <div class="row card__list__item__header">
                                            <div class="col-7 card__list__item__header__title">
                                                <span><input class='card__list__item__checkbox' type="checkbox"></span>
                                                <span>{{$job->id}}{{ '@' . $job->queue}}</span>
                                                <div class="thin">{{date("Y-m-d H:i:s", $job->created_at)}}</div>
                                                <div class="thin">Attempt(s): {{$job->queue}}</div>
                                            </div>
                                            <div class="col-5 card__list__item__header__action text-right">
                                                <a href="{{route('dashq::deleteJob', ['id' => $job->id])}}"
                                                   class="btn btn-danger card__list__item__header__action__delete"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></a>
                                                <a href="#" class="btn btn-expand"><i class="fa fa-expand"
                                                                                      aria-hidden="true"></i></a>
                                                <a href="#" class="btn btn-compress"><i class="fa fa-compress"
                                                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 card__list__item__content">
                                        <p>Payload :</p>
                                        <textarea name="" id="" cols="30" rows="10">{{$job->payload}}</textarea>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @if(isset($_GET['keyword']))
                {{$jobs->appends(['keyword' => $_GET['keyword']])->links()}}
            @else
                {{$jobs->links()}}
            @endif
        </div>
    </div>
@endsection
