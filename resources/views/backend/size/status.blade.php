    <div class="modal fade" id="status{{ $size->id }}" tabindex="-1" aria-labelledby="statusLabel" aria-hidden="true">
        <form
            action="{{ $size->is_activated ? route('admin.size.deactivate', $size->id) : route('admin.size.activate', $size->id) }}"
            method="POST">
            @csrf
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body px-2 py-3 text-center">
                        <button type="button" class="btn-close position-absolute end-0 top-0 m-3"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                        <p class="text-muted font-size-16 mb-4">
                            {{ trans('translation.size-' . ($size->is_activated ? 'deactivation' : 'activation') . '-message', ['size' => $size->name]) }}
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <button type="submit" style="width: 100px;"
                                class="btn btn-{{ $size->is_activated ? 'danger' : 'primary' }}">
                                @lang('translation.' . ($size->is_activated ? 'deactivate' : 'activate'))
                            </button>
                            <button type="button" class="btn btn-outline-danger custom-cancel-btn"
                                style="width: 100px;" data-bs-dismiss="modal">
                                @lang('translation.close')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
