<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $etatSessions = "nonValidees";

    public function getEtatSessions()
    {
        return $this->etatSessions;
    }

    public function setEtatSessionsValidees()
    {
        $this->etatSessions = "validees";
    }

    public function setEtatSessionsNonValidees()
    {
        $this->etatSessions = "nonValidees";
    }

}
