<?php get_header(); ?>

<?php
$search_domain = "";
if(isset($_POST['search_domain'])) {
    $search_domain = $_POST['search_domain'];
}
$nic = "";
if(isset($_POST['nic'])) {
    $nic = $_POST['nic'];
}
$domain_result = "";
if(isset($_POST['domain_result'])) {
    $domain_result = $_POST['domain_result'];
}
$search_domain_last_tmp = "";
if(isset($_POST['search_domain_last_tmp'])) {
    $search_domain_last_tmp = $_POST['search_domain_last_tmp'];
}

// 入力文字列から"."を除く、それ以降の文字列を取得する。
$search_domain_last = $search_domain;
while(strstr($search_domain_last, ".")) {

    // 文字列中に"."がある限り処理を繰り返す
    $search_domain_last = strstr($search_domain_last, ".");
    $search_domain_last = substr($search_domain_last, 1);

}

$select = 0;
$selected_jp = "";
if($nic == ".jp") {
    $selected_jp = "selected";
    $select = 1;
}
$selected_cojp = "";
if($nic == ".co.jp") {
    $selected_cojp = "selected";
    $select = 1;
}
$selected_org = "";
if($nic == ".org") {
    $selected_org = "selected";
    $select = 1;
}
$selected_net = "";
if($nic == ".net") {
    $selected_net = "selected";
    $select = 1;
}
$selected_com = "";
if($nic == ".com") {
    $selected_com = "selected";
    $select = 1;
}

if($search_domain != "" && $select == 0) {
    $msg = "ドメインを選択してください。";
} else {
    $msg = "";
}



// 利用可能なドメインの有無
$domain_result = "";

if($nic == ".jp") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.jp";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.jp {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(in_array("No match!!", $return_val)) {
        $domain_result = 0;
    } else {
        $domain_result = 1;
    }
    
}

if($nic == ".co.jp") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.co.jp";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.jp {$search_domain_last_tmp}";
    exec($command, $return_val);
    
    if(in_array("No match!!", $return_val)) {

        $domain_result = 0;
    } else {

        $domain_result = 1;
    }

    
}


if($nic == ".org") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.org";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.pir.org {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(preg_grep("/^Not a valid domain search pattern/", $return_val)) {
        // 無効な入力はskip

    } elseif(preg_grep("/^NOT FOUND/", $return_val)) {

        $domain_result = 0;
    } else {

        $domain_result = 1;
    }

    
}


if($nic == ".co.jp") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.co.jp";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.internic.net {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(preg_grep("/^No match/", $return_val)) {

        if($domain_result != 1) {
            $domain_result = 0;
        }
    } else {

        $domain_result = 1;
    }

    
}

if($nic == ".jp") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.jp";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.internic.net {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(preg_grep("/^No match/", $return_val)) {

        if($domain_result != 1) {
            $domain_result = 0;
        }
    } else {

        $domain_result = 1;
    }

    
}

if($nic == ".org") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.org";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.internic.net {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(preg_grep("/^No match/", $return_val)) {

        if($domain_result != 1) {
            $domain_result = 0;
        }
    } else {

        $domain_result = 1;
    }

    
}

if($nic == ".net") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.net";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.internic.net {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(preg_grep("/^No match/", $return_val)) {

        if($domain_result != 1) {
            $domain_result = 0;
        }
    } else {

        $domain_result = 1;
    }

    
}

if($nic == ".com") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.com";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.internic.net {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(preg_grep("/^No match/", $return_val)) {

        if($domain_result != 1) {
            $domain_result = 0;
        }
    } else {

        $domain_result = 1;
    }

    
}


if($nic == ".co.jp") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.co.jp";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.networksolutions.com {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(in_array("IP Address Has Reached Rate Limit", $return_val)) {
        // レート制限にかかった場合はskip

    } elseif(in_array("Dont Include WWW Prefix Or Any Other Subdomain.", $return_val)) {
        // 検索不可の場合もskip

    } elseif(preg_grep("/^NOT FOUND/", $return_val) || preg_grep("/^No whois information found/", $return_val) || preg_grep("/^For more information/", $return_val)) {

        if($domain_result != 1) {
        $domain_result = 0;
        }
    } else {

        $domain_result = 1;

    }

    
}

if($nic == ".jp") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.jp";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.networksolutions.com {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(in_array("IP Address Has Reached Rate Limit", $return_val)) {
        // レート制限にかかった場合はskip
    } elseif(preg_grep("/^NOT FOUND/", $return_val) || preg_grep("/^No whois information found/", $return_val) || preg_grep("/^For more information/", $return_val)) {

        if($domain_result != 1) {
            $domain_result = 0;
        }
    } else {

        $domain_result = 1;

    }

    
}


if($nic == ".org") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.org";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.networksolutions.com {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(in_array("IP Address Has Reached Rate Limit", $return_val)) {
        // レート制限にかかった場合はskip

    } elseif(preg_grep("/^NOT FOUND/", $return_val) || preg_grep("/^No whois information found/", $return_val) || preg_grep("/^For more information/", $return_val)) {

        if($domain_result != 1) {
        $domain_result = 0;
        }
    } else {

        $domain_result = 1;

    }

    
}

