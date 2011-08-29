<?php
  ///////////////////////////////////////////////////
  // Счётчик посещений - LiteCounter
  // 2003-2004 (C) IT-студия SoftTime (http://www.softtime.ru)
  // Симдянов И.В. (simdyanov@softtime.ru)
  // Кузнецов М.В. (kuznetsov@softtime.ru)
  // Голышев С.В. (softtime@softtime.ru)
  ///////////////////////////////////////////////////

  // Имя сервера базы данных, например $dblocation = "mysql28.noweb.ru"
  // сейчас выставлен сервер локальной машины
  $dblocation = "localhost";
  // Имя базы данных, на хостинге или локальной машине
  $dbname = "vlevitsk_counter";
  // Имя пользователя базы данных
  $dbuser = "vlevitsk";
  // и его пароль
  $dbpasswd = "Tq8oyqJ429";

  $dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
  if (!$dbcnx) {
    echo( "<P>В настоящий момент сервер базы данных не доступен, поэтому корректное отображение страницы невозможно.</P>" );
    exit();
  }

  if (! @mysql_select_db($dbname,$dbcnx) ) {
    echo( "<P>В настоящий момент база данных не доступна, поэтому корректное отображение страницы невозможно.</P>" );
    exit();
  }
  // Функция для вывода ошибок
  function reporterror($msg)
  {
    echo "<p>".$msg."</p>";
    echo "<b>Error: ".mysql_error()."<b>";
    exit();
  }
?>