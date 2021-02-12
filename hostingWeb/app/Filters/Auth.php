<?php
namespace App\Filters;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = NULL)
    {
        $session = Services::session();
        if ($session->has('user'))
        { 
            if ($request->uri->getPath() == '/logs/login')
            {
                return redirect()->to('/admin/members?role=admin');
            }
            
        } 
        else
        {
            if ($request->uri->getPath() != '/logs/login')
            {
                if ($request->uri->getSegment(1) == 'admin')
                {
                    return redirect()->back();
                }
                // return redirect()->to('/logs/login');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = NULL)
    {
    }

}
?>