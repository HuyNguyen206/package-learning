<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('users')->withUsers($users);
    }

    public function getData(){

//       return  auth()->user()->roles->first()->name;
        return DataTables::of(User::with('roles'))
            ->setRowClass(function($user){
                return $user->id % 2 == 0 ? 'alert-success' : 'alert-danger';
            })->setRowId('id')
            ->setRowData([
                'data-name' => function($user){
                return 'row-'.$user->name;
                }
            ])
            ->setRowAttr([
                'align' => 'center'
            ])
            ->addColumn('birthday', function ($user){
//                Carbon::instance(now())->toDa
                return $user->created_at->toFormattedDateString();
            })
            ->addColumn('action','action-column')
            ->editColumn('email', function($user){
                return "Email:{$user->email}";
            })
            ->rawColumns(['action'])
            ->removeColumn('current_using_avatar_id')
            ->removeColumn('email_verified_at')
//            ->addColumn('role', function (User $user){
////                Carbon::instance(now())->toDa
//                return $user->roles->first()->name;
//            })
            ->make(true);
    }
}
