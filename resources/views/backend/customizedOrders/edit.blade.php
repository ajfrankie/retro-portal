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
            @lang('translation.edit-customized-order')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.customizedOrder.update', $customizedOrder->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

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
                                        value="{{ old('customer_name', $customizedOrder->customer_name) }}"
                                        placeholder="Enter customer name">
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
                                        value="{{ old('phone_number', $customizedOrder->phone_number) }}"
                                        placeholder="Enter phone number">
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
                                        value="{{ old('address', $customizedOrder->address) }}" placeholder="Enter address">
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
                                        value="{{ old('district', $customizedOrder->district) }}"
                                        placeholder="Enter district">
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
                                                {{ old('category_id', $customizedOrder->category_id) == $category->id ? 'selected' : '' }}>
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
                                                {{ old('cake_id', $customizedOrder->cake_id) == $cake->id ? 'selected' : '' }}>
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
                                        <option value="veg"
                                            {{ old('veg_nonveg', $customizedOrder->veg_nonveg) == 'veg' ? 'selected' : '' }}>
                                            Veg</option>
                                        <option value="non-veg"
                                            {{ old('veg_nonveg', $customizedOrder->veg_nonveg) == 'non-veg' ? 'selected' : '' }}>
                                            Non-Veg</option>
                                    </select>
                                    @error('veg_nonveg')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Size -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.size')</label>
                                    <select class="form-control @error('size') is-invalid @enderror" name="size">
                                        <option value="">@lang('translation.select-cake-size')</option>
                                        <option value="small"
                                            {{ old('size', $customizedOrder->size) == 'small' ? 'selected' : '' }}>Small
                                        </option>
                                        <option value="medium"
                                            {{ old('size', $customizedOrder->size) == 'medium' ? 'selected' : '' }}>Medium
                                        </option>
                                        <option value="large"
                                            {{ old('size', $customizedOrder->size) == 'large' ? 'selected' : '' }}>Large
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
                                        value="{{ old('no_of_cakes', $customizedOrder->no_of_cakes) }}"
                                        placeholder="Enter number of cakes">
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
                                    @if ($customizedOrder->reference_image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $customizedOrder->reference_image) }}"
                                                width="100" alt="Reference Image">
                                        </div>
                                    @endif
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
                                        <option value="pending"
                                            {{ old('status', $customizedOrder->status) == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="processing"
                                            {{ old('status', $customizedOrder->status) == 'processing' ? 'selected' : '' }}>
                                            Processing</option>
                                        <option value="completed"
                                            {{ old('status', $customizedOrder->status) == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                        <option value="cancelled"
                                            {{ old('status', $customizedOrder->status) == 'cancelled' ? 'selected' : '' }}>
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
                                        value="{{ old('delivery_date', $customizedOrder->delivery_date) }}">
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
                                        value="{{ old('delivery_time', $customizedOrder->delivery_time) }}">
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
                                        value="{{ old('wish', $customizedOrder->wish) }}" placeholder="Enter wish text">
                                    @error('wish')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.description')</label>
                                    <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Enter description">{{ old('description', $customizedOrder->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.total-amount')</label>
                                    <input type="text" name="note"
                                        class="form-control @error('note') is-invalid @enderror"
                                        value="{{ old('note') }}" placeholder="Enter Amount">
                                    @error('note')
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
                                @lang('translation.update')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
