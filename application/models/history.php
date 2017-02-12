<?php
class History extends CI_Model 
{

	// ID | WHO | CATEGORY | TYPE | PRICE | DESCRIPTION | DATE 
    //purchases, assemblies, and shipments;
	var $data = array(
		array(
			'id' => '1',
			'who' => 'Dalton',
			'category' => 'Purchases',
			'type' => 'Returned',
			'price' => 20,
			'description' => 'Did not like the product',
			'date' => '02-08-2017 08:30'
			),
		array(
			'id' => '2',
			'who' => 'Jason',
			'category' => 'Shipments',
			'type' => 'Ordered',
			'price' => 100,
			'description' => 'order a view more parts to the collection',
			'date' => '02-08-2017 12:20'
			),
      array(
			'id' => '3',
			'who' => 'Arnold',
			'category' => 'Assemblies',
			'type' => 'Built',
			'price' => null,
			'description' => 'Arnold built a robot',
			'date' => '02-08-2017 13:00'
			),
      array(
			'id' => '4',
			'who' => 'Dalton',
			'category' => 'Shipments',
			'type' => 'Arrived',
			'price' => null,
			'description' => 'Received a shipment of parts',
			'date' => '02-07-2017 12:00'
			),
      array(
			'id' => '5',
			'who' => 'Jason',
			'category' => 'Shipments',
			'type' => 'Ordered',
			'price' => 2000,
			'description' => 'order a few more parts to the collection',
			'date' => '02-09-2017 15:00'
			),
      array(
			'id' => '6',
			'who' => 'Jason',
			'category' => 'Purchases',
			'type' => 'Purchased',
			'price' => 50,
			'description' => 'Jason purchased a part',
			'date' => '02-08-2017 20:20'
			),
      array(
			'id' => '7',
			'who' => 'Dalton',
			'category' => 'Shipments',
			'type' => 'Arrived',
			'price' => null,
			'description' => 'Shipment arrived and viewed by dalton',
			'date' => '02-08-2017 12:00'
			),
      array(
			'id' => '8',
			'who' => 'Arnold',
			'category' => 'Purchases',
			'type' => 'Returned',
			'price' => 524,
			'description' => 'Arnold didn\'t like the part/products',
			'date' => '02-08-2017 12:00'
			),
       		array(
			'id' => '9',
			'who' => 'Dalton',
			'category' => 'Assemblies',
			'type' => 'Ordered',
			'price' => 1374,
			'description' => 'Built a robot',
			'date' => '02-08-2017 12:00'
			),
		array(
			'id' => '10',
			'who' => 'Arnold',
			'category' => 'Shipments',
			'type' => 'Arrived',
			'price' => null,
			'description' => 'The oh oh so awesome parts have arrived from the
							shipment containers from the shore line. The parts will
							be inspected later on in the day.',
			'date' => '02-08-2017 12:00'
			)
	);
	
	// Constructor
	function __construct()
	{
		parent::__construct();
	}
	
	// retrieve a single record
	function get($which)
	{
		foreach ($this->data as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}
	
	public function count()
	{
        return sizeof($this->data);
    }

	// retrieve all of the records
	function all()
	{
		return $this->data;
	}


	public function getSpent()
	{
		$moneySpent = 0;
		foreach ($this->data as $record) 
		{
			if ($record['category'] == 'Purchases') 
			{
				$moneySpent += $record['price'];
			}
		}
		return $moneySpent;
	}


	public function getEarned()
	{
		$moneyEarned = 0;
		foreach ($this->data as $record) 
		{
			if ($record['category'] == 'Shipments') 
			{
				$moneyEarned += $record['price'];
			}
		}
		return $moneyEarned;
	}
}