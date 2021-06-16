MsgBox, Mulai?
;Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA
Run, https://api.whatsapp.com/send?phone=6285321941571
Sleep, 9000
Send, ^v
Sleep,6032
string0 =
(
Ini adalah pesan percobaan,
)
string1 =
(
Apakah Anda Terganggu{?}
)
string2 =
(
Jika iya silahkan Abaikan {!}{!}{!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,5793
Send, {Enter}
Sleep,3989
send, !{TAB}
Sleep,5865
Run, https://api.whatsapp.com/send?phone=6289668708972
Sleep, 9000
Send, ^v
Sleep,2633
string0 =
(
Ini adalah pesan percobaan,
)
string1 =
(
Apakah Anda Terganggu{?}
)
string2 =
(
Jika iya silahkan Abaikan {!}{!}{!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,8894
Send, {Enter}
Sleep,8979
send, !{TAB}
Sleep,3084
Run, https://api.whatsapp.com/send?phone=6287835124941
Sleep, 9000
Send, ^v
Sleep,7963
string0 =
(
Ini adalah pesan percobaan,
)
string1 =
(
Apakah Anda Terganggu{?}
)
string2 =
(
Jika iya silahkan Abaikan {!}{!}{!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,6385
Send, {Enter}
Sleep,2603
send, !{TAB}
Sleep,6138
Run, https://api.whatsapp.com/send?phone=6289657096896
Sleep, 9000
Send, ^v
Sleep,9889
string0 =
(
Ini adalah pesan percobaan,
)
string1 =
(
Apakah Anda Terganggu{?}
)
string2 =
(
Jika iya silahkan Abaikan {!}{!}{!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,9121
Send, {Enter}
Sleep,9477
send, !{TAB}
Sleep,8560
Run, https://api.whatsapp.com/send?phone=6283824680384
Sleep, 9000
Send, ^v
Sleep,5770
string0 =
(
Ini adalah pesan percobaan,
)
string1 =
(
Apakah Anda Terganggu{?}
)
string2 =
(
Jika iya silahkan Abaikan {!}{!}{!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,9143
Send, {Enter}
Sleep,9205
send, !{TAB}
Sleep,7004
Run, https://api.whatsapp.com/send?phone=6285156224588
Sleep, 9000
Send, ^v
Sleep,6665
string0 =
(
Ini adalah pesan percobaan,
)
string1 =
(
Apakah Anda Terganggu{?}
)
string2 =
(
Jika iya silahkan Abaikan {!}{!}{!}{!}{!}{!}
)
Send,%string0%+{Enter}%string1%+{Enter}%string2%+{Enter}
Sleep,7625
Send, {Enter}
Sleep,7172
send, !{TAB}
Sleep,9924
Sleep,5468
clipboard :=""
MsgBox, Selesai!
return
Exit