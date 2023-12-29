<?php

namespace App\Http\Controllers\Staff;

use App\Enums\KycStatus;
use App\Http\Controllers\Controller;
use App\Models\Common\UserKyc;
use Illuminate\Http\Request;

class KycController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->status;
        $userKyc = UserKyc::with([
            'status' => function ($query) use ($status) {
                $query->where('status', KycStatus::$status());
            },
            'user',
            'assign' => function ($query) {
                $query->where('staff_id', auth()->id());
            }
        ])
            ->whereHas('status', function ($query) use ($status) {
                $query->where('status', KycStatus::$status());
            })
            ->whereHas('assign', function ($query) {
                $query->where('staff_id', auth()->id());
            })
            ->latest()
            ->paginate();


        return view('staff.kyc.index', compact('userKyc', 'status'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
