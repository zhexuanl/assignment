@extends('layouts.app')

@section('content')
<section class="px-6 py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-6 pb-2 border-b">Manage Bookings</h1>
    <x-booking-list :bookings="$bookings" />
</section>
@endsection