<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public $login = [
    'email'         => 'required|valid_email',
    'password'      => 'required',
    'agbaccept'     => 'required',
    ];

    public $login_errors = [
        'email'         => [
            'valid_email'   => 'Bitte eine gültige E-Mail-Adresse angeben',
            'required'      => 'Bitte eine E-Mail-Adresse angeben',
            ],
        'password'      => ['required'              => 'Bitte das Passwort eingeben'],
        'agbaccept'     => ['required'              => 'Die AGB müssen akzeptiert werden'],
    ];
}
