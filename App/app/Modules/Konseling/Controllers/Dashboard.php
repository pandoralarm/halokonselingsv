<?php namespace App\Modules\Konseling\Controllers;

use App\Modules\Konseling\Models\UserModel;
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
            'view' => 'konseling/dashboard',
            'data' => $this->userModel->getUsers(),
        ];

		return view('template/layout', $data);
	}

    public function getall($title)
    {
        return $title;
    }

    public function hello()
    {
        $data = [
            'judul' => $this->getall('DASBOR'),
        ];

        echo view('layout/header', $data);
        echo view('konseling/home');
        echo view('layout/footer');
    }

}
