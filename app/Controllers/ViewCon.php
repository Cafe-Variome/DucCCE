<?php

namespace App\Controllers;
use App\Models\DBModel;
use App\Libraries\SendEmail;
use App\Libraries\Formgen;
use Kint\Parser\ToStringPlugin;

class ViewCon extends BaseController
{
    protected $crud;
    protected $session;
    protected $u_id;
    protected $semail;
    protected $burl;

function __construct()
{
    $params = [
        'table' => 'profile',
    ];
    $this->crud = new Formgen($params, service('request'));
    $this->semail = new SendEmail();
    $this->db = db_connect();
    $this->model = new DBModel($this->db);
    $this->session = \Config\Services::session();
  
    
}

public function viewdata(){
    helper(['form', 'url']);
    

    if (isset($_GET['token'])) {
        $token = (string) $_GET['token'];
        $this->burl = current_url().'?token='.$token;
        $this->session->set('previous_url', $this->burl);
        $link = $this->model->getItem('link', ['l_token ='=> $token]);
        if($link){
            $token_date =$link->{'created_at'};
            $token_date = strtotime($token_date) + 2592000;
            $cDate = strtotime(date('Y-m-d H:i:s'));
            if($cDate>$token_date){
                $this->model->deleteItems('link', ['l_token ='=> $token], null, null);
                $data['err_message']  = "Access Token is expired";
                return view('editdata/gettoken',$data);
            }else{

                $this->u_id = $link->{'u_id'};
                $token_date = $link->{'created_at'};
                $use = $this->model->getItem('userinfo', ['u_id =' => $this->u_id]);
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = (int) $_GET['page'];
                    $page = max(1, $page);
                } 
                $per_page = 10;
                $columns = ['p_id','p_name','p_data'];
                $where = ['u_id =' => $this->u_id];
                $order = [
                    ['p_id', 'ASC']
                ];
                $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
                return view('editdata/editdata', $data);
            }

        }else{
            $data['err_message']  = "Your token is invalid.";
            return view('editdata/gettoken', $data);
        }

    }else{
       $data['message']  = "A link to your profile will be sent to the email address entered below.";
       return view('editdata/gettoken',$data);
    }

}

public function view($id){

    $id = base64_decode($id);
    $this->session->set('referred_from', current_url());
    $use_info =$this->model->getItem('profile', ['p_id ='=> $id]);
    $u_id = $use_info->{'u_id'};
    // $user_id = $this->get_P_Key($u_id,'userinfo');

   
    if($u_id  != 'Empty'){
    $datasetValues['userinfo'] = $this->current_values($u_id ,'userinfo');
    }
    $datasetValues['profile'] = $this->current_values($id,'profile');
    
    return view('editdata/viewdata',$datasetValues);

}

public function download($id){

    $id = base64_decode($id);
    $this->session->set('referred_from', current_url());
    $use_info =$this->model->getItem('profile', ['p_id ='=> $id]);
    $datasetValues['profile'] = $this->current_values($id,'profile');
    return view('download/download',$datasetValues);

}

