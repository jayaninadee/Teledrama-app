<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use Intervention\Image\Facades\Image;

class ChannelController extends Controller
{
    //
    public function index()
    {
//
        $channels = Channel::all();
//        $array['channels'] = $channels;
//        dd($channels);
        return view('layouts.channelpage')->with('channels', $channels);
//        return view('layouts.channelpage');

    }

    public function create(Request $request)
    {
//        dd($request->ch_Name);
        $channels = new Channel();
        $channels->ch_Name = $request->input('ch_Name');
        $channels->ep_videoID = $request->input('ep_videoID');
        if ($request->hasFile('ch_Image')) {
            $image = $request->file('ch_Image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('/images/' . $filename));
        }

        $channels->ch_Image = $filename;

        $channels->save();
//        dd($channels);
        return back();
    }

    public function show()
    {
        $channels = Channel::all();
        return response()->json($channels);


    }

    public function showbyid($id)
    {
        $channels = Channel::find($id);
        return response()->json($channels);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatebyid(Request $request, $id)
    {
        $channels = Channel::find($id);
        $channels->ch_Name = $request->input('ch_Name');
//        $channels->ch_Is_Enable = $request->input('ch_Is_Enable');
//        $channels->ch_Image = $request->input('ch_Image');

        if ($request->hasFile('ch_Image')) {
            $image = $request->file('ch_Image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('/image/' . $filename));
        }
        $channels->ch_Image = $filename;

        $channels->save();
        return response()->json($channels);
    }

    public function deletebyid(Request $request, $id)
    {
        $channels = Channel::find($id);
        $channels->delete();
        return response()->json($channels);
    }
}
