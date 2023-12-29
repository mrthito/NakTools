<?php

namespace App\Http\Controllers\Superadmin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Superadmin\Coupon\CreateRequest;
use App\Http\Requests\Superadmin\Coupon\UpdateRequest;
use App\Models\Common\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $coupons = Coupon::when(($request->has('search') && $request->search != ''), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->get('search') . '%');
        })
            ->when(($request->has('status') && $request->status != ''), function ($query) use ($request) {
                if($request->status == Status::Deleted) {
                    $query->onlyTrashed();
                } else {
                    $query->where('status', $request->status);
                }
            })
            ->latest()
            ->paginate();

        return view('superadmin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $coupon = new Coupon();
        $coupon->code = str()->upper($request->code);
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->description = $request->description;
        $coupon->status = $request->status;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->save();

        return redirect()->route('superadmin.coupons.index')->with('success', 'Coupons created successfully.');
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
        $coupon = Coupon::findOrFail($id);

        return view('superadmin.coupons.edit', compact('coupon'));
    }

    /**
     * UpdateRequest the specified resource in storage.
     */
    public function update(UpdateRequest $request, Coupon $coupon)
    {
        $coupon->code = str()->upper($request->code);
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->description = $request->description;
        $coupon->status = $request->status;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->save();

        return redirect()->route('superadmin.coupons.index')->with('success', 'Coupons updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::withTrashed()->findOrFail($id);
        if($coupon->trashed()) {
            $coupon->restore();
            $coupon->status = Status::Inactive;
        } else {
            $coupon->delete();
            $coupon->status = Status::Deleted;
        }
        $coupon->save();

        return redirect()->route('superadmin.coupons.index')->with('success', 'Coupons status changed successfully.');
    }
}
