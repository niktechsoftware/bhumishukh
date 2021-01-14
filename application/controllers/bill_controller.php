<?php
Class Bill_controller extends CI_Controller{

public function saleProduct(){
		$data['subPage'] = 'Product';
		$data['title'] = "Product Sale";
		$data['smallTitle'] = "Sale / Product Sale";
		$data['pageTitle'] = "Product Sale";
		$data['mainContent'] = "admin/saleProduct";
		$data['headerCss'] = "headerCss/customerlistcss";
		$data['footerJs'] = "footerJs/customerlistjs";
		$this->load->view("includes/mainContent",$data);
	}

function pBillHistory(){
	$data['subPage'] = 'Purchase Bill History';
		$data['smallTitle'] = 'Purchase Bill History';
		$data['bigTitle'] = 'Purchase Bill History';
		$data['title'] = 'Purchase Bill History';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'admin/pBillHistory';
		$this->load->view("includes/mainContent", $data);

}
function sBillHistory(){
		$data['subPage'] = 'Sale Bill History';
		$data['smallTitle'] = 'Sale Bill History';
		$data['bigTitle'] = 'Sale Bill History';
		$data['title'] = 'Sale Bill History';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'admin/sBillHistory';
		$this->load->view("includes/mainContent", $data);

}
	

	}
	?>