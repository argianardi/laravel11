@extends('app')

@section('content')
    <div class="shadow-md mt-10 sm:rounded-lg w-[600px] mx-auto">
        <a href="{{ route('post-data') }}" class="border py-2 px-10 rounded-md bg-slate-200">Post String</a>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        String
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Leng
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($qa as $a)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $a['title'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $a['charLeng'] }}
                        </td>
                        <td class="px-6 py-4">
                            <a href={{ route('edit-action', ['id' => $a['id']]) }}>Edit</a>
                            <a href="">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
