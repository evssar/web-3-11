<?php
namespace utils;

class Mail
{
  protected $m_login = 'fortechcol@yandex.ru';
  protected $m_password = 'for_tech_col';
  protected $m_smtp_server = 'ssl://smtp.yandex.ru';
  protected $m_port = '465';
  protected $m_timeout = 10;
  protected $m_to = 'fortechcol@yandex.ru';
  protected $m_name = 'FOR_TECH_COL';
  protected $m_fields = ['name', 'email', 'subject', 'content'];
  protected $m_data = array();
  protected $m_ready_for_send = false;

  public function send()
  {
    if($this->m_ready_for_send)
    {
      $smtp_conn = fsockopen($this->m_smtp_server, $this->m_port, $errno, $errstr, $this->m_timeout);
      if($smtp_conn)
      {
        $data = $this->get_data($smtp_conn);
        fputs($smtp_conn,"EHLO WHOIAM\r\n");
        $code = substr($this->get_data($smtp_conn),0,3);
        if($code != 250) {print "ошибка приветсвия EHLO"; fclose($smtp_conn); exit;}
        fputs($smtp_conn,"AUTH LOGIN\r\n");
        $code = substr($this->get_data($smtp_conn),0,3);
        if($code != 334) {print "сервер не разрешил начать авторизацию"; fclose($smtp_conn); exit;}

        fputs($smtp_conn,base64_encode($this->m_login)."\r\n");
        $code = substr($this->get_data($smtp_conn),0,3);
        if($code != 334) {print "ошибка доступа к такому юзеру"; fclose($smtp_conn); exit;}

        fputs($smtp_conn,base64_encode($this->m_password)."\r\n");
        $code = substr($this->get_data($smtp_conn),0,3);
        if($code != 235) {print "не правильный пароль"; fclose($smtp_conn); exit;}

        $header = $this->make_header();
        $size_msg=strlen($header."\r\n".$this->m_data['content']);

        fputs($smtp_conn,"MAIL FROM:<".$this->m_login."> SIZE=".$size_msg."\r\n");
        $code = substr($this->get_data($smtp_conn),0,3);
        if($code != 250) {print "сервер отказал в команде MAIL FROM"; fclose($smtp_conn); exit;}

        fputs($smtp_conn,"RCPT TO:".$this->m_to."\r\n");
        $code = substr($this->get_data($smtp_conn),0,3);
        if($code != 250 AND $code != 251) {print "Сервер не принял команду RCPT TO"; fclose($smtp_conn); exit;}

        fputs($smtp_conn,"DATA\r\n");
        $code = substr($this->get_data($smtp_conn),0,3);
        if($code != 354) {print "сервер не принял DATA"; fclose($smtp_conn); exit;}

        fputs($smtp_conn,$header."\r\n.".$this->m_data['content'].".\r\n.\r\n");
        $code = substr($this->get_data($smtp_conn),0,3);
        if($code != 250) {print "ошибка отправки письма"; fclose($smtp_conn); exit;}

        fputs($smtp_conn,"QUIT\r\n");
      }
      else
      {
        fclose($smtp_conn);
        return false;
      }
      fclose($smtp_conn);
      return true;
    }
  }

  public function assignData($data)
  {
    foreach ($this->m_fields as $key)
    {
      if(!isset($data[$key]))
      {
        return false;
      }
      $this->m_data[$key] = $data[$key];
    }
    $this->m_data['content'] = "Mail from: ".$this->m_data['name']."<".$this->m_data['email'].">".$this->m_data['content'];
    $this->m_ready_for_send = true;
    return true;
  }

  protected function make_header()
  {
    $header="Date: ".date("D, j M Y G:i:s")." +0700\r\n";
    $header.="From: =?utf-8?Q?".str_replace("+","_",str_replace("%","=",urlencode($this->m_name)))."?= <".$this->m_login.">\r\n";
    $header.="X-Mailer: The Bat! (v3.99.3) Professional\r\n";
    $header.="Reply-To: =?utf-8?Q?".str_replace("+","_",str_replace("%","=",urlencode($this->m_name)))."?= <".$this->m_to.">\r\n";
    $header.="X-Priority: 3 (Normal)\r\n";
    $header.="Message-ID: <172562218.".date("YmjHis")."@mail.ru>\r\n";
    $header.="To: =?utf-8?Q?".str_replace("+","_",str_replace("%","=",urlencode($this->m_name)))."?= <".$this->m_to.">\r\n";
    $header.="Subject: =?utf-8?Q?".str_replace("+","_",str_replace("%","=",urlencode($this->m_data['subject'])))."?=\r\n";
    $header.="MIME-Version: 1.0\r\n";
    $header.="Content-Type: text/plain; charset=utf-8\r\n";
    $header.="Content-Transfer-Encoding: 8bit\r\n";
    return $header;
  }

  protected function get_data($smtp_conn)
  {
    $data = "";
    while($str = fgets($smtp_conn,515))
    {
      $data .= $str;
      if(substr($str,3,1) == " ") break;
    }
    return $data;
  }
}
