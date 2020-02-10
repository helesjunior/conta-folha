<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(backpack_middleware());
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $this->data['breadcrumbs'] = [
            trans('Conta Folha')     => backpack_url('dashboard'),
            trans('Início') => false,
        ];
        $this->data['widgets']['before_content'][] = [
            'type' => 'div',
            'class' => 'row',
            'content' => [
                [
                    'type' => 'card',
                    'wrapperClass' => 'col-sm-6 col-md-3',
                    'class' => 'card bg-success text-white',
                    'content' => [
                        'header' => 'Some card title',
                        'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non mi nec orci euismod venenatis. Integer quis sapien et diam facilisis facilisis ultricies quis justo. Phasellus sem <b>turpis</b>.',
                    ]
                ],
                [
                    'type' => 'card',
                    'wrapperClass' => 'col-sm-6 col-md-3',
                    'class' => 'card bg-info text-white',
                    'content' => [
                        'header' => 'Some card title',
                        'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non mi nec orci euismod venenatis. Integer quis sapien et diam facilisis facilisis ultricies quis justo. Phasellus sem <b>turpis</b>.',
                    ]
                ],
                [
                    'type' => 'card',
                    'wrapperClass' => 'col-sm-6 col-md-3',
                    'class' => 'card bg-danger text-white',
                    'content' => [
                        'header' => 'Some card title',
                        'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non mi nec orci euismod venenatis. Integer quis sapien et diam facilisis facilisis ultricies quis justo. Phasellus sem <b>turpis</b>.',
                    ]
                ],
                [
                    'type' => 'card',
                    'wrapperClass' => 'col-sm-6 col-md-3',
                    'class' => 'card bg-warning text-white',
                    'content' => [
                        'header' => 'Some card title',
                        'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non mi nec orci euismod venenatis. Integer quis sapien et diam facilisis facilisis ultricies quis justo. Phasellus sem <b>turpis</b>.',
                    ]
                ],
            ]


        ];

        $this->data['widgets']['before_content'][] = [
            'type'        => 'jumbotron',
            'heading'     => trans('backpack::base.welcome'),
            'content'     => trans('backpack::base.use_sidebar'),
            'button_link' => backpack_url('logout'),
            'button_text' => trans('backpack::base.logout'),
        ];

        return view('backpack::base.dashboard', $this->data);
    }

    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
        return redirect(backpack_url('inicio'));
    }
}
