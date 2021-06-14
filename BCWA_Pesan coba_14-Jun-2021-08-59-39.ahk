MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6289668708972
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,3971
string0 =
(
mknlmndlfa
)
string1 =
(
djslafjljsdlfk
)
Send,%string0%+{Enter}%string1%+{Enter}
Sleep,3971
Send, {Enter}
Sleep,3971
Run, https://api.whatsapp.com/send?phone=6283824680384
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,3971
string0 =
(
mknlmndlfa
)
string1 =
(
djslafjljsdlfk
)
Send,%string0%+{Enter}%string1%+{Enter}
Sleep,3971
Send, {Enter}
Sleep,3971
Sleep,3971
Sleep,3971
clipboard :=""
MsgBox, Selesai!
return
Exit