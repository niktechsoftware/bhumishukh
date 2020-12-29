<?php class common extends CI_Controller{
	function getCity(){
		$state = $this->input->post("state");
		$this->load->model("regmodel");
		$result = $this->regmodel->getCity($state);
	
		echo '<option value="">-City-</option>';
		foreach ($result->result() as $row):
		echo '<option value="'.$row->city.'">'.$row->city.'</option>';
		endforeach;
	}
	
	function getArea(){
		$state = $this->input->post("state");
		$city = $this->input->post("city");
		$this->load->model("regmodel");
		$result = $this->regmodel->getArea($state,$city);
	
		echo '<option value="">-Area-</option>';
		foreach ($result->result() as $row):
		echo '<option value="'.$row->area.'">'.$row->area.'</option>';
		endforeach;
	}
	
	function getPin(){
		$state = $this->input->post("state");
		$city = $this->input->post("city");
		$area = $this->input->post("area");
		$this->load->model("regmodel");
		$result = $this->regmodel->getPin($state,$city,$area);
	
		foreach ($result->result() as $row):
		echo $row->pin;
		endforeach;
	}
}