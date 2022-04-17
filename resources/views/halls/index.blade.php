@extends('layouts.app')

@section('content')


<div>
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
</div>



<main class="max-w-6xl mx-auto mt-6 space-y-6">
    @if($halls->count())
    <div class="lg:grid lg:grid-cols-12 ml-6">
        @foreach($halls as $hall)
        <x-halls.card :hall="$hall" class="col-span-4" />
        @endforeach
    </div>

    <div class="ml-4">
        {{$halls->links()}}
    </div>

    @else
    <p class="text-center"> No halls available yet ......</p>
    @endif
</main>

@endsection