<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Events\ActivityLogEvent;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::authenticateUsing(function (Request $request) {
            if (config('app.env') === 'production') {
                $request->validate(
                    ['g-recaptcha-response' => ['recaptcha']],
                    ['g-recaptcha-response.recaptcha' => 'Please verify captcha'],
                );
            }
            if (auth()->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1])) {
                event(new ActivityLogEvent('Login'));
            }
        });
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
