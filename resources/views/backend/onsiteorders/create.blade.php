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
            @lang('translation.create-order')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.onsite.store') }}">
                        @csrf
                        <div class="row">
                            @if (session('success'))
                                <div class="alert alert-success mt-2 alert-message">{{ session('success') }}</div>
                            @elseif (session('error'))
                                <div class="alert alert-danger mt-2 alert-message">{{ session('error') }}</div>
                            @endif

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.customer_name')</label>
                                    <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                                        name="customer_name" placeholder="@lang('translation.customer-name')"
                                        value="{{ old('customer_name') }}">
                                    @error('customer_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.cake-type')</label>
                                    <select class="form-control @error('veg_nonveg') is-invalid @enderror"
                                        name="veg_nonveg">
                                        <option value="">@lang('translation.select-cake-type')</option>
                                        <option value="veg" {{ old('veg_nonveg') == 'veg' ? 'selected' : '' }}>Veg
                                        </option>
                                        <option value="non-veg" {{ old('veg_nonveg') == 'non-veg' ? 'selected' : '' }}>
                                            Non-Veg</option>
                                    </select>
                                    @error('veg_nonveg')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.select-category')</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror"
                                        name="category_id">
                                        <option selected disabled value="">Choose...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.select-cake')</label>
                                    <select class="form-select @error('cake_id') is-invalid @enderror" name="cake_id">
                                        <option selected disabled value="">Choose...</option>
                                        @foreach ($cakes as $cake)
                                            <option value="{{ $cake->id }}"
                                                {{ old('cake_id') == $cake->id ? 'selected' : '' }}>
                                                {{ $cake->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('cake_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.total_amount')</label>
                                    <input type="text" class="form-control @error('total_amount') is-invalid @enderror"
                                        name="total_amount" placeholder="@lang('translation.total_amount')"
                                        value="{{ old('total_amount') }}">
                                    @error('total_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.phone_no')</label>
                                    <input type="text" class="form-control @error('phone_no') is-invalid @enderror"
                                        name="phone_no" placeholder="@lang('translation.phone_no')" value="{{ old('phone_no') }}">
                                    @error('phone_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.status')</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="">@lang('translation.select-status')</option>
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>pending
                                        </option>
                                        <option value="processing" {{ old('status') == 'processing' ? 'selected' : '' }}>
                                            processing</option>
                                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>
                                            completed</option>
                                        <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>
                                            cancelled</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.no_of_cakes')</label>
                                    <input type="text" class="form-control @error('no_of_cakes') is-invalid @enderror"
                                        name="no_of_cakes" placeholder="@lang('translation.no_of_cakes')"
                                        value="{{ old('no_of_cakes') }}">
                                    @error('no_of_cakes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.customized_name')</label>
                                    <input type="text"
                                        class="form-control @error('customized_text') is-invalid @enderror"
                                        name="customized_text" placeholder="@lang('translation.customized_name')"
                                        value="{{ old('customized_text') }}">
                                    @error('customized_text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.delivery_time')</label>
                                    <input type="time" class="form-control @error('delivery_time') is-invalid @enderror"
                                        name="delivery_time" value="{{ old('delivery_time') }}">
                                    @error('delivery_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.delivery_date')</label>
                                    <input type="date"
                                        class="form-control @error('delivery_date') is-invalid @enderror"
                                        name="delivery_date" value="{{ old('delivery_date') }}">
                                    @error('delivery_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.description')</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                        placeholder="@lang('translation.enter-description')" rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                        </div> <!-- end row -->

                        <div class="text-end pe-3 mb-3">
                            <a href="{{ route('admin.onsite.index') }}" class="btn btn-outline-danger custom-cancel-btn">
                                @lang('translation.cancel')
                            </a>
                            <button type="submit" class="btn btn-secondary w-md">
                                @lang('translation.submit')
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
