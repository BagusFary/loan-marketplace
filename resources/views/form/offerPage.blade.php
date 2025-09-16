<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Lender and Offer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div id="alert-border-3"
                    class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                    role="alert">
                    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-3" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div id="alert-border-2"
                    class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
                    role="alert">
                    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('error') }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-2" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h2 class="text-2xl font-extrabold dark:text-white mb-5">Your Loan Detail :</h2>


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
                    <div class="w-ful">
                        <div class="flex flex-col">
                            <div class="flex flex-row gap-5">
                                <div class="w-full">
                                    <label for="first_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Amount</label>
                                    <div class="relative">
                                        <span
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-300">Rp.</span>
                                        <input readonly type="number" step="1000" placeholder="500000"
                                            value="{{ $loan->amount }}"
                                            class="pl-12 block w-full rounded-lg bg-gray-800 border border-gray-600 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="first_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Tenor</label>
                                    <input type="text" id="first_name"
                                        class="w-full rounded-lg bg-gray-800 border border-gray-600 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                                        placeholder="John" autocomplete="off" value="{{ $loan->tenor . ' Months' }}"
                                        readonly />
                                </div>
                            </div>

                            <div class="mt-2">
                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    Purpose</label>
                                <textarea id="message" rows="4"
                                    class="w-full rounded-lg bg-gray-800 border border-gray-600 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                                    placeholder="Write your thoughts here..." readonly>{{ $loan->purpose }}"</textarea>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h2 class="text-2xl font-extrabold dark:text-white mb-5">Select Lender and Interest Rate</h2>


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Lender
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tenor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Interest Rate
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($interests as $interest)
                                <tr>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $interest->lender->company_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $interest->tenor . ' Months' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $interest->interest_rate . '%' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" data-modal-target="popup-modal-{{ $interest->id }}" data-modal-toggle="popup-modal-{{ $interest->id }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            Make Offer
                                        </a>

                                        <div id="popup-modal-{{ $interest->id }}" tabindex="-1"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="popup-modal-{{ $interest->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-4 md:p-5 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <h3
                                                            class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                            Make Offer to {{ $interest->lender->company_name . " | " . $interest->tenor . " Months - ". $interest->interest_rate . "%" }}
                                                        </h3>
                                                        <form action="{{ route('dashboard.store-offer') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{ $loan->id }}" name="loan_id">
                                                            <input type="hidden" value="{{ $interest->lender->id }}" name="lender_id">
                                                            <input type="hidden" value="{{ $interest->id }}" name="interest_id">
                                                            <input type="hidden" value="{{ $loan->amount }}" name="amount">
                                                            <input type="hidden" value="{{ $interest->tenor }}" name="tenor">
                                                            <input type="hidden" value="{{ $interest->interest_rate }}" name="interest_rate">
                                                            <button type="submit" data-modal-hide="popup-modal-{{ $interest->id }}" type="button"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                Yes, Make offer
                                                            </button>
                                                            <button data-modal-hide="popup-modal-{{ $interest->id }}" type="button"
                                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                                cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                        No Interests Available
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                    <div class="m-3">
                        {{ $interests->links() }}
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h2 class="text-2xl font-extrabold dark:text-white mb-5">Your Offers</h2>


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Lender
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Interest Rate
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Repayment
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($offers as $offer)
                                <tr>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $offer->lender->company_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $offer->interest->tenor . ' Months - ' . $offer->interest->interest_rate . '%' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ 'Rp ' . number_format($offer->total_repayment, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @switch($offer->status)
                                            @case('pending')
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-900 dark:text-yellow-300">
                                                    {{ $offer->status }}
                                                </span>
                                            @break

                                            @case('accepted')
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">
                                                    {{ $offer->status }}
                                                </span>
                                            @break

                                            @case('rejected')
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
                                                    {{ $offer->status }}
                                                </span>
                                            @break
                                        @endswitch
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                            No Offers Available
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                        <div class="m-3">
                            {{ $offers->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </x-app-layout>
