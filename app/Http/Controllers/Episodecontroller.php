<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Facades\Youtube;
use Illuminate\Http\Request;
use App\Episode;
use App\Teledrama;
use Illuminate\Support\Facades\DB;

class Episodecontroller extends Controller
{

    public function index()
    {
        $episodes = Episode::all();
        $teledramas = Teledrama::all();
        $arry['episodes'] = $episodes;
        $arry['teledramas'] = $teledramas;
//        dd($teledramas);
        return view('layouts.episodepage')->with('arry', $arry);

    }
//    public function getData(){
//        $video = Youtube::getVideoInfo('ep_videoID');
//        $video->snippet->publishedAt;
//    }
    public function create(Request $request)
    {

        $episodes = new Episode();
        $episodes->ep_videoID = $request->input('ep_videoID');
        $video = Youtube::getVideoInfo($episodes->ep_videoID);
        $episodes->ep_DateTime = $video->snippet->publishedAt;
        $episodes->ep_Title = $video->snippet->title;
        $episodes->ep_Description = $video->snippet->description;
        $episodes->te_Id = $request->input('te_Id');
        $episodes->save();
        return back();
    }

    public function show($te_Id)
    {
//       dd($te_Id);
        $episodes= DB::table('episodes')->where('te_Id', $te_Id)->get();
      //  dd($episodes);
        return $episodes;
    }

    public function showbyid($id)
    {
        $episodes = Episode::find($id);
        return response()->json($episodes);

    }

    public function updatebyid(Request $request, $id)
    {

        $episodes = Episode::find($id);
        $episodes->ep_videoID = $request->input('ep_videoID');
        $video = Youtube::getVideoInfo($episodes->ep_videoID);
        $episodes->ep_DateTime = $video->snippet->publishedAt;
        $episodes->ep_Title = $video->snippet->title;
        $episodes->ep_Description = $video->snippet->description;
        $episodes->te_Id = $request->input('te_Id');
        $episodes->save();
        return response()->json($episodes);
    }

    public function deletebyid(Request $request, $id)
    {
        $episodes = Episode::find($id);
        $episodes->delte();
    }

}
