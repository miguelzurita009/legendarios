<section>
    <header>
        <h5 class="mb-2">
            {{ __('Update Password') }}
        </h5>

        <p class="text-muted mb-4">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control"
                autocomplete="current-password" />
            @error('current_password', 'updatePassword')
                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" class="form-control"
                autocomplete="new-password" />
            @error('password', 'updatePassword')
                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="form-control" autocomplete="new-password" />
            @error('password_confirmation', 'updatePassword')
                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-success ms-3 mb-0">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
