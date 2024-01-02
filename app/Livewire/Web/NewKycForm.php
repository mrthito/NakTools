<?php

namespace App\Livewire\Web;

use App\Enums\Gender;
use App\Enums\KycRegistrationType;
use App\Models\Common\City;
use App\Models\Common\Country;
use App\Models\Common\KycDocsCountry;
use App\Models\Common\State;
use App\Models\Common\UserKyc;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewKycForm extends Component
{
    use WithFileUploads;

    public $countries, $avatar;
    public $states = [];
    public $cities = [];

    public $form = [];

    public $kycDocs = [];

    function mount()
    {
        $this->countries = Country::all();
        $this->form['country_id'] = 102;
    }

    public function render()
    {
        if (isset($this->form['country_id']))
            $this->states = State::where('country_id', $this->form['country_id'])->get();
        if (isset($this->form['state_id']))
            $this->cities = City::where('state_id', $this->form['state_id'])->get();
        return view('livewire.web.new-kyc-form', [
            'countries' => $this->countries,
            'states' => $this->states,
            'cities' => $this->cities,
        ]);
    }

    function updatedFormCountryId()
    {
        $this->form['state_id'] = null;
        $this->form['city_id'] = null;
        $this->kycDocs = KycDocsCountry::where('country_id', $this->form['country_id'])
            ->where('state_id', null)
            ->get();
    }

    function updatedFormStateId()
    {
        $this->form['city_id'] = null;
        $kycDocs = KycDocsCountry::where('country_id', $this->form['country_id'])
            ->orWhere('state_id', $this->form['state_id'])
            ->get();
        if ($kycDocs->count() > 0) {
            $this->kycDocs = $kycDocs;
        } else {
            $this->kycDocs = KycDocsCountry::where('country_id', $this->form['country_id'])
                ->where('state_id', null)
                ->get();
        }
    }

    public function submit()
    {

        dd($this->form);
        $this->validate([
            'form' => 'required|array',
            'form.first_name' => 'required|string',
            'form.middle_name' => 'nullable|string',
            'form.last_name' => 'required|string',
            'form.date_of_birth' => 'required|date:Y-m-d|before:today',
            'form.gender' => 'required|in:' . implode(', ', Gender::getValues()),
            'form.email' => 'required|email|unique:user_kycs,email',
            'form.phone_number' => 'required|numeric|unique:user_kycs,phone_number',
            'form.registration_type' => 'required|in:' . implode(', ', KycRegistrationType::getValues()),
            'form.address_line_1' => 'required|string',
            'form.address_line_2' => 'nullable|string',
            'form.city_id' => 'required|exists:cities,id',
            'form.pincode' => 'required|numeric',
        ], [
            'form.first_name.required' => 'First name is required',
            'form.last_name.required' => 'Last name is required',
            'form.date_of_birth.required' => 'Date of birth is required',
            'form.date_of_birth.date' => 'Date of birth must be a valid date',
            'form.date_of_birth.before' => 'Date of birth must be before today',
            'form.gender.required' => 'Choose your Gender',
            'form.gender.in' => 'Invalid gender selected',
            'form.email.required' => 'Email is required',
            'form.email.email' => 'Email must be a valid email',
            'form.email.unique' => 'Email is already taken',
            'form.phone_number.required' => 'Phone number is required',
            'form.phone_number.numeric' => 'Phone number must be a valid number',
            'form.phone_number.unique' => 'Phone number is already taken',
            'form.registration_type.required' => 'Choose your Registration type',
            'form.registration_type.in' => 'Invlid Registration type selected',
            'form.address_line_1.required' => 'Address line 1 is required',
            'form.city_id.required' => 'Choose your City',
            'form.pincode.required' => 'Pincode is required',
            'form.pincode.numeric' => 'Pincode must be a valid number',
        ]);

        $this->form['user_id'] = auth()->id();

        // Save the data
        UserKyc::create($this->form);

        // Redirect to the dashboard
        return redirect()->route('u.dashboard.index')
            ->with('success', 'KYC submitted successfully. We need to verify your KYC details. We will notify you once your KYC is verified.');
    }
}
