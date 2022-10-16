<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Childer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class childersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'utilization' => 'required|string',
            'allcation' => 'required|string',
            'rental_value' => 'required|string',
            'validity_period' => 'required|string',
            'coornate' => 'required|string',
            'description' => 'required|string',
            'large' => 'required|string',
        ]);
        // dd($request->all());

        try {
            $clid = new Childer;
            // application_letter
            $fileletterName = time().'.'.$request->application_letter->extension();
            $path = public_path('ApplicationLetter');
            if(!empty($clid->application_letter) && file_exists($path.'/'.$clid->application_letter)) :
                unlink($path.'/'.$clid->application_letter);
            endif;
            $clid->application_letter = $fileletterName;

            //  agreement_letter
            $fileagreementLetterName = time().'.'.$request->agreement_letter->extension();
            $path = public_path('AgreementLetter');
            if(!empty($clid->agreement_letter) && file_exists($path.'/'.$clid->agreement_letter)) :
                unlink($path.'/'.$clid->agreement_letter);
            endif;
            $clid->agreement_letter = $fileagreementLetterName;

            $clid->utilization = $request->utilization;
            $clid->allcation = $request->allcation;
            $clid->rental_value = $request->rental_value;
            $clid->validity_period = $request->validity_period;
            $clid->coornate = $request->coornate;
            $clid->description = $request->description;
            $clid->large = $request->large;
            $clid->save();

            $request->application_letter->move(public_path('ApplicationLetter'), $fileletterName);
            $request->application_letter->move(public_path('AgreementLetter'), $fileagreementLetterName);

            Alert::success('Success', 'Your data has been successfully created');
            return redirect()->back();

           }catch (\Throwable $e) {
            Alert::error('Error','Failed to created your data',['error' => $e->getMessage()]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
