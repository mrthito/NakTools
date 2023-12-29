<?php

namespace App\Http\Controllers\Superadmin;

use App\Exports\Sample\Coupon;
use App\Exports\Sample\Courier;
use App\Exports\Sample\Plan;
use App\Exports\Sample\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('superadmin.import-export.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sample($for, $extension)
    {
        if($extension == 'excel') {
            $extension = 'xlsx';
        }else if($extension == 'csv') {
            $extension = 'csv';
        }
        if($for == 'coupons') {
            return Excel::download(new Coupon(), 'coupon-sample.'.$extension);
        }elseif($for == 'couriers') {
            return Excel::download(new Courier(), 'courier-sample.'.$extension);
        }elseif($for == 'plans') {
            return Excel::download(new Plan(), 'plan-sample.'.$extension);
        }elseif($for == 'staffs') {
            return Excel::download(new Staff(), 'staff-sample.'.$extension);
        }else {
            return redirect()->back();
        }
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
     * UpdateRequest the specified resource in storage.
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
