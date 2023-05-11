<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marks = Mark::all();
        return view('mark.index', compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('mark.add', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mark = new Mark();
        $mark->fill($request->except(['_token']));
        $mark->save();
        return redirect('/mark');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mark = Mark::where('id', $id)->first();
        $students = Student::all();
        return view('mark.edit', compact('mark', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Mark::where('id', $id)->first();
        $student->maths = $request->maths;
        $student->student_id = $request->student_id;
        $student->science = $request->science;
        $student->history = $request->history;
        $student->term = $request->term;
        $student->save();
        return redirect('/mark');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mark::where('id', $id)->delete();
        return redirect('/mark');
    }
}
