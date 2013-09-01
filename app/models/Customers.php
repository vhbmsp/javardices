<?php

class Customers 
{

   private $db = [];

	private $first_names = ["Emily", "Jacob", "Michael", "Emma", "Joshua", "Madison", "Matthew", "Hannah", "Andrew", "Olivia", "Cletus", "Warner", "Sarah", "Billy", "Brittany", "Daniel", "David", "Cristman", "Colin", "Royalle"];
	private $last_names = ["Aaron", "Bolingbroke", "Crounse", "Duff", "Drake", "Downs", "Driver", "Jasper", "Jetter", "O'Leary", "O'Malley", "Neville", "Towers", "Tripp", "Trull", "Wakefield", "Waller", "Badger", "Bagley", "Baker"];
	private $states = ["Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"];

   
    public function start($count=200){



	for($i = 0; $i < $count; $i++){

		$obj = new stdClass();
		$obj->id = $i;
		$obj->first_name = $this->first_names[array_rand($this->first_names)];
		$obj->last_name  = $this->last_names[array_rand($this->last_names)];
		$obj->state 	 = $this->states[array_rand($this->states)];
		$obj->birth_date = $this->random_date();            

	        array_push($this->db, $obj);
	}


    }


    private function random_date(){
	$start_time = strtotime("1950-01-01");
	$end_time = time();

	$date = date("Y-m-d", mt_rand($start_time, $end_time));

	return $date;
    }


    public function find_all(){
	return $this->db;
    }

    public function find_by_id($id){
	return $this->db[$id];
    }

	
    public function store($customer){
	array_push($this->db, $customer);
    }

    public function delete($id){
	unset($this->db[$id]);
    }
}
