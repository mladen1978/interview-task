@extends('layouts.master')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.min.css') }}" >


    <div class="content" style="margin-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Edit school {{ $school->name }}</h1>

                    <hr>
                </div>
                <div class="col-sm-5">
                    @if($errors->any())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li style="list-style:none;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif


                    {!! Form::open( ['action' => ['SchoolController@update', $school->id ]]) !!}

                    <div class="form-group">
                        {!! Form::label('name','School name:') !!}
                        {!! Form::text('name',$school->name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('year_founded','Year founded:') !!}
                        {!! Form::text('year_founded',\Carbon\Carbon::parse($school->year_founded)->format('Y'), ['class' => 'form-control datepicker', 'autocomplete' => 'off']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('city','City:') !!}
                        {!! Form::text('city',$school->city, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Update',['class' => 'btn btn-primary pull-right'] ) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script>


        $('.datepicker').datepicker({
            format: "yyyy", // Notice the Extra space at the beginning
            viewMode: "years",
            minViewMode: "years",
            autoclose: true,
            orientation: 'right bottom'

        });

    </script>
@endsection