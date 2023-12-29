<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superadmin\Staff\CreateRequest;
use App\Http\Requests\Superadmin\Staff\UpdateRequest;
use App\Models\Common\Permission;
use App\Models\Common\Role;
use App\Models\Common\Staff;
use App\Models\Common\StaffPermission;
use App\Models\Common\StaffRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::latest()->paginate();
        return view('superadmin.staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $staff = Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make(uniqid()),
        ]);

        $staff->sendEmailVerificationNotification();

        return redirect()->route('superadmin.staffs.index')->with('success', 'Staff created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        $roles = Role::orderBy('name')->get();
        $staffRole = StaffRole::where('staff_id', $staff->id)->first();
        $permissions = Permission::where('role_id', $staffRole?->role_id)->get();
        $staffPermissions = StaffPermission::where('staff_id', $staff->id)->where('role_id', $staffRole?->role_id)->get()->pluck('permission_id')->toArray();
        return view('superadmin.staffs.edit', compact('staff', 'roles', 'staffRole', 'permissions', 'staffPermissions'));
    }

    /**
     * UpdateRequest the specified resource in storage.
     */
    public function update(UpdateRequest $request, Staff $staff)
    {
        if ($staff->isDirty('email')) {
            $staff->email_verified_at = null;
        }
        if ($staff->isDirty('phone')) {
            $staff->phone_verified_at = null;
        }
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->save();

        // Check if staff role is changed
        if($request->role != $staff->staffRole?->role_id) {
            $staff->staffRole?->delete();
            $permissions = $staff->staffPermissions;
            if($permissions) {
                foreach($permissions as $permission) {
                    $permission->delete();
                }
            }
        }

        $staffRole = StaffRole::updateOrCreate(
            ['staff_id' => $staff->id],
            ['role_id' => $request->role]
        );

        if($request->permissions) {
            StaffPermission::where('staff_id', $staff->id)->whereNot('role_id', $request->role)->delete();
            foreach($request->permissions as $permission) {
                StaffPermission::updateOrCreate(
                    ['staff_id' => $staff->id, 'role_id' => $request->role, 'permission_id' => $permission],
                    ['staff_id' => $staff->id, 'role_id' => $request->role, 'permission_id' => $permission]
                );
            }
        }

        return redirect()->back()->with('success', 'Staff updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        //
    }

    /**
     * Impersonate the specified resource from storage.
     */
    public function impersonate(Staff $staff)
    {
        session(['impersonate' => $staff->id]);
        Auth::guard('staff')->loginUsingId($staff->id);
        return redirect()->route('staff.dashboard');
    }

    /**
     * Impersonate the specified resource from storage.
     */
    public function impersonateDestroy()
    {
        Auth::guard('staff')->logout();
        session()->forget('impersonate');
        return redirect()->route('superadmin.staffs.index');
    }
}
