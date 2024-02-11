@extends('layout.principal')

@section('title','Cadastro')

@vite(['resources/js/alpine.js'])

@section('content')

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <div>
          @session('message')
          <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Sucesso!</span> {{ $value }}
          </div>
          @endsession
      </div>
    <form class="space-y-6" action="{{ route('register.store') }}" method="POST">
      @csrf
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Usuario</label>
        <div class="mt-2">
          <input id="name" value="{{ old('name') }}" name="name" type="text" placeholder="Usuario" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
            <input id="email" name="email" value="{{ old('email') }}" type="email" placeholder="Email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
              <div class="mt-2">
                  <input id="password" name="password" placeholder="Senha" value="{{ old('password') }}" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
              <div class="mt-2">
                  <input id="password" name="password_confirmation" placeholder="Confimaçao de Senha" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
              @error('password')
                  <span class="mt-2 text-sm text-red-500">
                      {{ $message }}
                  </span>
               @enderror
          </div>

      <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cadastrar</button>
      </div>
    </form>

  </div>
</div>

@endsection