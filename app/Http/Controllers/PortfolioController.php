<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class PortfolioController extends Controller
{
    public function showPortfolio()
    {

        $id = 0;
        $f = 0;
        $about = array();
        $count = array();
        $about = DB::table('portfoliocategories')->get();
        foreach ($about as $data) {
            $id = $data->id;
            $get_about = DB::table('categorytitles')->where('category_id', $id)
                ->get();
            $count[$f] = count($get_about);
            $f++;
        }
        return view('admin/portfolio', compact('about', 'count', 'f'));
    }
    public function addPortfolio(Request $request)
    {
        $data = 0;
        $get_about = array();
        $get_about = DB::table('portfoliocategories')
            ->where('categoryName', $request->categoryTitle)
            ->select('id')
            ->get();
        foreach ($get_about as $item) {
            $data = $item->id;
        }
        if ($data) {
            $request->session()->flash('add', 'Category All Ready Exist');
            return back();
        } else {
            $about['categoryName'] = $request->categoryTitle;
            DB::table('portfoliocategories')->insert($about);
            $request->session()->flash('add', 'Succesfully Added');
            return redirect()->to('showPortfolio');
        }
    }
    public function showCategoryDetails(Request $request, $id)
    {
        $image = DB::table('portfoliocategories')->where('id', $id)->get();
        foreach ($image as $p_id) {
            $id = $p_id->id;
        }
        return view('admin/addDetails', compact('id'));
    }
    public function upload_portfolio_data(Request $request)
    {
        $about = array();
        $test = array();
        $about['categoryClient'] = $request->clientTitle;
        $about['category_id'] = $request->portfolio_id;
        $about['prjectDate'] = $request->prjectDate;
        $about['prjectUrl'] = $request->prjectUrl;
        $about['prjectTitle'] = $request->prjectTitle;
        $about['prjectDetail'] = $request->projectDetail;
        DB::table('categorytitles')->insert($about);
        $get_about = DB::table('categorytitles')->where('prjectTitle', $request->prjectTitle)
            ->select('id')->get();
        foreach ($get_about as $id) {
            $about_id = $id->id;
        }
        foreach ($request->file('filename') as $image) {
            $name = $image->getClientOriginalName();
            $image->move(public_path() . '/images/portfolio/', $name);
            $test['prject_image'] = $name;
            $test['categoryTitles_id'] = $about_id;
            DB::table('categoryimages')->insert($test);
        }
        return redirect()->to('showPortfolio');
    }

    public function deletePortfolio(Request $request,$id)
    {
        DB::table('categorytitles')->where('id', $id)
            ->delete();
        DB::table('categoryimages')->where('categoryTitles_id', $id)
            ->delete();
            $request->session()->flash('delete', 'Successfully Deleted! ');
            return redirect()->to('showPortfolio');
    }

    public function editportfolio(Request $request,$id)
    {
        $data=DB::table('categorytitles')->where('id', $id)
            ->get();
            foreach($data as $value){
                $v_id=$value->category_id;
            }
        $list=DB::table('categoryimages')->where('categoryTitles_id', $id)
            ->get();  
            return view('admin/editPortfolio',compact('data','list','id','v_id'));
    }


    public function updateportfolio(Request $request ,$id)
    {

        $about = array();
        $test = array();
        if($request->file('filename')){
        $about['categoryClient'] = $request->clientTitle;
        $about['category_id'] = $request->portfolio_id;
        $about['prjectDate'] = $request->prjectDate;
        $about['prjectUrl'] = $request->prjectUrl;
        $about['prjectTitle'] = $request->prjectTitle;
        $about['prjectDetail'] = $request->projectDetail;
        DB::table('categorytitles')->where('id', $id)->update($about);
        DB::table('categoryimages')->where('categoryTitles_id', $id)
            ->delete();
            foreach ($request->file('filename') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/images/portfolio/', $name);
                $test['prject_image'] = $name;
                $test['categoryTitles_id'] = $id;
                DB::table('categoryimages')->where('categoryTitles_id', $id)->insert($test);
            }
            return redirect()->to('showPortfolio');
        }
        else{
            return back();
        }
    }


    public function showItem(Request $request,$id)
    {
        $m=0;

        $portfolio=array();
        $list=array();
        $list=DB::table('portfoliocategories')
        ->join('categorytitles','categorytitles.category_id','=','portfoliocategories.id')
        ->where('portfoliocategories.id','=',$id)
        ->select('portfoliocategories.categoryName','categorytitles.*')
        ->paginate(2);
        foreach($list as $item){
            $c_id=$item->id;
            $app=$item->categoryName;
            $item_port[$m]=DB::table('categorytitles')
         ->join('categoryimages','categoryimages.categoryTitles_id','=','categorytitles.id')
         ->where('categorytitles.id','=',$c_id)
         ->select('categoryimages.prject_image')
         ->get();
         
        $m++;
        }

        return view('admin/showItem',compact('list','item_port','m','app'));
    }
}
