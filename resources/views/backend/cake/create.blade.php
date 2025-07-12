@extends('backend.layouts.master')

@section('title')
    @lang('translation.category')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('translation.cakes')
        @endslot
        @slot('title')
            @lang('translation.create-cake')
        @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{!! route('admin.cake.store') !!}">
                        @csrf
                        <div class="row">
                            @if (session('success'))
                                <div class="alert alert-success mt-2 alert-message">{{ session('success') }}</div>
                            @elseif (session('error'))
                                <div class="alert alert-danger mt-2 alert-message">{{ session('error') }}</div>
                            @endif


                            {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">@lang('translation.name')</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" placeholder="@lang('translation.enter-name')" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="formrow-veg-nonveg" class="form-label">@lang('translation.cake-type')</label>
                                    <select class="form-control @error('veg_nonveg') is-invalid @enderror" name="veg_nonveg"
                                        id="veg_nonveg">
                                        <option value="">@lang('translation.select-cake-type')</option>
                                        <option value="veg" {{ old('veg_nonveg') == 'veg' ? 'selected' : '' }}>Veg
                                        </option>
                                        <option value="non-veg" {{ old('veg_nonveg') == 'non-veg' ? 'selected' : '' }}>
                                            Non-Veg</option>
                                    </select>
                                    @error('veg_nonveg')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.select-category')</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
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

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="availability" class="form-label">@lang('translation.availability')</label>
                                    <select class="form-control @error('availability') is-invalid @enderror"
                                        name="availability" id="availability">
                                        <option value="">@lang('translation.select-availability')</option>
                                        <option value="in-stock" {{ old('availability') == 'in-stock' ? 'selected' : '' }}>
                                            In Stock</option>
                                        <option value="out-of-stock"
                                            {{ old('availability') == 'out-of-stock' ? 'selected' : '' }}>Out of Stock
                                        </option>
                                        <option value="pre-order"
                                            {{ old('availability') == 'pre-order' ? 'selected' : '' }}>Pre-Order</option>
                                    </select>
                                    @error('availability')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="formrow-description-input" class="form-label">@lang('translation.description')</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                        id="formrow-description-input" placeholder="@lang('translation.enter-description')" rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                        </div>

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
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
