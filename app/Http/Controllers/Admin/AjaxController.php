<?php namespace App\Http\Controllers\Admin;

use App\Contract;
use App\Http\Controllers\Controller;
use App\Phone;
use Khill\Fontawesome\FontAwesome as FA;

class AjaxController extends Controller {


	public function phoneList()
	{
		$FA = new FA();

		$phones = Phone::all();
		$iTotalRecords = count($phones);
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		$sEcho = intval($_REQUEST['draw']);

		$records = [];
		$records["data"] = [];

		if(empty($_REQUEST['product_price_from'])&&!empty($_REQUEST['product_price_to']))
		{
			$_REQUEST['product_price_from'] = 0.01;
		}
		if(!empty($_REQUEST['product_price_from'])&&empty($_REQUEST['product_price_to']))
		{
			$_REQUEST['product_price_to'] = 99999999999999999999999999999999;
		}
		if(empty($_REQUEST['product_created_from'])&&!empty($_REQUEST['product_created_to']))
		{
			$_REQUEST['product_created_from']="01/01/1970";
		}
		if(!empty($_REQUEST['product_created_from'])&&empty($_REQUEST['product_created_to']))
		{
			$_REQUEST['product_created_to']="30/12/2025";

		}
		if (isset($_REQUEST['product_created_from'])) {
			if (!empty($_REQUEST['product_created_from'])) {
				$date = explode('/',$_REQUEST['product_created_from']);
				$created_from = $date['2'].'/'.$date[1].'/'.$date['0'];
				$_REQUEST['product_created_from'] = $created_from." 00:00:00";
			}
		}
		if (isset($_REQUEST['product_created_to'])) {
			if(!empty($_REQUEST['product_created_to'])){
				$date = explode('/',$_REQUEST['product_created_to']);
				$created_to = $date['2'].'/'.$date[1].'/'.$date['0'];
				$_REQUEST['product_created_to'] = $created_to." 23:59:59";
			}
		}
		foreach($phones as $phone) {
			if (!empty($_REQUEST['product_id'])) {
				if(strpos($phone->id, $_REQUEST['product_id']) !== false)$product_id=true;
				else{
					$product_id=false;
				}
			}
			else{
				$product_id=false;
			}
			if (!empty($_REQUEST['phone_brand'])) {
				if(strpos($phone->brand, $_REQUEST['phone_brand']) !== false)$phone_brand=true;
				else{
					$phone_brand=false;
				}
			}
			else{
				$phone_brand=false;
			}
			if (!empty($_REQUEST['phone_model'])) {
				if(strpos($phone->model, $_REQUEST['phone_model']) !== false)$phone_model=true;
				else{
					$phone_model=false;
				}
			}
			else{
				$phone_model=false;
			}
			if (!empty($_REQUEST['product_price_from'])) {
				if($phone->costs>=$_REQUEST['product_price_from'])
				{
					$price_from = true;
				}
				else{
					$price_from = false;
				}
			}
			else{
				$price_from = false;
			}
			if (!empty($_REQUEST['product_price_to'])) {
				if($phone->costs<=$_REQUEST['product_price_to'])
				{
					$price_to = true;
				}
				else{
					$price_to = false;
				}
			}
			else{
				$price_to = false;
			}
			if($price_to&&$price_from){
				$price_range=true;
			}
			else{
				$price_range=false;
			}
			if (!empty($_REQUEST['product_created_from'])) {
				if(strtotime($phone->created_at->toDateTimeString()) >= strtotime($_REQUEST['product_created_from'])){
					$created_from = true;
				}
				else{
					$created_from = false;
				}
			}
			else{
				$created_from = false;
			}
			if (!empty($_REQUEST['product_created_to'])) {
				if(strtotime($phone->created_at->toDateTimeString()) <= strtotime($_REQUEST['product_created_to']))
				{
					$created_to = true;
				}
				else{
					$created_to = false;
				}
			}
			else{
				$created_to = false;
			}
			if($created_to&&$created_from){
				$created_range=true;
			}
			else{
				$created_range=false;
			}
			if($product_id||$phone_model||$phone_brand||$price_range||$created_range){
				$records["data"][] = [
					$phone->id,
					$phone->brand,
					$phone->model,
					$phone->costs,
					$phone->created_at->toDateTimeString(),
					'<a href="' . action('Admin\PhoneController@edit', $phone->id) . '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>'
				];
			}
			elseif(!isset($_REQUEST['product_id'])){
				$records["data"][] = [
					$phone->id,
					$phone->brand,
					$phone->model,
					$phone->costs,
					$phone->created_at->toDateTimeString(),
					'<a href="' . action('Admin\PhoneController@edit', $phone->id) . '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a> <a href="javascript:remove(\''.action('Admin\PhoneController@destroy',$phone->id).'\');" class="btn btn-xs default btn-editable">'. $FA->icon("exclamation-triangle").'Delete</a>'
				];
			}
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = count($records['data']);
		echo json_encode($records);
	}

	public function contractList()
	{
		$FA = new FA();

		$contracts = Contract::all();
		$contracts->load('phone');

		$iTotalRecords = count($contracts);
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		$sEcho = intval($_REQUEST['draw']);
		$filter = $_REQUEST;
		$records = [];
		$records["data"] = [];

		/*
		 * set price_from to minimum when price_from is empty
		 */
		if(empty($filter['price_from'])&&!empty($filter['price_to']))
		{
			$filter['price_from'] = 0.01;
		}
		/*
		 * set price_to to maximum when price_from is empty
		 */
		if(!empty($filter['price_from'])&&empty($filter['price_to']))
		{
			$filter['price_to'] = 99999999999999999999999999999999;
		}

		/*
		 * set phone_price_from to minimum and add bool if changed if phone_price_from is empty
		 */
		if(empty($filter['phone_price_from'])&&!empty($filter['phone_price_to']))
		{
			$phone_price_changed = true;
			$filter['phone_price_from'] = 0.01;
		}
		else
		{
			$phone_price_changed = false;
		}
		/*
		 * set phone_price_to to maximum when phone_price_from is empty
		 */
		if(!empty($filter['phone_price_from'])&&empty($filter['phone_price_to']))
		{
			$filter['phone_price_to'] = 99999999999999999999999999999999;
		}

		/*
		 * set length_from to minimum if phone_price_from is empty
		 */
		if(empty($filter['length_from'])&&!empty($filter['length_to']))
		{
			$filter['length_from'] = 1;
		}
		else
		{
			$phone_price_changed = false;
		}
		/*
		 * set length_to to maximum when phone_price_from is empty
		 */
		if(!empty($filter['length_from'])&&empty($filter['length_to']))
		{
			$filter['length_to'] = 99999999999999999999999999999999;
		}

		if(empty($filter['created_from'])&&!empty($filter['created_to']))
		{
			$filter['created_from']="01/01/1970";
		}
		if(!empty($filter['created_from'])&&empty($filter['created_to']))
		{
			$filter['created_to']="30/12/2025";

		}

		if (isset($filter['created_from'])) {
			if (!empty($filter['created_from'])) {
				$date = explode('/',$filter['created_from']);
				$created_from = $date['2'].'/'.$date[1].'/'.$date['0'];
				$filter['created_from'] = $created_from." 00:00:00";
			}
		}
		if (isset($filter['created_to'])) {
			if(!empty($filter['created_to'])){
				$date = explode('/',$filter['created_to']);
				$created_to = $date['2'].'/'.$date[1].'/'.$date['0'];
				$filter['created_to'] = $created_to." 23:59:59";
			}
		}

		if(!isset($filter['id'])) {
			foreach($contracts as $contract) {
				$records['data'][] = [
					$contract->id,
					$contract->name,
					$contract->cost,
					$contract->length.' years',
					$contract->phone->brand . ' ' . $contract->phone->model,
					$contract->phone_price,
					$contract->created_at->toDateTimeString(),
					'<a href="' . action('Admin\ContractController@edit', $contract->id) . '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a> <a href="javascript:remove(\''.action('Admin\ContractController@destroy',$contract->id).'\');" class="btn btn-xs default btn-editable">'. $FA->icon("exclamation-triangle").'Delete</a>',
				];
			}
		}else {
			foreach ($contracts as $contract) {
				if (!empty($filter['id'])) {
					if(strpos($contract->id, $filter['id']) !== false)$id=true;
					else{
						$id=false;
					}
				} else{
					$id=false;
				}
				if (!empty($filter['phone'])) {
					if(strpos($contract->phone->brand.' '.$contract->phone->model, $filter['phone']) !== false)$phone=true;
					else{
						$phone=false;
					}
				} else{
					$phone=false;
				}
				if (!empty($filter['name'])) {
					if(strpos($contract->name, $filter['name']) !== false)$name=true;
					else{
						$name=false;
					}
				} else{
					$name=false;
				}
				if (!empty($filter['length_from'])) {
					if ($contract->length >= $filter['length_from']) {
						$length_from = true;
					} else {
						$length_from = false;
					}
				} else {
					$length_from = false;
				}
				if (!empty($filter['length_to'])) {
					if ($contract->length <= $filter['length_to']) {
						$length_to = true;
					} else {
						$length_to = false;
					}
				} else {
					$length_to = false;
				}
				if (!empty($filter['phone_price_from'])||$phone_price_changed) {
					$filter['phone_price_from'] = 0;
					if ($contract->phone_price >= $filter['phone_price_from']) {
						$phone_price_from = true;
					} else {
						$phone_price_from = false;
					}
				} else {
					$phone_price_from = false;
				}
				if (!empty($filter['phone_price_to'])) {
					if ($contract->phone_price <= $filter['phone_price_to']) {
						$phone_price_to = true;
					} else {
						$phone_price_to = false;
					}
				} else {
					$phone_price_to = false;
				}
				if ($phone_price_to && $phone_price_from) {
					$phone_price_range = true;
				} else {
					$phone_price_range = false;
				}
				if (!empty($filter['price_from'])) {
					if ($contract->cost >= $filter['price_from']) {
						$price_from = true;
					} else {
						$price_from = false;
					}
				} else {
					$price_from = false;
				}
				if (!empty($filter['price_to'])) {
					if ($contract->cost <= $filter['price_to']) {
						$price_to = true;
					} else {
						$price_to = false;
					}
				} else {
					$price_to = false;
				}
				if ($price_to && $price_from) {
					$price_range = true;
				} else {
					$price_range = false;
				}
				if (!empty($filter['created_from'])) {
					if (strtotime($contract->created_at->toDateTimeString()) >= strtotime($filter['created_from'])) {
						$created_from = true;
					} else {
						$created_from = false;
					}
				} else {
					$created_from = false;
				}
				if (!empty($filter['created_to'])) {
					if (strtotime($contract->created_at->toDateTimeString()) <= strtotime($filter['created_to'])) {
						$created_to = true;
					} else {
						$created_to = false;
					}
				} else {
					$created_to = false;
				}
				if ($created_to && $created_from) {
					$created_range = true;
				} else {
					$created_range = false;
				}
				if($length_to && $length_from)
				{
					$length_range = true;
				}
				else{
					$length_range = false;
				}
				if ($created_range || $price_range || $phone_price_range || $id || $length_range || $name || $phone) {
					$records['data'][] = [
						$contract->id,
						$contract->name,
						$contract->cost,
						$contract->length.' years',
						$contract->phone->brand . ' ' . $contract->phone->model,
						$contract->phone_price,
						$contract->created_at->toDateTimeString(),
						'<a href="' . action('Admin\ContractController@edit', $contract->id) . '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a> <a href="javascript:remove(\''.action('Admin\ContractController@destroy',$contract->id).'\');" class="btn btn-xs default btn-editable">'. $FA->icon("exclamation-triangle").'Delete</a>',
					];
				}

			}
		}

		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = count($records['data']);
		echo json_encode($records);
	}

}
