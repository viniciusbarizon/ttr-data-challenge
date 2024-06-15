<div >
    <div class="font-bold my-4">
        {{ $title }}
    </div>

    <div class="not-prose relative bg-slate-50 rounded-xl dark:bg-slate-800/25">
        <div class="absolute inset-0 bg-grid-slate-100
            [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25
            dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]"
            style="background-position: 10px 10px;">
        </div>

        <div class="relative rounded-xl overflow-auto">
            <div class="shadow-sm my-8">
                <table class="border-collapse table-auto w-full text-sm">
                    <thead>
                        <tr>
                            @foreach ($filters as $filter)
                                <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400
                                    dark:text-slate-200 text-left"
                                >
                                    {{$filter}}
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody class="bg-white dark:bg-slate-800">
                        @foreach ($data as $values)
                            <tr>
                                @foreach ($values as $key => $value)
                                    @if (is_empty($key) === false)
                                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8
                                            text-slate-500 dark:text-slate-400"
                                        >
                                            {{ $value }}
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach

    {{--                     <tr>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">Malcolm Lockyer</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">1961</td>
                        </tr>

                        <tr>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">Witchy Woman</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">The Eagles</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">1972</td>
                        </tr>

                        <tr>
                            <td class="border-b border-slate-200 dark:border-slate-600 p-4 pl-8 text-slate-500 dark:text-slate-400">Shining Star</td>
                            <td class="border-b border-slate-200 dark:border-slate-600 p-4 text-slate-500 dark:text-slate-400">Earth, Wind, and Fire</td>
                            <td class="border-b border-slate-200 dark:border-slate-600 p-4 pr-8 text-slate-500 dark:text-slate-400">1975</td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>

        <div class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"></div>
    </div>
</div>

