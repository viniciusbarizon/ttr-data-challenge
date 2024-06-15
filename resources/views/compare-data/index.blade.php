<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>
            TTR Data: Challenge
        </title>

        @vite('resources/css/app.css')
    </head>

    <body>
        <div class="container mt-2 mx-auto">
            <form action="{{ route('compare') }}" enctype="multipart/form-data" id="form_compare" method="POST" dusk="form_compare">
                @csrf

                <div class="gap-4 grid grid-cols-2">
                    <div class="grid col-span-2">
                        <h1 class="font-bold text-3xl underline">
                            Compare Recent and Old Data through CSV files
                        </h1>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-500 grid col-span-2 pl-2 text-white">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <label dusk="label_recent_data" for="recent_data">
                            Recent Data
                        </label>
                    </div>

                    <div>
                        <label dusk="label_old_data" for="old_data">
                            Old Data
                        </label>
                    </div>

                    <div>
                        <input accept=".csv" dusk="recent_data" id="recent_data" name="recent_data" type="file" required />
                    </div>

                    <div>
                        <input accept=".csv" dusk="old_data" id="old_data" name="old_data" type="file" required />
                    </div>

                    <div>
                        <input class="bg-blue-700 cursor-pointer dark:bg-blue-600 dark:focus:ring-blue-800
                            dark:hover:bg-blue-700 focus:outline-none font-medium focus:ring-4 focus:ring-blue-300
                            hover:bg-blue-800 mb-2me-2 px-5 py-2.5 rounded-lg text-sm text-white"
                            dusk="submit_compare" type="submit" value="Compare" />
                    </div>
                </div>
            </form>

            @if (session()->has('comparison'))
                <x-table whom="new" />
            @endif
        </div>
    </body>
</html>
