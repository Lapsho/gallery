<?php

define('title', "Lapsho gallery");   

$img_arr = array(                           //масив з переліком доступних посилань
	"http://www.mulierchile.com/paisajes/paisajes-001.jpg",
	"https://i.pinimg.com/originals/0b/06/b0/0b06b062f47e821e426be44b298cf27d.jpg",
	"http://daxushequ.com/data/out/93/img60386692.jpg",
	"https://farm1.static.flickr.com/799/39347425630_7bf7ccfaf1_b.jpg",
	"https://www.walldevil.com/wallpapers/a35/4211-wallpaper-nature-scenery-world.jpg",
	"http://www.osmais.com/wallpapers/201210/estrada-chao-wallpaper.jpg",
	"http://www.vol369.com/wp-content/uploads/2012/03/canyon.jpg",
	"https://3.bp.blogspot.com/-FT1qi9oXVjY/VGJFeSUgJ-I/AAAAAAAASbA/rX0aOb-UDaM/s1600/-de-paisajes-hermosos.jpg",
	"http://wpnature.com/wp-content/uploads/2016/08/field-flowers-far-beautiful-variety-fondos-pantalla-paisajes-flores-hd-fields.jpg",
	); 



$max_num_img = ((isset($_GET['max_num_img']))?$max_num_img = $_GET['max_num_img']:$max_num_img = 12);
/*застосував тернарний оператор замість реалізації наступної конструкції:

if(isset($_GET['max_num_img'])){    		//застосував глобальну змінну $_GET, щоб отримати кількість
											//зображень, що потрібно вивести. Підозрюю мій спосіб рішення
	$max_num_img = $_GET['max_num_img'];	//цієї задачі трохи рагульний і варто обійтись без $_GET
} else{
	$max_num_img = 12;						//якщо користувач не встанолює своє значення, воно
											//становить по-дефолту 12 зображень
} */


function just_for_lulz($arr){   //функція для генерації випадкового посилання на зображення
 
	global $fetch_precious;     //глобальна змінна, в яку буде зберігатись посилання з застосованої функції
								// global - доступна на всіх рівнях php, при цьому унікальна для кожної ітерації 


	$count_img = count($arr);				// рахуємо кількість зображень, не можна допустити, щоб rand() згенерував
											//число більше за наш останній ключ в масиві - отримаємо неіснуючий ключ

	$random_num = rand(0, $count_img -1);   //генеруємо випадковий ключ масиву, посилаючись на який отримаємо
											//його значення - url зображення.

/* * оскільки count() рахує кількість елементів починаючи з 1, а ключі масиву присвоюються починаючи
 з 0, то ми отримаємо 2 наступних послідовності: count() = 1, 2... 9 = 9; rand(0, 9) = 0, 1, 2 ...9 = 10;
 тобто при генерації девятки ми отримаємо посилання на неіснуюче 10те посилання і отримаємо помилку.
 Щоб цьго уникнути ми віднімаємо одиницю. Як наслідок ми застосовуватимемо не безпосередньо згенерований
 ключ, а попередній до нього, наприклад: при генерації 0 ми отримаємо 0-1=0, або при 9 отримаємо 9-1=8.
 В даному випадку подібне викривлення не має значення.*/

	$random_img = $arr[$random_num];		//дістаємо url зображення за вище згенерованим ключем -1

    $fetch_precious = "<a href=\"" . $random_img . "\" data-fancybox=\"images\">"; 
    $fetch_precious .= "<img src=\"" . $random_img . "\" />";
    $fetch_precious .= "</a>";			//Використав конкатонацію для повного формування коду, що необхідний для виводу зображення,
}										// в межах однієї змінної, тепер можна вивести зображення просто оголосивши її
?>
