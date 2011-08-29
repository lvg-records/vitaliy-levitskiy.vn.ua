<?php
  ///////////////////////////////////////////////////
  // Счётчик посещений - LiteCounter
  // 2003-2004 (C) IT-студия SoftTime (http://www.softtime.ru)
  // Симдянов И.В. (simdyanov@softtime.ru)
  // Кузнецов М.В. (kuznetsov@softtime.ru)
  // Голышев С.В. (softtime@softtime.ru)
  ///////////////////////////////////////////////////
  include "config.php";
  // Удаляем все записи о посещении данной страницы ip
  if(mysql_query("delete from ip where id_page=$page;"))
  {
    // Удаляем запись о данной страницы из таблицы pages
    if(mysql_query("delete from pages where id_page=$page;"))
    {
      // Осуществляем переход на страницу администрирования
      echo "<HTML><HEAD>
            <META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>
            </HEAD></HTML>";
    }
    else
    {
      echo "<B>Error: ".mysql_error();
      exit();
    }
  }
  else
  {
    echo "<B>Error: ".mysql_error();
    exit();
  }
?>