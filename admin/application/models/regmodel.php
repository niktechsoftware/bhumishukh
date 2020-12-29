<?php 
class regmodel extends CI_Model{

function getState(){
	//$school_code = $this->session->userdata("school_code");
	$result = $this->db->query("select DISTINCT state FROM city_state ORDER BY state");
	return $result;
}

function getCity($state){
	//$school_code = $this->session->userdata("school_code");
	$result = $this->db->query("select DISTINCT city FROM city_state WHERE state = '$state' ORDER BY city");
	return $result;
}

function getArea($state,$city){
	//$school_code = $this->session->userdata("school_code");
	$result = $this->db->query("select DISTINCT area FROM city_state WHERE city = '$city' AND state = '$state'  ORDER BY area");
	return $result;
}


function getPin($state,$city,$area){
	//$school_code = $this->session->userdata("school_code");
	$result = $this->db->query("select DISTINCT pin FROM city_state WHERE city = '$city' AND state = '$state' AND area = '$area'  ORDER BY area LIMIT 1");
	return $result;
}

}