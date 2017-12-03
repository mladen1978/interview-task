@extends('layouts.master')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.min.css') }}" >



    <div class="content" style="margin-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">

                    @if(Session::has('success'))
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-12">
                                <div class="alert alert-success fade in">
                                    <i class="icon-remove close" data-dismiss="alert"></i>
                                    <strong>Success! </strong>  {{Session::get('success')}}
                                </div>
                            </div>
                        </div>
                    @endif


                    <h2>Add new scholl</h2>

                    <hr>
                        @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li style="list-style:none;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif


                    {!! Form::open( ['url' => 'schools']) !!}

                    <div class="form-group">
                        {!! Form::label('name','School name:') !!}
                        {!! Form::text('name','', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('year_founded','Year founded:') !!}
                        {!! Form::text('year_founded',null, ['class' => 'form-control datepicker', 'autocomplete' => 'off']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('city','City:') !!}
                        {!! Form::text('city','', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                       {!! Form::submit('Save',['class' => 'btn btn-primary pull-right'] ) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
                <div class="col-sm-7">
                    <h2>All schools</h2>
                    <hr>
                    <table class="table table-stripped table-hover">
                        <thed>
                            <tr>
                                <th>Name</th>
                                <th>Founded</th>
                                <th>City</th>
                                <th>Edit</th>

                            </tr>
                        </thed>
                        <tbody>
                        @foreach( $allSchools as $school )
                            <tr>
                                <td>{{ $school->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($school->year_founded)->format('Y')}}</td>
                                <td>{{ $school->city }}</td>
                                <td><a class="btn btn-success" href="{{ route('school_edit', $school->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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