<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currentYear = Carbon::now()->year;

        $pro=new Submission();

        if($request->file){
            $file= $request->file;
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/submissions'), $filename);
            $pro->file=$filename;

        }


        $approvalLetter= $request->approvalLetter;
        $approvalLetterfilename= date('YmdHi').$approvalLetter->getClientOriginalName();
        $approvalLetter-> move(public_path('/approvalLetters'), $approvalLetterfilename);

        $pro->approvalLetter=$approvalLetter;

        $pro->category = $request->category;
        $pro->gSLink = $request->gSLink;
        $pro->numCit = $request->numCit;
        $pro->authorName = $request->authorName;
        $pro->year = $currentYear;

        $pro->save();
        return redirect()->route('home')
            ->with('success','Submitted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submission $submission)
    {
        //
    }

    public function deletebyyear(Request $request, Submission $studentRegistration)

    {
        DB::table('submissions')
            ->where('year', $request->input('year'))
            ->delete();

//        $fileToDelete = 'submissions/2023asd.pdf'; // Relative to the root of the 'public' disk
//        File::delete($fileToDelete);

        $filesLetters = File::files(public_path('approvalLetters'));
        foreach ($filesLetters as $filesLetter) {
            // Get the file name without the path
            $filenameLetter = pathinfo($filesLetter, PATHINFO_FILENAME);

            // Check if the filename contains the year
            if (strpos($filenameLetter, $request->input('year')) !== false && pathinfo($filesLetter, PATHINFO_EXTENSION) === 'pdf') {
                // Delete the PDF file
                File::delete($filesLetter);
            }
        }

        $filesSubmissions = File::files(public_path('submissions'));
        foreach ($filesSubmissions as $filesSubmission) {
            // Get the file name without the path
            $filenameSubmission = pathinfo($filesSubmission, PATHINFO_FILENAME);

            // Check if the filename contains the year
            if (strpos($filenameSubmission, $request->input('year')) !== false && pathinfo($filesSubmission, PATHINFO_EXTENSION) === 'pdf') {
                // Delete the PDF file
                File::delete($filesSubmission);
            }
        }


        return redirect()->route('home')
            ->with('success','Successfully Deleted');
    }

}
