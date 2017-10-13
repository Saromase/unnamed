<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /** @var Request $request */
    private $request;

    /**
     * @param Request $request
     * @return Controller
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return User|Authenticatable|null
     */
    public function getUser()
    {
        return Auth::user();
    }

    /**
     * @param $type
     * @param $message
     * @param Request|null $request
     * @return Controller
     */
    public function addFlash($type, $message, Request $request = null)
    {
        $this->request = $request instanceof Request ? $request : $this->request;
        if (!$this->getRequest() instanceof Request) {
            throw new \RuntimeException('Request not defined, use setRequest first');
        }

        $this->request->session()->flash($type, $message);

        return $this;
    }
}
