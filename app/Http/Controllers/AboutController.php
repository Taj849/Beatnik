<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AboutController extends Controller
{
    public function showAbout()
    {
        $data=1;
        $id=0;
        $about=array();
        $list=array();
        $about=DB::table('abouttitles')->get();
        
            foreach($about as $item){
                $id=$item->id;
            }
            if($id){
            $list=DB::table('aboutlists')->where('aboutTitle_id',$id)->get();
            return view('admin/about',compact('about','list','data'));
        }
        else{
            $data=2;
            return view('admin/about',compact('data'));
        } 
    }
    public function addAbout(Request $request)
    {

        $about = array();
        
     
            $about['aboutTitle'] = $request->aboutTitle;
        $about['aboutDetail'] = $request->aboutdetail;
        foreach($request->file('filename') as $image){
            echo $image;
            $name = $image->getClientOriginalName();
            $image->move(public_path() . '/images/about/', $name);
            $about['aboutImage'] = $name;
        }
        DB::table('abouttitles')->insert($about);
        $get_about = DB::table('abouttitles')->where('aboutTitle', $request->aboutTitle)
            ->select('id')->get();
        foreach ($get_about as $id) {
            $about_id = $id->id;
        }
        $test = array();
        foreach ($request->get('listname') as $name) {
            if ($name) {
                $test['aboutTitle_id'] = $about_id;
                $test['aboutList'] = $name;
                DB::table('aboutlists')->insert($test);
            }
        }
        
        return redirect()->to('about_detail');
    }
    public function deleteAbout(Request $request,$id)
    {
        DB::table('abouttitles')->where('id', $id)
            ->delete();
        DB::table('aboutlists')->where('aboutTitle_id', $id)
            ->delete();
            $request->session()->flash('delete', 'Successfully Deleted! ');
            return redirect()->to('about_detail');
    }

    public function editAbout(Request $request,$id)
    {
        $data=DB::table('abouttitles')->where('id', $id)
            ->get();
        $list=DB::table('aboutlists')->where('aboutTitle_id', $id)
            ->get();  
            return view('admin/editAbout',compact('data','list','id'));
    }


    public function updateAbout(Request $request ,$id)
    {

        $about = array();
        $about['aboutTitle'] = $request->aboutTitle;
        $about['aboutDetail'] = $request->aboutdetail;
        foreach($request->file('filename') as $image){
            echo $image;
            $name = $image->getClientOriginalName();
            $image->move(public_path() . '/images/about/', $name);
            $about['aboutImage'] = $name;
        }
        DB::table('abouttitles')->where('id', $id)->update($about);
        $test = array();
        foreach ($request->get('listname') as $name) {
            if ($name) {
                $test['aboutTitle_id'] = $id;
                $test['aboutList'] = $name;
                DB::table('aboutlists')->where('aboutTitle_id', $id)->updateOrInsert($test);
            }
        }
        session()->flash('delete', 'Successfully Updated! ');
        return redirect()->to('about_detail');
    }


}
