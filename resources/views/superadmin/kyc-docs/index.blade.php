<x-app-layout title="Manage Kyc Docs" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>Kyc Docs</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Manage Kyc Docs</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Manage Kyc Docs') }}
                <div class="float-end">
                    <div class="btn-group">
                        <a href="{{ route('superadmin.kyc-docs.create') }}" class="btn btn-sm btn-primary">Add new</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" width="50">#</th>
                            <th scope="col" width="200">Country</th>
                            <th scope="col" width="200">State</th>
                            <th scope="col">Document Name</th>
                            <th scope="col" width="100">Has ID</th>
                            <th scope="col" width="100">Has Name</th>
                            <th scope="col" width="120">Has Exp. Date</th>
                            <th scope="col" width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kycDocs as $kycDoc)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $kycDoc->country->name }} {{ $kycDoc->country->emoji }}</td>
                                <td>{{ $kycDoc->state?->name ?? '-' }}</td>
                                <td>{{ $kycDoc->name }}</td>
                                <td>
                                    {{ \App\Enums\YesOrNoEnum::getDescription($kycDoc->has_id_number) }}
                                </td>
                                <td>
                                    {{ \App\Enums\YesOrNoEnum::getDescription($kycDoc->has_name) }}
                                </td>
                                <td>
                                    {{ \App\Enums\YesOrNoEnum::getDescription($kycDoc->has_expiration_date) }}
                                </td>
                                <td>
                                    <form action="{{ route('superadmin.kyc-docs.destroy', $kycDoc->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('superadmin.kyc-docs.edit', $kycDoc->id) }}"
                                            class="btn btn-sm btn-primary text-white">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger text-white btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
