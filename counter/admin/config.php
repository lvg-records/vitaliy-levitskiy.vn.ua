<?php
  ///////////////////////////////////////////////////
  // ������� ��������� - LiteCounter
  // 2003-2004 (C) IT-������ SoftTime (http://www.softtime.ru)
  // �������� �.�. (simdyanov@softtime.ru)
  // �������� �.�. (kuznetsov@softtime.ru)
  // ������� �.�. (softtime@softtime.ru)
  ///////////////////////////////////////////////////

  // ��� ������� ���� ������, �������� $dblocation = "mysql28.noweb.ru"
  // ������ ��������� ������ ��������� ������
  $dblocation = "localhost";
  // ��� ���� ������, �� �������� ��� ��������� ������
  $dbname = "vlevitsk_counter";
  // ��� ������������ ���� ������
  $dbuser = "vlevitsk";
  // � ��� ������
  $dbpasswd = "Tq8oyqJ429";

  $dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
  if (!$dbcnx) {
    echo( "<P>� ��������� ������ ������ ���� ������ �� ��������, ������� ���������� ����������� �������� ����������.</P>" );
    exit();
  }

  if (! @mysql_select_db($dbname,$dbcnx) ) {
    echo( "<P>� ��������� ������ ���� ������ �� ��������, ������� ���������� ����������� �������� ����������.</P>" );
    exit();
  }
  // ������� ��� ������ ������
  function reporterror($msg)
  {
    echo "<p>".$msg."</p>";
    echo "<b>Error: ".mysql_error()."<b>";
    exit();
  }
?>