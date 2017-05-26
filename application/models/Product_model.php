<?php
	class Product_model extends CI_Model{

		public function get_products($productID = NULL){
			$xml=simplexml_load_file(base_url()."assets/xml/products.xml");
			if($productID == NULL){
				return $xml->children();
			}

			foreach($xml->children() as $child){
				if($child['productID']==$productID){
					return $child;
				}
			}
			//return $xml->children()[$productID];
		}

		
	}