<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameModel;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    //
    public function create (Request $request) {
        $request->validate([
            'gameTitle' => 'required|max:255',
            'gameReq' => 'required|max:2000',
            'gameRules' => 'required|max:2000',
            'gameDesc' => 'required|max:2000',
            'gamePlayers' => 'required|max:100',
            'gameNotes' => 'max:2000',
            'gameTut' => 'required|max:2000'
        ]);
        $yeet = GameModel::create();
        $yeet->gameTitle = $request->gameTitle;
        $yeet->gameReq = $request->gameReq;
        $yeet->gameRules = $request->gameRules;
        $yeet->gameDesc = $request->gameDesc;
        $yeet->gamePlayers = $request->gamePlayers;
        $yeet->gameNotes = $request->gameNotes;
        $yeet->gameTut = $request->gameTut;
        $yeet->save();
        return response()->json($yeet);
    }

    public function update (int $id, Request $request) {
        $request->validate([
            'gameTitle' => 'required|max:255',
            'gameReq' => 'required|max:2000',
            'gameRules' => 'required|max:2000',
            'gameDesc' => 'required|max:2000',
            'gamePlayers' => 'required|max:100',
            'gameNotes' => 'max:2000',
            'gameTut' => 'required|max:2000'
        ]);
        $yeet = GameModel::find($id);
        $yeet->gameTitle = $request->gameTitle;
        $yeet->gameReq = $request->gameReq;
        $yeet->gameRules = $request->gameRules;
        $yeet->gameDesc = $request->gameDesc;
        $yeet->gamePlayers = $request->gamePlayers;
        $yeet->gameNotes = $request->gameNotes;
        $yeet->gameTut = $request->gameTut;
        $yeet->save();
        return response()->json($yeet);
    }

    public function delete (int $id) {
        $data = GameModel::find($id);
        if(isset($data)) {
            $data->delete();
            return response()->json("Data deleted", 418);
        } else {
            return response()->json("index does not exist", 404);
        }
    }
    public function get () {
        $result = DB::SELECT('SELECT * FROM game ORDER BY RAND() LIMIT 1');
        return response()->json($result);
    }
}
