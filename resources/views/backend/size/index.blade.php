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
            {{-- @lang('translation.category') --}}
        @endslot
    @endcomponent

    @include('backend.category.filter')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1"><!--@lang('translation.category')--></h5>
                        <a href="{{ route('admin.size.create') }}" class="btn btn-primary w-md">
                            <i class="fas fa-plus me-1"></i>
                            @lang('translation.create-category')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table align-middle dt-responsive nowrap w-100 table-check">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">@lang('translation.name')</th>
                                    <th scope="col">@lang('translation.cake')</th>
                                    <th scope="col">@lang('translation.category')</th>
                                    <th scope="col">@lang('translation.price')</th>
                                    <th scope="col">@lang('translation.status')</th>
                                    <th scope="col">@lang('translation.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sizes as $size)
                                    <tr>
                                        <td>{{ $size->size ?? 'N/A' }}</td>
                                        <td>{{ $size->cake->name ?? 'N/A' }}</td>
                                        <td>{{ $size->category->name ?? 'N/A' }}</td>
                                        <td>{{ $size->price ?? 'N/A' }}</td>
                                        <td>
                                            @if ($size->is_activated)
                                                <span class="badge bg-success">@lang('translation.active')</span>
                                            @else
                                                <span class="badge bg-danger">@lang('translation.inactive')</span>
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
                                                        href="{{ route('admin.size.edit', $size->id) }}">
                                                        <i class="bx bx-edit-alt"></i> @lang('translation.edit')
                                                    </a>
                                                    {{-- 
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.city.destroy', $city->id) }}">
                                                        <i class="bx bx-bin-alt"></i> @lang('translation.delete')
                                                    </a>  --}}

                                                    <a href="#status{{ $size->id }}" data-bs-toggle="modal"
                                                        class="dropdown-item btn ">
                                                        @if ($size->is_activated)
                                                            <i class="bx bx-x"></i> @lang('translation.deactivate')
                                                        @else
                                                            <i class="bx bx-check"></i> @lang('translation.activate')
                                                        @endif
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- @include('backend.cities.delete') --}}
                                    @include('backend.size.status')
                                @endforeach
                            </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                    <!-- end table responsive -->
                </div>
                <!-- end card body -->
                <div class="text-end">
                    <ul class="pagination-rounded">
                        {{ $sizes->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
                    </ul>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
