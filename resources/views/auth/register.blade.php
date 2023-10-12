<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

         <!-- Username -->
         <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>
        
        <!-- Fullname -->
        <div class="mt-4">
            <x-input-label for="fullname" :value="__('Fullname')" />
            <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required autocomplete="name" />
            <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

         <!-- Password -->
         <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

         <!-- Confirm Password -->
         <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

          <!-- Alamat -->
          <div class="mt-4">
            <x-input-label for="address" :value="__('Alamat')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Tanggal Lahir -->
        <div class="mt-4">
            <x-input-label for="birthdate" :value="__('Tanggal Lahir')" />
            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required />
            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
        </div>

         <!-- No Telepon -->
         <div class="mt-4">
            <x-input-label for="phone" :value="__('No Telepon')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- agama -->
        <div class="mt-4">
            <x-input-label for="agama" :value="__('Agama')" />

            <x-text-input id="agama" class="block mt-1 w-full"
                            type="agama"
                            name="agama"
                            required autocomplete="new-agama" />

            <x-input-error :messages="$errors->get('agama')" class="mt-2" />
        </div>
        {{-- Iqbaal Hibatulloh - 6706220110 --}}
        <!-- jenisKelamin -->
        <div class="mt-4">
            <x-input-label for="jenisKelamin" :value="__('Jenis')" />

            <div class="form-check"style= "color:white;">
                <input class="form-check-input" type="radio" name="jenisKelamin" id="flexRadioDefault1" value="1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Pria
                </label>
            </div>
            <div class="form-check" style= "color:white;">
                <input class="form-check-input" type="radio" name="jenisKelamin" id="flexRadioDefault2" value="0" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                   Wanita
                </label>
            </div>

            {{-- <x-text-input id="jenisKelamin" class="block mt-1 w-full"
                            type="jenisKelamin"
                            name="jenisKelamin"
                            required autocomplete="new-jenisKelamin" /> --}}


            {{-- <select class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="jenisKelamin" id="jenisKelamin">
                <option value="0">
                    Wanita
                </option>
                <option value="1">
                    Pria
                </option>
            </select> --}}
            <x-input-error :messages="$errors->get('jenisKelamin')" class="mt-2" />
        </div>


        <!-- role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <div class="form-check"style= "color:white;">
                <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="admin">
                <label class="form-check-label" for="flexRadioDefault1">
                    Admin
                </label>
            </div>
            <div class="form-check" style= "color:white;">
                <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="user" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                   User
                </label>
            </div>
            <!-- <x-text-input id="role" class="block mt-1 w-full" type="teks" name="role" :value="old('role')" required autocomplete="role" />
            <x-input-error :messages="$errors->get('role')" class="mt-2" /> -->
        </div>       

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
