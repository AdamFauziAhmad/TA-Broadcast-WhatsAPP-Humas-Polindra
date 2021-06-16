MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6285321941571
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,9730
string0 =
(
Ini pesan broadcast WA{,}
)
string1 =
(
Apakah Anda terganggu{?}
)
string2 =
(
Bila Terganggu Abaikan pesan ini{!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,6521
Send, {Enter}
Run, https://api.whatsapp.com/send?phone=6289668708972
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,8195
string0 =
(
Ini pesan broadcast WA{,}
)
string1 =
(
Apakah Anda terganggu{?}
)
string2 =
(
Bila Terganggu Abaikan pesan ini{!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,9369
Send, {Enter}
Run, https://api.whatsapp.com/send?phone=6287835124941
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,3432
string0 =
(
Ini pesan broadcast WA{,}
)
string1 =
(
Apakah Anda terganggu{?}
)
string2 =
(
Bila Terganggu Abaikan pesan ini{!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,7744
Send, {Enter}
Run, https://api.whatsapp.com/send?phone=6289657096896
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,4519
string0 =
(
Ini pesan broadcast WA{,}
)
string1 =
(
Apakah Anda terganggu{?}
)
string2 =
(
Bila Terganggu Abaikan pesan ini{!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,4840
Send, {Enter}
Run, https://api.whatsapp.com/send?phone=6283824680384
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,7193
string0 =
(
Ini pesan broadcast WA{,}
)
string1 =
(
Apakah Anda terganggu{?}
)
string2 =
(
Bila Terganggu Abaikan pesan ini{!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,9204
Send, {Enter}
Run, https://api.whatsapp.com/send?phone=6285156224588
Sleep, 100
send, ^W
Sleep, 9000
Send, ^v
Sleep,4697
string0 =
(
Ini pesan broadcast WA{,}
)
string1 =
(
Apakah Anda terganggu{?}
)
string2 =
(
Bila Terganggu Abaikan pesan ini{!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,3090
Send, {Enter}
Sleep,7871
clipboard :=""
MsgBox, Selesai!
return
Exit