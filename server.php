<?php
    // var_dump($_POST);
    $r =  array("resultado"=>false, "dominio"=>"", "dns_r"=>"");;
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $e = $_POST['email'];
        $dominio = explode("@",$e)[1];
        $r["dominio"] = $dominio;
        if(!$dns_r = dns_get_record($dominio, DNS_MX)){
            $r["resultado"] = false;
        }else{
            $r["resultado"] = true;
            $r["dns_r"] = $dns_r;
        }
    }

    echo(json_encode($r));
?>