

<x-layouts.guest.application>

    <div class="l-container">
        <section class="section register">
          <div class="register-box">
            <div class="register-header">
              <h1>{{ __("messages.register") }}</h1>
            </div>
  
            <form action="{{ route("register") }}" method="POST" autocomplete="off">
                @csrf

              <div class="row">
                <div class="box-input">
                  <input
                    type="text"
                    id="name"
                    placeholder="{{ __("messages.name") }}"
                    name="name"
                    value="{{ old("name") }}"
                    autofocus
                  />
                </div>
                <div class="box-input-error">
                  @error('name')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>
  
              <div class="row">
                <div class="box-input">
                  <input
                    type="text"
                    id="username"
                    placeholder="{{ __("messages.username") }}"
                    name="username"
                    value="{{ old("username") }}"
                  />
                </div>
                <div class="box-input-error">
                  @error('username')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>
  
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
                <div class="box-input-error">
                  @error('password')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>
  
              <div class="row">
                <div class="box-input">
                  <input
                    type="password"
                    id="password"
                    placeholder="{{ __("messages.password confirmation") }}"
                    name="password_confirmation"
                  />
                </div>
              </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms"/>

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif
  
              <div class="row mt-[2.5rem]">
                <div class="box-submit">
                  <button type="submit">{{ __("messages.register") }}</button>
                </div>
              </div>
  
              <p class="sign-in">
                <span>{{ __("messages.already have an account") }}</span>
                <a href="{{ route("login") }}">
                  <span>{{ __("messages.signin instead") }}</span>
                </a>
              </p>
            </form>
          </div>
        </section>
      </div>

</x-layouts.guest.application>
