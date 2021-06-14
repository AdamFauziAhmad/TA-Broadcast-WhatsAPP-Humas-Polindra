MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6289668708972
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,6682
string0 =
(
baris 1baris 2
)
Send,%string0%+{Enter}
Sleep,9093
Send, {Enter}
Sleep,6739
Run, https://api.whatsapp.com/send?phone=6283824680384
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,3332
string0 =
(
baris 1baris 2
)
Send,%string0%+{Enter}
Sleep,4314
Send, {Enter}
Sleep,5692
Sleep,5692
Sleep,2888
clipboard :=""
MsgBox, Selesai!
return
Exit