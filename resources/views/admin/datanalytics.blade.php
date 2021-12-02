<x-admin-layout>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Google Analytics Data
            </h2>
        </div>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container py-12">

        <x-components.table-responsive>

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>

                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            # ID
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Date
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Visitors
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Page Title
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Page Views
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                        $no = 0;
                    @endphp

                    @foreach ($analyticsData as $data)

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ ++$no }}
                                        </div>
                                    </div>

                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">

                                <div class="text-sm text-gray-900">
                                    {{ $data['date'] }}
                                </div>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">

                                <div class="text-sm text-gray-900">
                                    {{ $data['visitors'] }}
                                </div>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">

                                <div class="text-sm text-gray-900">
                                    {{ $data['pageTitle'] }}
                                </div>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">

                                <div class="text-sm text-gray-900">
                                    {{ $data['pageViews'] }}
                                </div>

                            </td>

                        </tr>

                    @endforeach
                    <!-- More people... -->
                </tbody>
            </table>


        </x-components.table-responsive>
    </div>

    {{-- <div class="relative flex justify-center min-h-screen py-4 items-top sm:items-center sm:pt-0">
        <table class="table-auto">
            <thead>
              <tr>
                <th>#</th>
                <th>Date</th>
                <th>Visitors</th>
                <th>Page Title</th>
                <th>Page Views</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
              @foreach ($analyticsData as $data)
              <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $data['date'] }}</td>
                <td>{{ $data['visitors'] }}</td>
                <td>{{ $data['pageTitle'] }}</td>
                <td>{{ $data['pageViews'] }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div> --}}

</x-admin-layout>
