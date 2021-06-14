MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6289668708972
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,5133
string0 =
(
isisisisisis
)
Send,%string0%+{Enter}
Sleep,5133
Send, {Enter}
Sleep,5133
Run, https://api.whatsapp.com/send?phone=6283824680384
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,5133
string0 =
(
isisisisisis
)
Send,%string0%+{Enter}
Sleep,5133
Send, {Enter}
Sleep,5133
Sleep,5133
Sleep,5133
clipboard :=""
MsgBox, Selesai!
return
Exit