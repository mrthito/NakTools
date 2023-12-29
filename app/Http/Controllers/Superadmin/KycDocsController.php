<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Common\KycDocsCountry;
use App\Http\Requests\StoreKycDocsCountryRequest;
use App\Http\Requests\UpdateKycDocsCountryRequest;
use App\Models\Common\Country;
use App\Models\Common\State;
use Request;

class KycDocsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // order by country name
        $kycDocs = KycDocsCountry::with([
            'country' => function ($query) {
                $query->orderBy('name');
            }
        ])
            ->get()->sortBy('country.name');

        return view('superadmin.kyc-docs.index', compact('kycDocs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::orderBy('name')->get();
        $states = State::orderBy('name')->where('country_id', old('country_id'))->get();
        return view('superadmin.kyc-docs.create', compact('countries', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKycDocsCountryRequest $request)
    {
        $kycDocsCountry = KycDocsCountry::create($request->validated());
        return redirect()->route('superadmin.kyc-docs.index')->with('success', 'KYC document created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KycDocsCountry $kycDoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KycDocsCountry $kycDoc)
    {
        $countries = Country::orderBy('name')->get();
        $states = State::orderBy('name')->where('country_id', old('country_id', $kycDoc->country_id))->get();
        return view('superadmin.kyc-docs.edit', compact('kycDoc', 'countries', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKycDocsCountryRequest $request, KycDocsCountry $kycDoc)
    {
        $kycDoc->update($request->validated());
        return redirect()->route('superadmin.kyc-docs.index')->with('success', 'KYC document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KycDocsCountry $kycDoc)
    {
        $kycDoc->delete();
        return redirect()->route('superadmin.kyc-docs.index')->with('success', 'KYC document deleted successfully.');
    }

    /**
     * Get states by country id
     */
    public function getStates(Request $request)
    {
        $countryId = $request::get('country_id');
        $states = State::where('country_id', $countryId)->orderBy('name')->get()?->map(function ($state) {
            return [
                'id' => $state->id,
                'name' => $state->name
            ];
        });
        return response()->json([
            'success' => count($states) > 0 ? true : false,
            'states' => $states
        ]);
    }
}
