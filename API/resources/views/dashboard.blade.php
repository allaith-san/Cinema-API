<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Recent Customers
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">A List of the last 5 customers added to the database</p>
                        </caption>

                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Customer Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    City
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Zipcode
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['customers'] as $customer)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $customer->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $customer->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $customer->address }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $customer->city }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $customer->zipcode }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Recent Movies
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">A List of the last 5 movies added to the database</p>
                        </caption>

                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Movie Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Genre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Runtime
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Studio
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Lead Actor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Director
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['movies'] as $movie)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $movie->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $movie->genre }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $movie->runtime }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $movie->studio }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $movie->lead_actor }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $movie->director }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Recent Screenings
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">A List of the last 5 Screenings added to the database</p>
                        </caption>

                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Movie ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Showtime
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Location ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Reserved Seats
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Remaining Seats
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['screenings'] as $screening)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        # {{ $screening->movie_id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $screening->showtime }}
                                    </td>
                                    <td class="px-6 py-4">
                                        # {{ $screening->hall_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $screening->reserved_seats }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $screening->remaining_seats }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Recent Tickets
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">A List of the last 5 Tickets added to the database</p>
                        </caption>

                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Customer ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Screening ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cost
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Billed Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Paid Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['tickets'] as $ticket)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        # {{ $ticket->customer_id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        # {{ $ticket->screening_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $ticket->cost }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $ticket->status }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $ticket->billed_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $ticket->paid_date }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Recent Theaters
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">A List of the last 5 Theaters added to the database</p>
                        </caption>

                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Theater Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Location
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['theaters'] as $theater)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        # {{ $theater->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $theater->location }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

</x-app-layout>
