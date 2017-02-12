<?php

class Parts extends CI_Model
{
	var $data = array(
			array('part_id' => '1', 'part_code' => 'a1', 'CA_code' => '#000000', 'manufacturer' => 'bcit', 'built_date' => "02-08-2017 8:30"),
			array('part_id' => '2', 'part_code' => 'a2', 'CA_code' => '#000001', 'manufacturer' => 'bcit', 'built_date' => "02-08-2017 11:45"),
			array('part_id' => '3', 'part_code' => 'a3', 'CA_code' => '#000002', 'manufacturer' => 'bcit', 'built_date' => "02-08-2017 15:10"),

			array('part_id' => '4', 'part_code' => 'b1', 'CA_code' => '#000003', 'manufacturer' => 'ubc', 'built_date' => "02-06-2017 08:50"),
			array('part_id' => '5', 'part_code' => 'b2', 'CA_code' => '#000004', 'manufacturer' => 'ubc', 'built_date' => "02-06-2017 11:55"),
			array('part_id' => '6', 'part_code' => 'b3', 'CA_code' => '#000005', 'manufacturer' => 'ubc', 'built_date' => "02-06-2017 14:35"),

			array('part_id' => '7', 'part_code' => 'c1', 'CA_code' => '#000006', 'manufacturer' => 'sfu', 'built_date' => "02-05-2017 08:45"),
			array('part_id' => '8', 'part_code' => 'c2', 'CA_code' => '#000007', 'manufacturer' => 'sfu', 'built_date' => "02-05-2017 12:10"),
			array('part_id' => '9', 'part_code' => 'c3', 'CA_code' => '#000008', 'manufacturer' => 'sfu', 'built_date' => "02-05-2017 16:15"),

			array('part_id' => '10', 'part_code' => 'm1', 'CA_code' => '#000009', 'manufacturer' => 'ut', 'built_date' => "02-04-2017 08:25"),
			array('part_id' => '11', 'part_code' => 'm2', 'CA_code' => '#00000A', 'manufacturer' => 'ut', 'built_date' => "02-04-2017 12:00"),
			array('part_id' => '12', 'part_code' => 'm3', 'CA_code' => '#00000B', 'manufacturer' => 'ut', 'built_date' => "02-04-2017 15:20"),

			array('part_id' => '13', 'part_code' => 'r1', 'CA_code' => '#00000C', 'manufacturer' => 'kpu', 'built_date' => "02-03-2017 08:50"),
			array('part_id' => '14', 'part_code' => 'r2', 'CA_code' => '#00000D', 'manufacturer' => 'kpu', 'built_date' => "02-03-2017 11:15"),
			array('part_id' => '15', 'part_code' => 'r3', 'CA_code' => '#00000E', 'manufacturer' => 'kpu', 'built_date' => "02-03-2017 14:45"),

			array('part_id' => '16', 'part_code' => 'w1', 'CA_code' => '#00000F', 'manufacturer' => 'vcc', 'built_date' => "02-02-2017 08:40"),
			array('part_id' => '17', 'part_code' => 'w2', 'CA_code' => '#000010', 'manufacturer' => 'vcc', 'built_date' => "02-02-2017 11:35"),
			array('part_id' => '18', 'part_code' => 'w3', 'CA_code' => '#000011', 'manufacturer' => 'vcc', 'built_date' => "02-02-2017 15:00")
	);

	// Constructor
	function __construct()
	{
		parent::__construct();
	}

	// Gets the specified part (by id)
	function get($which)
	{
		foreach ($this->data as $record)
			if ($record['part_id'] == $which)
				return $record;
		return null;
	}

	public function count()
	{
        return sizeof($this->data);
    }
    
	// Gets all parts in stock
	function all()
	{
		return $this->data;
	}
}