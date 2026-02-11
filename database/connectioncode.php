<?
//Database Configuration
$host = 'localhost'; //Database host (usually 'localhost')
$dbname = 'watch_and_earn'; //Name of your database 
$username = 'root'; //Database username
$password = ''; //Database password

//Function to connect to the database
function connectDB(){
	global $host, $dbname, $username, $password; //Try to connect to the database using PDO
	try{
		$conn = new PDO("mysql:$host;dbname=$dbname;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); // Set PDO error mode to exception\
		return $conn
	}catch (PDOException $e){
		die("Database connection failed: " . $e->getMessage())
	}
} 

//General function to execute any query data (INSERT, UPDATE, DELETE)
function executeQuery($query, $params){
	try{
		$conn = connectDB();
		$stmt = $conn->prepare($query);
		return $stmt->execute($params);
	} catch (PDOException $e){
		echo "Query failed: " . $e->getMessage();
		return false;
	}
}

//General function to select data (SELECT)
function fetchData($query, $params = []){
	try{
		$conn = connectDB();
		$stmt = $conn->prepare($query);
		$stmt->execute($params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e){
		echo "Select query failed: " . $e->getMessage();
		return false;
	}
}

// ================= USER MANAGEMENT =========================

//Register a new user 
function register_user($username, $password){
	$hashed_password = password_hash($password, PASSWORD_BCRYPT);// Hash the password
	$query = "INSERT INTO users (username, password) VALUES (?,?)";
	return executeQuery($query, [$username, $hashed_password]);
}

//Delete user by user_id
function delete_user($user_id){
	$query = "DELETE FROM users WHERE user_id = ?";
	return deleteData($query, [$user_id]);
}

//Fetch user details by user_id
function get_user($user_id){
	$query = "SELECT * FROM users WHERE user_id = ?";
	return fetchData($query, [$user_id])
}

//Update user points 
function update_user_points($user_id, $points){
	$query = "UPDATE users SET points = points + ? WHERE user_id = ?";
	return executeQuery($query, [$points, $user_id])
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