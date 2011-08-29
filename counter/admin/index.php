<?php
  ///////////////////////////////////////////////////
  // Счётчик посещений - LiteCounter
  // 2003-2004 (C) IT-студия SoftTime (http://www.softtime.ru)
  // Симдянов И.В. (simdyanov@softtime.ru)
  // Кузнецов М.В. (kuznetsov@softtime.ru)
  // Голышев С.В. (softtime@softtime.ru)
  ///////////////////////////////////////////////////
?>
<html>
<head>
<title>LiteCounter 0.9</title>
</head>
<body>
<?php
  include "util/topcounter.php";
  include "config.php";
    ?>
    <p class=help>Ниже перечислены страницы, которые участвуют в
    статистике. По гиперссылкам можно получить детальную
    статистику по каждой отдельной странице:</p>
    <?php
    if($page == "")$page=1;
    if($order == "") $orderstr = "name";
    else $orderstr = "num desc" ;
    // Отображаем все страницы, которые есть в таблице page
    // по $pnumber штук
    $pnumber = 20;
    $begin = ($page - 1)*$pnumber;
    $pgs = mysql_query("select ip.id_page,pages.name,count(ip.id_ip) as num from ip,pages where ip.id_page=pages.id_page group by ip.id_page order by $orderstr limit $begin, $pnumber;");
    $num = mysql_query("SELECT count(*) FROM pages;");
    $tot = mysql_query("SELECT count(*) FROM ip;");
    if ($pgs && $num && $tot)
    {
      $total = mysql_fetch_array($num);
      $number = (int)($total['count(*)']/$pnumber);
      if((float)($total['count(*)']/$pnumber)-$number != 0) $number++;
      for($i = 1; $i<=$number; $i++)
      {
        if($number == $i)
        {
          if($page == $i)
            echo "[".(($i - 1)*$pnumber + 1)."-".$total['count(*)']."]";
          else
            echo "<a href=index.php?page=".$i."&order=".$order.">[".(($i - 1)*$pnumber + 1)."-".$total['count(*)']."]</a>";
        }
        else
        {
          if($page == $i)
            echo "[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]";
          else
            echo "<a href=index.php?page=".$i."&order=".$order.">[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]</a>";
        }
      }
      ?>
      <table cellspacing="5"><tr valign="top"><td>
      <table class="bodytable" border="1" cellpadding="4" cellspacing="0" bordercolordark="white" bordercolorlight="gray" align="center">     
      <tr><td class=headtable><p><a href=index.php?page=<? echo $page ?> title="Сортировать таблицу по имени страниц">Страница</a></td><td width=100 class=headtable><p><a href=index.php?page=<? echo $page ?>&order=1 title="Сортировать таблицу по количеству посещений">Количество&nbsp;посещений</td></tr>
      <?
      $totalhit = mysql_fetch_array($tot);
      while($pag = mysql_fetch_array($pgs))
      {
        echo "<tr>
                <td><a href=main.php?id_page=".$pag['id_page'].">".$_SERVER["SERVER_NAME"].$pag['name']."</a></td>
                <td>".$pag['num']."</td>
              </tr>";
      }
      echo "</table>";
      ?>
      </td><td width=40%>
        <p class=help>Для получения статистики только по выбранной странице щелкните ее имени в таблице.
            Если страница не будет выбрана, то статистика будет представлена для <a href=main.php>всего сайта</a>.
        </p>  
      </td></tr></table>
      <?
    }
    else reporterror("Ошибка при обращении к таблице страниц...");
  // Удаление страниц из системы подсчёта
  echo "<p>Структура сайта может претерпевать измениения, поэтому необходим механизм 
        удаления устаревших(мёртвых) страниц из системы подсчёта<br><a href=delpageform.php title='Страница удаление мертвых страниц'>Удалить</a><p>";
?>
<?  include "util/bottomcounter.php";?>