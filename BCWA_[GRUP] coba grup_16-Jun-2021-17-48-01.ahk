MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6289657096896
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,6130
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
Sleep,4959
Send, {Enter}
Run, https://api.whatsapp.com/send?phone=6285156224588
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,9939
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
Sleep,7155
Send, {Enter}
Sleep,4171
clipboard :=""
MsgBox, Selesai!
return
Exit