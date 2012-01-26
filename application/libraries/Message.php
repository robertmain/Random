<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Message:: a library for giving feedback to the user
 *
 * @author  Adam Jackett
 * @url http://www.darkhousemedia.com/
 * @version 2.1
 */
class CI_Message {

    public $CI;
    public $messages = array();
    public $wrapper = array('', '');

    public function __construct($config=null) {
        $this->CI = & get_instance();
        $this->CI->load->library('session');

        if ($this->CI->session->flashdata('_messages')) {
            $this->messages = $this->CI->session->flashdata('_messages');
        }

        if (is_array($config)) {
            $this->initialize($config);
        }
    }

    public function initialize($config) {
        if (!is_array($config)) {
            return false;
        }

        foreach ($config as $key => $val) {
            $this->$key = $val;
        }
    }

    public function set($type, $message, $flash=FALSE, $group=FALSE) {
        if (!is_array($message)) {
            $message = array($message);
        }
        
        foreach ($message as $msg) {
            $obj = new stdClass();
            $obj->message = $msg;
            $obj->type = $type;
            $obj->flash = $flash;
            $obj->group = $group;
            $this->messages[] = $obj;
        }

        $flash_messages = array();
        foreach ($this->messages as $msg) {
            if ($msg->flash)
                $flash_messages[] = $msg;
        }

        if (count($flash_messages)) {
            $this->CI->session->set_flashdata('_messages', $flash_messages);
        }
    }

    public function display($group=FALSE, $wrapper=FALSE) {
        echo $this->get($group, $wrapper);
    }

    public function get($group=FALSE, $wrapper=FALSE) {
        $content = '';
        if (count($this->messages)) {
            $output = array();

            foreach ($this->messages as $msg) {
                if ($msg->group == $group) {
                    if (!isset($output[$msg->type]))
                        $output[$msg->type] = array();
                    $output[$msg->type][] = $msg->message;
                }
            }
            $content .= ( $wrapper !== FALSE ? $wrapper[0] : $this->wrapper[0]) . "\r\n";
            foreach ($output as $type => $messages) {
                $content .= '<div class="message message-' . $type . '">' . "\r\n";

                foreach ($messages as $msg) {
                    $content .= '<p>' . $msg . '</p>' . "\r\n";
                }
                $content .= '</div>' . "\r\n";
            }
            $content .= ( $wrapper !== FALSE ? $wrapper[1] : $this->wrapper[1]) . "\r\n";
        }
        return $content;
    }

}

