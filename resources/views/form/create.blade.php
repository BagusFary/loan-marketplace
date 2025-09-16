<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Application') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h2 class="text-4xl font-extrabold dark:text-white mb-5">Form Loan Application</h2>

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

                <form action="{{ route('dashboard.form-store') }}" method="POST" class="w-full mx-auto">
                    @csrf
                    <div class="mb-4">
                        <label for="amount" class="block mb-2 text-sm font-medium text-white">Amount</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-300">Rp.</span>
                            <input required type="number" name="amount" id="amount" min="500000" max="50000000"
                                step="1000" placeholder="500000"
                                class="pl-12 block w-full rounded-lg bg-gray-800 border border-gray-600 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>
                        <p class="mt-1 text-xs text-gray-400">Minimal Rp.500.000, maksimal Rp.50.000.000</p>
                    </div>
                    <div class="mb-4">
                        <label for="tenor" class="block mb-2 text-sm font-medium text-white">Tenor</label>
                        <select required id="tenor" name="tenor"
                            class="block w-full rounded-lg bg-gray-800 border border-gray-600 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                            <option value="3">3 Bulan</option>
                            <option value="6">6 Bulan</option>
                            <option value="12">12 Bulan</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="purpose" class="block mb-2 text-sm font-medium text-white">Purpose</label>
                        <textarea required id="purpose" name="purpose" rows="4" placeholder="Tuliskan tujuan peminjaman..."
                            class="block w-full rounded-lg bg-gray-800 border border-gray-600 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 text-sm"></textarea>
                    </div>
                    <button type="submit"
                        class="w-full px-4 mt-5 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg text-sm font-medium transition">
                        Ajukan Pinjaman
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
