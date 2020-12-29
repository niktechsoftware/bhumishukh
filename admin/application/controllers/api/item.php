<?php require APPPATH . 'libraries/REST_Controller.php';
     class Item extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
    

       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */

	
	public function index_get($id = 0)
	{
       /* if(!empty($id)){
            $data = $this->db->get_where("client_due", ['customer_id' => $id])->row_array();
        }else{
            $data = $this->db->get("client_due")->result();
        }*/
       // echo "ha ha ha biz server";
     //echo "1";
      $input = $this->input->post();
     // print_r($input);
     $this->db->insert("contactus",$input);
     $data="success";
     $this->response($data, REST_Controller::HTTP_OK);
     $this->response($data, REST_Controller::HTTP_OK); 
     $news=$this->db->get("latestnews",$input);
     print_r($news);
      $this->response($data, REST_Controller::HTTP_OK); 
     $staff=$this->db->get("employee_info",$input);
     print_r($staff);
   $this->response($data, REST_Controller::HTTP_OK);
	 }
  /**
     * Get All Data from this method.
     *
     * @return Response
    */
   public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('items',$input);
     
        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
    } 
     public function getNotice()
     {
       echo "1";
          
     }
    public function index_get1($id = 0)
	{
       /* if(!empty($id)){
           $data = $this->db->get_where("client_due", ['customer_id' => $id])->row_array();
        }else{
            $data = $this->db->get("client_due")->result();
        }*/
       // echo "ha ha ha biz server";
     //echo "1";
      $input = $this->input->post();
     // print_r($input);
     $this->db->insert("contactus",$input);
     $data="success";
     $this->response($data, REST_Controller::HTTP_OK);
     $this->response($data, REST_Controller::HTTP_OK); 
     $news=$this->db->get("latestnews",$input);
     print_r($news);
    // $this->response($data, REST_Controller::HTTP_OK);
    
	 }
    	
}