<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreateSchoolRequest;
use App\School;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;


class SchoolController extends Controller
{
    /*
     * Show all schools and create one
     */
    public function create() {
        $allSchools = School::all();
        return view('schools', compact('allSchools'));
    }


    /*
     * Save a new school
     * @param CreateSchoolRequest $request
     * @return Response
     */
    public function store(CreateSchoolRequest $request) {
        //$input = Request::all();
        $data = [];
        $data['name'] = $request->get('name');
        $data['year_founded'] = Carbon::parse($request->get('year_founded'))->format('Y-m-d');
        $data['city'] = $request->get('city');

        School::create($data);

        $success = "School is added.";
        return redirect('schools')->with('success', $success);
    }

    /*
     * Show edit form
     * @param $id
     * @return Response
     *
     */
    public function edit($id) {

        $school = School::findOrFail($id);
        return view('school', compact('school'));

    }


    /*
     * update school
     * @param CreateSchoolRequest $request
     * @param $id
     * @return Response
     */
    public function update($id, CreateSchoolRequest $request) {

        $school = School::findOrFail($id);

        $data = [];
        $data['name'] = $request->get('name');
        $data['year_founded'] = Carbon::parse($request->get('year_founded'))->format('Y-m-d');
        $data['city'] = $request->get('city');

        $school->update($data);

        $success = "School ". $data['name'] ." is updated.";

        return redirect('schools')->with('success', $success);

    }
}
