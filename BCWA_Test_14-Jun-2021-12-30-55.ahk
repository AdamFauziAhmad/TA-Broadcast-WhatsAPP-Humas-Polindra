MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6289668708972
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,6446
string0 =
(
baris 1baris 2
)
Send,%string0%+{Enter}
Sleep,6467
Send, {Enter}
Sleep,6436
Run, https://api.whatsapp.com/send?phone=6283824680384
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,6567
string0 =
(
baris 1baris 2
)
Send,%string0%+{Enter}
Sleep,5876
Send, {Enter}
Sleep,7742
Sleep,7742
Sleep,8158
clipboard :=""
MsgBox, Selesai!
return
Exit