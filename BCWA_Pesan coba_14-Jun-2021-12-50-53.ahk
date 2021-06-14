MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6289668708972
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,6413
string0 =
(
pesan 1
)
string1 =
(
pesan 2
)
Send,%string0%+{Enter}%string1%+{Enter}
Sleep,4294
Send, {Enter}
Sleep,7407
Run, https://api.whatsapp.com/send?phone=6283824680384
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,8417
string0 =
(
pesan 1
)
string1 =
(
pesan 2
)
Send,%string0%+{Enter}%string1%+{Enter}
Sleep,9855
Send, {Enter}
Sleep,8503
Sleep,8503
clipboard :=""
MsgBox, Selesai!
return
Exit