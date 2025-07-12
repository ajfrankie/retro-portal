@extends('backend.layouts.master')

@section('title')
    @lang('translation.category')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('translation.category')
        @endslot
        @slot('title')
            @lang('translation.create-category')
        @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{!! route('admin.category.store') !!}">
                        @csrf
                        <div class="row">

                            <div class="col-md-4">
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

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">@lang('translation.type')</label>
                                    <input type="text" class="form-control @error('type') is-invalid @enderror"
                                        name="type" placeholder="@lang('translation.enter-type')" value="{{ old('type') }}">
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                           
                        </div>

                        <div class="text-end pe-3 mb-3">
                            <a href="{{ route('admin.category.index') }}" class="btn btn-outline-danger custom-cancel-btn">
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
