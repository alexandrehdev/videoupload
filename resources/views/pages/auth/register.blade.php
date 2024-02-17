@extends('layout.principal')

@section('title','Cadastro')

@vite(['resources/js/alpine.js'])

@section('content')

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-24 w-auto" src="{{ Storage::url('public/images/videoupload.png')  }}" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Cadastro</h2>
  </div>

  <div class="sm:mx-auto sm:w-full sm:max-w-sm lg:w-96">
      <div>
          @session('message')
          <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Sucesso!</span> {{ $value }}
          </div>
          @endsession
      </div>
    <form class="space-y-5" action="{{ route('register.store') }}" method="POST">
      @csrf
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Usuario</label>
        <div class="mt-2">
          <input id="name" value="{{ old('name') }}" name="name" type="text" placeholder="Usuario" autocomplete="off" class="block w-full rounded-md border-1  @error('name') border-red-600 focus:ring-red-600 @enderror py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
        </div>
        @error('name')
          <span class="mt-2 text-sm text-red-500">
              {{ $message }}
          </span>
        @enderror
        
      </div>

      <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
          <div class="mt-2">
            <input id="email" name="email" value="{{ old('email') }}" type="email" placeholder="Email" autocomplete="email" class="block w-full rounded-md border-1 @error('email') border-red-600 focus:ring-red-600 @enderror py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
          </div>
          @error('email')
              <span class="mt-2 text-sm text-red-500">
                  {{ $message }}
              </span>
          @enderror
        </div>

          <div>
              <div class="flex items-center justify-between">
                  <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Senha</label>
                  <div class="text-sm"></div>
              </div>
              <div class="mt-2 relative" x-data="{ open : true , closed : false }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" id="open-eye-p1" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute mt-2" style="left: 90%" x-show='open' @click='open = ! open ; closed = ! closed; document.querySelector("#password").type = "text"'>
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" id="closed-eye-p1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute mt-2 hover:cursor-pointer" style="left: 90%" x-show='closed' @click='open = ! open ; closed = ! closed; document.querySelector("#password").type = "password"'>
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>
                
                  <input id="password" data-popover-target="popover-password" name="password" placeholder="Senha" value="{{ old('password') }}" type="password" autocomplete="off" class="block placeholder:p-6 w-full rounded-md border-1 @error('password') border-red-600 focus:ring-red-600 @enderror py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
              </div>
              @error('password')
                  <span class="mt-2 text-sm text-red-500">
                      {{ $message }}
                  </span>
               @enderror
          </div>

          <div>
              <div class="flex items-center justify-between">
                  <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Confirmar Senha</label>
                  <div class="text-sm"></div>
              </div>
              <div class="mt-2 relative" x-data="{ open : true, closed : false }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" id="open-eye-p2" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute mt-2" style="left: 90%" x-show='open' @click='open = ! open ; closed = ! closed; document.querySelector("#password_confirmation").type = "text"'>
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" id="closed-eye-p2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute mt-2 hover:cursor-pointer" style="left: 90%" x-show='closed' @click='open = ! open ; closed = ! closed; document.querySelector("#password_confirmation").type = "password"'>
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>

                  <input id="password_confirmation" name="password_confirmation" placeholder="Confimaçao de Senha" type="password" autocomplete="current-password" class="block w-full @error('password') border-red-600 focus:ring-red-600 @enderror rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
              </div>
              @error('password')
                  <span class="mt-2 text-sm text-red-500">
                      {{  str_replace("senha","confirmação de senha", $message) }}
                  </span>
               @enderror
          </div>

      <div class="mt-2">
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cadastrar</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      Já tem uma conta? Clique 
      <a href="{{ route('login') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">aqui.</a>
    </p>

  </div>
</div>

<div data-popover id="popover-password" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
  <div class="p-3 space-y-2">
      <h3 class="font-semibold text-gray-900 dark:text-white">Must have at least 6 characters</h3>
      <div class="grid grid-cols-4 gap-2">
          <div class="h-1 bg-orange-300 dark:bg-orange-400"></div>
          <div class="h-1 bg-orange-300 dark:bg-orange-400"></div>
          <div class="h-1 bg-gray-200 dark:bg-gray-600"></div>
          <div class="h-1 bg-gray-200 dark:bg-gray-600"></div>
      </div>
      <p>It’s better to have:</p>
      <ul>
          <li class="flex items-center mb-1">
              <svg class="w-3.5 h-3.5 me-2 text-green-400 dark:text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
              </svg>
              Upper & lower case letters
          </li>
          <li class="flex items-center mb-1">
              <svg class="w-3 h-3 me-2.5 text-gray-300 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
              A symbol (#$&)
          </li>
          <li class="flex items-center">
              <svg class="w-3 h-3 me-2.5 text-gray-300 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
              A longer password (min. 12 chars.)
          </li>
      </ul>
</div>
<div data-popper-arrow></div>

@endsection