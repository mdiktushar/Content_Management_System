<x-admin-master>
    @section('content')
        @if (auth()->user()->userHasRole('Admin'))
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        @endif
    @endsection
</x-admin-master>