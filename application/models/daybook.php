<?php
Class Daybook extends CI_Model{

function outer_daybook(){
 return $this->db->get("outer_daybook");

}
function inner_daybook(){
  return $this->db->get("inner_daybook");
 
 }


}
?>