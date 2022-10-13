<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        if(Auth::user()->hasRole('admin')){
            $data['data'] = User::orderBy('id','DESC')->paginate(4);
            return view('admin.dashboard',$data);
        }

        elseif(Auth::user()->hasRole('upt_psda_kediri')){
            return 'hello Member';
        }

        elseif(Auth::user()->hasRole('upt_psda_lumajang')){
            return 'Hello Guest';
        }
        elseif(Auth::user()->hasRole('upt_psda_bondowoso')){
            return 'Hello Guest';
        }
        elseif(Auth::user()->hasRole('upt_psda_pasuruan')){
            return 'Hello Guest';
        }
        elseif(Auth::user()->hasRole('upt_psda_bojonegoro')){
            return 'Hello Guest';
        }
        elseif(Auth::user()->hasRole('upt_psda_pamekasan')){
            return 'Hello Guest';
        }

    }

    public function changePassword(){
        return view('profile.password.reset');
    }
}
