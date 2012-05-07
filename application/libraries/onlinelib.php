<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


       /*******
       * Author: Carl Wuensche
       * Date: June 7 2008
       * What it does: It is a class that enables you to easily check if you're online,
       * and lists the online users.
       *******/

class Onlinelib {
      var $username; // The variable that stores your username
      var $time; // The variable that stores the time you've been signed on
      var $session_id; // The variable that stores the session_id

      /**
       * This is the function that loads everything. You don't really need to do anything in here,
       * however it does check to see if you are online or not
       **/

  function __construct()
  {
    $this->CI =& get_instance();
    $this->CI->load->library(array('session'));
    $this->username = "admin";
    $this->time = time();
    $this->session_id = $this->CI->session->userdata('session_id');

    if ($this->checkOnline())
    {
     $this->CI->db->where('session_id', $this->session_id);
     $this->CI->db->update('online', array('time' => $this->time));
    } else {
    $this->CI->db->set('username', $this->username);
    $this->CI->db->set('time', $this->time);
    $this->CI->db->set('session_id', $this->session_id);
    $this->CI->db->insert('online');
    }
  }
  
   /**
    * Returns the number of people online
    **/

  function countOnline()
  {
   $count = $this->CI->db->get('online');
   return $this->CI->db->count_all();
  }
   /**
   * Checks to see if your session is in the online list.
   **/
  function checkOnline()
  {
  $this->CI->db->where('session_id', $this->session_id);
  $this->CI->db->where('time', ($this->time - $this->time) > 300);
  $query = $this->CI->db->get('online');
  if ($query)
  {
    return TRUE;
  } else {
    return FALSE;
  }
  }
   /**
   * ToDo: Make this a function that lists the usernames in the online table.
   **/
  function listOnline()
  {

  }

} 