MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6289657096896
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,6479
string0 =
(
ini baris satu sedang test APL,
)
string1 =
(
apakah anda terganggu {?}
)
string2 =
(
jika terganggu abaikan saja {!}{!}{!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,3177
Send, {Enter}
Sleep,7641
Run, https://api.whatsapp.com/send?phone=6285156224588
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,6012
string0 =
(
ini baris satu sedang test APL,
)
string1 =
(
apakah anda terganggu {?}
)
string2 =
(
jika terganggu abaikan saja {!}{!}{!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,2680
Send, {Enter}
Sleep,8947
Sleep,8947
clipboard :=""
MsgBox, Selesai!
return
Exit