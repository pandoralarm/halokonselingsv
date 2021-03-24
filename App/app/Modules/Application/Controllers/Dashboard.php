<?php namespace App\Modules\Application\Controllers;

use App\Modules\Application\Models\UserModel;
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
            'view' => 'application/dashboard',
            'data' => $this->userModel->getUsers(),
        ];

		return view('template/layout', $data);
	}

}
