
@php
    $toast = [
        'success' => session('success'),
        'error' => session('error'),
        'warning' => session('warning'),
        'info' => session('info'),
    ];
    $hasToast = false;

    foreach ($toast as $message) {
        if (filled($message)) {
            $hasToast = true;
            break;
        }
    }
@endphp

@if ($hasToast)
    <div data-toast='@json($toast)'></div>
@endif