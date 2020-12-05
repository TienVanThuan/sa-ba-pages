
<script type="text/javascript">
<!------
function createXmlHttpRequest()
{
    var xmlhttp=null;
    if(window.ActiveXObject)
    {
        try
        {
            xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e)
        {
            try
            {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e2)
            {
            }
        }
    }
    else if(window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
//------->
</script>

<script type="text/javascript">
<!------
function sendRequest(moji)
{
    var xmlhttp=createXmlHttpRequest();
    if(xmlhttp!=null)
    {
        var res=1;
        xmlhttp.open("POST", "../domain/domain_sub.php", false);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        var data="domain="+moji;
        xmlhttp.send(data);
        res=xmlhttp.responseText;
        if(res==1)
        {
            document.getElementById('Imgs').innerHTML='<img src="../domain/on.png">';
            document.getElementById('Stas').innerHTML=moji+'は既に登録されています';
 
        }
        if(res==-1)
        {
            document.getElementById('Imgs').innerHTML='<img src="../domain/off.png">';
            document.getElementById('Stas').innerHTML=moji+'は新規取得可能です';
        }
    }
}
function buttonOnProgram()
{
    var moji="";
    moji=document.getElementById('domain').value;
    var i=moji.length;
    if(i<3 || i>32)
    {
        document.getElementById("Stas").innerHTML='<span style="color:#ff0000;">3文字以上、32文字以下です。</span>';
    }
    else
    {
        sendRequest(moji);
    }
}
//------->
</script>


<form method="post" target="_top" action="#tool">
<table style="border-style:hidden; width: 100%;" border="0" >

<tr style="border-style:hidden;">
<td style="text-align:center;width:100%;border-style:hidden;">
ドメイン名:<input style="width:80%;ime-mode:disabled;" type="text" name="domain" id="domain" value="
">
</td>
</tr>
</table>

<input type="submit" name="submit" value="検索">


<table style="border-style:hidden; width: 100%;" border="0" >
<tr style="border-style:hidden;">
<td style="text-align:center;width:100%;border-style:hidden;">
結果:<input style="width:80%;ime-mode:disabled;" type="text" name="res" id="res" value="　
">
</td>
</tr>
</table>

</form>


<?php

if(!Empty($_POST['domain']))
{
    $input="www.".htmlspecialchars($_POST['domain']);
    $res=gethostbyname($input);
    if(strcmp($input,$res)==0)
    {
        $chFlg=-1;
    }
    else
    {
        $chFlg=1;
    }
}

?>