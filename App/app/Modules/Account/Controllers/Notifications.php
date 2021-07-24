<?php namespace App\Modules\Account\Controllers;

use App\Modules\Account\Models\UserModel;
use App\Modules\Account\Models\EmailsModel;
use CodeIgniter\Controller;

class Notifications extends Controller
{
    private $userModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->EmailsModel = new EmailsModel();
    }

    public function index()
	{
		return view('errors/error_403');
	}

    public function getNotify()
    {        
        $data = $this->EmailsModel->find($this->session->get('user'));
        return json_encode($data);
    }

}
