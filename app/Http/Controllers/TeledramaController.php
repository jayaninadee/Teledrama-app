<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Channel;
use App\Teledrama;
use Illuminate\Support\Facades\DB;

class TeledramaController extends Controller
{
    public function index()
    {
        $teledramas = Teledrama::all();
        $channels = Channel::all();
        $arry['teledramas']=$teledramas;
        $arry['channels']=$channels;


//       dd($teledramas);
        return view('layouts.teledramapage')->with('arry', $arry);
    }

    public function create(Request $request)
    {
//        dd($request->ch_Id);
        $teledramas = new Teledrama();
        $teledramas->te_Name = $request->input('te_Name');
        if ($request->hasFile('te_Image')) {
            $image = $request->file('te_Image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('/images/' . $filename));
        }
        $teledramas->te_Image = $filename;
//        dd($request->ch_Id);

        $teledramas->ch_Id = $request->input('ch_Id');
//        dd($request->request);
        $teledramas->save();
        return back();
    }

    public function show($ch_Id)
    {
//        dd($ch_Id);
        $teledramas= DB::table('teledramas')->where('ch_Id', $ch_Id)->get();
//        dd($teledramas);
        return $teledramas;
    }

    public function showbyid($id)
    {
        $teledramas = Teledrama::find($id);
        return response()->json($teledramas);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatebyid(Request $request, $id)
    {
        $teledramas = Teledrama::find($id);
        $teledramas->te_Name = $request->input('te_Name');
        if ($request->hasFile('te_Image')) {
            $image = $request->file('te_Image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('/images/' . $filename));
        }
        $teledramas->te_Image = $filename;
        $teledramas->ch_Id = $request->input('ch_Id');
        $teledramas->save();
        return response()->json($teledramas);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletebyid($id)
    {
        $teledramas = Teledrama::find($id);
        $teledramas->delete();
        return response()->json($teledramas);
    }
}
