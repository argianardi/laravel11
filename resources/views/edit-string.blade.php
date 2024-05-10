@extends('app')

@section('content')
    <h1 class="text-2xl mt-10 mx-auto  w-[500px] text-center">Form String</h1>
    <form action="{{ route('edit-action') }}" method="post" class="mt-8  w-[500px] mx-auto">
        @csrf
        <input type="text" name="title" id="title" class="border border-gray-300 w-full" value="{{ $qa['title'] }}">
        <input type="number" id="charLeng" name="charLeng" class="border border-gray-300 block mt-2 w-full"
            value="{{ $qa['charLeng'] }}">
        <button type="submit" class="mt-8 border py-2 px-10 rounded-md bg-slate-200">Submit</button>
    </form>
    </table>
@endsection
