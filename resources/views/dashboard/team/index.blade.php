@extends('layouts.dashboard')

@section('page-title', 'Tim & Anggota')

@php
// Dummy team members
$teamMembers = [
    [
        'id' => '01JKHTM01',
        'user' => [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'avatar' => 'https://ui-avatars.com/api/?name=Budi+Santoso&background=D61F2C&color=fff',
        ],
        'role' => 'owner',
        'business' => ['name' => 'Warung Makan Bu Siti'],
        'status' => 'active',
        'joined_at' => '2023-08-15',
    ],
    [
        'id' => '01JKHTM02',
        'user' => [
            'name' => 'Dewi Lestari',
            'email' => 'dewi@example.com',
            'avatar' => 'https://ui-avatars.com/api/?name=Dewi+Lestari&background=22C55E&color=fff',
        ],
        'role' => 'admin',
        'business' => ['name' => 'Warung Makan Bu Siti'],
        'status' => 'active',
        'joined_at' => '2023-09-20',
    ],
    [
        'id' => '01JKHTM03',
        'user' => [
            'name' => 'Ahmad Fauzi',
            'email' => 'ahmad@example.com',
            'avatar' => 'https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=F59E0B&color=fff',
        ],
        'role' => 'moderator',
        'business' => ['name' => 'Warung Makan Bu Siti'],
        'status' => 'active',
        'joined_at' => '2023-10-10',
    ],
];

// Pending invitations
$pendingInvitations = [
    [
        'id' => '01JKHTM04',
        'email' => 'siti@example.com',
        'role' => 'moderator',
        'business' => ['name' => 'Warung Makan Bu Siti'],
        'invited_at' => '2024-02-10',
    ],
];

$roleLabels = [
    'owner' => 'Pemilik',
    'admin' => 'Admin',
    'moderator' => 'Moderator',
];

$roleColors = [
    'owner' => 'primary',
    'admin' => 'success',
    'moderator' => 'secondary',
];
@endphp

@section('content')
<!-- Header -->
<div class="mb-6">
    <p class="text-text-600 dark:text-text-400">Kelola tim dan hak akses untuk toko Anda</p>
</div>

<!-- Invite Member -->
<div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-6 mb-6">
    <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Undang Anggota Tim</h3>

    <form class="space-y-4">
        <div class="grid md:grid-cols-3 gap-4">
            <x-forms.select label="Toko" name="business_id" required>
                <option value="">Pilih Toko</option>
                <option value="1">Warung Makan Bu Siti</option>
                <option value="2">Craft Corner</option>
            </x-forms.select>

            <x-forms.input
                label="Email"
                name="email"
                type="email"
                placeholder="email@example.com"
                required
            />

            <x-forms.select label="Role" name="role" required>
                <option value="">Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="moderator">Moderator</option>
            </x-forms.select>
        </div>

        <div class="bg-primary-50 dark:bg-primary-950 border border-primary-200 dark:border-primary-800 rounded-lg p-4">
            <h4 class="font-medium text-primary-900 dark:text-primary-100 mb-2">Hak Akses:</h4>
            <ul class="text-sm text-primary-800 dark:text-primary-200 space-y-1">
                <li><strong>Admin:</strong> Dapat mengelola produk, pesanan, dan melihat laporan</li>
                <li><strong>Moderator:</strong> Dapat mengelola produk dan melihat pesanan (tidak dapat menghapus)</li>
            </ul>
        </div>

        <div class="flex justify-end">
            <x-ui.button type="submit" variant="primary" size="md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Kirim Undangan
            </x-ui.button>
        </div>
    </form>
</div>

<!-- Active Members -->
<div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-border-300 dark:border-border-700">
        <h3 class="text-lg font-semibold text-text-900 dark:text-text-100">Anggota Aktif</h3>
    </div>

    <div class="divide-y divide-border-300 dark:divide-border-700">
        @foreach($teamMembers as $member)
            <div class="p-6 hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-4 flex-1">
                        <img
                            src="{{ $member['user']['avatar'] }}"
                            alt="{{ $member['user']['name'] }}"
                            class="w-12 h-12 rounded-full"
                        >
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <h4 class="font-semibold text-text-900 dark:text-text-100">{{ $member['user']['name'] }}</h4>
                                <x-ui.badge :variant="$roleColors[$member['role']]" size="sm">
                                    {{ $roleLabels[$member['role']] }}
                                </x-ui.badge>
                            </div>
                            <p class="text-sm text-text-600 dark:text-text-400">{{ $member['user']['email'] }}</p>
                            <p class="text-xs text-text-600 dark:text-text-400 mt-1">
                                {{ $member['business']['name'] }} • Bergabung {{ \Carbon\Carbon::parse($member['joined_at'])->format('d M Y') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        @if($member['role'] !== 'owner')
                            <x-ui.button variant="outline" size="sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit Role
                            </x-ui.button>
                            <x-ui.button variant="danger" size="sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Hapus
                            </x-ui.button>
                        @else
                            <x-ui.badge variant="primary" size="sm">Anda</x-ui.badge>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Pending Invitations -->
@if(count($pendingInvitations) > 0)
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-border-300 dark:border-border-700">
            <h3 class="text-lg font-semibold text-text-900 dark:text-text-100">Undangan Tertunda</h3>
        </div>

        <div class="divide-y divide-border-300 dark:divide-border-700">
            @foreach($pendingInvitations as $invitation)
                <div class="p-6 flex items-center justify-between hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <p class="font-medium text-text-900 dark:text-text-100">{{ $invitation['email'] }}</p>
                            <x-ui.badge variant="warning" size="sm">Menunggu</x-ui.badge>
                            <x-ui.badge :variant="$roleColors[$invitation['role']]" size="sm">
                                {{ $roleLabels[$invitation['role']] }}
                            </x-ui.badge>
                        </div>
                        <p class="text-sm text-text-600 dark:text-text-400">
                            {{ $invitation['business']['name'] }} • Diundang {{ \Carbon\Carbon::parse($invitation['invited_at'])->diffForHumans() }}
                        </p>
                    </div>

                    <div class="flex items-center gap-2">
                        <x-ui.button variant="outline" size="sm">
                            Kirim Ulang
                        </x-ui.button>
                        <x-ui.button variant="danger" size="sm">
                            Batalkan
                        </x-ui.button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
@endsection
