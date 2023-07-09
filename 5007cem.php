<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 5.2.1
 */

/**
 * Database `5007cem`
 */

/* `5007cem`.`categories` */
$categories = array(
  array('category_id' => '1','category_name' => 'Food'),
  array('category_id' => '2','category_name' => 'Drinks'),
  array('category_id' => '3','category_name' => 'Dessert')
);

/* `5007cem`.`review` */
$review = array(
  array('id' => '5','food_name' => 'Tiramisu','restaurant_name' => 'Norm Micro Roastery','category_id' => '3','category_name' => 'Dessert','description' => 'Nice Not Bad','photo' => 'uploads/Tiramisu.jpg','user_id' => '1','username' => 'Lim Jia De'),
  array('id' => '8','food_name' => 'Chicken Ham Egg Sandwich','restaurant_name' => '1Sandwich Cafe','category_id' => '1','category_name' => 'Food','description' => 'Great!','photo' => 'uploads/Sandwich.jpg','user_id' => '1','username' => 'Lim Jia De'),
  array('id' => '11','food_name' => 'Saled Bowl','restaurant_name' => 'Vegetarian Lover','category_id' => '1','category_name' => 'Food','description' => 'Green and Healthly!','photo' => 'uploads/Salad Bowl.jpg','user_id' => '2','username' => 'Jason '),
  array('id' => '12','food_name' => 'Chicken Grill Cheese Burger','restaurant_name' => '1Sandwich Cafe','category_id' => '1','category_name' => 'Food','description' => 'The food was not nice because it over grilled and the cheese is very less!','photo' => 'uploads/Cheese Burger.jpg','user_id' => '2','username' => 'Jason ')
);

/* `5007cem`.`user` */
$user = array(
  array('id' => '1','email' => 'limjiadede@hotmail.com','password' => '12345678','username' => 'Lim Jia De','telno' => '0164760632'),
  array('id' => '2','email' => 'jason@gmail.com','password' => '12345678','username' => 'Jason ','telno' => '0123456789'),
  array('id' => '7','email' => 'david@gmail.com','password' => '12345678','username' => 'David','telno' => '0123456789')
);
