<?php
  ///////////////////////////////////////////////////
  // Счётчик посещений - LiteCounter
  // 2003-2004 (C) IT-студия SoftTime (http://www.softtime.ru)
  // Симдянов И.В. (simdyanov@softtime.ru)
  // Кузнецов М.В. (kuznetsov@softtime.ru)
  // Голышев С.В. (softtime@softtime.ru)
  ///////////////////////////////////////////////////
  include "admin/config.php";
  // Переменная для ссылки на страницу для которой производится подсчёт
  $page=$PHP_SELF;
  // Формируем строчку с полным ip
  $forward = getenv(HTTP_X_FORWARDED_FOR);
  $ip = $REMOTE_ADDR;
  if (($forward != NULL)&&($forward != $REMOTE_ADDR))  $ip = $ip."/".$forward;
  // Подготавливаем данные по пользователю
  $reff = urldecode(getenv('HTTP_REFERER'));
  // Соединяемся с сервером базы данных
  $dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
  if($dbcnx)
  {
    // Выбираем базу данных
    if(@mysql_select_db($dbname,$dbcnx))
    {
        // Выясним, первичный ключ (id_page) текущей страницы
      $pgs = mysql_query("SELECT * FROM pages WHERE name='$page';");
      if ($pgs)
      {
        if(mysql_num_rows($pgs)>0)
        {
          $pag = mysql_fetch_array($pgs);
          $nm = $pag['id_page'];
        }
        // Если данная страница отсутствует в таблице pages
        // и не разу не учитывалась - добавляем данную страницу в таблицу.
        else
        {
          $query = "insert into pages values (0,'$page',0)";
          mysql_query($query);
          // Выясняем первичный ключ только что добавленной
          // страницы
          $nm = mysql_insert_id();
        }
      }
      // Заносим посещение в таблицу ip
      $query_main = "insert into ip values (0, '$ip', NOW(), $nm);";
      @mysql_query($query_main);
    }
  }
?>