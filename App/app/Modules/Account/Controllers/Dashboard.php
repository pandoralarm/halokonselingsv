<?php namespace App\Modules\Account\Controllers;

use App\Modules\Account\Models\UserModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    private $userModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
	{
		$data = [
		    'title' => 'Dashboard Page',
            'view' => 'account/dashboard',
            'data' => $this->userModel->getUsers(),
        ];

		return view('template/layout', $data);
	}

}
