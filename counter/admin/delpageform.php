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
  $pgs = mysql_query("SELECT * FROM pages;");
  if ($pgs)
  {
  ?>
    <form action="delpage.php" method=get>
    <table border="0" cellpadding="10"><tr><td>
    <table align="center" border="0" ><tr valign="top"><td>
    <p class=zag2>��������&nbsp;��������:</p>
    </td>
    <td>
    <select type=text name=page>
    <?php
    while($pag = mysql_fetch_array($pgs))
    {
      echo "<option value=".$pag['id_page'].">".$pag['name'];
    }
    ?>
    </select>
    </td><td>
    <input class=button type=submit value="�������">
    </td></tr></table>
    </td><td>
      <p class="help">�������� �� ����������� ������ ��������, ������� �� ������ ������� �� ��������
       � ������� ������ "�������"</p>
    </td></tr></table>
    </form>
  <?
  }
  else
  {
    echo "<B>Error: ".mysql_error();
    exit();
  }
  include "util/bottomcounter.php";
?>
