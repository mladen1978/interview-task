@extends('layouts.master')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.min.css') }}" >



    <div class="content" style="margin-top:60px;">
        <div class="container">

                <div class="row">
                    <div class="col-sm-12">
                        <h1>Edit {{ $teacher->first_name }} {{ $teacher->last_name }}</h1>

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

                        {!! Form::open( ['action' => ['TeacherController@update', $teacher->id ]]) !!}

                        <div class="form-group">
                            {!! Form::label('first_name','Teacher first name:') !!}
                            {!! Form::text('first_name',$teacher->first_name, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('last_name','Teacher last name:') !!}
                            {!! Form::text('last_name',$teacher->last_name, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('birth_date','Birth date:') !!}
                            {!! Form::text('birth_date',$teacher->birth_date, ['class' => 'form-control datepicker', 'autocomplete' => 'off']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('school_id','Teacher school:') !!}
                            {!! Form::select('school_id', $allSchools, $teacher->school_id, ['class' => 'form-control'])   !!}
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
            format: "yyyy-mm-dd",
            autoclose: true,
            orientation: 'right bottom'
        });
    </script>



@endsection