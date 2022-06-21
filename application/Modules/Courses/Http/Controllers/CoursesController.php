<?php

namespace Modules\Courses\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Courses\Entities\Campus;
use Modules\Courses\Entities\Intake;
use Modules\Courses\Entities\School;
use Modules\Courses\Entities\Classes;
use Modules\Courses\Entities\Attendance;
use Modules\Courses\Entities\Department;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Validator;
use Modules\Courses\Entities\AvailableCourse;
use Modules\Courses\Entities\Courses;

class CoursesController extends Controller
{

    public function index()
    {
        return view('courses::index');
    }
    public function approveIndex(){
        return view('courses::approval.approveIndex');
    }

    /**
     * Show the form for a new Intake Information.
     *
     */
    public function addIntake()
    {
        $data      =  Intake::all();
        $courses   = Course::all();
        return view('courses::intake.addIntake')->with(['data'=>$data,'courses'=>$courses]);


    }

    public function editstatusIntake($id)
    {
        $data    =   Intake::find($id);
        return view('courses::intake.editstatusIntake')->with('data' , $data);
    }

    public function statusIntake(Request $request, $id){
        // $status      =  Intake::all();
        // return view('courses::intake.status')->with('status',$status);
        // return $status;
        //$data                =   Intake::find($id);
        // return $data;
        $data  = Intake::find($id);
        //return $data;
        $data->status =  $request->input('status');
        $data->update();
        //return view('courses::intake.editstatusIntake');
        return redirect()->route('courses.showIntake')->with('status','Data Updated Successfully');
        }

        public function viewCourse($id){

            $course  =  AvailableCourse::where('id', $id)->select('course_id')->get();


            foreach($course as $data){

                $courses[] =  Course::where('id',$data->course_id)->get();

            }

            return view('courses::intake.viewCourse')->with('courses',$courses);
        }

    public function viewIntake($id){

        $course  =  AvailableCourse::where('intake_id', $id)
                    ->select('course_id')
                    ->get();

        // return $course->course_id;

            foreach($course as $item){

            $courses[] = Course::where('id', $item->course_id)->get();

            }
        return view('courses::intake.viewIntake')->with('courses', $courses);



    }

    public function autocomplete(Request $request){
        $datas = Intake::select("intake_from")->where("intake_from","LIKE","%{$request->terms}%")->get();
        return response()->json($datas);
    }


    public function search(){
        return redirect()->route('courses.showIntake');
    }

    public function storeIntake(Request $request)
    {

        $vz = $request->validate([
            'course'                =>  'required',
            'intake_name_from'      =>   'required',
            'intake_name_to'        =>   'required'

        ]);

        $intake = new Intake;
        $intake->intake_from   =    $request->input('intake_name_from');
        $intake->intake_to     =    $request->input('intake_name_to');
        $intake->status = 0;
        $intake->save();

        foreach($request->input('course') as $course_id){
            $intakes = new AvailableCourse;
            $intakes->course_id = $course_id;
            $intakes->intake_id  =  $intake->id;
            $intakes->save();
        }

        return redirect()->route('courses.showIntake')->with('success','Intake Created successfuly');
    }

    public function showIntake()
    {
        $data = Intake::latest()->paginate(5);
        return view('courses::intake.showIntake')->with('data',$data);
    }


    public function editIntake($id)
    {
        $courses   = Course::all();
        $course[]   = AvailableCourse::find($id);
        foreach($course as $id){

            return $id;
        }
        $data    =   Intake::find($id);
        return $course;
        return view('courses::intake.editIntake')->with(['data'=>$data,'courses'=>$courses,'course'=>$course]);
        $courses =  Course::all();
        $data    =   Intake::find($id);
        return view('courses::intake.editIntake')->with(['data'=>$data,'courses'=>$courses]);
    }


    public function updateIntake(Request $request, $id)
    {
        $data                =   Intake::find($id);
        $data->intake_from   =    $request->input('intake_name_from');
        $data->intake_to     =    $request->input('intake_name_to');
        $data->save();

        foreach($request->input('course') as $course_id){
            $intakes = AvailableCourse::find($course_id)->id;
            $intakes->course_id = $course_id;
            $intakes->intake_id  =  $data->id;
            $intakes->save();
        }
            $data->update();
        $data->intake_to     =    $request->input('intake_name_to');
        $data->update();
        return redirect()->route('courses.showIntake')->with('status','Data Updated Successfully');

    }


    public function destroyIntake($id)
    {
        $data  = Intake::find($id);
        $data->delete();
        return redirect()->route('courses.showIntake');
    }

    /**
     *
     * Information about School
    */
    public function addAttendance(){

        return view('courses::attendance.addAttendance');
    }
    public function showAttendance(){

        $data    =   Attendance::latest()->paginate(5);
        return view('courses::attendance.showAttendance')->with('data',$data);

    }

