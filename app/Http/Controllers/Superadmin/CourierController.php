<?php

namespace App\Http\Controllers\Superadmin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Courier\StoreCourierRequest;
use App\Http\Requests\Courier\UpdateCourierRequest;
use App\Models\Common\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $couriers = Courier::when(($request->has('search') && $request->search != ''), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->get('search') . '%');
        })
            ->when(($request->has('status') && $request->status != ''), function ($query) use ($request) {
                if($request->status == Status::Deleted) {
                    $query->onlyTrashed();
                } else {
                    $query->where('status', $request->status);
                }
            })
            ->orderBy('sort_order')
            ->paginate();
        return view('superadmin.couriers.index', compact('couriers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.couriers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourierRequest $request)
    {
        $courier = new Courier();
        $courier->name = $request->name;
        $courier->code = $request->code;
        $courier->logo = $request->logo->store('couriers', config('filesystems.default'));
        $courier->featured_image = $request->featured_image->store('couriers', config('filesystems.default'));
        $courier->url = $request->url;
        $courier->library_class = $request->library_class;
        $courier->custom_api_available = $request->custom_api_available;
        $courier->status = $request->status;
        $courier->save();

        return redirect()->route('superadmin.couriers.index')->with('success', 'Courier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Courier $courier)
    {
        return view('superadmin.couriers.edit', compact('courier'));
    }

    /**
     * UpdateRequest the specified resource in storage.
     */
    public function update(UpdateCourierRequest $request, Courier $courier)
    {
        $courier->name = $request->name;
        $courier->code = $request->code;
        if($request->hasFile('logo'))
            $courier->logo = $request->logo->store('couriers', config('filesystems.default'));
        if($request->hasFile('featured_image'))
            $courier->featured_image = $request->featured_image->store('couriers', config('filesystems.default'));
        $courier->url = $request->url;
        $courier->library_class = $request->library_class;
        $courier->custom_api_available = $request->custom_api_available;
        $courier->status = $request->status;
        $courier->save();

        return redirect()->route('superadmin.couriers.index')->with('success', 'Courier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($courier)
    {
        $courier = Courier::withTrashed()->findOrFail($courier);
        if($courier->trashed()) {
            $courier->restore();
            $courier->status = Status::Inactive;
        } else {
            $courier->delete();
            $courier->status = Status::Deleted;
        }
        $courier->save();

        return redirect()->route('superadmin.couriers.index')->with('success', 'Courier status updated successfully.');
    }
}
