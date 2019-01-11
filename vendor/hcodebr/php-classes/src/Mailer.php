<?php
/**
 * Created by PhpStorm.
 * User: Hamilton
 * Date: 09/01/2019
 * Time: 09:52
 */

namespace Hcode;

use Rain\Tpl;

class Mailer{

    const USERNAME = "testemb2019@gmail.com";
    const PASSWORD = "testemb123";
    const NAME_FROM = "Hcode Store";

    private $mail;

    public function  __construct($toAddres, $toName, $subject, $tplName, $data = array())
    {

        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/email/",
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
            "debug"         => false
        );

        Tpl::configure( $config );

       $tpl = new Tpl;

       foreach ($data as $key => $value){

           $tpl->assign($key, $value);
       }

       $html = $tpl->draw($tplName, true);



        //Create a new PHPMailer instance
        $this->mail = new \PHPMailer;

        $this->mail->isSMTP();

        $this->mail->SMTPDebug = 0;

        $this->mail->Debugoutput = 'html';

        $this->mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $this->mail->Port = 587;

        $this->mail->isSMTP();
        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Set the encryption system to use - ssl (deprecated) or tls
        $this->mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $this->mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $this->mail->Username = Mailer::USERNAME;
        //Password to use for SMTP authentication
        $this->mail->Password = Mailer::PASSWORD;
        //Set who the message is to be sent from
        $this->mail->setFrom(Mailer::USERNAME,Mailer::NAME_FROM);
        //Set an alternative reply-to address
        //$mail->addReplyTo('replyto@example.com', 'First Last');
        //Set who the message is to be sent to
        $this->mail->addAddress($toAddres, $toName);
        //Set the subject line
        $this->mail->Subject = $subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $this->mail->msgHTML(utf8_decode($html));
        //Replace the plain text body with one created manually
        $this->mail->AltBody = 'This is a plain-text message body';
        //Attach an image file
        //$this->mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
    }

    public function send(){

        return $this->mail->send();
    }
}