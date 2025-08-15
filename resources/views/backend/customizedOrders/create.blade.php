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
            @lang('translation.create-customized-order')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.customizedOrder.store') }}" enctype="multipart/form-data">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success mt-2">{{ session('success') }}</div>
                        @elseif (session('error'))
                            <div class="alert alert-danger mt-2">{{ session('error') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">

                            <!-- Customer Name -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.customer_name')</label>
                                    <input type="text" name="customer_name"
                                        class="form-control @error('customer_name') is-invalid @enderror"
                                        value="{{ old('customer_name') }}" placeholder="Enter customer name">
                                    @error('customer_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.phone_no')</label>
                                    <input type="text" name="phone_number"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        value="{{ old('phone_number') }}" placeholder="Enter phone number">
                                    @error('phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.address')</label>
                                    <input type="text" name="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address') }}" placeholder="Enter address">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- District -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.district')</label>
                                    <input type="text" name="district"
                                        class="form-control @error('district') is-invalid @enderror"
                                        value="{{ old('district') }}" placeholder="Enter district">
                                    @error('district')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Category -->
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

                            <!-- Cake -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.select-cake')</label>
                                    <select name="cake_id" class="form-select @error('cake_id') is-invalid @enderror">
                                        <option selected disabled value="">Choose cake...</option>
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

                            <!-- Cake Type -->
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

                            <!-- Cake Type -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.cake-type')</label>
                                    <select class="form-control @error('size') is-invalid @enderror" name="size">
                                        <option value="">@lang('translation.select-cake-type')</option>
                                        <option value="small" {{ old('size') == 'small' ? 'selected' : '' }}>Small
                                        </option>
                                        <option value="medium" {{ old('size') == 'medium' ? 'selected' : '' }}>Medium
                                        </option>
                                        <option value="large" {{ old('size') == 'large' ? 'selected' : '' }}>Large
                                        </option>
                                    </select>
                                    @error('size')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Number of Cakes -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.no_of_cakes')</label>
                                    <input type="number" name="no_of_cakes"
                                        class="form-control @error('no_of_cakes') is-invalid @enderror"
                                        value="{{ old('no_of_cakes') }}" placeholder="Enter number of cakes">
                                    @error('no_of_cakes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Reference Image -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.reference_image')</label>
                                    <input type="file" name="reference_image"
                                        class="form-control @error('reference_image') is-invalid @enderror">
                                    @error('reference_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.status')</label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                                        <option value="">Select status</option>
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="processing" {{ old('status') == 'processing' ? 'selected' : '' }}>
                                            Processing</option>
                                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                        <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>
                                            Cancelled</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Delivery Date -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.delivery_date')</label>
                                    <input type="date" name="delivery_date"
                                        class="form-control @error('delivery_date') is-invalid @enderror"
                                        value="{{ old('delivery_date') }}">
                                    @error('delivery_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Delivery Time -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.delivery_time')</label>
                                    <input type="time" name="delivery_time"
                                        class="form-control @error('delivery_time') is-invalid @enderror"
                                        value="{{ old('delivery_time') }}">
                                    @error('delivery_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Wish -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.wish')</label>
                                    <input type="text" name="wish"
                                        class="form-control @error('wish') is-invalid @enderror"
                                        value="{{ old('wish') }}" placeholder="Enter wish text">
                                    @error('wish')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            

                            <!-- Note -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.description')</label>
                                    <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Enter description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div> <!-- end row -->

                        <div class="text-end mt-3">
                            <a href="{{ route('admin.customizedOrder.index') }}" class="btn btn-outline-danger">
                                @lang('translation.cancel')
                            </a>
                            <button type="submit" class="btn btn-secondary">
                                @lang('translation.submit')
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
