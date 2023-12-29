<x-app-layout title="Imports/Exports" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">
            <span>Imports/Exports</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Sample Couriers') }}
                    </div>
                    <div class="card-body">
                        <div class="btn-group">
                            <a href="{{ route('superadmin.import-export.sample', ['couriers', 'excel']) }}" class="btn btn-primary">
                                <i class="fas fa-file-excel me-2"></i>
                                Download Excel
                            </a>
                            <a href="{{ route('superadmin.import-export.sample', ['couriers', 'csv']) }}" class="btn btn-success text-white">
                                <i class="fas fa-file-csv me-2"></i>
                                Download CSV
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Sample Plans') }}
                    </div>
                    <div class="card-body">
                        <div class="btn-group">
                            <a href="{{ route('superadmin.import-export.sample', ['plans', 'excel']) }}" class="btn btn-primary">
                                <i class="fas fa-file-excel me-2"></i>
                                Download Excel
                            </a>
                            <a href="{{ route('superadmin.import-export.sample', ['plans', 'csv']) }}" class="btn btn-success text-white">
                                <i class="fas fa-file-csv me-2"></i>
                                Download CSV
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Sample Staffs') }}
                    </div>
                    <div class="card-body">
                        <div class="btn-group">
                            <a href="{{ route('superadmin.import-export.sample', ['staffs', 'excel']) }}" class="btn btn-primary">
                                <i class="fas fa-file-excel me-2"></i>
                                Download Excel
                            </a>
                            <a href="{{ route('superadmin.import-export.sample', ['staffs', 'csv']) }}" class="btn btn-success text-white">
                                <i class="fas fa-file-csv me-2"></i>
                                Download CSV
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Sample Coupons') }}
                    </div>
                    <div class="card-body">
                        <div class="btn-group">
                            <a href="{{ route('superadmin.import-export.sample', ['coupons', 'excel']) }}" class="btn btn-primary">
                                <i class="fas fa-file-excel me-2"></i>
                                Download Excel
                            </a>
                            <a href="{{ route('superadmin.import-export.sample', ['coupons', 'csv']) }}" class="btn btn-success text-white">
                                <i class="fas fa-file-csv me-2"></i>
                                Download CSV
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
