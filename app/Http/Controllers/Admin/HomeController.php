<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\FamilyMember;
use App\Models\PreviousExperience;
use App\Models\EducationQualification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function storeFamily(Request $request){
        if(!empty($request)){
            $obj = new FamilyMember;
            $obj->user_id = $request->user_id;
            $obj->father_name = $request->fname;
            $obj->mother_name = $request->mname;
            $obj->total_member = $request->tmember;
            $obj->save();
            return redirect()->route('admin.users.show',Auth::user()->id)->with(['status-success' => "User Updated"]);
        }
        else 
        return redirect()->back()->with(['error' => "Something Wrong"]);
    }

    public function storePrevExp(Request $request){
        if(!empty($request)){
            $obj = new PreviousExperience;
            $obj->user_id = $request->user_id;
            $obj->company_name = $request->company_name;
            $obj->designation = $request->designation;
            $obj->total_years = $request->total_years;
            $obj->save();
            return redirect()->route('admin.users.show',Auth::user()->id)->with(['status-success' => "User Updated"]);
        }
        else 
        return redirect()->back()->with(['error' => "Something Wrong"]);
        
    }

    public function storeEducation(Request $request){
        if(!empty($request)){
            $obj = new EducationQualification;
            $obj->user_id = $request->user_id;
            $obj->course = $request->course;
            $obj->grade = $request->grade;
            $obj->year_of_passing = $request->yop;
            $obj->save();
            return redirect()->route('admin.users.show',Auth::user()->id)->with(['status-success' => "User Updated"]);
        }
        else 
        return redirect()->back()->with(['error' => "Something Wrong"]);
        
    }

    public function editFamily(Request $request){
        if(!empty($request->id)){
            $obj = FamilyMember::where('id',$request->id)->first();
            $obj->user_id = $request->user_id;
            $obj->father_name = $request->fname;
            $obj->mother_name = $request->mname;
            $obj->total_member = $request->tmember;
            $obj->save();
            return redirect()->route('admin.users.show',Auth::user()->id)->with(['status-success' => "User Updated"]);
        }
        else 
        return redirect()->back()->with(['error' => "Something Wrong"]);
    }

    public function editPrevExp(Request $request){
        if(!empty($request->id)){
            $obj = PreviousExperience::where('id',$request->id)->first();
            $obj->user_id = $request->user_id;
            $obj->company_name = $request->company_name;
            $obj->designation = $request->designation;
            $obj->total_years = $request->total_years;
            $obj->save();
            return redirect()->route('admin.users.show',Auth::user()->id)->with(['status-success' => "User Updated"]);
        }
        else 
        return redirect()->back()->with(['error' => "Something Wrong"]);
        
    }

    public function editEducation(Request $request){
        if(!empty($request->id)){
            $obj = EducationQualification::where('id',$request->id)->first();
            $obj->user_id = $request->user_id;
            $obj->course = $request->course;
            $obj->grade = $request->grade;
            $obj->year_of_passing = $request->yop;
            $obj->save();
            return redirect()->route('admin.users.show',Auth::user()->id)->with(['status-success' => "User Updated"]);
        }
        else 
        return redirect()->back()->with(['error' => "Something Wrong"]);
        
    }
}
