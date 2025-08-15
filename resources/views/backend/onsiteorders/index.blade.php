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

    @include('backend.onsiteorders.filter')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1"><!--@lang('translation.onsite-orders')--></h5>
                        <a href="{{ route('admin.onsite.create') }}" class="btn btn-primary w-md">
                            <i class="fas fa-plus me-1"></i>
                            @lang('translation.create-cake')
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
                                @foreach ($onsiteOrders as $onsite)
                                    <tr>
                                        <td>{{ $onsite->customer_name ?? 'N/A' }}</td>
                                        <td>{{ $onsite->cake->code ?? 'N/A' }}</td>
                                        <td>{{ $onsite->category->type ?? 'N/A' }}</td> <!-- Corrected this part -->
                                        <td>{{ $onsite->description ?? 'N/A' }}</td>
                                        <td>
                                            @if ($onsite->status == 'pending')
                                                <span class="badge bg-warning">@lang('translation.pending')</span>
                                            @elseif ($onsite->status == 'processing')
                                                <span class="badge bg-info">@lang('translation.processing')</span>
                                            @elseif ($onsite->status == 'completed')
                                                <span class="badge bg-success">@lang('translation.completed')</span>
                                            @elseif ($onsite->status == 'cancelled')
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
                                                        href="{{ route('admin.onsite.edit', $onsite->id) }}">
                                                        <i class="bx bx-edit-alt"></i> @lang('translation.edit')
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
