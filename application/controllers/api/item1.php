<?php require APPPATH . 'libraries/REST_Controller.php';
     class Item1 extends REST_Controller {
    
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

	
	public function index_get()
	{
     //echo $id;
     
      
     // print_r($input);
     //$this->db->insert("contactus",$input);
     $data="success";
     
     $id = $this->input->get("cid");
     
     $this->db->where("client_code",$id);
     $news=$this->db->get("latestnews")->result();
     //print_r($news);
      //print_r($news);
         $this->response($news, REST_Controller::HTTP_OK);
     }
/*public function index_get1()
{
    echo "1";
    $id=$this->input->get("cid");
    $this->db->where("client_code",$id);
    $staff=$this->get("employee_info")->result();
    print_r($staff);
     $this->response($staff, REST_Controller::HTTP_OK);
}*/

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
    
    	
}