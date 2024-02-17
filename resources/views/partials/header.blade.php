

<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
      </a>
      <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="{{ Auth::user() ? route('index') : '' }}" class="block py-2 px-3 {{ Request::route()->getName() == "index" ? "text-blue-600" : "" }} rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
          </li>
          
          <li>
            <a href="{{ route('show') }}" class="block py-2 px-3 {{ Request::route()->getName() == "show" ? "text-blue-600" : "" }} rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Cursos</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 {{ Request::route()->getName() == "ss" ? "text-blue-600" : "" }} rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 {{ Request::route()->getName() == "indddex" ? "text-blue-600" : "" }} rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
          </li>

          <li>
            <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-8 h-7 rounded-full cursor-pointer" src="{{ Storage::url(loggedUser()->profile)  }}" alt="User dropdown">
            <!-- Dropdown menu -->
            <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
              <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                <div>{{ loggedUser()->name }}</div>
                <div class="font-medium truncate"> {{ loggedUser()->email  }} </div>
              </div>
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                {{-- <li>
                  <a href="{{ route('profile.show') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Perfil</a>
                </li> --}}
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Meus Cursos</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Configurações</a>
                </li>
              </ul>
              <div class="py-1">
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button class="block px-4 py-1">
                    <span class="text-red-600 mr-5">Sair</span>
                  </button>
                </form>
               
              </div>
          </div>
        </li>
        </ul>
      </div>
    </div>
  </nav>
  