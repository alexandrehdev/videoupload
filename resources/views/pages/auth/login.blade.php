@extends('layout.principal')

@section('title','Login')

@section('content')

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm lg:w-96">
        @session('error')
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Falha!</span> {{ $value }}
          </div>
        @endsession

      <form class="space-y-6" action="{{ route('auth') }}" method="POST">
        @csrf
        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
          <div class="mt-2">
            <input id="email" name="email" value="{{ old('email') }}" type="email" autocomplete="off" class="block w-full rounded-md border-1 @error('email') border-red-600 focus:ring-red-600 @enderror  py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
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
            <div class="text-sm">
              <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
            </div>
          </div>
          <div class="mt-2">
            <input id="password" value="{{ old('password') }}"  name="password" type="password" autocomplete="off" class="block w-full rounded-md border-1 @error('password') border-red-600 focus:ring-red-600 @enderror py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
          </div>

          @error('password')
            <span class="mt-2 text-sm text-red-500">
                {{ $message }}
            </span>
          @enderror
        </div>
  
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
        </div>
      </form>
  
      <p class="mt-10 text-center text-sm text-gray-500">
        Não possui uma conta? Clique 
        <a href="{{ route('register.show') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">aqui.</a>
      </p>
    </div>
  </div>

  @endsection