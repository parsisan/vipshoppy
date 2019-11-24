http://abhijitpal.in/php-dynamic-menu-generator-script/
<?php

require_once("models/SiteModel.php");
$site_OBJ = new SiteModel();
$site_OBJ->getSiteInfo();


$siteMenus = $site_OBJ->getSiteMenus();
echo "<pre>";
// print_r($siteMenus);

// foreach ($siteMenus as $key => $mainMenu) {
//   if ($mainMenu["mainMenu_id"] == 0)
//   echo $mainMenu["title"]."<br>";
//   else
//   {
//     foreach ($siteMenus as $key => $subMenu) {
    
//       if ($subMenu["mainMenu_id"] != 0){
      
//         if ($mainMenu["id"] == $subMenu["mainMenu_id"])
//         {
//     echo $mainMenu["title"]." === > ".$subMenu["title"]."<br>";
//         }
//     }
//   }
//   }

// }



$menu = array(
  'menus' => array(),
  'parent_menus' => array()
);


$var = db_conn->query("SELECT * FROM tbl_System_Menus");
//build the array lists with data from the menu table
while ($row = mysql_fetch_assoc($siteMenus)) {
  //creates entry into menus array with current menu id ie. $menus['menus'][1]
  $menu['menus'][$row['id']] = $row;
  //creates entry into parent_menus array. parent_menus array contains a list of all menus with children
  $menu['parent_menus'][$row['mainMenu_id']][] = $row['id'];
}

// Create the main function to build milti-level menu. It is a recursive function.	
function buildMenu($parent, $menu) {
$html = "";
if (isset($menu['parent_menus'][$parent])) {
  $html .= "<ul>";
  foreach ($menu['parent_menus'][$parent] as $menu_id) {
    if (!isset($menu['parent_menus'][$menu_id])) {
      $html .= "<li><a href='" . $menu['menus'][$menu_id]['link'] . "'>" . $menu['menus'][$menu_id]['title'] . "</a></li>";
    }
    if (isset($menu['parent_menus'][$menu_id])) {
      $html .= "<li><a href='" . $menu['menus'][$menu_id]['link'] . "'>" . $menu['menus'][$menu_id]['title'] . "</a>";
      $html .= buildMenu($menu_id, $menu);
      $html .= "</li>";
    }
  }
  $html .= "</ul>";
}
return $html;
}


?>
