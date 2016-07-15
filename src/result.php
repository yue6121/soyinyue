<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>QQ空间音乐链接搜索</title>
</head>
<body background="http://image.baidu.com/search/down?tn=download&word=download&ie=utf8&fr=detail&url=http%3A%2F%2F5.26923.com%2Fdownload%2Fpic%2F000%2F339%2Fef75a9a8c0b74c9c74279ec66c0c151c.jpg&thumburl=http%3A%2F%2Fimg3.imgtn.bdimg.com%2Fit%2Fu%3D2919524276%2C2500911227%26fm%3D21%26gp%3D0.jpg">
<center>
<h2>QQ空间音乐链接搜索</h2>
<form name="input" action="result.php" method="post">
<input type="text" name="song" />
<input type="submit" value="搜音乐" />
</form>
<br>
<table width="90%" border="1">  

<?php
$name = $_POST['song'];
//echo $name,"<br>";

echo "<tr>  <td align='center' style='color: green;'>序号</td>  
        <td align='center' style='color: green;'>歌曲</td>  
        <td align='center' style='color: green;'>歌手</td>
        <td align='center' style='color: green;'>专辑</td>  
        <td align='center' style='color: green;'>链接</td>
        <td align='center' style='color: green;'>播放</td>
    </tr> ";

require_once 'MusicAPI.php';
$api = new MusicAPI();
$jsonArr_search = json_decode($api->search($name,1,100,0),true);
//print_r($jsonArr_search)
//echo $jsonArr_search['code'];
//echo $jsonArr_search['result']['songCount'],"<br>";
if ($jsonArr_search['code'] === 200 or $jsonArr_search['result']['songCount'] > 0) {
    $songsList = $jsonArr_search['result']['songs'];
    // 遍历歌曲
    for ($i = 0; $i < count($songsList); $i++) {
        $ii = $i + 1;
        //echo $jsonArr_search['result']['songs'][$i]['name'],"\t";
        //echo $jsonArr_search['result']['songs'][$i]['artists'][0]['name'],"\t";
        //echo $jsonArr_search['result']['songs'][$i]['album']['name'],"<br>";
        //echo $jsonArr_search['result']['songs'][$i]['id'],"<br>";
        $jsonArr_song = json_decode($api->url($jsonArr_search['result']['songs'][$i]['id']),true);
        //print_r($jsonArr_song)
        echo "<tr>";
        echo "<td align='center' style='color: black;'>".$ii."</td>";
        echo "<td align='center' style='color: black;'>".$jsonArr_search['result']['songs'][$i]['name']."</td>";
        echo "<td align='center' style='color: black;'>".$jsonArr_search['result']['songs'][$i]['ar'][0]['name']."</td>";
        echo "<td align='center' style='color: black;'>".$jsonArr_search['result']['songs'][$i]['al']['name']."</td>";
        echo "<td align='center' style='color: black;'>".$jsonArr_song['data'][0]['url']."</td>";
        echo "<td align='center' style='color: black;'>"."<a href='".$jsonArr_song['data'][0]['url']."'target='_blank'>链接</a>"."</td>";
        echo "</tr>";
        
    }
} else {
    echo "未搜索到结果";
}

?>
</table>
</center>  
</body>
</html> 
