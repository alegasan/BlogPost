<?php

namespace App\View\Composers;

use App\Services\PostStatsService;
use Illuminate\View\View;

class PostStatsComposer
{
    public function __construct(private readonly PostStatsService $postStatsService) {}

    public function compose(View $view): void
    {
        $view->with('stats', $this->postStatsService->forUser(auth()->id()));
    }
}
