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
  list($host1, $total1) = show_ip_host(1,0,$id_page);
  list($host2, $total2) = show_ip_host(2,1,$id_page);
  list($host7, $total7) = show_ip_host(7,0,$id_page);
  list($host30,  $total30) = show_ip_host(30,0,$id_page);
  list($hostall, $totalall) = show_ip_host(0,0,$id_page);
?>
<table class="bodytable" width="100%" border="1" cellpadding="4" cellspacing="0" bordercolordark="white" bordercolorlight="gray">
<tr><td class=headtable>&nbsp;</td><td class=headtable><a href='hours.php?day=0&id_page=<?php echo $id_page;?>'>C������</a></td><td class=headtable><a href='hours.php?day=1&id_page=<?php echo $id_page;?>'>�����</a></td><td class=headtable><a href='days.php?id_page=<?php echo $id_page;?>'>�� 7 ����</a></td><td class=headtable><a href='days.php?id_page=<?php echo $id_page;?>&daystst=30'>�� 30 ����</a></td><td class=headtable><p>�� �� �����</td></tr>
<tr><td>�����</td><td><?php echo $host1; ?></td><td><?php echo $host2; ?></td><td><?php echo $host7; ?></td><td><?php echo $host30; ?></td><td><?php echo $hostall; ?></td></tr>
<tr><td>��� ����</td><td><?php echo $total1; ?></td><td><?php echo $total2; ?></td><td><?php echo $total7; ?></td><td><?php echo $total30; ?></td><td><?php echo $totalall; ?></td></tr>
</table>
<?php
// ������� ������� �����, ����������� � ��� ����
// � ���������� ����������: $total_hosts, $total_hits � $total_total
// � �������� ��������� ��������� ��������� �������� �� �������
// ���������� ���������� ������� �� ���� ������ � ���� �� ��������� ����
function show_ip_host($begin,$end,$id_page)
{
  // ��� ���������� ���������� �������������� �� ������ � ����������
  // �������� ��� �� ����� �����.
  if($id_page == "") $tmp = "";
  else $tmp = "id_page=$id_page";
  // ������ �� ���������� �� ��������� �������� ������������
  // ����������� $begin,$end
  if($begin == 0) $tmp2 = "";
  else $tmp2 = "putdate>=date_sub(date_format(now(),'%Y-%m-%d 23:59:59'),interval '".$begin."' day)";
  $tmp1 = "putdate<date_sub(date_format(now(),'%Y-%m-%d 23:59:59'),interval '$end' day)";
  // ����������� and
  if($tmp2!="" || $tmp !="") $and1 = " and ";
  if($tmp2!="" && $tmp !="") $and2 = " and ";
  // ����� ����� �����
  $query_total = "select count(*) from ip where ".$tmp1.$and1.$tmp2.$and2.$tmp.";";
  // ������������ ����� IP-������� (������)
  $query = "select count(distinct ip) from ip where ".$tmp1.$and1.$tmp2.$and2.$tmp.";";
  // ������������ ������� � ���� ������
  $tot = mysql_query($query_total);
  $ipsad = mysql_query($query);
  if($tot && $ipsad)
  {
    $totl = mysql_fetch_array($tot);
    $ip = mysql_fetch_array($ipsad);
    return array($ip['count(distinct ip)'],$totl['count(*)']);
  } else reporterror("������ ��� ��������� � ������� IP-�������...");
}
?>
<?  include "util/bottomcounter.php";?>