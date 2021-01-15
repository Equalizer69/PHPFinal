<?php

namespace App\Http\Controllers;

use DB;
use URL;
use Illuminate\Http\Request;
use App\Models\Favourite;
use App\Models\Song;
use App\Http\Requests\UploadSongRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    
    public function profile() {
    	return view("user.profile");
    }

    public function addSongToFavourites($songId) {

        $songIsValid = Song::find($songId);
        if (empty($songIsValid)) 
            return response()->json(["error" => "Song not found"], 404);

        $isAlreadyAddedToFavourites = 
            Favourite::where("song_id", $songId)
                ->where("user_id", auth()->user()->id)
                ->get();
        if (!empty($isAlreadyAddedToFavourites)) 
            return response()->json(["error" => "Song Allready added"], 404);

    	$fav = new Favourite();
    	$fav->song_id = $songId;
    	$fav->user_id = auth()->user()->id;
    	if ($fav->save())
    		return response()->json(["result" => true], 201);
    	return response()->json(["result" => false], 400);
    }

    public function uploadNewSong(UploadSongRequest $request) {

        DB::beginTransaction();

        try {

            if($request->hasFile('song_thumbnail'))
                $thumb = Storage::disk('public')->put('songs/thumbs/'. date("Y/m"), $request->file('song_thumbnail'));

            if($request->hasFile('song_file'))
                $audio = Storage::disk('public')->put('songs/audio/'. date("Y/m"), $request->file('song_file'));


            $song = new Song();
            $song->title = "TestName";
            $song->publisher_id = \Auth::id();
            $song->audio_file = $audio;
            $song->img = $thumb;
            $song->save();

            DB::commit();

            return response()->json([
                "thumbData" => $thumb,
                "audioFile" => $audio
            ]);

            
        } catch (\Exception $e) {
            DB::rollback();
            \Redirect::back()->withErrors(["Error while adding new song, please try again later"]);
        }

        

    }

}
