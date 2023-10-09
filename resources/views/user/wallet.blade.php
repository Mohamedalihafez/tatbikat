
<x-layouts.front-end.application>

    <main class="min-h-[100vh] px-[3rem]">
        <div class="my-[2rem]">
            <h1 class="md:text-[1.5rem] text-[0.9rem] font-[800] capitalize">{{ __("wallet.charging the wallet via vodafone cash") }}</h1>
        </div>

        <div class="flex lg:flex-row flex-col justify-between">
            <div class="{{ App::getLocale() == "en" ? "lg:mr-[1rem]" : "lg:ml-[1rem]" }}">
                <h3 class="text-[1rem] font-[600] capitalize mb-[0.5rem]">{{ __("wallet.peyment details") }}</h3>
                <h4 class="text-[0.95rem] font-[400] capitalize mb-[0.5rem]">{{ __("wallet.the mobile number to which the amount will be transferred") }}</h4>
                <h2 class="text-[1rem] font-[600] capitalize mb-[0.5rem]">+201011256344</h2>
            </div>

            <div class="mb-[2rem] lg:mb-0">
                <form action="{{ route("users.wallet.store") }}" method="post">
                    @csrf

                    @if (session('status'))
                        <div class="mb-4 mt-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
    
                    <div class="">
                        <p class="text-[1rem] font-[500] text-black">{{ __("wallet.after transferring the amount to the number, enter the following data") }}</p>
                    </div>
    
                    <div class="w-full lg:w-[30rem] flex flex-col my-[1rem]">
                        <div class="flex flex-col mb-[1.4rem]">
                            <label for="user_name" class="text-[.9rem] font-[500] text-slate-500 capitalize mb-[0.3rem]">{{ __("wallet.please enter your name") }}</label>
                            <input value="{{ old("user_name") }}" class="text-[0.9rem] text-[#000000] font-[400] rounded-[0.5rem] border-[0.1rem] border-slate-500" type="text" id="username" name="user_name" placeholder="{{ __("wallet.please enter your name") }}">
                            <div class="mt-[0.1rem]">
                                @error('user_name')
                                    <p class="text-[0.8rem] text-red-700 font-[700]">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
    
                        <div class="flex flex-col mb-[1.4rem]">
                            <label for="message" class="text-[.9rem] font-[500] text-slate-500 capitalize mb-[0.3rem]">{{ __("wallet.please enter your message") }}</label>
                            <textarea name="message" id="message" cols="30" rows="5" placeholder="{{ __("wallet.please enter your message") }}" class="text-[0.9rem] text-[#000000] font-[400] rounded-[0.5rem] border-[0.1rem] border-slate-500">{{ old("message") }}</textarea>
                            <div class="mt-[0.1rem]">
                                @error('message')
                                    <p class="text-[0.8rem] text-red-700 font-[700]">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="flex flex-col mb-[1.4rem]">
                            <label for="converter_number" class="text-[.9rem] font-[500] text-slate-500 capitalize mb-[0.3rem]">{{ __("wallet.the number from which it was converted") }}</label>
                            <input value="{{ old("converter_number") }}" class="text-[0.9rem] text-[#000000] font-[400] rounded-[0.5rem] border-[0.1rem] border-slate-500" type="number" id="converter_number" name="converter_number" placeholder="{{ __("wallet.please enter the number") }}">
                            <div class="mt-[0.1rem]">
                                @error('converter_number')
                                    <p class="text-[0.8rem] text-red-700 font-[700]">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
    
                    <div class="">
                        <button class="text-[1rem] font-[600] uppercase px-[2rem] py-[0.5rem] rounded-md bg-yellow-600 text-[#f1f1f1]" type="submit">{{ __("wallet.send") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

</x-layouts.front-end.application>