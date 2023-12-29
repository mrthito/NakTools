<x-app-layout title="Manage {{ $status }} KYC Submittions" for="staff">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>{{ $status }}</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Manage {{ $status }} KYC Submittions</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Manage ' . $status . ' KYC Submittions') }}
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" width="50">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Name</th>
                            <th scope="col" width="100">Gender</th>
                            <th scope="col" width="100">Country</th>
                            <th scope="col" width="150">Reg. Type</th>
                            <th scope="col" width="100">Status</th>
                            <th scope="col" width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($userKyc as $kyc)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $kyc->user->name }}</td>
                                <td>{{ $kyc->name }}</td>
                                <td>
                                    {{ \App\Enums\Gender::getDescription($kyc->gender) }}
                                </td>
                                <td>{{ $kyc->country->name }}</td>
                                <td>
                                    {{ \App\Enums\KycRegistrationType::getDescription($kyc->registration_type) }}
                                </td>
                                <td>
                                    @if ($kyc->status->status == \App\Enums\KycStatus::Pending)
                                        <span class="btn btn-sm btn-outline-warning">Pending</span>
                                    @elseif ($kyc->status->status == \App\Enums\KycStatus::Approved)
                                        <span class="btn btn-sm btn-outline-success">Approved</span>
                                    @elseif ($kyc->status->status == \App\Enums\KycStatus::Rejected)
                                        <span class="btn btn-sm btn-outline-danger">Rejected</span>
                                    @endif
                                <td>
                                    <a href="{{ route('staff.kyc.kyc-docs.show', encrypt($kyc->id)) }}"
                                        class="btn btn-sm btn-primary text-white">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No KYC Data Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
