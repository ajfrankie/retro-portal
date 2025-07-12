<div class="row">
    <div class="mt-1 col-12">
        <div class="card accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button fw-medium {{ $request->all() ? '' : 'collapsed' }}" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                        aria-expanded="{{ $request->all() ? 'true' : 'false' }}" aria-controls="collapseTwo">
                        <span style="font-size: 14px;">
                            <i class="fa fa-filter" aria-hidden="true"></i>
                            @lang('translation.filter')
                        </span>
                    </button>
                </h2>

                <div id="collapseTwo" class="accordion-collapse collapse {{ $request->all() ? 'show' : '' }}"
                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="text-muted">
                            <form method="GET" action="{{ route('admin.cake.index') }}">
                                <div class="row g-3">

                                    {{-- Type Filter --}}
                                    <div class="col-lg-3 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">@lang('translation.type')</label>
                                            <input class="form-control" placeholder="@lang('translation.type')"
                                                value="{{ $request->type }}" type="text" name="type"
                                                id="type" />
                                        </div>
                                    </div>

                                    {{-- Name Filter --}}
                                    <div class="col-lg-3 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">@lang('translation.name')</label>
                                            <input class="form-control" placeholder="@lang('translation.name')"
                                                value="{{ $request->name }}" type="text" name="name"
                                                id="name" />
                                        </div>
                                    </div>

                                    {{-- Veg/Non-Veg Dropdown --}}
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="veg_nonveg" class="form-label">@lang('translation.cake-type')</label>
                                            <select class="form-control" name="veg_nonveg" id="veg_nonveg">
                                                <option value="">@lang('translation.select-cake-type')</option>
                                                <option value="veg"
                                                    {{ $request->veg_nonveg == 'veg' ? 'selected' : '' }}>Veg</option>
                                                <option value="non-veg"
                                                    {{ $request->veg_nonveg == 'non-veg' ? 'selected' : '' }}>Non-Veg
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Availability Dropdown --}}
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="availability" class="form-label">@lang('translation.availability')</label>
                                            <select class="form-control" name="availability" id="availability">
                                                <option value="">@lang('translation.select-availability')</option>
                                                <option value="in-stock"
                                                    {{ $request->availability == 'in-stock' ? 'selected' : '' }}>In
                                                    Stock</option>
                                                <option value="out-of-stock"
                                                    {{ $request->availability == 'out-of-stock' ? 'selected' : '' }}>Out
                                                    of Stock</option>
                                                <option value="pre-order"
                                                    {{ $request->availability == 'pre-order' ? 'selected' : '' }}>
                                                    Pre-Order</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 mt-3 d-flex justify-content-end gap-2">
                                    <button type="submit" class="btn btn-secondary waves-effect waves-light w-md">
                                        @lang('translation.search')
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
