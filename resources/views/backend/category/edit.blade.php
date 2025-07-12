@extends('backend.layouts.master')

@section('title')
    @lang('translation.edit-category')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('translation.categories')
        @endslot
        @slot('title')
            @lang('translation.edit-category')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Update route with ID -->
                    <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
                        @csrf
                        @method('PUT') <!-- Use PUT for update -->

                        <div class="row">
                            <!-- Name Field -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.name')</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="@lang('translation.enter-name')" value="{{ old('name', $category->name ?? '') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Type Field -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.type')</label>
                                    <input type="text" name="type"
                                        class="form-control @error('type') is-invalid @enderror"
                                        placeholder="@lang('translation.enter-type')" value="{{ old('type', $category->type ?? '') }}">
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Add more fields as needed -->
                        </div>

                        <div class="text-end pe-3 mb-3">
                            <a href="{{ route('admin.category.index') }}" class="btn btn-outline-danger custom-cancel-btn">
                                @lang('translation.cancel')
                            </a>
                            <button type="submit" class="btn btn-secondary w-md">
                                @lang('translation.update')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
