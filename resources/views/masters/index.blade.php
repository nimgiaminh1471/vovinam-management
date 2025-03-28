@extends('layouts.app')

@section('title', 'Masters List')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Vovinam Masters') }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($masters as $master)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="h-40 bg-gray-200 relative">
                                @if($master->getFirstMediaUrl('avatar'))
                                    <img src="{{ $master->getFirstMediaUrl('avatar') }}" alt="{{ $master->full_name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="flex items-center justify-center h-full bg-gray-100">
                                        <svg class="w-20 h-20 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                                        </svg>
                                    </div>
                                @endif
                                
                                @if($master->rank)
                                    <div class="absolute bottom-0 right-0 bg-vovinam-primary text-white px-3 py-1 text-sm font-semibold">
                                        {{ $master->rank->name }}
                                    </div>
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-semibold mb-2">{{ $master->full_name }}</h3>
                                <div class="text-sm text-gray-600 mb-2">
                                    <p><span class="font-medium">ID:</span> {{ $master->code }}</p>
                                    @if($master->dob)
                                        <p><span class="font-medium">Age:</span> {{ $master->dob->age }} years</p>
                                    @endif
                                </div>
                                <a href="{{ route('masters.show', $master->id) }}" class="block mt-4 text-center py-2 px-4 bg-vovinam-primary text-white rounded hover:bg-amber-600 transition-colors duration-300">
                                    View Profile
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full">
                            <p class="text-gray-500 text-center py-8">No masters found</p>
                        </div>
                    @endforelse
                </div>
                
                <div class="mt-6">
                    {{ $masters->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 