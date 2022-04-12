@props(['hall'])


<div {{$attributes->merge(['class' => 'w-80 mb-4 rounded-2xl border shadow py-12 px-8  transition-colors duration-300
        hover:bg-gray-100
        hover:border-opacity-5'])}}>

    <!-- Header & Price -->

    <div class="">
        <span
            class="relative px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold "
            style="font-size: 10px; left: 70%">{{$hall->type}}
        </span>

        <div>
            <p class="text-3xl text-gray-700 font-semibold"> {{$hall->name}} </p>

        </div>
    </div>


    <!-- Description -->
    <div class="flex-row flex mt-3">
        <h1 class="text-xl text-info text-gray-700 font-semibold mt-1"> {{$hall->fee}} </h1>
        <p class="text-sm pl-1 text-gray-700 font-semibold mt-1"> RM per day </p>
    </div>

    <!-- CTA Button -->
    <button
        type="button"
        class="mt-10 w-full py-3 rounded-xl border border-purple-600 text-purple-600 hover:bg-purple-600 hover:text-gray-50 transition duration-150 ease-in-out"
        data-bs-toggle="modal" data-bs-target="#bookHallModal-{{$hall->id}}"
    >
        Read More
    </button>

  <x-hall-description :hall="$hall" />

</div>