function current_values($id,$table)
    {
        $this->id_field = $this->get_primary_key_field_name($table);
        if($table == 'publications'){
          
            $this->current_values = $item = $this->model->getItemMul($table, ['d_id ='=>$id]);
            
        } else if($table == 'person' ){
            $this->current_values = $item = $this->model->getItemMul($table, ['d_id ='=>$id]);
        }else if($table == 'organisation'){
            $this->current_values = $item = $this->model->getItemMul($table, ['p_id ='=>$id]);
            
        }
        else{
            $this->current_values = $item = $this->model->getItem($table, [$this->id_field => $id]);
        }
        $this->fields = $this->field_options();
        foreach ($this->fields as $field => $options) {
            if (isset($options['type']) && $options['type'] == 'file') {
                $this->files[$field] = $item->{$field};
            }
            if (isset($options['type']) && $options['type'] == 'files') {
                $fileTable = $options['files_relation']['files_table'];
                $where = [$options['files_relation']['parent_field'] => $id];
                $files = $this->model->getAnyItems($fileTable, $where);
                $this->files[$field] = $files;
            }
        }
        $this->id = $id;
        $this->action = 'edit';
        return $item;
    }

    protected function field_options()
	{
		$fields = [];
		// $field['p_name'] = ['label' => 'Profile Name'];

		return $fields;
	}
    
    public function get_primary_key_field_name($table)
    {
        return $this->model->get_primary_key_field_name($table);
    }

    
    public function gettoken()
    {

        if (isset($_POST['u_fname'])) {

            $email = $this->request->getVar('u_email');
            // $fname = $this->request->getVar('u_fname');
            // $lname = $this->request->getVar('u_lname');

            // $user = $this->model->getItem('userinfo', ['u_fname =' => $fname, 'u_lname =' => $lname, 'u_email =' => $email]);
            $user = $this->model->getItem('userinfo', ['u_email =' => $email]);

            if ($user) {
                $u_id = $user->{'u_id'};
                $u_e = $user->{'u_email'};
                $l = $this->model->getItem('link', ['u_id =' => $u_id]);
                if ($l) {
                    $t = $l->{'l_token'};
                    $this->send_email($u_e, $t);
                    $this->flash('success', 'Check your email for new access link.');
                } else {


                    $this->addlink($u_id, $u_e);
                }

                return redirect()->to(base_url());
            } else {

                $data['err_message']  = "Invalid user name. There is no profile with this email address. Please create a profile";
                $this->flash('danger', 'No profile with this email.');

                return view('editdata/gettoken', $data);
            }
        }
    }

    public function send_email($remail,$t){

        $this->semail->send_email($remail,$t);
    }

    public function flash($key, $value)
    {
        $session = session();
        $session->setFlashdata($key, $value);
        return true;
    }
    public function addlink($u_id,$u_email)
	{
		$tnew = $this->GenerateToken(7);
		$link = ['u_id' => $u_id, 'l_token' => $tnew];
		$this->model->insertItem('link', $link);
		$this->send_email($u_email,$tnew);
	}
    function GenerateToken($length)
	{
		$token = "";
		$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
		$codeAlphabet .= "0123456789";
		for ($i = 0; $i < $length; $i++) {
			$token .= $codeAlphabet[$this->create_Token(0, strlen($codeAlphabet))];
		}
		return $token;
	}
    function create_Token($min, $max)
	{
		$range = $max - $min;
		if ($range < 0) return $min; // not so random...
		$log = log($range, 2);
		$bytes = (int) ($log / 8) + 1; // length in bytes
		$bits = (int) $log + 1; // length in bits
		$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
		do {
			$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
			$rnd = $rnd & $filter; // discard irrelevant bits
		} while ($rnd >= $range);
		return $min + $rnd;
	}

    public function delete($id)
   {
    $id = base64_decode($id);
    $this->session->set('referred_from', current_url());
    $this->model->deleteItems('profile', ['p_id ='=> $id], null, null);
    $referred_from = $this->session->get('previous_url');

   return redirect()->to($referred_from);
       # code...
   } 

   public function duplicate($id){

    $id = base64_decode($id);
    $this->session->set('referred_from', current_url());

    // Getting profile 

    $profile = $this->current_values($id,'profile');

    $u_id = $profile->{'u_id'};
    $p_name= $profile->{'p_name'};
    $pr_id =mt_rand();

    $pr_id = base_convert($pr_id,16,36);

    $pr_id = 'pr_'.$pr_id;

    $data = json_decode($profile->{'p_data'});

    $p = $data->{'profile'};
    $v= '';

    if(isset($p->{'profileVersion'})){
        $v = $p->{'profileVersion'};
    }
    if(isset($p->{'creationDate'})){
        $d = $p->{'creationDate'};
    }
   
    

    echo '<pre>';
    print_r($data);
    echo '</pre>';


    $data->{'profile'}=[
        'profileID' => $pr_id,
        'profileName'=> $p_name,
        'profileVersion'=>$v,
        'profileCreateDate'=>isset($d)?$d:''
    ];

    $newJsonString = json_encode($data);

    $U_data =[
        'u_id' => $u_id,
        'p_name' =>$p_name,
        'pr_id' => $pr_id,
        'p_data' => $newJsonString
    ];

   $this->model->insertItem('profile', $U_data);
    $referred_from = $this->session->get('previous_url');
    return redirect()->to($referred_from);
     
   }


    

}
?>