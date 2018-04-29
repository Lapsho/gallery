<?php

define('title', "Lapsho gallery");   

$img_arr = array(                           //Two-Dimensional image Arrays
	array("href" => "http://www.mulierchile.com/paisajes/paisajes-001.jpg", "name" => "якась природа", "description" => "купи слона", "size" => 949),
	array("href" => "https://i.pinimg.com/originals/0b/06/b0/0b06b062f47e821e426be44b298cf27d.jpg", "name" => "ще якась природа", "description" => "Проблемы с доступом к Джойказино?", "size" => 648),
	array("href" => "http://daxushequ.com/data/out/93/img60386692.jpg", "name" => "знов природа", "description" => "сервіс так-собі", "size" => 167),
	array("href" => "https://farm1.static.flickr.com/799/39347425630_7bf7ccfaf1_b.jpg", "name" => "і тут природа", "description" => "в далекій далекій галактиці...", "size" => 745),
	array("href" => "https://www.walldevil.com/wallpapers/a35/4211-wallpaper-nature-scenery-world.jpg", "name" => "а ще буває така природа", "description" => "ну купи слона", "size" => 365),
	array("href" => "http://www.osmais.com/wallpapers/201210/estrada-chao-wallpaper.jpg", "name" => "дуже природна природа", "description" => "могло б бути й краще: і дерева криві, і річки мілкі", "size" => 172),
	array("href" => "http://www.vol369.com/wp-content/uploads/2012/03/canyon.jpg", "name" => "тут могла бути ваша реклама", "description" => "шщмфові фтіфав бьфіавф имівар", "size" => 856),
	array("href" => "https://3.bp.blogspot.com/-FT1qi9oXVjY/VGJFeSUgJ-I/AAAAAAAASbA/rX0aOb-UDaM/s1600/-de-paisajes-hermosos.jpg", "name" => "виглядає природно", "description" => "valar morghulis", "size" => 267),
	array("href" => "http://wpnature.com/wp-content/uploads/2016/08/field-flowers-far-beautiful-variety-fondos-pantalla-paisajes-flores-hd-fields.jpg", "name" => "надприродна природа", "description" => "нічо так місцина", "size" => 961),
); 



// construction to restrict number the outputs image
$limit_img = 8;                                  //sets the maximum posible number of images, Now you do not need to manually fix all the values in the design below
												//fix only one change;
global $max_num_img;							//if $_GET is set and not bigger the $limit_img then we got desired number of images ($_GET = $max_num_img)
if(isset($_GET['max_num_img'])){    
		
	if($_GET['max_num_img'] < $limit_img){		//else we got default number of images ($limit_img)
		$max_num_img = $_GET['max_num_img'];	
	}else{
		$max_num_img = $limit_img;
	}

}else{
	$max_num_img = 5;
}


//a function that contains the html syntax. When applied inside the loop, it will be possible to print each individual image
function fetch_img($array, $key1){ //her needs to convey the name of the array $array and the value of the key $key1

global $fetch_precious;   		   //wel be applied outside this function. so there is a need for its global availability

$fetch_precious = "<li>\n";			//in this variable will contain all of our html code. we'll just add to it the all that we needed
$fetch_precious .= "<a href=\"" . $array[$key1]["href"] . "\"" . " data-fancybox=\"images\">\n";
$fetch_precious .= "<img src=\"" . $array[$key1]["href"] . "\" alt=\"купи рекламу\">\n";
$fetch_precious .= "</a>\n";
$fetch_precious .= "<h4>" . $array[$key1]["name"] . "</h3>\n";
$fetch_precious .= "<p>Опис: " . $array[$key1]["description"] . "</p>\n";
$fetch_precious .= "<p>Розмір: " . $array[$key1]["size"] . " kb</p>\n";
$fetch_precious .= "</li>\n";

}
				
?>