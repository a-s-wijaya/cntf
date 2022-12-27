<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\SdgsList;
use App\Models\SdgsMaster;
use Illuminate\Http\Request;

class SDGSController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id){
        $sdg = SdgsMaster::find($id);
        $sdgLists = SdgsList::where('sdgs_id', $id)->with(['emission', 'user'])->get();

        return view('sdgs', compact('sdg', 'sdgLists'));
    }

    public function status($id){
        $sdgList = SdgsList::find($id);
        if($sdgList->sdgs_id == 2){
            $sdgList->load('emission');
        }

        return view('status', compact('sdgList'));
    }

    public function resubmit($id){
        $sdgList = SdgsList::find($id);
        $sdgList->status = 'waiting';
        $sdgList->save();

        return redirect()->route('sdgs.status', $id);
    }
}
