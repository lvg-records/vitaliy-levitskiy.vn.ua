<?php
  ///////////////////////////////////////////////////
  // ������� ��������� - LiteCounter
  // 2003-2004 (C) IT-������ SoftTime (http://www.softtime.ru)
  // �������� �.�. (simdyanov@softtime.ru)
  // �������� �.�. (kuznetsov@softtime.ru)
  // ������� �.�. (softtime@softtime.ru)
  ///////////////////////////////////////////////////
  include "admin/config.php";
  // ���������� ��� ������ �� �������� ��� ������� ������������ �������
  $page=$PHP_SELF;
  // ��������� ������� � ������ ip
  $forward = getenv(HTTP_X_FORWARDED_FOR);
  $ip = $REMOTE_ADDR;
  if (($forward != NULL)&&($forward != $REMOTE_ADDR))  $ip = $ip."/".$forward;
  // �������������� ������ �� ������������
  $reff = urldecode(getenv('HTTP_REFERER'));
  // ����������� � �������� ���� ������
  $dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
  if($dbcnx)
  {
    // �������� ���� ������
    if(@mysql_select_db($dbname,$dbcnx))
    {
        // �������, ��������� ���� (id_page) ������� ��������
      $pgs = mysql_query("SELECT * FROM pages WHERE name='$page';");
      if ($pgs)
      {
        if(mysql_num_rows($pgs)>0)
        {
          $pag = mysql_fetch_array($pgs);
          $nm = $pag['id_page'];
        }
        // ���� ������ �������� ����������� � ������� pages
        // � �� ���� �� ����������� - ��������� ������ �������� � �������.
        else
        {
          $query = "insert into pages values (0,'$page',0)";
          mysql_query($query);
          // �������� ��������� ���� ������ ��� �����������
          // ��������
          $nm = mysql_insert_id();
        }
      }
      // ������� ��������� � ������� ip
      $query_main = "insert into ip values (0, '$ip', NOW(), $nm);";
      @mysql_query($query_main);
    }
  }
?>