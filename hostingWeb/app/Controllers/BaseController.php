<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

use App\Models\SettingModel;
use App\Models\TemplatesModel;
use App\Models\ComuniModel;
use App\Models\NazioniModel;
use App\Models\ProvinceModel;

use App\Models\invoice_items_Model;
use App\Models\invoice_Model;
use App\Models\invoice_payment_Model;
use App\Models\order_items_Model;
use App\Models\orders_Model;
use App\Models\product_Model;
use App\Models\user_Model;
use App\Models\user_profile_Model;
use CodeIgniter\Session\Session;

class BaseController extends Controller
{


	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
    protected $helpers = ['form','url','text'];
    /**
     * @var Models
     */
//    protected $user_Model;
//    protected $invoice_Model;
//    protected $invoice_items_Model;
//    protected $invoice_payment_Model;
//    protected $order_items_Model;
//    protected $orders_Model;
//    protected $product_Model;
//    /**
//     * @var Session
//     */
//    protected $session;
//    protected $validation ;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
        $this->validation =  \Config\Services::validation();
        $security = \Config\Services::security();
        $this->session = \Config\Services::session();
        $session = session()->start();

        $this->SettingModel =  new SettingModel();
        $this->TemplatesModel =  new TemplatesModel();
        $this->ComuniModel =  new ComuniModel();
        $this->NazioniModel =  new NazioniModel();
        $this->ProvinceModel =  new ProvinceModel();



        $this->invoice_Model = new invoice_Model();
        $this->invoice_items_Model = new invoice_items_Model();
        $this->invoice_payment_Model = new invoice_payment_Model();
        $this->order_items_Model = new order_items_Model();
        $this->orders_Model = new orders_Model();
        $this->product_Model = new product_Model();
        $this->user_Model =  new user_Model();
        $this->user_profile_Model =  new user_profile_Model();

        //--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}

}
