@extends('layouts.master')

@section('content')


    <div class="content" style="margin-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">


                    <div class="col-sm-12">
                        <h2>All teachers <a href="{{ "/create" }}" class="btn btn-primary pull-right">Add new teacher</a> </h2>
                        <hr>
                        <table class="table table-stripped table-hover">
                            <thed>
                                <tr>
                                    <th>Full name</th>
                                    <th>School</th>
                                    <th>Birth date</th>
                                    <th>Edit</th>

                                </tr>
                            </thed>
                            <tbody>
                            @foreach( $allTeachers as $teacher )

                                <tr>
                                    <td>{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                                    <td>{{ $teacher->school->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($teacher->birth_date)->format('Y-m-d')}}</td>
                                    <td><a class="btn btn-success" href="{{ route('teacher_edit', $teacher->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>

@endsection