<?php require APPPATH . 'libraries/REST_Controller.php';
     class item5 extends REST_Controller {
    
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
$id=$this->input->get("cid");
   $ur=$this->input->get("uric");
 $this->db->where('client_code',$id);
    $this->db->where('depart_id',$ur);
   
    $image=$this->db->get("gallery")->result();
   // print_r($image);
    $this->response($image, REST_Controller::HTTP_OK);
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
   
    	
}