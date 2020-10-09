<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ContactController extends Controller
{
    public function index()
    {
        $id=0;
        $about=array();
        $list=array();
        $portfolio=array();
        $about=DB::table('abouttitles')->get();
        
            foreach($about as $item){
                $id=$item->id;
            }
            
            $list=DB::table('aboutlists')->where('aboutTitle_id',$id)->get();

            $portfolio_name=array();
        $i=0;
        $data=0;
        $portfolio = DB::table('portfoliocategories')->get();
        foreach($portfolio as $item){
            $p_id=$item->id;
            $portfolio_name[$i] = DB::table('portfoliocategories')
            ->join('categorytitles', 'categorytitles.category_id', '=', 'portfoliocategories.id')
            ->join('categoryimages', 'categoryimages.categoryTitles_id', '=', 'categorytitles.id')
            ->where('portfoliocategories.id', '=', $p_id)
            ->select('portfoliocategories.categoryName', 'categoryimages.*')
            ->get();
            $i++;
        }
            $service=DB::table('services')->get();
            $question=DB::table('questions')->get();
            $contact=DB::table('contacts')->get();
            return view('userhome',compact('about','list','portfolio','portfolio_name','i','service','question','contact'));
       

    }
    public function showDetails(Request $request,$categoryTitles_id,$categoryName)
    {
       $portfolio_details=DB::table('categorytitles')
       ->where('categorytitles.id', '=', $categoryTitles_id)
       ->select('categorytitles.*')
       ->get();
       $get_image=DB::table('categoryimages')
       ->where('categoryimages.categoryTitles_id', '=', $categoryTitles_id)
       ->select('categoryimages.prject_image')
       ->get();
       $contact=DB::table('contacts')->get();
       return view('portfolio',compact('portfolio_details','get_image','categoryName','contact'));
    }
    //Contact Field

    public function showAbout()
    {
        $id=0;
        $about=array();

        $data=1;
        $id=0;
        $about=array();
        $list=array();
        $about=DB::table('contacts')->paginate(5);
        
            foreach($about as $item){
                $id=$item->id;
            }
            if($id){
            return view('admin/contact',compact('about','data'));
        }
        else{
            $data=2;
            return view('admin/contact',compact('data'));
        } 
        
    }
    public function addAbout(Request $request)
    {

        $about = array();
            $about['adress'] = $request->address;
        $about['email'] = $request->email;
        $about['phone'] = $request->phone;
        DB::table('contacts')->insert($about);
        return redirect()->to('showContact');
    }
    public function deleteAbout(Request $request,$id)
    {
        DB::table('contacts')->where('id', $id)
            ->delete();
            $request->session()->flash('delete', 'Successfully Deleted! ');
            return redirect()->to('showContact');
    }

    public function editAbout(Request $request,$id)
    {
        $data=DB::table('contacts')->where('id', $id)
            ->get();
            return view('admin/editContact',compact('data','id'));
    }


    public function updateAbout(Request $request ,$id)
    {

        $about = array();
        $about['adress'] = $request->address;
        $about['email'] = $request->email;
        $about['phone'] = $request->phone;
        DB::table('contacts')->where('id', $id)->update($about);
        session()->flash('delete', 'Successfully Updated! ');
        return redirect()->to('showContact');
    }
}
