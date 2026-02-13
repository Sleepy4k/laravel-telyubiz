@props([
    'event' => []
])

<a href="{{ route('events.show', $event['slug']) }}" class="group block bg-surface2 dark:bg-surface-950 rounded-xl shadow-md hover:shadow-xl border border-border-300 dark:border-border-700 overflow-hidden transition-all duration-300 hover:-translate-y-1">
    <!-- Event Image -->
    <div class="relative h-52 bg-gradient-to-br from-primary-100 to-warning-100 dark:from-primary-900 dark:to-warning-900 overflow-hidden">
        <img
            src="{{ $event['image'] }}"
            alt="{{ $event['title'] }}"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
        >

        <!-- Event Status Badge -->
        @if($event['is_open'] ?? true)
            <div class="absolute top-3 left-3">
                <x-ui.badge variant="success" size="sm">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Pendaftaran Dibuka
                </x-ui.badge>
            </div>
        @else
            <div class="absolute top-3 left-3">
                <x-ui.badge variant="danger" size="sm">
                    Ditutup
                </x-ui.badge>
            </div>
        @endif

        <!-- Registration Fee -->
        @if($event['registration_fee'] ?? 0 > 0)
            <div class="absolute top-3 right-3">
                <x-ui.badge variant="warning" size="sm">
                    Rp {{ number_format($event['registration_fee'], 0, ',', '.') }}
                </x-ui.badge>
            </div>
        @else
            <div class="absolute top-3 right-3">
                <x-ui.badge variant="success" size="sm">
                    Gratis
                </x-ui.badge>
            </div>
        @endif
    </div>

    <!-- Event Info -->
    <div class="p-5">
        <!-- Event Title -->
        <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-2 line-clamp-2 group-hover:text-primary transition-colors">
            {{ $event['title'] }}
        </h3>

        <!-- Description -->
        <p class="text-sm text-text-600 dark:text-text-400 mb-4 line-clamp-2">
            {{ $event['description'] }}
        </p>

        <!-- Event Details -->
        <div class="space-y-2 mb-4">
            <!-- Date -->
            <div class="flex items-center gap-2 text-sm text-text-700 dark:text-text-300">
                <svg class="w-4 h-4 text-text-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>{{ \Carbon\Carbon::parse($event['start_date'])->format('d M Y') }}</span>
                -
                <span>{{ \Carbon\Carbon::parse($event['end_date'])->format('d M Y') }}</span>
            </div>

            <!-- Location -->
            <div class="flex items-center gap-2 text-sm text-text-700 dark:text-text-300">
                <svg class="w-4 h-4 text-text-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="truncate">{{ $event['location'] }}</span>
            </div>
        </div>

        <!-- Participants & Categories -->
        <div class="flex items-center justify-between pt-4 border-t border-border-300 dark:border-border-700">
            <!-- Participants -->
            <div class="flex items-center gap-2 text-sm">
                <svg class="w-5 h-5 text-text-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="text-text-700 dark:text-text-300">
                    <span class="font-semibold text-primary">{{ $event['registered_participants'] }}</span>
                    <span class="text-text-500 dark:text-text-500">/{{ $event['max_participants'] }}</span>
                </span>
            </div>

            <!-- Categories -->
            <div class="flex gap-1.5">
                @foreach(($event['categories'] ?? []) as $category)
                    @if($loop->index < 2)
                        <x-ui.badge variant="secondary" size="sm">
                            {{ $category }}
                        </x-ui.badge>
                    @endif
                @endforeach
                @if(count($event['categories'] ?? []) > 2)
                    <x-ui.badge variant="secondary" size="sm">
                        +{{ count($event['categories']) - 2 }}
                    </x-ui.badge>
                @endif
            </div>
        </div>
    </div>
</a>
