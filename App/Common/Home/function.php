<?php
function get_next_project_flow_user_info($code=0){
	$result = false;
	$Projectstatus = D('Projectstatus');
	$Projectstatus_list = $Projectstatus->where("code = {$code} and code <> -1 and code <> 99")->select();
	if($Projectstatus_list){
		$next_department_id = $Projectstatus_list[0]["department_id"];
		$next_job_type = $Projectstatus_list[0]["job_type"];
		if($next_job_type == 0){
			//领导
			$wherepre = " and app_job.is_admin = 1";
		}else{
			$wherepre = "";
		}
		$next_flow_user_info = M()->query("SELECT
app_employee.id,
app_employee.job_id,
app_employee.department_id,
app_employee.`password`,
app_employee.`name`,
app_employee.create_time,
app_employee.update_time,
app_job.is_admin,
app_job.`name` as job_name
FROM
app_employee
LEFT JOIN app_job ON app_employee.job_id = app_job.id AND app_employee.department_id = app_job.department_id
WHERE app_employee.department_id = {$next_department_id} {$wherepre}");
		$result = $next_flow_user_info;
	}
	return $result;
}

function add_next_project_flow($code = 0, $project_id, $t_employee_id){
	$project_info = D("Project")->find($project_id);
	$Projectstatus = D("Projectstatus")->where("code = {$code}")->select();
	$Employee_info = D("Employee")->where("id = {$t_employee_id}")->find();
	$Projectflowlog = D("Projectflowlog");
	$data = array();
	$data["project_id"] = $project_id;
	$data["plan_complete_time"] = 0;
	$data["complete_time"] = 0;
	$data["f_employee_id"] = mysession('uid');
	$data["t_employee_id"] = $t_employee_id;
	$data["name"] = "[".$project_info["name"]."]项目目前处在 [".$Projectstatus[0]["status"]."] 状态,等待 [".$Employee_info["name"]."] 下一步处理!";
	$data["status"] = 0;
	$data["create_time"] = time();
	// add_project_action_log($project_id, mysession('uname')."将 [".$project_info["name"]."] 项目 移交给了 [".$Employee_info["name"])."]";
	$re = $Projectflowlog->add($data);
	import('@.Common.MQTT');
	$mqtt = new MQTT("42.96.146.139", 1883, "PHP_MQTT_Client2");
	if($mqtt->connect()){
		// $mqtt->publish("/user/".$message_arr["to_userid"], $message, 0);
		$mqtt->publish("/pro_user/".$t_employee_id, "  http://project.card7.net/", 0);
	}
	return $re;
}

function get_next_task_flow_user_info($code=0){
	$result = false;
	$myuid = mysession("uid");
	$my_info = D("Employee")->where("id = {$myuid}")->find();
	$Taskstatus = D('Taskstatus');
	$Taskstatus_list = $Taskstatus->where("code = {$code} and code <> -1 and code <> 99")->select();
	if($Taskstatus_list){
		$next_department_type = $Taskstatus_list[0]["department_type"];
		$next_job_type = $Taskstatus_list[0]["job_type"];
		$wherepre = " 1";
		if($next_department_type == 0){
			//本部门
			$wherepre .= " and app_employee.department_id = ".$my_info["department_id"];
		}else if($next_department_type == 1){
			//任何部门
			$wherepre .= "";
		}
		if($next_job_type == 0){
			//上司
			$wherepre .= " and app_job.is_admin = 1";
		}else if($next_job_type == 1){
			//下属
			$wherepre .= " and app_job.is_admin = 0";
		}else if($next_job_type == 2){
			//任何人
			$wherepre .= "";
		}
		$next_task_flow_user_info = M()->query("SELECT
app_employee.id,
app_employee.job_id,
app_employee.department_id,
app_employee.`password`,
app_employee.`name`,
app_employee.create_time,
app_employee.update_time,
app_job.is_admin,
app_job.`name` as job_name
FROM
app_employee
LEFT JOIN app_job ON app_employee.job_id = app_job.id AND app_employee.department_id = app_job.department_id
WHERE {$wherepre}");
		$result = $next_task_flow_user_info;
	}
	return $result;
}

function add_next_task_flow($code = 0, $project_id, $project_flow_id, $task_id, $t_employee_id){
	$project_info = D("Project")->find($project_id);
	$Task_info = D("Task")->find($task_id);
	$Taskstatus = D("Taskstatus")->where("code = {$code}")->select();
	$Employee_info = D("Employee")->where("id = {$t_employee_id}")->find();
	$Taskflowlog = D("Taskflowlog");
	$data = array();
	$data["project_id"] = $project_id;
	$data["project_flow_id"] = $project_flow_id;
	$data["task_id"] = $task_id;
	$data["complete_time"] = 0;
	$data["f_employee_id"] = mysession('uid');
	$data["t_employee_id"] = $t_employee_id;
	$data["name"] = "[".$project_info["name"]."]项目 [".$Task_info["name"]."] 任务目前处在 [".$Taskstatus[0]["status"]."] 状态,等待 [".$Employee_info["name"]."] 下一步处理!";
	$data["status"] = 0;
	$data["create_time"] = time();
	// add_project_action_log($project_id, mysession('uname')."将 [".$project_info["name"]."] 项目 移交给了 [".$Employee_info["name"])."]";
	$re = $Taskflowlog->add($data);
	import('@.Common.MQTT');
	$mqtt = new MQTT("42.96.146.139", 1883, "PHP_MQTT_Client2");
	if($mqtt->connect()){
		// $mqtt->publish("/user/".$message_arr["to_userid"], $message, 0);
		$mqtt->publish("/pro_user/".$t_employee_id, "  http://project.card7.net/", 0);
	}
	return $re;
}