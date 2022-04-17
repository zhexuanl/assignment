@props(['hall'])

<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="bookHallModal-{{$hall->id}}" tabindex="-1" aria-labelledby="bookHallModal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                <h5 class="text-xl  leading-normal text-gray-800" id="exampleModalXlLabel">
                    {{$hall->name}}
                </h5>
                <button type="button" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4">
                <div class="">
                    <p class="text-center">{{$hall->description}}</p>
                </div>

                <div class="flex-row flex">
                    <h5>Fee: RM</h5>
                    <span class="text-info">{{$hall->fee}} </span>
                </div>

                <form method="POST" action="/user/bookHall">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="hall_id" id="hall_id" value="{{$hall->id}}">
                    <input type="hidden" name="total_fee" id="total_fee" value="{{$hall->fee}}">
                    <input class="mt-3 " type="date" name="book_date" id="book_date" class="border" value="{{old('book_date')}}" />
                    @error('book_date')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror

                    <div class="flex justify-center items-center p-8">
                        <button type="submit" class=" w-48 relative bg-purple-500 text-white p-3 rounded-xl text-sm uppercase font-semibold tracking-tight overflow-visible">
                            Book Now
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>