<?php
  ///////////////////////////////////////////////////
  // ������� ��������� - LiteCounter
  // 2003-2004 (C) IT-������ SoftTime (http://www.softtime.ru)
  // �������� �.�. (simdyanov@softtime.ru)
  // �������� �.�. (kuznetsov@softtime.ru)
  // ������� �.�. (softtime@softtime.ru)
  ///////////////////////////////////////////////////
  include "config.php";
  // ������� ��� ������ � ��������� ������ �������� ip
  if(mysql_query("delete from ip where id_page=$page;"))
  {
    // ������� ������ � ������ �������� �� ������� pages
    if(mysql_query("delete from pages where id_page=$page;"))
    {
      // ������������ ������� �� �������� �����������������
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