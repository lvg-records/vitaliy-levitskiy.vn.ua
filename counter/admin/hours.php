<?php
  ///////////////////////////////////////////////////
  // ������� ��������� - LiteCounter
  // 2003-2004 (C) IT-������ SoftTime (http://www.softtime.ru)
  // �������� �.�. (simdyanov@softtime.ru)
  // �������� �.�. (kuznetsov@softtime.ru)
  // ������� �.�. (softtime@softtime.ru)
  ///////////////////////////////////////////////////
  include "util/topcounter.php";
  include "config.php";
  // ������� �������
  ?>
    <table class="bodytable" border="1" cellpadding="2" cellspacing="0" bordercolordark="white" bordercolorlight="gray" align="center">
    <tr><td class=headtable><p>����</td><td class=headtable><p>����</td><td class=headtable><p>�����</td></tr>
  <?  
  for($i=0;$i<24;$i++)
  {
    list($host, $total) = show_ip_host($i+1,$i,$day,$id_page);
    echo "<tr><td>".$i."</td><td>$total</td><td>$host</td></tr>";
  }
  echo "</table>";
// ������� ������� �����, ����������� � ��� ����
// � ���������� ����������: $total_hosts, $total_hits � $total_total
// � �������� ��������� ��������� ��������� �������� �� �������
// ���������� ���������� ������� �� ���� ������ � ���� �� ��������� ����
function show_ip_host($begin,$end,$day,$id_page)
{
  // ��� ���������� ���������� �������������� �� ������ � ����������
  // �������� ��� �� ����� �����.
  if($id_page == "") $tmp = "";
  else $tmp = "id_page=$id_page";
  // ������ �� ���������� �� ��������� �������� ������������
  // ����������� $begin,$end
  if($begin == 0) $tmp2 = "";
  else $tmp2 = "putdate>=date_add(date_format(date_sub(now(),interval '$day' day),'%Y-%m-%d 00:00:00'),interval '$end' hour)";
  $tmp1 = "putdate<date_add(date_format(date_sub(now(),interval '$day' day),'%Y-%m-%d 00:00:00'),interval '$begin' hour)";
  // ����������� and
  if($tmp2!="" || $tmp !="") $and1 = " and ";
  else $and1 = ""; 
  if($tmp2!="" && $tmp !="") $and2 = " and ";
  else $and2 = ""; 
  // ����� ����� �����
  $query_total = "select count(*) from ip where ".$tmp1.$and1.$tmp2.$and2.$tmp.";";
  // ����� ����� ������
  $query_host = "select count(distinct ip) from ip where ".$tmp1.$and1.$tmp2.$and2.$tmp.";";
  $tot = mysql_query($query_total);
  $ipsad = mysql_query($query_host);
  if($tot && $ipsad)
  {
    $totl = mysql_fetch_array($tot);
    $host = mysql_fetch_array($ipsad);
    return array($host['count(distinct ip)'],$totl['count(*)']);
  } else
  {
    echo "<b>Error: ".mysql_error()."<b>";
    puterror("������ ��� ��������� � ������� IP-�������...2");
  }
}
?>
<?  include "util/bottomcounter.php";?>