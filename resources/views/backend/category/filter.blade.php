<div class="row">
    <div class="mt-1 col-12">
        <div class="card accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button fw-medium {{ $request->_token ? '' : 'collapsed' }}" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                        aria-expanded="{{ $request->_token ? 'true' : 'false' }}" aria-controls="collapseTwo">
                        <span style="font-size: 14px;">
                            <i class="fa fa-filter" aria-hidden="true"></i>
                            @lang('translation.filter')
                        </span>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse {{ $request->_token ? 'show' : '' }}"
                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="text-muted">
                            <form method="GET" action="{!! route('admin.category.index') !!}">
                                @csrf
                                <div class="row g-3">
                                    <!-- Country Name -->
                                    
                                    <!-- Country Code -->
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">@lang('translation.type')</label>
                                            <input class="form-control" placeholder="@lang('translation.type')"
                                                value="{{ $request->type }}" type="text" name="type"
                                                id="type" />
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">@lang('translation.name')</label>
                                            <input class="form-control" placeholder="@lang('translation.name')"
                                                value="{{ $request->name }}" type="text" name="name"
                                                id="name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 mt-3 d-flex justify-content-end gap-2">
                                    <button type="submit" id="search"
                                        class="btn btn-secondary  waves-effect waves-light w-md">
                                        @lang('translation.search')
                                    </button>
                                </div>
                            </form>
                            {{-- <!-- @include('city.export') --> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
