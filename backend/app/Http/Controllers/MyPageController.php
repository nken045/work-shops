<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\UserWorkshopDatetime;
use Carbon\CarbonImmutable;
use Auth;

class MyPageController extends Controller
{
    /**
     * 開催ワークショップ
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function myWorkshop(Request $request)
    {
      $status = $request->input('status') ?? config('const.workshop.status.published');
      $workshops = Workshop::fetchList($status, Auth::id(), null, null);
      
      return view('mypage.my-workshop', ['status' => $status, 'workshops' => $workshops]);
    }

    /**
     * 参加ワークショップ
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function joinedWorkshop(Request $request)
    {
      $status = $request->input('status') ?? config('const.workshop.status.published');
      $workshops = Workshop::fetchList($status, Auth::id(), null, null);
      
      return view('mypage.joined-workshop', ['status' => $status, 'workshops' => $workshops]);
    }


}
