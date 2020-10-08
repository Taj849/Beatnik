<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class ServiceController extends Controller
{
    public function showAbout()
    {
        $id=0;
        $about=array();
        $about=DB::table('services')->paginate(3);
        return view('admin/service',compact('about'));
        
    }
    public function addAbout(Request $request)
    {

        $about = array();
            $about['serviceTitle'] = $request->aboutTitle;
        $about['serviceDetail'] = $request->aboutdetail;
        DB::table('services')->insert($about);
        return redirect()->to('showService');
    }
    public function deleteAbout(Request $request,$id)
    {
        DB::table('services')->where('id', $id)
            ->delete();
            $request->session()->flash('delete', 'Successfully Deleted! ');
            return redirect()->to('showService');
    }

    public function editAbout(Request $request,$id)
    {
        $data=DB::table('services')->where('id', $id)
            ->get();
            return view('admin/editService',compact('data','id'));
    }


    public function updateAbout(Request $request ,$id)
    {

        $about = array();
            $about['serviceTitle'] = $request->aboutTitle;
        $about['serviceDetail'] = $request->aboutdetail;
        DB::table('services')->where('id', $id)->update($about);
        session()->flash('delete', 'Successfully Updated! ');
        return redirect()->to('showService');
    }
}