if($nic == ".net") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.net";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.networksolutions.com {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(in_array("IP Address Has Reached Rate Limit", $return_val)) {
        // レート制限にかかった場合はskip

    } elseif(preg_grep("/^NOT FOUND/", $return_val) || preg_grep("/^No whois information found/", $return_val) || preg_grep("/^For more information/", $return_val)) {

        if($domain_result != 1) {
        $domain_result = 0;
        }
    } else {

        $domain_result = 1;

    }

    
}


if($nic == ".com") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.com";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.networksolutions.com {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(in_array("IP Address Has Reached Rate Limit", $return_val)) {
        // レート制限にかかった場合はskip

    } elseif(preg_grep("/^NOT FOUND/", $return_val) || preg_grep("/^No whois information found/", $return_val) || preg_grep("/^For more information/", $return_val)) {

        if($domain_result != 1) {
        $domain_result = 0;
        }
    } else {

        $domain_result = 1;

    }

    
}


if($nic == ".co.jp") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.co.jp";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.nsiregistry.com {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(preg_grep("/^No match/", $return_val)) {

        if($domain_result != 1) {
            $domain_result = 0;
        }
        
    } else {

        $domain_result = 1;

    }

    
}
if($nic == ".jp") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.jp";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.nsiregistry.com {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(preg_grep("/^No match/", $return_val)) {

        if($domain_result != 1) {
            $domain_result = 0;
        }

    } else {

        $domain_result = 1;

    }

    
}
if($nic == ".org") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.org";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.nsiregistry.com {$search_domain_last_tmp}";
    exec($command, $return_val);


    if(preg_grep("/^No match/", $return_val)) {

        if($domain_result != 1) {
            $domain_result = 0;
        }

    } else {

        $domain_result = 1;

    }

    
}

if($nic == ".net") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.net";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.nsiregistry.com {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(preg_grep("/^No match/", $return_val)) {

        if($domain_result != 1) {
            $domain_result = 0;
        }

    } else {

        $domain_result = 1;

    }

    
}


if($nic == ".com") {

    // 入力された文字列でwhois
    $return_val = "";
    $search_domain_last_tmp = "{$search_domain_last}.com";
    $search_domain_last_tmp = escapeshellcmd($search_domain_last_tmp);
    $search_domain_last_tmp = escapeshellarg($search_domain_last_tmp);
    $command = "whois -h whois.nsiregistry.com {$search_domain_last_tmp}";
    exec($command, $return_val);

    if(preg_grep("/^No match/", $return_val)) {

        if($domain_result != 1) {
        $domain_result = 0;
        }

    } else {

        $domain_result = 1;

    }

}

if($search_domain_last_tmp != "") {

    if($nic == ".jp") {
        $search_domain_last_show .= "{$search_domain_last}.jp";
    }
    if($nic == ".co.jp") {
        $search_domain_last_show .= "{$search_domain_last}.co.jp";
    }
    if($nic == ".org") {
        $search_domain_last_show .= "{$search_domain_last}.org";
    }
    if($nic == ".net") {
        $search_domain_last_show .= "{$search_domain_last}.net";
    }
    if($nic == ".com") {
        $search_domain_last_show .= "{$search_domain_last}.com";
    }
    $search_domain_last_show = htmlentities($search_domain_last_show);
}

// 入力文字があるときだけ検索結果を表示させる。
$search_domain_last_show_text = "";
$domain_result_msg = "";
if($search_domain_last_tmp != "") {

    $search_domain_last_show_text = "{$search_domain_last_show}の検索結果：";

    if($domain_result == 0) {
        $domain_result_msg = "このドメインは使われていません。";
    } elseif($domain_result == 1) {
        $domain_result_msg = "このドメインは使われています。";
    }
    
}
?>

<div class="p-page">
    <div class="p-search">

        <div class="c-wrap">
            <script>
            function search_domain_onclick() {
                document.form1.action = '';
                document.form1.submit();
            }
            </script>

            <div class="c-title2">
                <h3>ドメイン検索結果</h3>
            </div>

            <div class="search-box">
                <form name="form1" action="" method="post">
                <input type="text" name="search_domain" id="search_domain" value="<?php echo $search_domain ?>" />
                <select name="nic" id="nic">
                    <option value="" disabled selected>ドメインを選択</option>
                    <option value=".jp"<?php echo $selected_jp ?>>.jp</option>
                    <option value=".co.jp"<?php echo $selected_cojp ?>>.co.jp</option>
                    <option value=".org"<?php echo $selected_org ?>>.org</option>
                    <option value=".net"<?php echo $selected_net ?>>.net</option>
                    <option value=".com"<?php echo $selected_com ?>>.com</option>
                </select>
                <input type="button" onclick="search_domain_onclick()" value="検索する" />
            </div>

            <?php echo $msg; // ドメインが選択されてない場合のエラーメッセージ  ?>

            <div class="search_txt">
				<?php echo $search_domain_last_show_text; // 「（ドメイン名）の検索結果：」 ?><br class="sp-only">
				<?php echo $domain_result_msg; // 「このドメインは使われています or いません」 ?>
            </div>
            </form>	
        </div>
        
    </div>
</div>


<?php get_footer(); ?>