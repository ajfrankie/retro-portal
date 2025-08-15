@extends('backend.layouts.master')

@section('title')
    @lang('translation.category')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('translation.onsite-orders')
        @endslot
        @slot('title')
            @lang('translation.onsite-orders')
        @endslot
    @endcomponent

    @include('backend.customizedOrders.filter')

    <div class="row">
        <div class="col-lg-12">

            @if (session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @elseif (session('error'))
                <div class="alert alert-danger mt-2">{{ session('error') }}</div>
            @endif

            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1"><!--@lang('translation.customized-order')--></h5>
                        <a href="{{ route('admin.customizedOrder.create') }}" class="btn btn-primary w-md">
                            <i class="fas fa-plus me-1"></i>
                            @lang('translation.create')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive"> <!-- Corrected the class name here -->
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
                                @foreach ($customizedOrders as $customizedOrder)
                                    <tr>
                                        <td>{{ $customizedOrder->customer_name ?? 'N/A' }}</td>
                                        <td>{{ $customizedOrder->cake->code ?? 'N/A' }}</td>
                                        <td>{{ $customizedOrder->category->type ?? 'N/A' }}</td> <!-- Corrected this part -->
                                        <td>{{ $customizedOrder->description ?? 'N/A' }}</td>
                                        <td>
                                            @if ($customizedOrder->status == 'pending')
                                                <span class="badge bg-warning">@lang('translation.pending')</span>
                                            @elseif ($customizedOrder->status == 'processing')
                                                <span class="badge bg-info">@lang('translation.processing')</span>
                                            @elseif ($customizedOrder->status == 'completed')
                                                <span class="badge bg-success">@lang('translation.completed')</span>
                                            @elseif ($customizedOrder->status == 'cancelled')
                                                <span class="badge bg-danger">@lang('translation.cancelled')</span>
                                            @else
                                                <span class="badge bg-secondary">@lang('translation.n-a')</span>
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
                                                        href="{{ route('admin.customizedOrder.edit', $customizedOrder->id) }}">
                                                        <i class="bx bx-edit-alt"></i> @lang('translation.edit')
                                                    </a>

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.customizedOrder.show', $customizedOrder->id) }}">
                                                        <i class="bx bx-edit-alt"></i> @lang('translation.show')
                                                    </a>
                                                    {{-- 
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.city.destroy', $city->id) }}">
                                                        <i class="bx bx-bin-alt"></i> @lang('translation.delete')
                                                    </a>  
                                                    --}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
