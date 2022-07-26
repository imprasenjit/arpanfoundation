<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class AdminBaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
    public function layout($view = 'dashboard', $viewData = [])
    {
        $session = \Config\Services::session();
        $data = [
            "firstName" => $session->firstname,
            "lastName" => $session->lastname
        ];
        return view('admin/requires/header') . view('admin/requires/sidebar', $data) . view('admin/' . $view . '', $viewData) . view('admin/requires/footer');
    }
    public function isLoggedIn()
    {
        $session = \Config\Services::session();
        // echo '<pre>';
        // var_dump($session->isLoggedIn);
        // die;
        if ($session->isLoggedIn != NULL) {
            return true;
        } else {
            return false;
        }
    }
}
