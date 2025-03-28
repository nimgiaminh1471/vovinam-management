@extends('layouts.app')

@section('title', $master->full_name)

@section('header')
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $master->full_name }}
        </h2>
    </div>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Master Profile Card -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6 border-b border-gray-200">
                <div class="md:flex">
                    <!-- Avatar Section -->
                    <div class="md:w-1/3 mb-6 md:mb-0 flex flex-col items-center">
                        <div class="w-48 h-48 rounded-full overflow-hidden bg-gray-100 mb-4">
                            @if($master->getFirstMediaUrl())
                                <img src="{{ $master->getFirstMediaUrl() }}" alt="{{ $master->full_name }}" class="w-full h-full object-cover">
                            @else
                                <div class="flex items-center justify-center h-full">
                                    <svg class="w-24 h-24 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        @if($master->rank)
                            <div class="bg-vovinam-primary text-white px-4 py-2 rounded-lg text-center font-semibold">
                                {{ $master->rank->name }}
                            </div>
                        @endif
                    </div>

                    <!-- Master Info Section -->
                    <div class="md:w-2/3 md:pl-8">
                        <h1 class="text-2xl font-bold mb-4">{{ $master->full_name }}</h1>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">Master ID</h3>
                                <p class="text-gray-900">{{ $master->code }}</p>
                            </div>

                            @if($master->dob)
                            <div>
                                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">Date of Birth</h3>
                                <p class="text-gray-900">{{ $master->dob->format('M d, Y') }} ({{ $master->dob->age }} years)</p>
                            </div>
                            @endif

                            @if($master->gender)
                            <div>
                                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">Gender</h3>
                                <p class="text-gray-900">{{ ucfirst($master->gender) }}</p>
                            </div>
                            @endif

                            @if($master->phone)
                            <div>
                                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">Phone</h3>
                                <p class="text-gray-900">{{ $master->phone }}</p>
                            </div>
                            @endif

                            @if($master->email)
                            <div>
                                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">Email</h3>
                                <p class="text-gray-900">{{ $master->email }}</p>
                            </div>
                            @endif
                        </div>

                        @if($master->address)
                        <div class="mb-4">
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">Address</h3>
                            <p class="text-gray-900">{{ $master->address }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-gray-50 border-b border-gray-200">
                <div class="flex overflow-x-auto">
                    <button onclick="showTab('rank-history')" id="rank-history-tab" class="tab-btn px-4 py-3 font-medium text-sm border-b-2 border-vovinam-primary">
                        Rank History
                    </button>
                    <button onclick="showTab('degrees')" id="degrees-tab" class="tab-btn px-4 py-3 font-medium text-sm border-b-2 border-transparent">
                        Certificates & Degrees
                    </button>
                </div>
            </div>

            <!-- Rank History Tab Content -->
            <div id="rank-history-content" class="tab-content p-6">
                @if($master->rankHistories->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Previous Rank
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        New Rank
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Promotion Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Notes
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($master->rankHistories->sortByDesc('promotion_date') as $history)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($history->previousRank)
                                            <span class="px-2 py-1 text-xs bg-gray-100 rounded-md">
                                                {{ $history->previousRank->name }}
                                            </span>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs bg-vovinam-primary text-white rounded-md">
                                            {{ $history->newRank->name }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $history->promotion_date->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $history->notes ?? '-' }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <p>No rank history available</p>
                    </div>
                @endif
            </div>

            <!-- Degrees Tab Content -->
            <div id="degrees-content" class="tab-content p-6 hidden">
                @if($master->degrees->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($master->degrees->sortByDesc('issued_date') as $degree)
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                            <div class="bg-gray-50 px-4 py-2 border-b border-gray-200">
                                <h3 class="font-semibold text-gray-900">{{ $degree->title }}</h3>
                            </div>
                            <div class="p-4">
                                <div class="mb-3">
                                    <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Rank Achieved</h4>
                                    <p class="text-gray-900">
                                        @if($degree->rank)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-vovinam-primary text-white">
                                                {{ $degree->rank->name }}
                                            </span>
                                        @else
                                            {{ $degree->rank }}
                                        @endif
                                    </p>
                                </div>
                                
                                <div class="mb-3">
                                    <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Issued Date</h4>
                                    <p class="text-gray-900">{{ $degree->issued_date->format('M d, Y') }}</p>
                                </div>
                                
                                @if($degree->certificate_number)
                                <div class="mb-3">
                                    <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Certificate Number</h4>
                                    <p class="text-gray-900">{{ $degree->certificate_number }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <p>No certificates or degrees available</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    function showTab(tabName) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        // Show the selected tab content
        document.getElementById(`${tabName}-content`).classList.remove('hidden');
        
        // Update tab button styles
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('border-vovinam-primary');
            btn.classList.add('border-transparent');
        });
        
        document.getElementById(`${tabName}-tab`).classList.remove('border-transparent');
        document.getElementById(`${tabName}-tab`).classList.add('border-vovinam-primary');
    }
</script>
@endsection 