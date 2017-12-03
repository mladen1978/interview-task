<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSearchRequest;
use App\Http\Requests\CreateTeacherRequest;
use App\School;
use App\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /*
     * show all teachers
     * @return Response
    */
    public function index() {
        $allTeachers = Teacher::paginate(5);
        return view('teachers', compact('allTeachers'));
    }

    /*
     * show create form
     * @return Response
    */
    public function create() {
        $allSchools = School::pluck('name', 'id');
        return view('teacher_create', compact('allSchools'));
    }

    /*
     * create teacher
     * @param CreateTeacherRequest $request
     * @return Response
    */
    public function store(CreateTeacherRequest $request) {
            $input = $request->all();
        $data = [];
        $data['first_name'] = $request->get('first_name');
        $data['last_name'] = $request->get('last_name');
        $data['birth_date'] = Carbon::parse($request->get('birth_date'))->format('Y-m-d');
        $data['school_id'] = $request->get('school_id');

        Teacher::create($data);

        $success = "Teacher is added.";
        return redirect('/')->with('success', $success);
    }

    /*
     * edit teacher
     * @param $id
     * @return Response
    */
    public function edit($id) {
        $allSchools = School::pluck('name', 'id');
        $teacher = Teacher::findOrFail($id);
        return view('teacher', compact('teacher','allSchools'));
    }

    /*
     * update teacher
     * @param CreateTeacherRequest $request
     * @param $id
     * @return Response
    */
    public function update($id, CreateTeacherRequest $request) {

        $teacher = Teacher::findOrFail($id);

        $data = [];
        $data['first_name'] = $request->get('first_name');
        $data['last_name'] = $request->get('last_name');
        $data['birth_date'] = Carbon::parse($request->get('birth_date'))->format('Y-m-d');
        $data['school_id'] = $request->get('school_id');

        $teacher->update($data);

        $success = "Teacher ". $data['first_name'] . " " .  $data['last_name']." is updated.";

        return redirect('/')->with('success', $success);

    }


    /*
     * show search results
     * @param CreateSearchRequest $request
     * @return Response
    */
    public function search(CreateSearchRequest $request) {

        $term = $request->get('term');
        if (strpos($term, ' ') !== false) {
            $terms = explode(' ', $term);
            $allTeachers = Teacher::where('first_name', 'LIKE', "$terms[0]%")->where('last_name', 'LIKE', "$terms[1]%")->get();
        } else {
            $allTeachers = Teacher::where('first_name', 'LIKE', "$term%")->get();
        }

        return view('search', compact('allTeachers'));
    }


    /*
     * delete teacher
     * @param $id
     * @return Response
    */
    public function delete($id) {
        $teacher = Teacher::find($id);
        $teacher->delete();
        $success = "Teacher is deleted.";
        return redirect('/')->with('success', $success);
    }



}
