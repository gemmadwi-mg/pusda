<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class DashboardController extends Controller
{
    public function index()
    {

        if(Auth::user()->hasRole('admin')){
            $data['data'] = User::orderBy('id','DESC')->paginate(4);
            return view('admin.dashboard',$data);
        }

        elseif(Auth::user()->hasRole('upt_psda_kediri')){
           return view('upt.dashboard');
        }

        elseif(Auth::user()->hasRole('upt_psda_lumajang')){
            return view('upt.dashboard');
        }
        elseif(Auth::user()->hasRole('upt_psda_bondowoso')){
            return view('upt.dashboard');
        }
        elseif(Auth::user()->hasRole('upt_psda_pasuruan')){
            return view('upt.dashboard');
        }
        elseif(Auth::user()->hasRole('upt_psda_bojonegoro')){
            return view('upt.dashboard');
        }
        elseif(Auth::user()->hasRole('upt_psda_pamekasan')){
            return view('upt.dashboard');
        }

    }

    public function changePassword(){
        return view('profile.password.reset');
    }
    public function changePasswordPost(Request $request)
    {

       $request->validate([
            'current_passsowrd' => 'required',
            'password' => 'required|min:8|confirmed|different:current_passsowrd',
        ]);

       try {
        if(Hash::check($request->current_passsowrd,Auth::user()->password))
            {
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->password);
                $user->save();
                Alert::success('Success', 'Password has been changed successfully,Please Logout and test your new password!');
                return redirect()->route('dashboard');
            }
       } catch (\Throwable $e) {
        Alert::error('Error','Failed to update your password',['error' => $e->getMessage()]);
      }  return redirect()->back();

    }

    public function vieUpload($id)
    {
        $user = User::where('slug', $id)->first();
        return view('profile.upload',compact('user'));
    }
    public function vieUploadPost(Request $request,$id)
    {
        // $this->validate($request,
        // [
        //     'photo' => 'required | mimes:jpeg,jpg,png | max:1000',
        // ]);

        try {
            $user = User::find($id);
            $imageName = time().'.'.$request->photo->extension();

            $path = public_path('photos');

            if(!empty($user->photo) && file_exists($path.'/'.$user->photo)) :
                unlink($path.'/'.$user->photo);
            endif;

            $user->photo = $imageName;
            $user->save();

            $request->photo->move(public_path('photos'), $imageName);
            Alert::success('Success', 'Uploaded Successfully!');
            return redirect()->route('profil.index');

        } catch(\Throwable $e){
            Alert::error('Error','Failed to upload your photo',['error' => $e->getMessage()]);
        }

    }
}
