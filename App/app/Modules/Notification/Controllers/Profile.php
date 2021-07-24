<?php 
namespace App\Modules\Notification\Controllers;

use App\Modules\Account\Models\UserModel;
use App\Modules\Account\Models\EmailsModel;
use CodeIgniter\Controller;

class Profile extends Controller
{
    private $userModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->EmailsModel = new EmailsModel();
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
    }

    public function index()
	{
		return view('errors/error_403');
	}

    public function getNotify()
    {        
        $data = $this->EmailsModel->find($this->session->get('user'));
        $notify = $data->notify;
        return json_encode($notify);
    }

    
    public function setNotify()
    {        

        
      $Request = json_decode(file_get_contents("php://input"),true);
  
      return $this->EmailsModel
        ->whereIn('id',$this->session->get('user'))
        ->set('notify', $Request['notify'])
        ->update();
            
      
    }

}
