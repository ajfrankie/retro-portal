@extends('backend.layouts.master')

@section('title')
    @lang('translation.category')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('translation.cake')
        @endslot
        @slot('title')
            @lang('translation.cake')
        @endslot
    @endcomponent

    @include('backend.cake.filter')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1"><!--@lang('translation.cakes')--></h5>
                        <a href="{{ route('admin.cake.create') }}" class="btn btn-primary w-md">
                            <i class="fas fa-plus me-1"></i>
                            @lang('translation.create-cake')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle dt-responsive nowrap w-100 table-check">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">@lang('translation.name')</th>
                                    <th scope="col">@lang('translation.code')</th>
                                    <th scope="col">@lang('translation.category')</th>
                                    <th scope="col">@lang('translation.availability')</th>
                                    <th scope="col">@lang('translation.description')</th>
                                    <th scope="col">@lang('translation.status')</th>
                                    <th scope="col">@lang('translation.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cakes as $cake)
                                    <tr>
                                        <td>{{ $cake->name ?? 'N/A' }}</td>
                                        <td>{{ $cake->code ?? 'N/A' }}</td>
                                        <td>{{ $cake->category->name ?? 'N/A' }}</td>
                                        <td>
                                            @php
                                                $status = $cake->availability ?? 'N/A';
                                                $class = match ($status) {
                                                    'in-stock' => 'badge bg-success',
                                                    'out-of-stock' => 'badge bg-danger',
                                                    'pre-order' => 'badge bg-warning text-dark',
                                                    default => 'badge bg-secondary',
                                                };
                                            @endphp
                                            <span class="{{ $class }}">
                                                {{ ucfirst(str_replace('-', ' ', $status)) }}
                                            </span>
                                        </td>
                                        <td>{{ $cake->description ?? 'N/A' }}</td>
                                        <td>
                                            @if ($cake->is_activated)
                                                <span class="badge bg-success">@lang('translation.active')</span>
                                            @else
                                                <span class="badge bg-danger">@lang('translation.inactive')</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group text-nowrap" role="group">
                                                <button class="btn btn-soft-secondary btn-sm dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded fs-5" style="color:#898787"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.cake.edit', $cake->id) }}">
                                                        <i class="bx bx-edit-alt"></i> @lang('translation.edit')
                                                    </a>
                                                    {{-- 
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.city.destroy', $city->id) }}">
                                                        <i class="bx bx-bin-alt"></i> @lang('translation.delete')
                                                    </a>  --}}

                                                    <a href="#status{{ $cake->id }}" data-bs-toggle="modal"
                                                        class="dropdown-item btn ">
                                                        @if ($cake->is_activated)
                                                            <i class="bx bx-x"></i> @lang('translation.deactivate')
                                                        @else
                                                            <i class="bx bx-check"></i> @lang('translation.activate')
                                                        @endif
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- @include('backend.cities.delete') --}}
                                    @include('backend.cake.status')
                                @endforeach
                            </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                    <!-- end table responsive -->
                </div>
                <!-- end card body -->
                <div class="text-end">
                    <ul class="pagination-rounded">
                        {{ $cakes->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
                    </ul>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
