<x-app-layout title="Users">
    User

    @foreach ($users as $user)
        <h1>{{ $user['name'] }}</h1>
        <p>{{ $user['email'] }}</p>
    @endforeach
    </body>

</x-app-layout>
