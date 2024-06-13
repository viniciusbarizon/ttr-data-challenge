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
            <form enctype="multipart/form-data" method="post" dusk="form_compare">
                <div class="gap-4 grid grid-cols-2">
                    <div class="grid col-span-2">
                        <h1 class="font-bold text-3xl underline">
                            Compare old and new Data through CSV files
                        </h1>
                    </div>

                    <div>
                        <label dusk="label_old_data" for="old_data">
                            Old Data
                        </label>
                    </div>

                    <div>
                        <label dusk="label_new_data" for="new_data">
                            New Data
                        </label>
                    </div>

                    <div>
                        <input accept=".csv" dusk="old_data" id="old_data" name="old_data" type="file" />
                    </div>

                    <div>
                        <input accept=".csv" dusk="new_data" id="new_data" name="new_data" type="file" />
                    </div>

                    <div>
                        <input class="bg-blue-700 cursor-pointer dark:bg-blue-600 dark:focus:ring-blue-800
                            dark:hover:bg-blue-700 focus:outline-none font-medium focus:ring-4 focus:ring-blue-300
                            hover:bg-blue-800 mb-2me-2 px-5 py-2.5 rounded-lg text-sm text-white"
                            dusk="submit_compare" type="submit" value="Compare" />
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
