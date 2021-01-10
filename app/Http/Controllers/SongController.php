<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongController extends Controller
{

	public function getLastUploadedSongs(Request $request) {
		return $this->loadSongs($request->get("limit"));
	}


	private function loadSongs($requested_limit) {
		$actual_limit = ($requested_limit >= 100) ? 100 : $requested_limit;
		return Song::orderBy('created_at', 'desc')->take($actual_limit)->get();
	}

	public function home() {
		$songs = $this->loadSongs(6);
		return view("home", compact("songs"));
	}

	public function SongsResultForApi() {
		return $this->loadSongs(20);
	}

}
