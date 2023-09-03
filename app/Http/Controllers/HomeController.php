<?php


namespace App\Http\Controllers;




use App\Models\Category;
use App\Models\Submission;

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

        return view('home', compact('categories','submissions'));
//        return view('home',compact('category'));
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
