<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Phone;

class AjaxController extends Controller {


	public function phoneList()
	{

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
					'<a href="' . action('Admin\PhoneController@edit', $phone->id) . '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>'
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


	public function EditImage($id){
		echo true;
	}
}
