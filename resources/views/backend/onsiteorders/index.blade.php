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
            @lang('translation.onsite-orders')
        @endslot
    @endcomponent

    @include('backend.onsiteorders.filter')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1"><!--@lang('translation.onsite-orders')--></h5>
                        <a href="{{ route('admin.onsite.create') }}" class="btn btn-primary w-md">
                            <i class="fas fa-plus me-1"></i>
                            @lang('translation.create-cake')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table align-middle dt-responsive nowrap w-100 table-check">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">@lang('translation.name')</th>
                                    <th scope="col">@lang('translation.code')</th>
                                    <th scope="col">@lang('translation.category')</th>
                                    <th scope="col">@lang('translation.availability')</th>
                                    <th scope="col">@lang('translation.description')</th>
                                    <th scope="col">@lang('translation.status')</th>
                                    <th scope="col">@lang('translation.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                    <!-- end table responsive -->
                </div>
                <!-- end card body -->
                {{-- <div class="text-end">
                    <ul class="pagination-rounded">
                        {{ $cakes->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
                    </ul>
                </div> --}}
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
