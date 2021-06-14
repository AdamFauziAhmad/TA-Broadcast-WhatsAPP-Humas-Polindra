MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6289668708972
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,5052
string0 =
(
isisisisisis
)
Send,%string0%+{Enter}
Sleep,5052
Send, {Enter}
Sleep,5052
Run, https://api.whatsapp.com/send?phone=6283824680384
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,5052
string0 =
(
isisisisisis
)
Send,%string0%+{Enter}
Sleep,5052
Send, {Enter}
Sleep,5052
Sleep,5052
Sleep,5052
clipboard :=""
MsgBox, Selesai!
return
Exit