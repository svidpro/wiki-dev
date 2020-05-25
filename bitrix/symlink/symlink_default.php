<html>
<head><title>Создание ссылок на папки bitrix, local и upload</title></head>
<body>
<?
error_reporting(E_ALL & ~E_NOTICE);
@ini_set("display_errors",1);
if ($_POST['path'])
   $path = rtrim($_POST['path'],"/\\");
else
   $path = '../name-site-folder.ru';
    //$path = '/var/www/u0000000/data/www/name-site-folder.ru'; // reg.ru

if ($_POST['create'])
{
   if (preg_match("#^/#",$path))
      $full_path = $path;
   else
      $full_path = realpath($_SERVER['DOCUMENT_ROOT'].'/'.$path);
   if (file_exists($_SERVER['DOCUMENT_ROOT']."/bitrix"))
      $strError = "В текущей папке уже существует папка bitrix";
   elseif (is_dir($full_path))
   {
      if (is_dir($full_path."/bitrix"))
      {
         if (symlink($path."/bitrix",$_SERVER['DOCUMENT_ROOT']."/bitrix"))
        {

            echo "<font color=green>Символические ссылки /bitrix удачно созданы</font><br>";

            if(symlink($path."/upload",$_SERVER['DOCUMENT_ROOT']."/upload"))
               echo "<font color=green>Символические ссылки /upload удачно созданы</font><br>";
            else
               $strError = 'Не удалось создать ссылку на папку upload, обратитесь к администратору сервера';

            if(symlink($path."/local",$_SERVER['DOCUMENT_ROOT']."/local"))
               echo "<font color=green>Символические ссылки /local удачно созданы</font><br>";
            else
               $strError = 'Не удалось создать ссылку на папку local, обратитесь к администратору сервера';
         }
         else
            $strError = 'Не удалось создать ссылку на папку bitrix, обратитесь к администратору сервера';  
      }
      else
         $strError = 'Указанный путь не содержит папку bitrix';
   }
   else
      $strError = 'Неверно указан путь или ошибка прав доступа';
   if ($strError)
      echo '<font color=red>'.$strError.'</font><br>Исходный путь: '.$full_path;
}
?>
<form method=post>
Путь к папке, содержащей папки bitrix, local и upload: <input name=path  value="<?=htmlspecialchars($path)?>"><br>
<input type=submit value='Создать' name=create>
</form>
</body> 
</html>