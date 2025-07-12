@extends('backend.layouts.master')

@section('title')
    @lang('translation.category')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('translation.sizes')
        @endslot
        @slot('title')
            @lang('translation.edit-size')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.size.update', $size->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            @if (session('success'))
                                <div class="alert alert-success mt-2 alert-message">{{ session('success') }}</div>
                            @elseif (session('error'))
                                <div class="alert alert-danger mt-2 alert-message">{{ session('error') }}</div>
                            @endif

                            <!-- Size -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="formrow-size" class="form-label">@lang('translation.size')</label>
                                    <input type="text" class="form-control @error('size') is-invalid @enderror"
                                        name="size" placeholder="@lang('translation.enter-size')"
                                        value="{{ old('size', $size->size) }}">
                                    @error('size')
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
                                                {{ old('category_id', $size->category_id) == $category->id ? 'selected' : '' }}>
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
                                    <select class="form-select @error('cake_id') is-invalid @enderror" name="cake_id">
                                        <option selected disabled value="">Choose...</option>
                                        @foreach ($cakes as $cake)
                                            <option value="{{ $cake->id }}"
                                                {{ old('cake_id', $size->cake_id) == $cake->id ? 'selected' : '' }}>
                                                {{ $cake->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('cake_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Cake Type (Veg/Non-Veg) -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="veg_nonveg" class="form-label">@lang('translation.cake-type')</label>
                                    <select class="form-control @error('veg_nonveg') is-invalid @enderror" name="veg_nonveg"
                                        id="veg_nonveg">
                                        <option value="">@lang('translation.select-cake-type')</option>
                                        <option value="veg"
                                            {{ old('veg_nonveg', $size->veg_nonveg) == 'veg' ? 'selected' : '' }}>Veg
                                        </option>
                                        <option value="non-veg"
                                            {{ old('veg_nonveg', $size->veg_nonveg) == 'non-veg' ? 'selected' : '' }}>
                                            Non-Veg</option>
                                    </select>
                                    @error('veg_nonveg')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="formrow-price" class="form-label">@lang('translation.price')</label>
                                    <input type="number" step="0.01"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        placeholder="@lang('translation.enter-type')" value="{{ old('price', $size->price) }}">
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="text-end pe-3 mb-3">
                            <a href="{{ route('admin.cake.index') }}" class="btn btn-outline-danger custom-cancel-btn">
                                @lang('translation.cancel')
                            </a>
                            <button type="submit" class="btn btn-secondary w-md">
                                @lang('translation.submit')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
