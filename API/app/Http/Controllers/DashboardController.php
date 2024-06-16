<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Movie;
use App\Models\Screening;
use App\Models\Theater;
use App\Models\Ticket;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;



class DashboardController extends Controller
{
    public function index(){

        $recentCustomers = Customer::latest()->limit(5)->get();
        $recentMovies = Movie::latest()->limit(5)->get();
        $recentTheaters = Theater::latest()->limit(5)->get();
        $recentScreenings = Screening::latest()->limit(5)->get();
        $recentTickets = Ticket::latest()->limit(5)->get();

        $data = [
            "customers" => $recentCustomers,
            "movies" => $recentMovies,
            "theaters" => $recentTheaters,
            "screenings" => $recentScreenings,
            "tickets" => $recentTickets
        ];

        return view('dashboard')->with('data',$data);
    }

    public function tokenIndex(){
        $token = Session::get('accessToken');
        return view('token')->with(['accessToken' => $token]);
    }

    public function generateToken(Request $request){

        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $adminToken = $user->createToken('admin-token', ['create','update','delete']);

        return redirect()->route('token')->with(['accessToken' => $adminToken->plainTextToken]);
    }
}