    public function editAttendance($id){
        $data     =   Attendance::find($id);
        return view('courses::attendance.editAttendance')->with('data',$data);
    }

    public function updateAttendance(Request $request, $id){
        //return $request->input('attendance_name');
        $data                   =   Attendance::find($id);

        $data->attendance_code  =     $request->input('attendance_code');
        $data->attendance_name  =     $request->input('attendance_name');
        $data->save();
        $data->update();
        return redirect()->route('courses.showAttendance')->with('status','Data Updated Successfully');

    }
    public function storeAttendance(Request $request){
        $vz                       =    $request->validate([
            'attendance_name'     =>  'required',
            'attendance_code'     =>   'required'
        ]);

        $attendances                   =     new Attendance;

        $attendances->attendance_code  =     $request->input('attendance_code');
        $attendances->attendance_name  =     $request->input('attendance_name');
        $attendances->save();

        return redirect()->route('courses.showAttendance')->with('success','Attendance Created');
    }
    public function destroyAttendance($id){
        $data    =    Attendance::find($id);
        $data->delete();
        return redirect()->route('courses.showAttendance');

    }

    /**
     *
     * Information about School
    */
    public function  addschool(){
        return view('courses::school.addSchool');
    }

    public function  showSchool(){

        $data    =   School::latest()->paginate(5);
        return view('courses::school.showSchool')->with('data',$data);

    }

    public function editSchool($id){
        $data    =   School::find($id);
        return view('courses::school.editSchool')->with('data',$data);
    }

    public function updateSchool(Request $request, $id){
        $data           =   School::find($id);
        $data->name     =   $request->input('name');
        $data->initials     =   $request->input('initials');
        $data->update();
        return redirect()->route('courses.showSchool')->with('status','Data Updated Successfully');

    }

    public function storeSchool(Request $request){
        $vz               = $request->validate([
            'name'        =>  'required'
        ]);

        $schools          =     new School;
        $schools->name    =     $request->input('name');
        $schools->initials     =   $request->input('initials');
        $schools->save();

        return redirect()->route('courses.showSchool')->with('success','School Created');
    }
    public function destroySchool($id){
        $data  =   School::find($id);
        $data->delete();
        return redirect()->route('courses.showSchool');

    }


    /**
     *
     * Information about departments
     */
    public function addDepartment(){
        $schools    =      School::all();
        return view('courses::department.addDepartment')->with('schools',$schools);
    }

    public function showDepartment()
    {
        $data      =       Department::latest()->paginate(5);
        return view('courses::department.showDepartment')->with('data',$data);
    }

    public function storeDepartment(Request $request){
        $vz                       =    $request->validate([
            'name'                =>  'required',
            'school'              =>   'required'
        ]);

        $departments             =       new Department;
        $departments->name       =       $request->input('name');
        $departments->school_id  =       $request->input('school');
        $departments->save();

        return redirect()->route('courses.showDepartment')->with('success','Department Created');
    }

    public function editDepartment($id){
        $data       =   Department::find($id);
        $schools    =   School::all();
        return view('courses::department.editDepartment')->with(['data'=>$data, 'schools'=>$schools]);
    }

    public function updateDepartment(Request $request, $id){
        $data             =       Department::find($id);
        $data->name       =       $request->input('name');
        $data->school_id  =       $request->input('school');
         $data->update();
        return redirect()->route('courses.showDepartment')->with('status','Data Updated Successfully');
    }
     public function destroyDepartment($id){
        $data  = Department::find($id);
        $data->delete();
        return redirect()->route('courses.showDepartment');

    }

     /**
     *
     * Information about Course
    */
    public function addCourse(){
        $campuses      =  Campus::all();
        $schools       =  School::all();
        $departments   =  Department::all();

         return view('courses::course.addCourse')->with([
             'schools'     =>    $schools,
             'departments' =>    $departments,
             'campuses'    =>    $campuses
         ]);
    }

    public function storeCourse(Request $request){
      $vz = $request->validate([
          'school'                    =>  'required',
          'department'                =>  'required',
          'course_name'               =>  'required|unique:courses',
          'course_code'               =>  'required|unique:courses',
          'level'                     =>  'required',
          'course_duration'           =>  'required',
          'course_requirements'       =>  'required',
          'subject1'                  =>  'required',
          'subject2'                  =>  'required',
          'subject3'                  =>  'required',
          'subject4'                  =>  'required'
      ]);

        $courses                      =    new Course;
        $courses->school_id           =    $request->input('school');
        $courses->department_id       =    $request->input('department');
        $courses->course_name         =    $request->input('course_name');
        $courses->course_code         =    $request->input('course_code');
        $courses->level               =    $request->input('level');
        if($request->level == 1){
            $courses->fee  = '500';
        }
        if($request->level == 2){
            $courses->fee  = '500';
        }
        if($request->level == 3){
            $courses->fee  = '1000';
        }
        if($request->level >= 4){
            $courses->fee  = '1500';
        }
        $courses->course_duration     =    $request->input('course_duration');
        $courses->course_requirements =    $request->input('course_requirements');
        $courses->subject1            =    $request->input('subject1');
        $courses->subject2            =    $request->input('subject2');
        $courses->subject3            =    $request->input('subject3');
        $courses->subject4            =    $request->input('subject4');
        $courses->save();

        return redirect()->route('courses.showCourse')->with('success','Course Created');
    }

