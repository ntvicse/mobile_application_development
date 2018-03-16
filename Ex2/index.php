<script type="text/javascript" src="js.js"></script>
<?php
 echo'
          <p>Vị trí 1</p>
            <input type="text" id="lat1"><input type="text" id="lng1">
            <p>Vị trí 2</p>
            <input type="text" id="lat2"><input type="text" id="lng2">
            <button id="call" onclick="call()">Tính</button><br>
           	Khoảng cách là: <p id="kq"></p>
          ';
	require_once 'ws.php';
	if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
	    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
	}
	try {
			if(isset($_REQUEST['url'])){
				$url = explode("/",$_REQUEST['url']);
				$file = $_SERVER['DOCUMENT_ROOT'].$url[0].".php";
				if (file_exists($file)){
					require $file;
					header('Location: /'.$file.'',true,301);
				}
				else{
					header('Location: /404.html',true,301);
				}
			}
			else{

			}
	} catch (Exception $e) {
	    echo json_encode(Array('error' => $e->getMessage()));
	}
?>
