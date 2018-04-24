<?php

define('title', "<title>Lapsho galery</title>");   

$img_arr = array(
	"https://i.pinimg.com/originals/0b/06/b0/0b06b062f47e821e426be44b298cf27d.jpg",
	"http://daxushequ.com/data/out/93/img60386692.jpg",
	"https://farm1.static.flickr.com/799/39347425630_7bf7ccfaf1_b.jpg",
	"https://www.walldevil.com/wallpapers/a35/4211-wallpaper-nature-scenery-world.jpg",
	"http://www.osmais.com/wallpapers/201210/estrada-chao-wallpaper.jpg",
	"http://www.vol369.com/wp-content/uploads/2012/03/canyon.jpg",
	"https://3.bp.blogspot.com/-FT1qi9oXVjY/VGJFeSUgJ-I/AAAAAAAASbA/rX0aOb-UDaM/s1600/-de-paisajes-hermosos.jpg",
	"http://wpnature.com/wp-content/uploads/2016/08/field-flowers-far-beautiful-variety-fondos-pantalla-paisajes-flores-hd-fields.jpg",
	"http://www.mulierchile.com/paisajes/paisajes-001.jpg"
	);                              //масив з переліком доступних посилань
                   


function just_for_lulz($arr){       //функція для генерації випадкового посилання на зображення
 
	global $fetch_precious;         //глобальна змінна, в яку буде зберігатись посилання з застосованої функції,
									// при натисканні на зображення воно буде відкриватись в повний розмір саме за рахунок неї.
									// global - доступна на всіх рівнях

	$count_img = count($arr);				//рахуємо кількість елементів у нашому масиві
	
	$random_num = rand(0, $count_img -1);   //генеруємо випадковий ключ масиву, посилаючись на який отримаємо
											//його значення - url зображення.

/* * оскільки count() рахує кількість елементів починаючи з 1, а ключі масиву присвоюються починаючи
 з 0, то ми отримаємо 2 наступних послідовності: count() = 1, 2... 9 = 9; rand(0, 9) = 0, 1, 2 ...9 = 10;
 тобто при генерації девятки ми отримаємо посилання на неіснуюче 10те посилання і отримаємо помилку.
 Щоб цьго уникнути ми віднімаємо одиницю. Як наслідок ми застосовуватимемо не безпосередньо згенерований
 ключ, а попередній до нього, наприклад: при генерації 1 ми отримаємо 1-1=0, або при 0 отримаємо 0-1=0.
 В даному випадку подібне викривлення не має значення.*/



	$random_img = $arr[$random_num];		//дістаємо потрібний url за вище згенерованим ключем -1

	$fetch_precious = $random_img;          //зберігаємо  url для повторного використання, при повторному
											// виклику функції воно перезапишеться на нове					    
}