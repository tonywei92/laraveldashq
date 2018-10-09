@extends('tonysong::layouts.master')
@section('title')Error @endsection
@section('content')
    <div class="content">
    <div class="container">
        <div class="row card">
            <div class="col-12">
                <p>Failed to initialize Queue Information, see diagnostics below:</p>
                <table>
                    <thead>
                        <tr>
                            <td>Key</td>
                            <td>Value</td>
                            <td>Required Value</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Queue driver</td>
                            <td>{!! $queueDriver == 'database' ? '<span class="green">database</span>' : '<span class="red">' . $queueDriver . '</span>'!!}</td>
                            <td>database</td>
                        </tr>
                    <tr>
                        <td>Has 'jobs' table</td>
                        <td>{!! $hasJobsTable ? '<span class="green">Yes</span>' : '<span class="red">No</div>'!!}</td>
                        <td>YES</td>
                    </tr>
                    <tr>
                        <td>Has 'failed_jobs' table</td>
                        <td>{!! $hasFailedJobsTable ? '<span class="green">Yes</span>' : '<span class="red">No</div>' !!}</td>
                        <td>YES</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <style>
        .card{
            line-height: 1.6rem;
        }
        table, th,td{
            border: 1px solid #eee;

        }
        table td{
            padding: 10px;
        }
        .red{
            color: red;
            text-transform: uppercase;
        }
        .green{
            color: green;
            text-transform: uppercase;
        }
    </style>
@endsection
