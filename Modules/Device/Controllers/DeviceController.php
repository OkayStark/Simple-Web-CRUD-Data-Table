<?php

namespace Modules\Device\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DeviceController extends BaseController
{
    public function index()
    {
        $deviceObj = new \Modules\Device\Models\DeviceModel();
        echo "<pre>";
        print_r($deviceObj->findAll());

    }
}
