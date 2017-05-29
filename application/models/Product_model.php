<?php
	class Product_model extends CI_Model{
		public function get_products($productID = NULL, $orderby = NULL, $search = NULL){
			$xml=simplexml_load_file(base_url()."assets/xml/products.xml");
			if($productID == NULL){
				$products = $xml->children();
				if($orderby == NULL){
					if($search != NULL){	
						$sortable = array();
						 foreach($xml->children() as $node) {
						    $sortable[] = $node;
						 }
						$searchQuery = array();
						foreach($sortable as $product=>$data){
							if(strpos(strtolower($data->productName), strtolower($search)) !== false){
								$searchQuery[] = $data;
							}
						}
						return $searchQuery;
					}else{
						return $products;
					}
					
				}else{
					 $sortable = array();
					 foreach($xml->children() as $node) {
					    $sortable[] = $node;
					 }

					 function compare_brand($a, $b) {
						 return strnatcmp($a->brand, $b->brand);
					 }

					 function compare_price($a, $b) {
						 return strnatcmp($a->price, $b->price);
					 }

					 function compare_category($a, $b) {
						 return strnatcmp($a->category, $b->category);
					 }

					 function compare_price_desc($a, $b) {
						 return strnatcmp($a->price, $b->price);
					 }
					 function compare_name($a, $b) {
						 return strnatcmp($a->productName, $b->productName);
					 }
				 
					if($orderby == "brand"){
						usort($sortable, __NAMESPACE__ . '\compare_brand');
					}
					if($orderby == "price"){
						usort($sortable, __NAMESPACE__ . '\compare_price');
					}
					if($orderby == "price-desc"){
						usort($sortable, __NAMESPACE__ . '\compare_price_desc');
						$sortable = array_reverse($sortable);
					}
					if($orderby == "name"){
						usort($sortable, __NAMESPACE__ . '\compare_name');
					}
					if($orderby == "category"){
						usort($sortable, __NAMESPACE__ . '\compare_category');
					}
					if($search != NULL){	
						$searchQuery = array();
						foreach($sortable as $product=>$data){
							if(strpos(strtolower($data->productName), strtolower($search)) !== false){
								$searchQuery[] = $data;
							}
						}
						return $searchQuery;
					}else{
						return $sortable;
					}
					
					
				}
				
			}

			foreach($xml->children() as $child){
				if($child['productID']==$productID){
					return $child;
				}
			}
			//return $xml->children()[$productID];
		}

		
	}

	