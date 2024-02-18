@extends('layout.principal')

@section('title','VideoUpload | Perfil')
@include("partials.header")
@vite(['resources/js/alpine.js'])
@section('content')

  <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
    <div class="px-4 pt-8">
      <p class="text-xl font-medium">Avatar</p>
      <p class="text-gray-400">Imagem de perfil.</p>
      
    <div class="align-top">
        <label for="profile_picture" class="p-6">
            <input type="file" class="hidden" id="profile_picture" onchange="document.getElementById('picture').src = window.URL.createObjectURL(this.files[0])">
            <img class="rounded-full h-24 cursor-pointer sm:h-20" src="{{ Storage::url(loggedUser()->profile)  }}" id="picture" alt="image description" style="margin-top: 25px">
        </label>
    </div>

    </div>
    
    <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0" x-data="{ show : $persist(false) }" x-init="if(!document.querySelector('#password').value){ show = false }">
        <div>
          @session('notification')
          <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Sucesso!</span> {{ $value }}
          </div>
          @endsession
      </div>
      <p class="text-xl font-medium">Perfil</p>
      <p class="text-gray-400">Informações Pessoais</p>
      <form action="{{ route('profile.update',['id' => loggedUser()->id ]) }}" method="POST">
        @csrf
        @method("PUT")
      <div class="">
        <label for="name" class="mt-4 mb-2 block text-sm font-medium">Usuario</label>
        <div class="relative">
          <input type="text" id="name" name="name" value="{{ loggedUser()->name }}" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" />
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
            </svg>
          </div>
          @error('name')
          <span class="mt-2 text-sm text-red-500">
              {{ $message }}
          </span>
        @enderror
        </div>
        <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium">Email</label>
        <div class="relative">
          <input type="text" id="card-holder" value="{{ loggedUser()->email }}" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Email" />
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
            </svg>
          </div>
        </div>

        @error('email')
          <span class="mt-2 text-sm text-red-500">
              {{ $message }}
          </span>
        @enderror
        
        <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium">Senha</label>
        <div class="relative">
          <input type="password" id="password" name="password" @input="if( $el.value && $el.value.length > 0){ show = true}else{ show = false }" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Senha" />
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
            </svg>
          </div>
        </div>

        @error('password')
          <span class="mt-2 text-sm text-red-500">
              {{ $message }}
          </span>
        @enderror

        <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium" x-show='show' x-transition>Confirmar Senha (obrigatorio com o campo senha)</label>
        <div class="relative" x-show='show' x-transition>
          <input type="password" id="card-holder" name="password_confirmation" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Confirmar a Senha" />
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
            </svg>
          </div>
        </div>  

        @if (loggedUser()->isAdmin())
        <label for="card-no" class="mt-4 mb-2 block text-sm font-medium">Cargo</label>
        
        <span class="bg-purple-100 text-purple-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">Administrador</span>
        @endif
         
  
        <!-- Total -->
        {{-- <div class="mt-6 border-t border-b py-2">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Uma breve descrição sua..."></textarea>
        </div> --}}
        
      </div>
      <button type="submit" class="mt-4 mb-8 w-full rounded-md bg-teal-500 px-6 py-3 font-medium text-white">Salvar</button>
        </form>
      
    </div>
  </div>
  

@endsection