<?php


 
 class csv extends mysqli 
 {
 	private $state_csv = false ;
 	public function __construct()
 	{
 	  parent::__construct("localhost","root","","csv");
 	  if($this->connect_error){
 	  	echo "Faild connection".$this->connect_error;
 	  }
 	}

 	public function import($file){ 
 		$connection = mysqli_connect("localhost","root","","csv");
 		$file ="tp.csv";
 		$file = fopen($file, 'r');
 		while ($row = fgetcsv($file)) {
 		//print_r($row);
 			//var_dump($row);
 			$value = "'".implode("','", $row)."'" ;
              $q="INSERT INTO file(first,last,age) VALUES(".$value.") " ;

               //echo "<br>".$value;      
             
 			if ( $this->query($q) ) {
 				$this->state_csv = true ;
 			}else{
 				$this->state_csv = false;
 				echo $this->error ;
 			}
 	    }
        if ($this->state_csv ) {
       	 echo "file imported ";
     
       	 } else echo "erreur ";
         
 	}

public function export(){

	$this->state_csv = false ;
	$q = "SELECT t.first,t.last,t.age FROM file as t";
	$run = $this->query($q);
	if($run-> num_rows>0){
	    $fn = "csv_".uniqid()."csv";
		$file = fopen("files/".$fn, "w");
		while ($row = $run->fetch_array(MYSQLI_NUM)) {
		  if (fputcsv($file, $row)) {
		  	$this->state_csv = true ;
		  }else{
		  	$this->state_csv = false ;
		  }
          
		}
	  if ($this->state_csv) {
	  		echo "export succe";
	  	}else{
	  		echo "erreur";
	  	}	
	  	//fclose($file);
	}else{
		echo "no data";
	}	
}








}
?>

