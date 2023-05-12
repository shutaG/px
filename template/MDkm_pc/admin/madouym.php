<?php

//decode by nige112
if (isset($_GET["act"]) && $_GET["act"] == "setting" && isset($_POST["edit"]) && $_POST["edit"] == 1) {
    $datas = $_POST;
    $data = $datas["mdym"];
    if (file_put_contents("mdym.config.php", "<?php\n \$mdym =  " . var_export($data, true) . ";\n?>")) {
        echo "{code:1,msg:保存成功}";
    } else {
        echo "<script>alert('修改失败！请给予mdym.config.php写入权限')</script>";
    }
    $mdym = $data;
}
function deleteAll($path)
{
    $op = dir($path);
    while (($item = $op->read()) == true) {
        if ($item == "." || $item == "..") {
        } else {
            if (is_dir($op->path . "/" . $item)) {
                deleteAll($op->path . "/" . $item);
                rmdir($op->path . "/" . $item);
            } else {
                unlink($op->path . "/" . $item);
            }
        }
    }
    echo "<span style=\"font-size:22px; color:green\">清除完毕！</span>";
    closedir($op);
}
