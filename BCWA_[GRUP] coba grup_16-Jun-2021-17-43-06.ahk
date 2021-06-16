MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6289657096896
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,6908
string0 =
(
ini baris satu sedang test APL{,}{,}
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
Sleep,1813
Send, {Enter}
Sleep,6570
Run, https://api.whatsapp.com/send?phone=6285156224588
Sleep, 10000
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,1614
string0 =
(
ini baris satu sedang test APL{,}{,}
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
Sleep,1844
Send, {Enter}
Sleep,9322
Sleep,9322
clipboard :=""
MsgBox, Selesai!
return
Exit