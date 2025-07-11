    <style>
        .custom-cancel-btn {
            border-radius: 4px;
            /* Subtle rounding */
            padding: 6px 18px;
            /* Balanced size */
            font-weight: 500;
            /* Optional: slightly bolder text */
            border-width: 2px;
            /* Slightly thicker border */
            text-transform: capitalize;
            /* Optional: match font style in image */
        }

        .custom-cancel-btn:hover {
            background-color: rgba(255, 0, 0, 0.06);
            /* Subtle red hover effect */
            color: red;
        }
    </style>

    <div class="modal fade" id="status{{ $category->id }}" tabindex="-1" aria-labelledby="statusLabel" aria-hidden="true">
        <form
            action="{{ $category->is_activated ? route('admin.category.deactivate', $category->id) : route('admin.category.activate', $category->id) }}"
            method="POST">
            @csrf
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body px-2 py-3 text-center">
                        <button type="button" class="btn-close position-absolute end-0 top-0 m-3"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                        <p class="text-muted font-size-16 mb-4">
                            {{ trans('translation.category-' . ($category->is_activated ? 'deactivation' : 'activation') . '-message', ['category' => $category->name]) }}
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <button type="submit" style="width: 100px;"
                                class="btn btn-{{ $category->is_activated ? 'danger' : 'primary' }}">
                                @lang('translation.' . ($category->is_activated ? 'deactivate' : 'activate'))
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