    public function showCourse()
    {
        $data = Course::latest()->paginate(5);
        return view('courses::course.showCourse')->with('data',$data);
    }


    public function editCourse($id){
        $schools       =  School::all();
        $departments   =  Department::all();
        $courses       =  Courses::all();
        $data    =   Course::find($id);
        return view('courses::course.editCourse')->with([
            'data'          =>    $data,
            'schools'       =>    $schools,
            'departments'   =>    $departments

        ]);
    }

    public function updateCourse(Request $request, $id){

        $data                      =    Course::find($id);
        $data->course_name         =    $request->input('course_name');
        $data->school_id           =    $request->input('school');
        $data->department_id       =    $request->input('department');
        $data->level               =    $request->input('level');
        $data->course_code         =    $request->input('course_code');
        $data->course_duration     =    $request->input('course_duration');
        $data->course_requirements =    $request->input('course_requirements');
        $data->subject1            =    $request->input('subject1');
        $data->subject2            =    $request->input('subject2');
        $data->subject3            =    $request->input('subject3');
        $data->subject4            =    $request->input('subject4');
        $data->update();
        return redirect()->route('courses.showCourse')->with('status','Data Updated Successfully');

    }
    public function destroyCourse($id){
        $data  = Course::find($id);
        $data->delete();
        return redirect()->route('courses.showCourse');

    }
    public function offer(){
        $course_id = AvailableCourse::select('course_id')->get();

        if (count($course_id) == 0){

            $availables = [];
        }
        foreach ($course_id as $course){

            $availables[] = Courses::where('id', $course->course_id)->get();

        }

        $intake_id = AvailableCourse::select('intake_id')->get();


        return view('courses::offer.coursesOffer')->with(['availables' => $availables, 'intake' => $intake_id]);
    }

    public function profile(){
        return view('courses::profilepage');
    }
    public function review(){
        return view('courses::reviews');
    }

    /**
     *
     * information about class
     */

    public function addClasses(){
        $attendances  =  Attendance::all();
        $courses      =  Course::all();
        $intakes      =  Intake::where('status', 1)->get();


        return view('courses::class.addClasses')->with(['attendances'  =>  $attendances, 'courses' =>  $courses, 'intakes' => $intakes]);
    }

    public function storeClasses(Request $request){
        $vz            = $request->validate([
            'attendance' => 'required',
            'intake_from'     =>  'required',
            'course'     =>  'required',

        ]);

        $intake = AvailableCourse::where('course_id', $request->course_id)->select('intake_id')->get();

        $class         =    new Classes;
        $class->attendance_id  =  $request->input('attendance');
        $class->course_id      =  $request->input('course');
        $class->intake_from    =  $request->intake_from;
        $class->attendance_code = $request->attendance_code;
        $class->name           =  $request->course_code."/".$request->intake_from."/".$request->attendance_code;
        $class->save();

        return redirect()->route('courses.showClasses')->with('success','Class Created');
    }

    public function showClasses()
    {
        $data = Classes::latest()->paginate(5);
        return view('courses::class.showClasses')->with('data',$data);
    }
    public function editClasses($id){

        $data    =   Classes::find($id);

//        return $data;

        $attendances  = Attendance::all();
        $courses      =      Course::all();
        $data         =      Classes::find($id);
        $intakes      =      Intake::where('status',1)->get();
        return view('courses::class.editClasses')->with([
            'data'          =>  $data,
            'attendances'   =>  $attendances,
            'courses'       =>  $courses,
            'intakes'       =>  $intakes
        ]);
    }

    public function updateClasses(Request $request, $id){

        $request->validate([
            'attendance_code' => 'required|string',
            'course_code' => 'required|string'
        ]);

        return $request->all();

        $data         =   Classes::find($id);
        $data->attendance_id  =  $request->input('attendance');
        $data->course_id      =  $request->input('course');
        $data->name           =  $request->course_code."/".$request->intake_from."/".$request->attendance_code;
        $data->save();

        return redirect()->route('courses.showClasses')->with('status','Data Updated Successfully');
    }


     public function destroyClasses($id){
        $data  = Classes::find($id);
        $data->delete();
        return redirect()->route('courses.showClasses');

    }
    public function destroyCoursesAvailable(Request $request, $id){

        $course = AvailableCourse::find('id', $id)->delete();
//        $course->delete();

//        $data = AvailableCourse::findOrFail($id);
//        //return $data;
//        $data->forceDelete();

        return redirect()->route('courses.offer');
    }



}
