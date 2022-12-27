<?php

namespace App\Http\Controllers;

use App\Models\SdgsList;
use App\Models\SdgsEmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmissionController extends Controller
{
    //
    public function create(Request $request)
    {
        $request->validate([
            'resource' => 'required',
            'description' => 'required',
            'co2_target' => 'required',
        ]);

        if ($request->hasFile('uploads')) {
            $file = $request->file('uploads');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = Storage::disk('local')->putFileAs('public', $file, $fileName);
            $fileDir = Storage::disk('local')->url($filePath);
        } else {
            $fileDir = null;
        }

        // if sdgs_emissions table is empty, then the latest id is 0
        if (DB::table('sdgs_emissions')->latest()->first() == null) {
            $latestId = 0;
        } else {
            $latestId = DB::table('sdgs_emissions')->latest()->first()->id;
        }

        $code = 'B' . ($latestId + 1) . rand(1000, 9999);
        
        SdgsList::create([
            'code' => $code,
            'sdgs_id' => 2,
            'user_id' => $request->user()->id,
            'status' => 'waiting'
        ]);
        
        SdgsEmission::create([
            'sdgs_list_id' => SdgsList::latest()->first()->id,
            'resource' => $request->resource,
            'description' => $request->description,
            'file' => $fileDir,
            'co2_target' => $request->co2_target,
        ]);    
        
        return redirect()->route('sdgs.status', SdgsList::latest()->first()->id);
    }
}
