MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6289668708972
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,8081
string0 =
(
cococoocococo
)
string1 =
(
cocoocococ
)
Send,%string0%+{Enter}%string1%+{Enter}
Sleep,8081
Send, {Enter}
Sleep,8081
Run, https://api.whatsapp.com/send?phone=6283824680384
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,8081
string0 =
(
cococoocococo
)
string1 =
(
cocoocococ
)
Send,%string0%+{Enter}%string1%+{Enter}
Sleep,8081
Send, {Enter}
Sleep,8081
Sleep,8081
Sleep,8081
clipboard :=""
MsgBox, Selesai!
return
Exit