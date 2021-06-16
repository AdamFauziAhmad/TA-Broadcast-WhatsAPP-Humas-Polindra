MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6285156224588
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,4338
string0 =
(
Ini pesan WA,
)
string1 =
(
ini pesan {?}
)
string2 =
(
Abaikan {!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,1096
Send, {Enter}
Sleep,3685
clipboard :=""
MsgBox, Selesai!
return
Exit