@extends('layouts.app')

@section('content')

<main class="max-w-6xl mx-auto mt-6 space-y-6">
    @if($halls->count())
        <div class="lg:grid lg:grid-cols-12 ml-6">
            @foreach($halls as $hall)
                <x-halls.card :hall="$hall" class="col-span-4"/>
            @endforeach
        </div>

{{--        {{$halls->links()}}--}}
    @else
        <p class="text-center"> No halls available yet ......</p>
    @endif
</main>

@endsection


