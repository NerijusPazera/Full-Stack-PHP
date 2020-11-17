<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\Http\Requests\StoreAchievementRequest;
use App\Http\Requests\UpdateAchievementRequest;
use App\User;
use App\UserRole;
use Illuminate\Support\Facades\Auth;

class AchievementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin', ['only' => ['create', 'edit']]);
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $user_role = $user->role->id;
        $h2 = 'Visi pasiekimai';

        $achievements = Achievement::all();

        if ($achievements->toArray()) {
            $table['headers'] = [
                'Pavadinimas' => [],
                'Aprašymas' => [],
                'Tipas' => [],
                'Įrankiai' => [
                    'attr' => [
                        'colspan' => 2
                    ]
                ]
            ];

            foreach ($achievements as $achievement) {
                if ($achievement->type == Achievement::TYPE_TIME) {
                    $medal = view('components.timeMedal', [
                        'class' => $achievement->medal,
                        'text' => false
                    ]);
                } else {
                    $medal = view('components.tryesMedal', [
                        'class' => $achievement->medal,
                        'text' => false
                    ]);
                }

                $table['rows'][] = [
                    'title' => $achievement->title,
                    'description' => $achievement->description,
                    'medal' => $medal,
                    'edit_btn' => view('components.aLink', [
                        'link' => route('achievements.edit', $achievement->id),
                        'text' => '<i class="far fa-edit"></i>',
                        'class' => 'edit-btn'
                    ]),
                    'delete_btn' => view('components.form', [
                        'attr' => [
                            'action' => route('achievements.destroy', $achievement->id),
                        ],
                        'fields' => [
                            '_method' => [
                                'type' => 'hidden',
                                'value' => 'DELETE'
                            ],
                        ],
                        'buttons' => [
                            'action' => [
                                'text' => '<i class="fa fa-trash-o"></i>',
                                'extra' => [
                                    'attr' => [
                                        'class' => 'delete-btn',
                                    ]
                                ]
                            ],
                        ]
                    ])
                ];

                if ($user_role !== UserRole::ROLE_ADMIN) {
                    $table['attr']['id'] = 'user-table';

                    foreach ($achievements as $achievement_id => $achievement) {
                        unset($table['headers']['Įrankiai']);
                        unset($table['rows'][$achievement_id]['edit_btn']);
                        unset($table['rows'][$achievement_id]['delete_btn']);
                    }
                } else {
                    $table['attr']['id'] = 'admin-table';
                }
            }

        } else {
            $h2 = 'Pasiekimų nėra';
            $table = [];
        }

        $content = [
            'h2' => $h2,
            'table' => $table
        ];

        return view('achievements.index')->with('content', $content);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $h2 = 'Sukurti naują pasiekimą';
        $users = User::all();

        $form = [
            'attr' => [
                'action' => route('achievements.store'),
                'method' => 'POST',
                'class' => 'my-form',
                'id' => 'achvs-create-form'
            ],
            'fields' => [
                'title' => [
                    'label' => 'Pavadinimas',
                    'type' => 'text',
                    'value' => '',
                    'extra' => [
                        'attr' => []
                    ]
                ],
                'description' => [
                    'label' => 'Aprašymas',
                    'type' => 'text',
                    'value' => '',
                    'extra' => [
                        'attr' => []
                    ]
                ],
                'term' => [
                    'label' => 'Sąlyga',
                    'type' => 'text',
                    'value' => '',
                    'extra' => [
                        'attr' => []
                    ]
                ],
                'type' => [
                    'label' => 'Pasiekimo tipas',
                    'type' => 'select',
                    'value' => '',
                    'options' => [
                        'Reakcijos laikas',
                        'Bandymu skaičius'
                    ]
                ],
                'medal' => [
                    'label' => 'Medalis',
                    'type' => 'select',
                    'value' => '',
                    'options' => [
                        'gold' => 'Auksas',
                        'silver' => 'Sidabras',
                        'bronze' => 'Bronza'
                    ]
                ],
                'users_select' => [
                    'label' => 'Pasirinkte vartotoją (ctrl-click pasirinkti daugiau nei vieną)',
                    'type' => 'select',
                    'value' => '',
                    'options' => [
                    ],
                    'extra' => [
                        'attr' => [
                            'class' => 'users-select',
                            'multiple' => true,
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'action' => [
                    'text' => 'Create',
                    'extra' => [
                        'attr' => [
                            'class' => 'action-button',
                        ]
                    ]
                ],
            ]
        ];

        foreach ($users as $user) {
            $form['fields']['users_select']['options'][$user->id] = $user->name;
        }

        $content = [
            'h2' => $h2,
            'form' => $form
        ];

        return view('achievements.create')->with('content', $content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAchievementRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAchievementRequest $request)
    {
        $input = $request->validated();
        $achv = new Achievement($input);
        $achv->save();

        if (isset($input['users_select'])) {
            foreach ($input['users_select'] as $user_id) {
                $user = User::find($user_id);
                $user->achievements()->attach($achv);
            }
        }

        $users = User::all();
        foreach ($users as $user) {
            $user->checkForAchievement($user);
        }

        return redirect()->route('achievements.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $h2 = 'Jūsų pasiekimai';
        $achievements = Auth::user()->achievements;

        if ($achievements->toArray()) {
            $table['headers'] = [
                'Pavadinimas' => [],
                'Aprašymas' => [],
                'Medalis' => []
            ];

            foreach ($achievements as $achievement) {

                if ($achievement->type == Achievement::TYPE_TIME) {
                    $medal = view('components.timeMedal', [
                        'class' => $achievement->medal,
                        'text' => true
                    ]);
                } else {
                    $medal = view('components.tryesMedal', [
                        'class' => $achievement->medal,
                        'text' => true
                    ]);
                }

                $table['rows'][] = [
                    $achievement['title'],
                    $achievement['description'],
                    $medal
                ];
            }
        } else {
            $h2 = 'Pasiekimų nėra';
            $table = [];
        }

        $content = [
            'h2' => $h2,
            'table' => $table
        ];

        return view('achievements.show')->with('content', $content);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $this->middleware('role:admin');

        $h2 = 'Koreguoti pasiekimą';
        $achv = Achievement::find($id);
        $all_users = User::all()->pluck('name', 'id');

        $form = [
            'attr' => [
                'action' => route('achievements.update', $id),
                'method' => 'POST',
                'class' => 'my-form',
                'id' => 'achvs-edit-form'
            ],
            'fields' => [
                '_method' => [
                    'type' => 'hidden',
                    'value' => 'PUT'
                ],
                'title' => [
                    'label' => 'Pavadinimas',
                    'type' => 'text',
                    'value' => filter_var($achv->title, FILTER_SANITIZE_SPECIAL_CHARS),
                    'extra' => [
                        'attr' => []
                    ]
                ],
                'description' => [
                    'label' => 'Aprašymas',
                    'type' => 'text',
                    'value' => filter_var($achv->description, FILTER_SANITIZE_SPECIAL_CHARS),
                    'extra' => [
                        'attr' => []
                    ]
                ],
                'term' => [
                    'label' => 'Sąlyga',
                    'type' => 'text',
                    'value' => filter_var($achv->term, FILTER_SANITIZE_SPECIAL_CHARS),
                    'extra' => [
                        'attr' => []
                    ]
                ],
                'type' => [
                    'label' => 'Pasiekimo tipas',
                    'type' => 'select',
                    'value' => $achv->type,
                    'options' => [
                        'Reakcijos laikas',
                        'Bandymu skaičius'
                    ]
                ],
                'medal' => [
                    'label' => 'Medalis',
                    'type' => 'select',
                    'value' => $achv->medal,
                    'options' => [
                        'gold' => 'Auksas',
                        'silver' => 'Sidabras',
                        'bronze' => 'Bronza'
                    ]
                ],
                'users_select' => [
                    'label' => 'Pasirinkite vartotoją (ctrl-click pasirinkti daugiau nei viena)',
                    'type' => 'select',
                    'value' => [],
                    'options' => [
                    ],
                    'extra' => [
                        'attr' => [
                            'class' => 'users-select',
                            'multiple' => true,
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'action' => [
                    'text' => 'Update',
                    'extra' => [
                        'attr' => [
                            'class' => 'action-button',
                        ]
                    ]
                ],
            ]
        ];

        foreach ($achv->users as $user) {
            $form['fields']['users_select']['value'][] = $user->id;
        }

        foreach ($all_users as $user_id => $user_name) {
            $form['fields']['users_select']['options'][$user_id] = $user_name;
        }

        $content = [
            'h2' => $h2,
            'form' => $form
        ];

        return view('achievements.edit')->with('content', $content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(UpdateAchievementRequest $request, $id)
    {
        $achv = Achievement::find($id);

        $input = $request->validated();

        $achv->users()->sync($request->input('users_select'));

        $achv->update($input);

        $users = User::all();
        foreach ($users as $user) {
            $user->checkForAchievement($user);
        }

        return redirect()->route('achievements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public
    function destroy($id)
    {
        $achv = Achievement::find($id);

        $achv->destroy($id);

        $users = User::all();
        foreach ($users as $user) {
            $user->achievements()->detach($achv);
        }

        return redirect()->route('achievements.index');
    }
}
