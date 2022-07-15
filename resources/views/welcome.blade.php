<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        @if (session('message'))
            <span class="text-lg bg-green-500 font-bold">{{ session('message') }}</span>
        @endif
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div>
                            <span class="text-lg font-bold">No packages</span>
                            <form action="{{ route('import.array') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="file" name="file" required>

                                <button>Import</button>
                            </form>
                        </div>

                        <div class="mt-8">
                            <span class="text-lg font-bold">Laravel Excel</span>
                            <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="file" name="file" required>

                                <button>Import</button>
                            </form>
                        </div>

                        <div class="mt-8">
                            <span class="text-lg font-bold">Spatie Simple Excel</span>
                            <form action="{{ route('import.spatie') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="file" name="file" required>

                                <button>Import</button>
                            </form>
                        </div>

                        <hr class="my-8">

                        <div>
                            <a href="{{ route('export.array') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Export using array
                            </a>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('export.excel') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Export using Laravel Excel
                            </a>
                        </div>

                        <div class="mt-4">
                            <a
                                href="{{ route('export.spatie') }}"class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Export using Spatie Simple Excel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
