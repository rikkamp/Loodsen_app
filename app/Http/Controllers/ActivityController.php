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
        $response = GameModel::create();
        $response->gameTitle = $request->gameTitle;
        $response->gameReq = $request->gameReq;
        $response->gameRules = $request->gameRules;
        $response->gameDesc = $request->gameDesc;
        $response->gamePlayers = $request->gamePlayers;
        $response->gameNotes = $request->gameNotes;
        $response->gameTut = $request->gameTut;
        $response->save();
        return response()->json($response);
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
        $response = GameModel::find($id);
        $response->gameTitle = $request->gameTitle;
        $response->gameReq = $request->gameReq;
        $response->gameRules = $request->gameRules;
        $response->gameDesc = $request->gameDesc;
        $response->gamePlayers = $request->gamePlayers;
        $response->gameNotes = $request->gameNotes;
        $response->gameTut = $request->gameTut;
        $response->save();
        return response()->json($response);
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
