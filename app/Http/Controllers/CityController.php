<?php

namespace App\Http\Controllers;

use App\City;
use App\Events\NewCity;
use App\Http\Requests\CityStoreRequest;
use App\Jobs\SyncMedia;
use App\Notification\ReviewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CityController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('city.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::all();

        return view('city.index', compact('cities'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, City $city)
    {
        return view('city.show', compact('city'));
    }

    /**
     * @param \App\Http\Requests\CityStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequest $request)
    {
        $city = City::create($request->validated());

        Notification::send($city->user, new ReviewNotification($city));

        SyncMedia::dispatch($city);

        event(new NewCity($city));

        $request->session()->flash('city.title', $city->title);

        return redirect()->route('city.index');
    }
}
