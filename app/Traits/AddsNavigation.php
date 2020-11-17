<?php

namespace App\Traits;

use App\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

trait AddsNavigation
{
    public function addNavigation()
    {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();

            if ($user && $user->role->id == UserRole::ROLE_ADMIN) {
                $navigation = [
                    'welcome_links' => [
                        [
                            'name' => 'Rezultatai',
                            'url' => route('test-results.index')
                        ],
                        [
                            'name' => 'Pasiekimų sąrašas',
                            'url' => route('achievements.index')
                        ],
                        [
                            'name' => 'Atsijungti',
                            'url' => route('logout')
                        ],
                    ],
                    'left_side_links' => [
                        [
                            'name' => 'Rezultatai',
                            'url' => route('test-results.index')
                        ],
                        [
                            'name' => 'Pasiekimų sąrašas',
                            'url' => route('achievements.index')
                        ],
                    ],
                    'dropdown_links' => [
                        [
                            'name' => 'Sukurti naują pasiekimą',
                            'url' => route('achievements.create')
                        ],
                        [
                            'name' => 'Atsijungti',
                            'url' => route('logout')
                        ],
                    ],
                ];
            } else {
                $navigation = [
                    'guest' => [
                        [
                            'name' => 'Prisijungti',
                            'url' => route('login')
                        ],
                        'register' => [
                            'name' => 'Registruotis',
                            'url' => route('register')
                        ],
                    ],
                    'logged_in' => [
                        'welcome_links' => [
                            [
                                'name' => 'Reakcijos testas',
                                'url' => route('home')
                            ],
                            [
                                'name' => 'Rezultatai',
                                'url' => route('test-results.index')
                            ],
                            [
                                'name' => 'Pasiekimų sąrašas',
                                'url' => route('achievements.index')
                            ],
                            [
                                'name' => 'Atsijungti',
                                'url' => route('logout')
                            ],
                        ],
                        'left_side_links' => [
                            [
                                'name' => 'Reakcijos testas',
                                'url' => route('home')
                            ],
                            [
                                'name' => 'Rezultatai',
                                'url' => route('test-results.index')
                            ],
                            [
                                'name' => 'Pasiekimų sąrašas',
                                'url' => route('achievements.index')
                            ],
                        ],
                        'dropdown_links' => [
                            [
                                'name' => 'Jūsų pasiekimai',
                                'url' => route('achievements.show', 'show')
                            ],
                            [
                                'name' => 'Jūsų rezultatai',
                                'url' => route('test-results.show', 'show')
                            ],
                            [
                                'name' => 'Atsijungti',
                                'url' => route('logout')
                            ],
                        ],
                    ]
                ];

                if (Auth::guest()) {
                    $navigation = $navigation['guest'];

                    if (!Route::has('register')) {
                        unset($navigation['register']);
                    }
                } else {
                    $navigation = $navigation['logged_in'];
                }
            }

            View::share('navigation', $navigation);

            return $next($request);
        });
    }
}
