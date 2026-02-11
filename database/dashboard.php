<?php
//Database Configuration
include 'db.php';
include 'conn.php';

//==============================DASHBOARD MANAGEMENT =========================///
//Update user points 
function update_user_points($user_id, $points){
	$query = "UPDATE users SET points = points + ? WHERE user_id = ?";
	return executeQuery($query, [$points, $user_id]);
}

//================= VIDEO MANAGEMENT ====================
//Add a new video
function add_video($video_url, $watch_time){
	$query = "INSERT INTO videos (video_url, watch_time) VALUES (?,?)";
	return executeQuery($query, [$video_url, $watch_time]);
}

//Fetch all available videos 
function get_videos() {
	$query = "SELECT * FROM videos";
	return fetchData($query);
}

//================ WATCH TRACKING =======================
//Track when a user watches a video 
function track_video_watch($user_id, $video_id){
	//Check if the user already watched this video
	$query = "SELECT * FROM watch_history WHERE user_id = ? AND video_id = ?";
	$result = fetchData($query, [$user_id, $video_id]);

	if(count($result) == 0){
		//Insert watch history if not already watched
		$query = "INSERT INTO watch_history(user_id, video_id) VALUES (?,?)";
		return executeQuery($query, [$user_id, $video_id]);
	}else {
		return false; //Already watched
	}
}

//=================POINTS MANAGEMENT ============================
//Award points after a video is watched
function award_points_for_watching($user_id, $video_id, $points = 10){
	//Track the video watch first
	$watch_tracked = track_video_watch($user_id, $video_id);

	if($watch_tracked){
		//If the video watch is successfully tracked, update user points 
		return update_user_points($user_id, $points);
	}else {
		return false; //User already watched the video
	}
}
?>