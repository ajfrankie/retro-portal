@extends('backend.layouts.master')

@section('title')
    @lang('translation.customized-orders')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('translation.customized-orders')
        @endslot
        @slot('title')
            @lang('translation.view-customized-order')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <!-- Customer Name -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.customer_name')</label>
                            <input type="text" class="form-control" value="{{ $customizedOrder->customer_name }}" readonly>
                        </div>

                        <!-- Phone Number -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.phone_no')</label>
                            <input type="text" class="form-control" value="{{ $customizedOrder->phone_number }}"
                                readonly>
                        </div>

                        <!-- Address -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.address')</label>
                            <input type="text" class="form-control" value="{{ $customizedOrder->address }}" readonly>
                        </div>

                        <!-- District -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.district')</label>
                            <input type="text" class="form-control" value="{{ $customizedOrder->district }}" readonly>
                        </div>

                        <!-- Category -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.select-category')</label>
                            <input type="text" class="form-control" value="{{ $customizedOrder->category->name ?? '-' }}"
                                readonly>
                        </div>

                        <!-- Cake -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.select-cake')</label>
                            <input type="text" class="form-control" value="{{ $customizedOrder->cake->name ?? '-' }}"
                                readonly>
                        </div>

                        <!-- Cake Type -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.cake-type')</label>
                            <input type="text" class="form-control" value="{{ ucfirst($customizedOrder->veg_nonveg) }}"
                                readonly>
                        </div>

                        <!-- Size -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.size')</label>
                            <input type="text" class="form-control" value="{{ ucfirst($customizedOrder->size) }}"
                                readonly>
                        </div>

                        <!-- Number of Cakes -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.no_of_cakes')</label>
                            <input type="number" class="form-control" value="{{ $customizedOrder->no_of_cakes }}" readonly>
                        </div>

                        <!-- Reference Image -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.reference_image')</label><br>
                            @if ($customizedOrder->reference_image)
                                <img src="{{ asset('storage/' . $customizedOrder->reference_image) }}" width="100"
                                    alt="Reference Image">
                            @else
                                <input type="text" class="form-control" value="-" readonly>
                            @endif
                        </div>

                        <!-- Status -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.status')</label>
                            <input type="text" class="form-control" value="{{ ucfirst($customizedOrder->status) }}"
                                readonly>
                        </div>

                        <!-- Delivery Date -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.delivery_date')</label>
                            <input type="text" class="form-control" value="{{ $customizedOrder->delivery_date }}"
                                readonly>
                        </div>

                        <!-- Delivery Time -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.delivery_time')</label>
                            <input type="text" class="form-control" value="{{ $customizedOrder->delivery_time }}"
                                readonly>
                        </div>

                        <!-- Wish -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.wish')</label>
                            <input type="text" class="form-control" value="{{ $customizedOrder->wish }}" readonly>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">@lang('translation.description')</label>
                            <textarea class="form-control" rows="3" readonly>{{ $customizedOrder->description }}</textarea>
                        </div>

                        <!-- Note / Amount -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">@lang('translation.total-amount')</label>
                            <input type="text" class="form-control bg-warning border-2 border-dark fw-bold text-dark"
                                value="{{ $customizedOrder->note }}" readonly>
                        </div>

                    </div>

                    <div class="text-end mt-3">
                        <a href="{{ route('admin.customizedOrder.index') }}" class="btn btn-outline-primary">
                            @lang('translation.back')
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
