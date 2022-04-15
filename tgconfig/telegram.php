<?php

$tg_bot_token = "5105526335:AAFFPC_7WdTsaxjh1sNg2AWHcpYEtRaBsNs";
$tg_chat_id = "5211293026";




function telegram($msg) {
        global $tg_bot_token,$tg_chat_id;
        $url='https://api.telegram.org/bot'.$tg_bot_token.'/sendMessage';$data=array('chat_id'=>$tg_chat_id,'text'=>$msg, 'parse_mode' => 'html');
        $options=array('http'=>array('method'=>'POST','header'=>"Content-Type:application/x-www-form-urlencoded\r\n",'content'=>http_build_query($data),),);
        $context=stream_context_create($options);
        $result=file_get_contents($url,false,$context);
        return $result;
}

header("Location: ./ ");

?>