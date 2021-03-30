<?php namespace App\Modules\API\Controllers;

use App\Modules\API\Models\UserModel;
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
            'view' => 'api/dashboard',
            'data' => $this->userModel->getUsers(),
        ];

		return view('template/layout', $data);
	}

}
