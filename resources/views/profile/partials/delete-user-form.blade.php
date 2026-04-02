<section class="mt-5 pt-5 border-top">
    <header>
        <h5 class="text-danger mb-2">
            {{ __('Delete Account') }}
        </h5>

        <p class="text-muted mb-4">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        {{ __('Delete Account') }}
    </button>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="deleteAccountModalLabel">
                            {{ __('Are you sure you want to delete your account?') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p class="text-muted small">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="mb-3">
                            <label for="password_deletion" class="form-label">{{ __('Password') }}</label>
                            <input id="password_deletion" name="password" type="password"
                                class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                                placeholder="{{ __('Password') }}" required />
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            {{ __('Cancel') }}
                        </button>
                        <button type="submit" class="btn btn-danger">
                            {{ __('Delete Account') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script para re-abrir el modal si hay errores de validación --}}
    @if ($errors->userDeletion->isNotEmpty())
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const modalEl = document.getElementById('confirmUserDeletionModal');
                    if (modalEl && typeof bootstrap !== 'undefined') {
                        const deleteModal = new bootstrap.Modal(modalEl);
                        deleteModal.show();
                    }
                });
            </script>
        @endpush
    @endif
</section>
