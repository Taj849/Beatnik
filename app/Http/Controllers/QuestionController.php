<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class QuestionController extends Controller
{
    public function showAbout()
    {
        $id=0;
        $about=array();
        $about=DB::table('questions')->paginate(3);
        return view('admin/question',compact('about'));
        
    }
    public function addAbout(Request $request)
    {

        $about = array();
            $about['questionTitle'] = $request->aboutTitle;
        $about['questionDetail'] = $request->aboutdetail;
        DB::table('questions')->insert($about);
        return redirect()->to('showQuestion');
    }
    public function deleteAbout(Request $request,$id)
    {
        DB::table('questions')->where('id', $id)
            ->delete();
            $request->session()->flash('delete', 'Successfully Deleted! ');
            return redirect()->to('showQuestion');
    }

    public function editAbout(Request $request,$id)
    {
        $data=DB::table('questions')->where('id', $id)
            ->get();
            return view('admin/editQuestions',compact('data','id'));
    }


    public function updateAbout(Request $request ,$id)
    {

        $about = array();
            $about['questionTitle'] = $request->aboutTitle;
        $about['questionDetail'] = $request->aboutdetail;
        DB::table('questions')->where('id', $id)->update($about);
        session()->flash('delete', 'Successfully Updated! ');
        return redirect()->to('showQuestion');
    }
}
