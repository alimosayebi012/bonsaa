<?php
ob_start();
include 'Class.php';
/* تیم سازنده : @Lite_Team
   نویسنده : @mohammadstar_98 */
$button_manage = json_encode(['keyboard'=>[
    [['text'=>'↩️منوی اصلی']],
    [['text'=>'پیام همگانی'],['text'=>'فوروارد همگانی']],
    [['text'=>'آمار']],
],'resize_keyboard'=>true]);
$button_admin = json_encode(['keyboard'=>[
    [['text'=>'چند بن‌سا دارم 🤔']],
    [['text'=>'تبدیل بن‌سا به اینترنت  📲']],
    [['text'=>'دریافت لینک اختصاصی دعوت از دوستان ✉️']],
    [['text'=>"مدیریت"]],
],'resize_keyboard'=>true]);
$button_official = json_encode(['keyboard'=>[
    [['text'=>'چند بن‌سا دارم 🤔']],
    [['text'=>'تبدیل بن‌سا به اینترنت  📲']],
    [['text'=>'دریافت لینک اختصاصی دعوت از دوستان ✉️']],
],'resize_keyboard'=>true]);
$button_operator = json_encode(['keyboard'=>[
    [['text'=>'ایرانسل']],
    [['text'=>'همراه اول']],
    [['text'=>'رایتل']],
    [['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_net = json_encode(['keyboard'=>[
    [['text'=>'روزانه']],
    [['text'=>'هفتگی']],
    [['text'=>'ماهانه']],
    [['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_net_roz = json_encode(['keyboard'=>[
    [['text'=>'بسته یکروزه 50 مگابایت']],
    [['text'=>'بسته یکروزه 500 مگابایت']],
    [['text'=>'بسته یکروزه 1 گیگابایت']],
    [['text'=>'بسته یکروزه 2 گیگابایت']],
    [['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_net_hafte = json_encode(['keyboard'=>[
    [['text'=>'بسته هفتگی 40 مگابایت']],
    [['text'=>'بسته هفتگی 60 مگابایت']],
    [['text'=>'بسته هفتگی 2 گیگابایت']],
    [['text'=>'بسته هفتگی 4 گیگابایت']],
    [['text'=>'بسته هفتگی 6 گیگابایت']],
    [['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_net_mah = json_encode(['keyboard'=>[
    [['text'=>'بسته یکماهه 200 مگابایت']],
    [['text'=>'بسته یکماهه 3 گیگابایت']],
    [['text'=>'بسته یکماهه 4 گیگابایت']],
    [['text'=>'بسته یکماهه 5 گیگابایت']],
    [['text'=>'بسته یکماهه 7 گیگابایت']],
    [['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_back = json_encode(['keyboard'=>[
    [['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$update = json_decode(file_get_contents('php://input'));
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->message->from->id;
$messageid = $update->callback_query->message->message_id;
$data_id = $update->callback_query->id;
$txt = $update->callback_query->message->text;
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$from_username = $update->message->from->username;
$from_first = $update->message->from->first_name;
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
$text = $update->message->text;
$message_id = $update->message->message_id;
$stickerid = $update->message->sticker->file_id;
$videoid = $update->message->video->file_id;
$voiceid = $update->message->voice->file_id;
$fileid = $update->message->document->file_id;
$photo = $update->message->photo;
$photoid = $photo[count($photo)-1]->file_id;
$musicid = $update->message->audio->file_id;
$caption = $update->message->caption;
$cde = time();
$code = md5("$cde$from_id");
$time = file_get_contents("http://robot.teleagent.ir/time/");
$date = file_get_contents("http://robot.teleagent.ir/date/");
$command = file_get_contents('user/'.$from_id."/command.txt");
$coin = file_get_contents('user/'.$from_id."/bonsa.txt");
$username = $update->message->from->username;
$name = $update->message->from->first_name;
$coin_wait = file_get_contents('user/'.$wait."/coin.txt");
$Member = file_get_contents('admin/Member.txt');
$data = $update->callback_query->data;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@Lite_Team&user_id=$from_id"));
$tch = $truechannel->result->status;
//$truechannel1 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@Lite_Team&user_id=$from_id"));
//$tch1 = $truechannel1->result->status;

// start source
if (strpos($block , "$from_id") !== false) {
 return false;
}
elseif ($from_id != $chat_id and $chat_id != $feed) {
 LeaveChat($chat_id);
}
//===============
elseif(strpos($text,'/start') !== false) {
  $id = str_replace("/start ","",$text);
  mkdir("user/$from_id");
  if (!file_exists("user/$from_id/bonsa.txt")) {
    save("user/$from_id/bonsa.txt","20");
    save("user/$from_id/command.txt","none");
    SendMessage($chat_id,"تبریک میگیم! 200 تومن (معادل 20 بن سا) برای ثبت نام در بن سا از ما هدیه گرفتی.

حالا دویاره /start را ارسال کن.");
SendMessage($chat_id,"💰 حالا با دعوت هر دوستت می‌تونی 300 تومن (معادل 30 بن‌سا) از ما هدیه بگیری 🎁 ❗️ فقط کافیه لینک اختصاصی خودتو از منوی زیر دریافت کنی 👇🏻 و برای دوستات بفرستی 📣 تا اونها هم به محض عضویت ۲۰۰ تومن (معادل ۲۰ بن‌سا) هدیه بگیرن، پس عجله کن❗️❗️🏃🏽");

    if ($id != "") {
      if ($id != $from_id) {
          SendMessage($id,"🎊تبریک!🎊

یک نفر با لینک دعوت تو با نام $name وارد ربات شد و تو 30 بن  سا از ما معادل 300 تومن دریافت کردی.✴️");
          $coin = file_get_contents("user/$id/bonsa.txt");
          settype($coin,"integer");
          $newcoin = $coin + 30;
          save("user/$id/bonsa.txt",$newcoin);
      }
      else {
        SendMessage($chat_id,"شما قبلا در ربات عضو بودید !");
      }
    }
  }
   if($from_id == $admin){
          SendMessage($chat_id,"یک گزینه انتخاب کنید","html","true",$button_admin);
   }else{
	      SendMessage($chat_id,"یک گزینه انتخاب کنید","html","true",$button_official);
   }
}
//==============
elseif($text == '↩️منوی اصلی'){
 if($from_id == $admin){
  file_put_contents('user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"↩️ شما به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_admin);
 }else{
  file_put_contents('user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"↩️ شما به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official);
 }
}
//===============
elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
	SendMessage($chat_id,"📛 برای حمایت از ما و همچنان ربات ابتدا وارد کانال های زیر بشید 👇

🆔 @Lite_Team

✅ سپس روی JOIN بزنید و به ربات برگشته عبارت 👇

🔸 /start

✴️ رو بزنید تا دکمه های ربات نمایش داده بشن👌","html","true",$button_remove);
	}
	/* elseif($tch1 != 'member' && $tch1 != 'creator' && $tch1 != 'administrator'){
	SendMessage($chat_id,"📛 برای حمایت از ما و همچنان ربات ابتدا وارد کانال های زیر بشید 👇

🆔 @Lite_Team
🆔 @Lite_Team

✅ سپس روی JOIN بزنید و به ربات برگشته عبارت 👇

🔸 /start

✴️ رو بزنید تا دکمه های ربات نمایش داده بشن👌","html","true",$button_remove);
	}*/
//===============
elseif($text == 'چند بن‌سا دارم 🤔'){
 SendMessage($chat_id,"شما $coin بن سا دارید.","html","true",$button_official);
}
//===============
elseif($text == 'دریافت لینک اختصاصی دعوت از دوستان ✉️'){
var_dump(bot('sendPhoto',[
        'chat_id'=>$update->message->chat->id,
        'photo'=>"http://uupload.ir/files/1qjq_photo_2017-07-25_06-55-12.jpg",
        'caption'=>"ـ $name دعوتت کرده که عضو بن‌سا بشی و کلی اتفاقهای هیجان‌انگیز برات بیفته، از شارژ بگیر📱تا سفر 🚘،رستوران🍕و تخفیف‌های جذاب دیگه! روی لینک زیر کلیک کن👇
t.me/$UserNameBot?start=$from_id",
    ]));
  SendMessage($chat_id,"دعوت‌نامه بالا رو برای دوستات و در گرو‌ه‌هایی که عضو هستی، بفرست ⤴️
💥 هر نفر ۵۰ بن‌سا ❗️","html","true",$button_official);
}
//===============
elseif($text == 'تبدیل بن‌سا به اینترنت  📲'){
 SendMessage($chat_id,"اپراتور خود را انتخاب کنید","html","true",$button_operator);
}
//===============
elseif($text == 'ایرانسل'){
 SendMessage($chat_id,"نوع بسته مورد نظر خود را انتخاب کنید","html","true",$button_net);
}
elseif($text == 'همراه اول'){
 SendMessage($chat_id,"نوع بسته مورد نظر خود را انتخاب کنید","html","true",$button_net);
}
elseif($text == 'رایتل'){
 SendMessage($chat_id,"نوع بسته مورد نظر خود را انتخاب کنید","html","true",$button_net);
}
//===============
elseif($text == 'روزانه'){
 SendMessage($chat_id,"بسته مورد نظر خود را انتخاب کنید","html","true",$button_net_roz);
}
elseif($text == 'هفتگی'){
 SendMessage($chat_id,"بسته مورد نظر خود را انتخاب کنید","html","true",$button_net_hafte);
}
elseif($text == 'ماهانه'){
 SendMessage($chat_id,"بسته مورد نظر خود را انتخاب کنید","html","true",$button_net_mah);
}
//===============
elseif($text == 'بسته یکروزه 50 مگابایت'){
        save("user/".$from_id."/command.txt","roz 50 m");
 SendMessage($chat_id,"شماره مورد نظر را ارسال کنید","html","true",$button_back);
}
elseif($text == 'بسته یکروزه 500 مگابایت'){
        save("user/".$from_id."/command.txt","roz 500 m");
 SendMessage($chat_id,"شماره مورد نظر را ارسال کنید","html","true",$button_back);
}
elseif($text == 'بسته یکروزه 1 گیگابایت'){
        save("user/".$from_id."/command.txt","roz 1 g");
 SendMessage($chat_id,"شماره مورد نظر را ارسال کنید","html","true",$button_back);
}
elseif($text == 'بسته یکروزه 2 گیگابایت'){
        save("user/".$from_id."/command.txt","roz 2 g");
 SendMessage($chat_id,"شماره مورد نظر را ارسال کنید","html","true",$button_back);
}
elseif($command == 'roz 50 m'){
 save("user/".$from_id."/command.txt","none");
 if($coin != 99999){
      SendMessage($chat_id,"بعد از رسیدن به موجودی بالاتر از 120 بن سا امکان دریافت بسته برای شما فراهم خواهد شد.","html","true",$button_official);
 }
}
elseif($command == 'roz 500 m'){
 save("user/".$from_id."/command.txt","none");
  if($coin != 99999){
      SendMessage($chat_id,"بعد از رسیدن به موجودی بالاتر از 520 بن سا امکان دریافت بسته برای شما فراهم خواهد شد.","html","true",$button_official);
 }
}
elseif($command == 'roz 1 g'){
 save("user/".$from_id."/command.txt","none");
  if($coin != 99999){
      SendMessage($chat_id,"بعد از رسیدن به موجودی بالاتر از 1020 بن سا امکان دریافت بسته برای شما فراهم خواهد شد.","html","true",$button_official);
 }
}
elseif($command == 'roz 2 g'){
 save("user/".$from_id."/command.txt","none");
  if($coin != 99999){
      SendMessage($chat_id,"بعد از رسیدن به موجودی بالاتر از 1520 بن سا امکان دریافت بسته برای شما فراهم خواهد شد.","html","true",$button_official);
 }
}
//===============
elseif($text == 'بسته هفتگی 40 مگابایت'){
        save("user/".$from_id."/command.txt","hafte 40 m");
 SendMessage($chat_id,"شماره مورد نظر را ارسال کنید","html","true",$button_back);
}
elseif($text == 'بسته هفتگی 60 مگابایت'){
        save("user/".$from_id."/command.txt","hafte 60 m");
 SendMessage($chat_id,"شماره مورد نظر را ارسال کنید","html","true",$button_back);
}
elseif($text == 'بسته هفتگی 2 گیگابایت'){
        save("user/".$from_id."/command.txt","hafte 2 g");
 SendMessage($chat_id,"شماره مورد نظر را ارسال کنید","html","true",$button_back);
}
elseif($text == 'بسته هفتگی 4 گیگابایت'){
        save("user/".$from_id."/command.txt","hafte 4 g");
 SendMessage($chat_id,"شماره مورد نظر را ارسال کنید","html","true",$button_back);
}
elseif($text == 'بسته هفتگی 6 گیگابایت'){
        save("user/".$from_id."/command.txt","hafte 6 g");
 SendMessage($chat_id,"شماره مورد نظر را ارسال کنید","html","true",$button_back);
}
elseif($command == 'hafte 40 m'){
 save("user/".$from_id."/command.txt","none");
 if($coin != 99999){
      SendMessage($chat_id,"بعد از رسیدن به موجودی بالاتر از 220 بن سا امکان دریافت بسته برای شما فراهم خواهد شد.","html","true",$button_official);
 }
}
elseif($command == 'hafte 60 m'){
 save("user/".$from_id."/command.txt","none");
  if($coin != 99999){
      SendMessage($chat_id,"بعد از رسیدن به موجودی بالاتر از 320 بن سا امکان دریافت بسته برای شما فراهم خواهد شد.","html","true",$button_official);
 }
}
elseif($command == 'hafte 2 g'){
 save("user/".$from_id."/command.txt","none");
  if($coin != 99999){
      SendMessage($chat_id,"بعد از رسیدن به موجودی بالاتر از 720 بن سا امکان دریافت بسته برای شما فراهم خواهد شد.","html","true",$button_official);
 }
}
elseif($command == 'hafte 4 g'){
 save("user/".$from_id."/command.txt","none");
  if($coin != 99999){
      SendMessage($chat_id,"بعد از رسیدن به موجودی بالاتر از 1320 بن سا امکان دریافت بسته برای شما فراهم خواهد شد.","html","true",$button_official);
 }
}
elseif($command == 'hafte 6 g'){
 save("user/".$from_id."/command.txt","none");
  if($coin != 99999){
      SendMessage($chat_id,"بعد از رسیدن به موجودی بالاتر از 2120 بن سا امکان دریافت بسته برای شما فراهم خواهد شد.","html","true",$button_official);
 }
}
//===============
elseif($text == 'بسته یکماهه 200 مگابایت'){
        save("user/".$from_id."/command.txt","mah 200 m");
 SendMessage($chat_id,"شماره مورد نظر را ارسال کنید","html","true",$button_back);
}
elseif($text == 'بسته یکماهه 3 گیگابایت'){
        save("user/".$from_id."/command.txt","mah 3 g");
 SendMessage($chat_id,"شماره مورد نظر را ارسال کنید","html","true",$button_back);
}
elseif($text == 'بسته یکماهه 4 گیگابایت'){
        save("user/".$from_id."/command.txt","mah 4 g");
 SendMessage($chat_id,"شماره مورد نظر را ارسال کنید","html","true",$button_back);
}
elseif($text == 'بسته یکماهه 5 گیگابایت'){
        save("user/".$from_id."/command.txt","mah 5 g");
 SendMessage($chat_id,"شماره مورد نظر را ارسال کنید","html","true",$button_back);
}
elseif($text == 'بسته یکماهه 7 گیگابایت'){
        save("user/".$from_id."/command.txt","mah 7 g");
 SendMessage($chat_id,"شماره مورد نظر را ارسال کنید","html","true",$button_back);
}
elseif($command == 'mah 200 m'){
 save("user/".$from_id."/command.txt","none");
 if($coin != 99999){
      SendMessage($chat_id,"بعد از رسیدن به موجودی بالاتر از 420 بن سا امکان دریافت بسته برای شما فراهم خواهد شد.","html","true",$button_official);
 }
}
elseif($command == 'mah 3 g'){
 save("user/".$from_id."/command.txt","none");
  if($coin != 99999){
      SendMessage($chat_id,"بعد از رسیدن به موجودی بالاتر از 1020 بن سا امکان دریافت بسته برای شما فراهم خواهد شد.","html","true",$button_official);
 }
}
elseif($command == 'mah 4 g'){
 save("user/".$from_id."/command.txt","none");
  if($coin != 99999){
      SendMessage($chat_id,"بعد از رسیدن به موجودی بالاتر از 1520 بن سا امکان دریافت بسته برای شما فراهم خواهد شد.","html","true",$button_official);
 }
}
elseif($command == 'mah 5 g'){
 save("user/".$from_id."/command.txt","none");
  if($coin != 99999){
      SendMessage($chat_id,"بعد از رسیدن به موجودی بالاتر از 2020 بن سا امکان دریافت بسته برای شما فراهم خواهد شد.","html","true",$button_official);
 }
}
elseif($command == 'mah 7 g'){
 save("user/".$from_id."/command.txt","none");
  if($coin != 99999){
      SendMessage($chat_id,"بعد از رسیدن به موجودی بالاتر از 3520 بن سا امکان دریافت بسته برای شما فراهم خواهد شد.","html","true",$button_official);
 }
}
//===============
elseif($text == 'مدیریت' and $from_id == $admin){
 SendMessage($chat_id,"به پنل مدیریت خوش اومدید","html","true",$button_manage);
}
elseif($text == 'آمار' and $from_id == $admin){
 $txtt = file_get_contents('admin/Member.txt');
 $member_id = explode("\n",$txtt);
 $mmemcount = count($member_id) -1;
 SendMessage($chat_id,"کل کاربران: $mmemcount نفر","html","true");
}
elseif($text == 'فوروارد همگانی' and $from_id == $admin){
 file_put_contents("user/".$from_id."/command.txt","s2a fwd");
 SendMessage($chat_id,"پیام مورد نظر را فوروارد کنید","html","true",$button_back);
}
elseif($command == 's2a fwd' and $from_id == $admin){
 file_put_contents("user/".$from_id."/command.txt","none");
 SendMessage($chat_id,"پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
 $all_member = fopen( "admin/Member.txt", 'r');
 while( !feof( $all_member)) {
  $user = fgets( $all_member);
  ForwardMessage($user,$admin,$message_id);
 }
}
elseif($text == 'پیام همگانی' and $from_id == $admin){
 file_put_contents("user/".$from_id."/command.txt","s2a");
 SendMessage($chat_id,"پیامتون رو وارد کنید","html","true",$button_back);
}
elseif($command == 's2a' and $from_id == $admin){
 file_put_contents("user/".$from_id."/command.txt","none");
 SendMessage($chat_id,"پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
 $all_member = fopen( "admin/Member.txt", 'r');
 while( !feof( $all_member)) {
  $user = fgets( $all_member);
  if($sticker_id != null){
   SendSticker($user,$stickerid);
  }
  elseif($videoid != null){
   SendVideo($user,$videoid,$caption);
  }
  elseif($voiceid != null){
   SendVoice($user,$voiceid,'',$caption);
  }
  elseif($fileid != null){
   SendDocument($user,$fileid,'',$caption);
  }
  elseif($musicid != null){
   SendAudio($user,$musicid,'',$caption);
  }
  elseif($photoid != null){
   SendPhoto($user,$photoid,'',$caption);
  }
  elseif($text != null){
   SendMessage($user,$text,"html","true");
  }
 }
}
// End Source
$txxt = file_get_contents('admin/Member.txt');
$pmembersid= explode("\n",$txxt);
if (!in_array($chat_id,$pmembersid)){
 $aaddd = file_get_contents('admin/Member.txt');
 $aaddd .= $chat_id."\n";
 file_put_contents('admin/Member.txt',$aaddd);
}unlink('error_log');
?>