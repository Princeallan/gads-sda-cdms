<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Property;
use App\Models\PropertyStatus;
use App\Models\PropertyType;
use App\Policies\PropertyPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Property::class => PropertyPolicy::class,
        PropertyType::class => PropertyPolicy::class,
        PropertyStatus::class => PropertyPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
