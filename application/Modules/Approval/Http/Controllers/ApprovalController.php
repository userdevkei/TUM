<?php

namespace Modules\Approval\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Approval\Entities\Application;
use Modules\Approval\Entities\Course;
use Modules\Approval\Entities\Intake;
use DB;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('approval::index');
    }
   /*
    * First login redirect
    */
    public function dashboard(){

        if (Auth::check()) {

            if (Auth::user()->email_verified_at === null){
                Auth::logout();

                return redirect(route('root'))->with('warning', 'Please verify your email first');
            }
            if (Auth::user()->user_status === 0) {
                return redirect()->route('application.details')->with(['info' => 'Please update your profile']);

            } else {

                if()
                    return view('approval::cod.index');
                else
                    return view('approval::dean.index');

            }
            redirect()->route('application.login')->with('error', 'Please try again');
        }

    }
    /**
     *@views
     */
    public function pending(){

       if (Auth::guard('user')->user()->role_id === 2){
           if (!Auth::guard('user')->check()){
               abort(403);
           } else{
               return view('approval::cod.pending');
           }
       }
       if (Auth::guard('user')->user()->role_id === 4){
           if (!Auth::guard('user')->check()){
               abort(403);
           } else{
               return view('approval::dean.pending');
           }
       }
    }
    public function approved(){
       if (Auth::guard('user')->user()->role_id === 2){
           if (!Auth::guard('user')->check()){
               abort(403);
           } else{
               return view('approval::cod.approved');
           }
       }
       if (Auth::guard('user')->user()->role_id === 4){
           if (!Auth::guard('user')->check()){
               abort(403);
           } else{
               return view('approval::dean.approved');
           }
       }
    }
    public function rejected(){
       if (Auth::guard('user')->user()->role_id === 2){
           if (!Auth::guard('user')->check()){
               abort(403);
           } else{
               return view('approval::cod.rejected');
           }
       }
       if (Auth::guard('user')->user()->role_id === 4){
           if (!Auth::guard('user')->check()){
               abort(403);
           } else{
               return view('approval::dean.rejected');
           }
       }
    }
    public function search(){
       if (Auth::guard('user')->user()->role_id === 2){
           if (!Auth::guard('user')->check()){
               abort(403);
           } else{
               return view('approval::cod.search');
           }
       }
       if (Auth::guard('user')->user()->role_id === 4){
           if (!Auth::guard('user')->check()){
               abort(403);
           } else{
               return view('approval::dean.search');
           }
       }
    }
    public function viewPending(){
       if (Auth::guard('user')->user()->role_id === 2){
           if (!Auth::guard('user')->check()){
               abort(403);
           } else{
               return view('approval::cod.view');
           }
       }
       if (Auth::guard('user')->user()->role_id === 4){
           if (!Auth::guard('user')->check()){
               abort(403);
           } else{
               return view('approval::dean.view');
           }
       }
    }
    public function searchValue(Request $request){
        $data = $request->json()->all();
        $apps = DB::table('applications_approval')
                    ->leftJoin('applicants_approve', 'applicants_approve.user_id', '=', 'applications_approval.user_id')
                    ->orWhere('id_number', 'LIKE', '%'.$data['value'].'%')
                    ->orWhere('index_number', 'LIKE', '%'.$data['value'].'%')
                    ->orWhere('kcse', 'LIKE', '%'.$data['value'].'%')
                    ->orWhere('kcpe', 'LIKE', '%'.$data['value'].'%')
                    ->orWhere('name', 'LIKE', '%'.$data['value'].'%')
                    ->get();
        print_r(json_encode(['user' => $apps, 'role' => Auth::guard('user')->user()->role_id]));
    }
    public function getApplication(Request $request){
        $data = $request->json()->all();
        $intake = Intake::select('*')->where('intake_id', $data['app'])->get();
        print_r(json_encode(['app' => $intake]));
    }
    public function getCourses(Request $request){
        $data = $request->json()->all();
        $data_arr = json_decode($data['courses']);
        $courses = [];
        foreach($data_arr as $id)
            array_push($courses,Course::select('*')->where('id', $id)->get());
        print_r(json_encode($courses));
    }
    public function candidate(Request $request){
        $data = $request->json()->all();
        $apps_count = 0;
        $apps = [];

        $options = explode(',',$data['status']);
        foreach($options as $opt){
            if($data['filter'] === 1){
                $apps = DB::table('applications_approval')
                            ->leftJoin('applicants', 'applicants.id', '=', 'applications_approval.user_id')
                            ->where('intake_id', '=', (int)$data['intake'])
                            ->where('academic_program', '=', (int)$data['level'])
                            ->where('final_status', '=', (int)$opt)
                            ->where('attendance', '=', (int)$data['attendance'])
                            ->where('course', '=', (int)$data['course'])
                            ->where('year', '=', (int)$data['year'])
                            ->offset($data['offset'])
                            ->limit($data['limit'])
                            ->get();
                $apps_count = DB::table('applications_approval')
                            ->leftJoin('applicants', 'applicants.id', '=', 'applications_approval.user_id')
                            ->where('intake_id', '=', (int)$data['intake'])
                            ->where('academic_program', '=', (int)$data['level'])
                            ->where('final_status', '=', (int)$opt)
                            ->where('attendance', '=', (int)$data['attendance'])
                            ->where('course', '=', (int)$data['course'])
                            ->where('year', '=', (int)$data['year'])
                            ->count();
            }else{
                $apps = DB::table('applications_approval')
                            ->leftJoin('applicants', 'applicants.id', '=', 'applications_approval.user_id')
                            ->where('intake_id', '=', (int)$data['intake'])
                            ->where('academic_program', '=', (int)$data['level'])
                            ->where('final_status', '=', (int)$opt)
                            ->offset($data['offset'])
                            ->limit($data['limit'])
                            ->get();
                $apps_count = DB::table('applications_approval')
                            ->leftJoin('applicants', 'applicants.id', '=', 'applications_approval.user_id')
                            ->where('intake_id', '=', (int)$data['intake'])
                            ->where('academic_program', '=', (int)$data['level'])
                            ->where('final_status', '=', (int)$opt)
                            ->count();
            }
        }

        $page_count = ceil((int)$apps_count/100);
        if($page_count < 1)
            $page_count = 1;

        print_r(json_encode(['user' => $apps, 'page' => $page_count, 'role' => Auth::guard('user')->user()->role_id]));

    }
    public function reject(Request $request){
        $data = $request->json()->all();

        $app = Application::select('*')->where('applications_id', (int)$data['application'])->get();

        $status_arr = [];
        if(count($app) > 0)
            $status_arr = json_decode($app[0]['status']);

        $status = 2;
        $level = "COD";
        if(Auth::guard('user')->user()->role_id === 4){
            $status = 4;
            $level = "DEAN";
            //Check whether COD had rejected before
            if($app[0]['final_status'] === 9)
                $status = 8;
        }

        $status_arr[] = ["status" => $status, "reason" => $data['reason'], "date" => date("Y-m-d"), "level" => $level];

        $apps = DB::table('applications_approval')
                      ->where('applications_id', (int)$data['application'])
                      ->update(['final_status' => $status, 'status' => json_encode($status_arr)]);
        $feedback = false;
        if($apps === 1)
            $feedback = true;
        print_r(json_encode(['user' => $feedback]));
    }
    public function approve(Request $request){
        $data = $request->json()->all();

        $app = Application::select('*')->where('applications_id', (int)$data['application'])->get();

        $status_arr = [];
        if(count($app) > 0)
            $status_arr = json_decode($app[0]['status']);

        $status = 1;
        $level = "COD";
        if(Auth::guard('user')->user()->role_id === 4){
            $status = 3;
            $level = "DEAN";
            //Check whether COD had rejected before
            if($app[0]['final_status'] === 9)
                $status = 5;
        }

        $status_arr[] = ["status" => $status, "reason" => $data['reason'], "date" => date("Y-m-d"), "level" => $level];

        $apps = DB::table('applications_approval')
                      ->where('applications_id', $data['application'])
                      ->update(['final_status' => $status, 'status' => json_encode($status_arr)]);
        $feedback = false;
        if($apps === 1)
            $feedback = true;
        print_r(json_encode(['user' => $feedback]));
    }
    public function push(Request $request){
        $data = $request->json()->all();
        $status = 0;
        //User is COD
        if(Auth::guard('user')->user()->role_id === 2){
            if($data['status'] == 1) //If COD Approved
                $status = 6;
            if($data['status'] == 2) //If COD Rejected
                $status = 9;
        }
        //User is Dean
        if(Auth::guard('user')->user()->role_id === 4){
            if($data['status'] == 3 || $data['status'] == 5) //If DEAN Approved
                $status = 7;
            if($data['status'] == 4 || $data['status'] == 8) //If DEAN Rejected
                $status = 10;
        }
        $apps = DB::table('applications_approval')
                      ->where('intake_id', $data['intake'])
                      ->where('final_status', $data['status'])
                      ->update(['final_status' => $status]);

        $feedback = false;
        if($apps === 1)
            $feedback = true;
        print_r(json_encode(['now' => $feedback]));
    }
    public function fetchData(Request $request){

        $data = $request->json()->all();

        $collection = explode(',',$data['id']);
        $applications = [];
        foreach($collection as $item){
            $applications = Application::select('*')->where('final_status', (int)$item)->get();
        }
        $pending = [];

        if(count($applications) > 0){
            foreach($applications as $foundItem){
                $intake = $foundItem['intake_name'];
                $intakeId = (int)$foundItem['intake_id'];
                $status = (int)$foundItem['final_status'];
                $programs = $foundItem['academic_program'];
                $date = $foundItem['intake_date'];
                $time = strtotime($date);
                $sweet_date = date("D/M/Y",$time);
                $id = $foundItem['applications_id'];

                $expire = false;
                if(date("Y-m-d") > date("Y-m-d",$time))
                    $expire = true;
                if(in_array($intakeId,array_column($pending,"intake"))){
                    $work_key = array_keys(array_column($pending,"intake"),$intakeId)[0];
                    if(in_array($programs,array_column($pending[$work_key]["academic"],"program"))){
                        $program_key = array_keys(array_column($pending[$work_key]["academic"],"program"),$programs)[0];
                        $pending[$work_key]["academic"][$program_key]["number"] = (int)$pending[$work_key]["academic"][$program_key]["number"] + 1;
                    }else{
                        $pending[$work_key]["academic"][] = [ "program" => $programs, "number" => 1];
                    }
                    $keys = array_column($pending[$work_key]["academic"], 'program');
                    array_multisort($keys, SORT_ASC, $pending[$work_key]["academic"]);
                }else{
                    $pending[] = array(
                        "intake" => $intakeId,
                        "name" => $intake,
                        "status" => $status,
                        "academic" => [
                            [
                                "program" => $programs,
                                "number" => 1
                            ]
                        ],
                        "date" => $date,
                        "sweet_date" => $sweet_date,
                        "id" => $id,
                        "expire" => $expire
                    );
                }
            }
        }

        $keys = array_column($pending, 'date');
        array_multisort($keys, SORT_DESC, $pending);
        print_r(json_encode(['list' => $pending]));

    }
    public function graph(){
        $applications = Application::all();
        $graphData = [];
        if(count($applications) > 0){
            foreach($applications as $foundItem){
                $intake = $foundItem["intake_name"];
                $intake_id = $foundItem["intake_id"];
                $status = json_decode($foundItem['status']);
                $side = $foundItem['final_status'];
                $TIMESTAMP = $status[count($status) - 1]->date;
                $time = strtotime($TIMESTAMP);
                $c_time = date("Y-m-d",$time);
                $c_year = date("Y",$time);
                $approved = 0;
                $rejected = 0;
                $pending = 0;
                if(Auth::guard('user')->user()->role_id === 2){
                    if($side === 2 || $side === 9){
                        $rejected = 1;
                    }
                    if($side === 0){
                        $pending = 1;
                    }
                    if($side === 1 || $side === 6){
                        $approved = 1;
                    }
                }
                if(Auth::guard('user')->user()->role_id === 4){
                    if($side === 4 || $side === 8 || $side === 10){
                        $rejected = 1;
                    }
                    if($side === 9 || $side === 6){ //COD PUSHED APPROVED OR REJECTED
                        $pending = 1;
                    }
                    if($side === 3 || $side === 5 || $side === 7){
                        $approved = 1;
                    }
                }
                if(in_array($intake_id,array_column($graphData,"id"))){
                    $work_key = array_keys(array_column($graphData,"id"),$intake_id)[0];
                    $graphData[$work_key]["count"] = (int)$graphData[array_keys(array_column($graphData,"id"),$intake_id)[0]]["count"] + 1;
                    $graphData[$work_key]["approved"] = (int)$graphData[array_keys(array_column($graphData,"id"),$intake_id)[0]]["approved"] + (int)$approved;
                    $graphData[$work_key]["rejected"] = (int)$graphData[array_keys(array_column($graphData,"id"),$intake_id)[0]]["rejected"] + (int)$rejected;
                    $graphData[$work_key]["pending"] = (int)$graphData[array_keys(array_column($graphData,"id"),$intake_id)[0]]["pending"] + (int)$pending;
                    $graphData[$work_key]["year"] = $c_year;
                    $graphData[$work_key]["date"][] = $c_time;
                }else{
                    $graphData[] = array(
                        "date" => [$c_time],
                        "year" => $c_year,
                        "count" => 1,
                        "intake" => $intake,
                        "id" => $intake_id,
                        "approved" => $approved,
                        "rejected" => $rejected,
                        "pending" => $pending
                    );
                }
            }
        }

        $keys = array_column($graphData, 'id');
        array_multisort($keys, SORT_DESC, $graphData);
        print_r(json_encode(['graph' => $graphData]));
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('approval::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('approval::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('approval::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
