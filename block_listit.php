<?php //$Id: block_listit.php,v 1.8.22.7 2013/11/19 16:47:13 www Exp 

class block_listit extends block_base 
{ 
	function init() 
	{
	         $this->title = get_string('pluginname','block_listit') ;  
	}	

	function get_content() 
	{   
		global $USER;    
		global $course;    
		

		
		$srvpath = "http://lernserver.el.haw-hamburg.de/haw/listit/index.php" // Live-Server
		// $srvpath = "http://localhost/haw/listit/index.php"                 // Dev-Server 

		."?n1=" .base64_encode( rawurlencode( $USER->firstname	) )
		."&n2=" .base64_encode( rawurlencode( $USER->lastname	) )
		."&e1=" .base64_encode( rawurlencode( $USER->email 		) )
		."&u1=" .base64_encode( rawurlencode( $USER->username	) )
		."&m1=" .base64_encode( rawurlencode( $USER->id ) )        
		."&c1=" .base64_encode( rawurlencode( $course->id ) )       
		."&cn=" .base64_encode( rawurlencode( $course->fullname ) )       
		."&r1=" .rand(100000, 999999);

        $contentA = "<div style=\" border:thin #CCC solid; text-align:center;\"><a target=\"_blank\" href=".$srvpath."/>ZUR LISTE</a></div>";

		
		

		if ($this->content !== NULL) 
		{
			return $this->content;    
		}   
		$this->content = new stdClass;    
		$this->content->text = $contentA;    
		$this->content->footer = '';    

		return $this->content;	
	}	
		
	function hide_header() 
	{	
		return false;	
	}
	
	public function instance_allow_multiple() 
	{
      return false;
    }
    
    public function applicable_formats() 
    {
      return array
      (
          'site-index' => false,
          'course-view' => true, 
          'my-index' => false, 
          'mod' => false, 
      );
    }
    
}?>
