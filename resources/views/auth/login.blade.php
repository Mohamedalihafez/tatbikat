

<x-layouts.guest.application>

  <div class="l-container">
      <section class="section register">
        @if (session('status'))
          <div class="mb-4 mt-4 font-medium text-sm text-green-600">
              {{ session('status') }}
          </div>
        @endif

        <div class="register-box">
          <div class="register-header">
            <h1>{{ __("messages.welcome back") }}</h1>
          </div>

          <form action="{{ route("login") }}" method="POST" autocomplete="off">
            @csrf

            <div class="row">
              <div class="box-input">
                <input
                  type="text"
                  id="email"
                  placeholder="{{ __("messages.email") }}"
                  name="email"
                  value="{{ old("email") }}"
                />
              </div>
              <div class="box-input-error">
                @error('email')
                <p>{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="box-input">
                <input
                  type="password"
                  id="password"
                  placeholder="{{ __("messages.password") }}"
                  name="password"
                />
              </div>
            </div>

            <div class="row mt-[1rem]">
              <div class="flex items-center justify-end">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-black hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('messages.Forgot your password') }}
                    </a>
                @endif
              </div>
            </div>

            <div class="row mt-[1.5rem]">
              <div class="box-submit">
                <button type="submit">{{ __("messages.login") }}</button>
              </div>
            </div>

            <div class="w-full my-[2rem] flex justify-center">
              <div class="w-auto">
                <a href="{{ route("auth.google") }}" class="bg-red-600 text-[0.95rem] text-white font-[500] capitalize px-[3rem] py-[0.7rem] rounded-full">
                  <i class="fa-brands fa-google mr-[0.5rem]"></i>
                  login with google
                </a>
              </div>
            </div>

            <p class="sign-in">
              <span>{{ __("messages.haven't an account") }}</span>
              <a href="{{ route("register") }}">
                <span>{{ __("messages.signin") }}</span>
              </a>
            </p>
          </form>
        </div>
      </section>
  </div>

</x-layouts.guest.application>
