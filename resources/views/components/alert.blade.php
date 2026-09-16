@if (session('success'))
    <div x-data="flashMessage" x-show="show" x-transition.duration.300ms class="alert-success mb-6 shadow-sm">
        <svg class="w-6 h-6 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span class="font-medium text-sm text-emerald-900">{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div x-data="flashMessage" x-show="show" x-transition.duration.300ms class="alert-error mb-6 shadow-sm">
        <svg class="w-6 h-6 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span class="font-medium text-sm text-red-900">{{ session('error') }}</span>
    </div>
@endif

@if ($errors->any())
    <div x-data="flashMessage" x-show="show" x-transition.duration.300ms class="alert-error mb-6 shadow-sm">
        <svg class="w-6 h-6 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
        </svg>
        <div>
            <div class="font-bold text-sm text-red-900">Terdapat kesalahan pada inputan Anda:</div>
            <ul class="list-disc list-inside text-xs text-red-700 mt-1 space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
