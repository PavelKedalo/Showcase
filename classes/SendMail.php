<?php

    class SendMail {

        private $from;//from address
        private $from_name = "";
        private $type = "text/html";//type mail
        private $encoding = "utf-8";//encoding mail
        private $notify = false;

        public function __construct($from) {
            $this->from = $from;
        }

        public function setName($from_name) {//set name
            $this->from_name = $from_name;
        }

        public function setType($type) {
            $this->type = $type;
        }

        public function setNotify($notify) {//confirm mail
            $this->notify = $notify;
        }

        public function setEncoding($encoding) {
            $this->encoding = $encoding;
        }

        public function send($toAddress, $subject, $message) {

            //encoding mail address
            $from = "=?utf-8?B?".base64_encode($this->from_name)."?="." <".$this->from.">";
            //headers mail
            $headers = "From: ".$from."\r\nReply-To: ".$from."\r\nContent-type: ".$this->type."; charset=".$this->encoding."\r\n";
            //confirm mail
            if ($this->notify) $headers .= "Disposition-Notification-To: ".$this->from."\r\n";
            //encoding subject
            $subject = "=?utf-8?B?".base64_encode($subject)."?=";

            return mail($toAddress, $subject, $message, $headers);//send mail
        }

    }
