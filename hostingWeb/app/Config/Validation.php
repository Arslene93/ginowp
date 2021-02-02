<?php namespace Config;

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
        'email' => 'required|valid_email',
        'password' => 'required'
    ];

    public $company_registration = [
        'companyname' =>'required',
        'piva' => 'required',
        'name' => 'required',
        'familyname' =>'required',
        'cf' => 'required',
        'email' => 'required|valid_email',
        'password' =>'required',
        'country' => 'required',
        'region' => 'required',
    ];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
