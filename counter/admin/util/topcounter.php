<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><?php echo $title; ?></title>
<link rel="StyleSheet" type="text/css" href="util/counter.css">
</head>
<body leftmargin="0" marginheight="0" marginwidth="0" rightmargin="0" bottommargin="0" topmargin="0" >
<div style="position: absolute; right: 50px; top: 10px">
    <p class="help" align="right">Счетчик посещений LiteCounter разработан и поддерживается IT-студией «SoftTime»<br>
    <a href="http://www.softtime.ru">www.softtime.ru</a>
    </p>
</div>
<table border="0" cellpadding="0" cellspacing="0" width=100%>
    <tr>
        <td align="center" width="40%" rowspan="2" valign="top" height="40"><nobr><h1 class=z1 style="margin-top: 40px; margin-bottom: 0px" >Счетчик посещений «LiteCounter 1.0»</h1></nobr>
        </td>
    </tr>
</table>
<p align=center>
<table border="0" cellpadding="0" cellspacing="0" width=80%>
    <tr>
        <td width=10%></td>
        <td>
          <p class=help> Если у вас не работает это Web-приложение, вы всегда можете найти помощь по его установке и настройке на нашем форуме <a href=http://www.softtime.ru/forum/>http://www.softtime.ru/forum/</a> Возможно вам также потребуется дополнительная функциональность, в этом случае Вы также можете посетить наш форум и выссказать свои предложения. Если Ваше предложение действительно актуально и интересно, мы доработаем приложение с учетом Ваших пожеланий.</p>
        </td>
        <td width=10%></td>
    </tr>
</table>
</p>
<table cellspacing="7"><tr><td>&nbsp;</td>      
    <td><p><a href='index.php' title='Главная страница счетчика'>Главная страница счетчика</b></a></td>
    <td><p>
    <?
      if ($id_page!=''){
        echo "<a href=main.php>Статистика для всего сайта</a>";
      }
    ?>
     </p></td>
    <td><p><a href="javascript: history.back();">Назад</a></p></td>
</tr></table>
<table width=100%><tr><td width=10%>&nbsp;</td><td><br>