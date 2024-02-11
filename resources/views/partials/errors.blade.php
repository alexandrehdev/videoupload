@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <div role="alert">
              <div class="bg-red-500 z-50 text-white font-bold rounded-t px-4 py-2">
                Danger
              </div>
              <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>{{ $error }}</p>
              </div>
            </div>
            @endforeach
        </ul>
    </div>
@endif
