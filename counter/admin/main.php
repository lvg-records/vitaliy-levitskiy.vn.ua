<?php
  ///////////////////////////////////////////////////
  // Счётчик посещений - LiteCounter
  // 2003-2004 (C) IT-студия SoftTime (http://www.softtime.ru)
  // Симдянов И.В. (simdyanov@softtime.ru)
  // Кузнецов М.В. (kuznetsov@softtime.ru)
  // Голышев С.В. (softtime@softtime.ru)
  ///////////////////////////////////////////////////
  include "util/topcounter.php";
  include "config.php";
  list($host1, $total1) = show_ip_host(1,0,$id_page);
  list($host2, $total2) = show_ip_host(2,1,$id_page);
  list($host7, $total7) = show_ip_host(7,0,$id_page);
  list($host30,  $total30) = show_ip_host(30,0,$id_page);
  list($hostall, $totalall) = show_ip_host(0,0,$id_page);
?>
<table class="bodytable" width="100%" border="1" cellpadding="4" cellspacing="0" bordercolordark="white" bordercolorlight="gray">
<tr><td class=headtable>&nbsp;</td><td class=headtable><a href='hours.php?day=0&id_page=<?php echo $id_page;?>'>Cегодня</a></td><td class=headtable><a href='hours.php?day=1&id_page=<?php echo $id_page;?>'>Вчера</a></td><td class=headtable><a href='days.php?id_page=<?php echo $id_page;?>'>За 7 дней</a></td><td class=headtable><a href='days.php?id_page=<?php echo $id_page;?>&daystst=30'>За 30 дней</a></td><td class=headtable><p>За всё время</td></tr>
<tr><td>Хосты</td><td><?php echo $host1; ?></td><td><?php echo $host2; ?></td><td><?php echo $host7; ?></td><td><?php echo $host30; ?></td><td><?php echo $hostall; ?></td></tr>
<tr><td>Все хиты</td><td><?php echo $total1; ?></td><td><?php echo $total2; ?></td><td><?php echo $total7; ?></td><td><?php echo $total30; ?></td><td><?php echo $totalall; ?></td></tr>
</table>
<?php
// Функция заносит хосты, засчитанные и все хиты
// в глобальные переменные: $total_hosts, $total_hits и $total_total
// В качестве аргумента принимает временной интервал за который
// необходимо произвести выборку из базы данных в днях от настоящей даты
function show_ip_host($begin,$end,$id_page)
{
  // Эта переменная определяет осуществляется ли запрос к конкретной
  // странице или ко всему сайту.
  if($id_page == "") $tmp = "";
  else $tmp = "id_page=$id_page";
  // Запрос на статистику за временной интервал определяемый
  // параметрами $begin,$end
  if($begin == 0) $tmp2 = "";
  else $tmp2 = "putdate>=date_sub(date_format(now(),'%Y-%m-%d 23:59:59'),interval '".$begin."' day)";
  $tmp1 = "putdate<date_sub(date_format(now(),'%Y-%m-%d 23:59:59'),interval '$end' day)";
  // Расставляем and
  if($tmp2!="" || $tmp !="") $and1 = " and ";
  if($tmp2!="" && $tmp !="") $and2 = " and ";
  // Общее число хитов
  $query_total = "select count(*) from ip where ".$tmp1.$and1.$tmp2.$and2.$tmp.";";
  // Подсчитываем число IP-адресов (хостов)
  $query = "select count(distinct ip) from ip where ".$tmp1.$and1.$tmp2.$and2.$tmp.";";
  // Осуществляем запросы к базе данных
  $tot = mysql_query($query_total);
  $ipsad = mysql_query($query);
  if($tot && $ipsad)
  {
    $totl = mysql_fetch_array($tot);
    $ip = mysql_fetch_array($ipsad);
    return array($ip['count(distinct ip)'],$totl['count(*)']);
  } else reporterror("Ошибка при обращении к таблице IP-адресов...");
}
?>
<?  include "util/bottomcounter.php";?>