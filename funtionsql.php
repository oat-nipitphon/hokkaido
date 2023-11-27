<?php
		require_once("nusoap/lib/nusoap.php");
		include 'connect_db.php'; 
		//Create a new soap server
		$server = new soap_server();
		 
		//Define our namespace
		$namespace = "http://127.0.0.1/hokkaido/funtionsql.php";
		$server->wsdl->schemaTargetNamespace = $namespace;
		
		//Configure our WSDL
		$server->configureWSDL("getProduct");
		
		//Add ComplexType
		$server->wsdl->addComplexType( 
			'DataList', 
			'complexType', 
			'struct', 
			'all', 
			'', 
			   array( 
					'Product_ID' => array('name' => 'CustomerID', 'type' => 'xsd:string'), 
					'Product_name'  => array('name' => 'Username', 'type'  => 'xsd:string'),
					'Product_Qty'  => array('name' => 'Password', 'type'  => 'xsd:string'),
					'Saleprice'  => array('name' => 'Name', 'type'  => 'xsd:string'),
					'Add'  => array('name' => 'Email', 'type'  => 'xsd:string')
                                ) 
		); 
		
		//Add ComplexType
		$server->wsdl->addComplexType( 
			'DataListResult', 
			'complexType', 
			'array', 
			'', 
			'SOAP-ENC:Array', 
			array(), 
			array( 
				array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:DataList[]') 
			), 
			'tns:DataList' 
		); 

		//Register our method and argument parameters
        $varname = array(
                   'Product_ID' => "xsd:string"
        );
		
		// Register service and method
		$server->register('resultCustomer',    // method name 
			$varname, // input parameters 
			array('return' => 'tns:DataListResult')); 

		 
		function resultCustomer()
		{
				$strSQL = "SELECT * FROM product";
				$objQuery = mysqli_query($strSQL) or die (mysql_error());
				$intNumField = mysqli_num_fields($objQuery);
				$resultArray = array();
				while($obResult = mysqli_fetch_array($objQuery))
				{
                                    echo $obResult["Product_name"];
					$arrCol = array();
					for($i=0;$i<$intNumField;$i++)
					{
						$arrCol[mysql_field_name($objQuery,$i)] = $obResult[$i];
					}
					array_push($resultArray,$arrCol);
				}
				
				mysql_close($objConnect);

				return $resultArray;
		}
		 
		// Get our posted data if the service is being consumed
		// otherwise leave this data blank.
		$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
		 
		// pass our posted data (or nothing) to the soap service
		$server->service($POST_DATA);
		exit(); 
?>