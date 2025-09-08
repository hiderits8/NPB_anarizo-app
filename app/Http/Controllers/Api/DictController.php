<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Stadium;
use App\Models\Club;
use Illuminate\Http\JsonResponse;


class DictController extends Controller
{
    public function teams(): JsonResponse
    {
        $rows = Team::query()
            ->select('team_id', 'team_name', 'league', 'level', 'club_id')
            ->orderBy('team_name')
            ->get();

        return response()->json(['data' => $rows]);
    }

    public function stadiums(): JsonResponse
    {
        $rows = Stadium::query()
            ->select('stadium_id', 'stadium_name', 'is_dome')
            ->orderBy('stadium_name')
            ->get();

        return response()->json(['data' => $rows]);
    }

    public function clubs(): JsonResponse
    {
        $rows = Club::query()->select('club_id', 'club_name')->orderBy('club_name')->get();
        return response()->json(['data' => $rows]);
    }
}
