<?php
class Sendmessage{
    private $to, $subject, $message, $headers;
    public function __constructor($to, $subject, $message, $headers){
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
        $this->headers = $headers;
    }
    public function sendMail(): boolean{
        return mail($this->to, $this->subject, $this->message, $this->headers);
    }
}

?>
