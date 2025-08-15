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
            @lang('translation.view-order')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success mt-2 alert-message">{{ session('success') }}</div>
                    @elseif (session('error'))
                        <div class="alert alert-danger mt-2 alert-message">{{ session('error') }}</div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">@lang('translation.customer_name')</label>
                            <input type="text" class="form-control" value="{{ $onsite->customer_name }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">@lang('translation.select-category')</label>
                            <select class="form-select" disabled>
                                <option value="">{{ $onsite->category->name ?? '-' }}</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">@lang('translation.cake-type')</label>
                            <select class="form-control" disabled>
                                <option>{{ ucfirst($onsite->veg_nonveg) }}</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">@lang('translation.select-cake')</label>
                            <select class="form-select" disabled>
                                <option>{{ $onsite->cake->name ?? '-' }}</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">@lang('translation.total_amount')</label>
                            <input type="text" class="form-control" value="{{ $onsite->total_amount }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">@lang('translation.phone_no')</label>
                            <input type="text" class="form-control" value="{{ $onsite->phone_number }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">@lang('translation.status')</label>
                            <select class="form-control" disabled>
                                <option>{{ ucfirst($onsite->status) }}</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">@lang('translation.no_of_cakes')</label>
                            <input type="text" class="form-control" value="{{ $onsite->no_of_cakes }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">@lang('translation.customized_name')</label>
                            <input type="text" class="form-control" value="{{ $onsite->customized_text }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">@lang('translation.delivery_time')</label>
                            <input type="time" class="form-control" value="{{ $onsite->delivery_time }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">@lang('translation.delivery_date')</label>
                            <input type="date" class="form-control" value="{{ $onsite->delivery_date }}" readonly>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">@lang('translation.description')</label>
                            <textarea class="form-control" rows="4" readonly>{{ $onsite->description }}</textarea>
                        </div>
                    </div> <!-- end row -->

                    <div class="text-end pe-3 mb-3">
                        <a href="{{ route('admin.onsite.index') }}" class="btn btn-outline-danger">
                            @lang('translation.back')
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
