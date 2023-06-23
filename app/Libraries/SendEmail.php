<?php
namespace App\Libraries;

use App\Models\DBModel;
use CodeIgniter\HTTP\RequestInterface;

class SendEmail{

    protected $email;
    protected $load;
    // protected $from, $to, $subject,$message

    function __construct(){

        $this->email = \Config\Services::email();
    }

    public function send_email($rname,$message)
    {

        $config['protocol'] = 'ssmtp';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        // $config['smtp_host'] = 'ssl://ssmtp.gmail.com';
        $config['SMTPUser'] = 'DUC@leicester.ac.uk';
        $config['SMTPPass'] = '';
        $config['SMTPPort'] = '465';
        $this->email->initialize($config);
        $this->email->setFrom('DUC@leicester.ac.uk', 'Duc_Profiler');
        $this->email->setTo($rname);
        $this->email->setSubject('Duc_Profiler Access Link.');
        $m = base_url('/ViewCon/viewdata?token='.$message);
        $this->email->setMessage($m);
        $this->email->send();
        
    }
}
?>