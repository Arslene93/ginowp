<?php namespace Config;
use CodeIgniter\Language\Language;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

    public $login = [
        'email' => [
            'label' => 'email',
            'rules' => 'required|valid_email',
        ],
        'password'=> 'required',
    ];

    public $admin_registration = [
        'admin'=> 'required',
        'email' => [
            'label' => 'email',
            'rules' => 'required|valid_email|is_unique[user.email]',
        ],
        'password' => 'required'
    ];



    public $company_registration = [
        'company' => 'required',
        'companyname' =>'required',
        'piva' => 'required',
        'name' => 'required',
        'familyname' =>'required',
        'cf' => 'required',
        'email' => [
            'label' => 'email',
            'rules' => 'required|valid_email|is_unique[user.email]',
        ],
        'password' =>'required',
        'country' => 'required',
        'province' => 'required',
        'region' => 'required',
        'street' => 'required',
        'civico' => 'required',
        'postal' => 'required',
    ];
    public $user_registration = [
        'individual' => 'required',
        'name' => 'required',
        'familyname' =>'required',
        'email' => [
            'label' => 'email',
            'rules' => 'required|valid_email|is_unique[user.email]',
        ],
        'password' =>'required',
        'country' => 'required',
        'province' => 'required',
        'region' => 'required',
        'street' => 'required',
        'cf' => 'required',
        'civico' => 'required',
        'postal' => 'required',
    ];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
