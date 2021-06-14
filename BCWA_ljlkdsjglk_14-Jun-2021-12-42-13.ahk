MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6289668708972
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,8792
string0 =
(

)
Send,%string0%+{Enter}
Sleep,2734
Send, {Enter}
Sleep,4996
Run, https://api.whatsapp.com/send?phone=6283824680384
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,7840
string0 =
(

)
Send,%string0%+{Enter}
Sleep,1365
Send, {Enter}
Sleep,6053
Sleep,6053
clipboard :=""
MsgBox, Selesai!
return
Exit