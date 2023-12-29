<?php

namespace App\Http\Controllers\Superadmin;

use App\Enums\PlanStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Superadmin\Plan\CreateRequest;
use App\Http\Requests\Superadmin\Plan\UpdateRequest;
use App\Models\Common\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $plans = Plan::when($request->status, function ($query) use ($request) {
                if($request->status == PlanStatus::Deleted) {
                    $query->onlyTrashed();
                } else {
                    $query->where('status', $request->status);
                }
            })
            ->orderBy('name')->paginate();
        return view('superadmin.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        Plan::create([
            'name' => $request->name,
            'description' => $request->description,
            'interval' => $request->interval,
            'interval_type' => $request->interval_type,
            'trial_period_days' => $request->trial_period_days,
            'featured' => $request->featured_plan ?? 0,
            'free' => $request->free_plan ?? 0,
            'status' => $request->status,
            'deleted_at' => $request->status == PlanStatus::Deleted ? now() : null,
        ]);

        return redirect()->route('superadmin.plans.index')->with('success', 'Plan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        $plan->load('features');
        return view('superadmin.plans.edit', compact('plan'));
    }

    /**
     * UpdateRequest the specified resource in storage.
     */
    public function update(UpdateRequest $request, Plan $plan)
    {
        $plan->update([
            'name' => $request->name,
            'description' => $request->description,
            'interval' => $request->interval,
            'interval_type' => $request->interval_type,
            'trial_period_days' => $request->trial_period_days,
            'featured' => $request->featured_plan ?? 0,
            'free' => $request->free_plan ?? 0,
            'status' => $request->status,
        ]);

        if($request->status == PlanStatus::Deleted) {
            $plan->delete();
        } else {
            $plan->restore();
        }

        return redirect()->route('superadmin.plans.edit', $plan)->with('success', 'Plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($plan)
    {
        $plan = Plan::withTrashed()->findOrFail($plan);
        if($plan->trashed()) {
            $plan->restore();
            $plan->status = PlanStatus::Inactive;
        } else {
            $plan->delete();
            $plan->status = PlanStatus::Deleted;
        }
        $plan->save();

        return redirect()->route('superadmin.plans.index')->with('success', 'Plan deleted successfully.');
    }

    /**
     * UpdateRequest the features of the specified resource in storage.
     */
    public function features(Request $request, Plan $plan)
    {
        if($request->has('feature_name')) {
            $plan->features()->delete();
            foreach($request->feature_name as $feature) {
                if($feature) {
                    $plan->features()->create([
                        'feature' => $feature
                    ]);
                }
            }
        }
        return redirect()->route('superadmin.plans.edit', $plan)->with('success', 'Plan features updated successfully.');
    }
}
