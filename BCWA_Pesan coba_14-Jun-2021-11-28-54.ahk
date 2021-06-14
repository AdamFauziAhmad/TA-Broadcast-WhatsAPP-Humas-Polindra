MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6289668708972
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,2584
string0 =
(
isisisisisis
)
Send,%string0%+{Enter}
Sleep,2584
Send, {Enter}
Sleep,2584
Run, https://api.whatsapp.com/send?phone=6283824680384
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,2584
string0 =
(
isisisisisis
)
Send,%string0%+{Enter}
Sleep,2584
Send, {Enter}
Sleep,2584
Sleep,2584
Sleep,2584
clipboard :=""
MsgBox, Selesai!
return
Exit