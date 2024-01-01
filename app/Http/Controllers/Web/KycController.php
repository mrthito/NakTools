<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Common\UserKyc;
use App\Http\Requests\StoreUserKycRequest;
use App\Http\Requests\UpdateUserKycRequest;

class KycController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userKyc = UserKyc::my()->first();
        if ($userKyc) {
            return view('web.kyc.show', compact('userKyc'));
        }
        return view('web.kyc.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserKycRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserKyc $userKyc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserKyc $userKyc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserKycRequest $request, UserKyc $userKyc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserKyc $userKyc)
    {
        //
    }
}
