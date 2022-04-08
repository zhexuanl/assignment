@extends('layouts.app')

@section('content')
    <section class="px-6 py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-6 pb-2 border-b">Manage Bookings</h1>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <p>  {{ auth()->user()->name }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <p>  {{ $booking->hall->name }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <p>  {{ $booking->total_fee }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <p>  {{ $booking->book_date }}</p>
                                            </div>
                                        </div>
                                    </td>


                                    <td class="px-2 py-4 whitespace-nowrap">

                                               <span
                                                   class=" px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold "
                                                   style="font-size: 10px; left: 70%">{{$booking->hall->type}}
                                                </span>

                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/user/bookings/{{ $booking->id }}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-xs text-gray-400">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{$booking->links}}
    </section>
@endsection


