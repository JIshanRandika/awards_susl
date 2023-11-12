<?php


namespace App\Http\Controllers;




use App\Models\Category;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all(); // Retrieve categories from the database
        $submissions = Submission::all();
        $users = User::where('is_permission', '1')->get();


        return view('home', compact('categories','submissions','users'));
//        return view('home',compact('category'));
    }

    public function getSubByFormRequest(Request $request)
    {
        $categories = Category::all();

        if($request->input('faculty')){
            $submissions = collect(DB::select('
        SELECT * FROM `submissions`;
        '))->where('year', '=', $request->input('year'))
                ->where('faculty', '=', $request->input('faculty'))
                ->where('category', '=', $request->input('category'));
        }else{
            $submissions = collect(DB::select('
        SELECT * FROM `submissions`;
        '))->where('year', '=', $request->input('year'))
                ->where('category', '=', $request->input('category'));
        }



        return view('home', compact('categories','submissions'));

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function allUsers()
    {
        dd('Access All Users');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminSuperadmin()
    {
        dd('Access Admin and Superadmin');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function superadmin()
    {
        dd('Access only Superadmin');
    }


    public function show(Status $status)
    {
        return view('/home',compact('status'));
    }



    public function updatemahapolaname($id){

//        Status::findOrFail(1)->update($request->all());


//        Status::->update(['mahalpola_name'=>'test']);

//        return back();
    }

}
