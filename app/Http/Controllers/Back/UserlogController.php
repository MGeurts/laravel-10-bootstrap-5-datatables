<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Userlog;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UserlogController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('developer'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userlogs_by_date = Userlog::with('user')
            ->where('created_at', '>=', carbon::now()->subMonths(3))
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('date');

        return view('back.userslog.index', compact('userlogs_by_date'));
    }

    public function stats()
    {
        abort_if(Gate::denies('developer'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userstats = Userlog::select('country_name', DB::raw('count(*) as users'))
            ->whereNotNull('country_name')
            ->where('country_code', '!=', 'BE')
            ->groupBy('country_name')
            ->get();

        $records = $data = [];

        foreach ($userstats as $userstat) {
            $records['label'][] = $userstat->country_name;
            $records['data'][] = $userstat->users;
        }

        $data['chart_data'] = json_encode($records);

        return view('back.userslog.stats', $data);
    }
}
