Module Module1
    Public up1totalPage = 0
    Public down1totalPage = 0
    Public up2totalPage = 0
    Public down2totalPage = 0
    Public up3totalPage = 0
    Public down3totalPage = 0
    Public preURL = ""
    Public preLineNum = ""
    Public isCK1 = True
    Public isCK2 = True
    Public isCK3 = True
    Public isCKDayDirect = True
    Public ekikaraLineHost = "ekikara.jp"
    Public ekikaraLinePath1 = "/newdata/line/"
    Public ekikaraLineURL = "http://" & ekikaraLineHost & ekikaraLinePath1
    Public eki_up = "up1_"
    Public eki_down = "down1_"
    Public eki_sat = "_sat"
    Public eki_holi = "_holi"
    Public eki_print = "_print"
    Public eki_htm = ".htm"
    Public WithEvents Sck1 As System.Net.Sockets.Socket
    Public ekiTableAreaCSS = "lowBg14"
    Public logString As String = ""
    Public stopFlag = False
    Public line1 = "===================================================="
    Public timeTableUp1() As String
    Public timeTableDown1() As String
    Public timeTableUp2() As String
    Public timeTableDown2() As String
    Public timeTableUp3() As String
    Public timeTableDown3() As String
    Public timeTableObj() As Array = {timeTableUp1, timeTableDown1, timeTableUp2, timeTableDown2, timeTableUp3, timeTableDown3}
    Public getUp1Count = -1
    Public getDown1Count = -1
    Public getUp2Count = -1
    Public getDown2Count = -1
    Public getUp3Count = -1
    Public getDown3Count = -1
    Public lineTitle = ""

    Public styleCSS = "/* 	http://www.gnavi.co.jp/	Layout Control CSS ""style.css""	GOURMET NAVIGATOR INC.*/body {	margin: 0px;	padding: 0px;	background-color: #FFFFFF;	color: #333333;	text-align: center;}form{	margin: 0px;}h1{	margin: 0px;	padding: 0px;	font-weight: bold;}h2{	margin: 0px 0px 0px 0px;	padding: 0px 0px 0px 0px;}h3{	margin: 0px 0px 0px 0px;	padding: 0px 0px 0px 0px;}h4{	margin: 0px 0px 0px 0px;	padding: 0px 0px 0px 0px;}p{	margin: 0px 0px 0px 0px;	padding: 0px 0px 0px 0px;}ul{	margin: 0;	padding: 0 0 10px 20px;}a:link {	color: #0000FF;}a:visited {	color: #990099;}a:hover {	color: #CC0000;}a:active {	color: #CC0000;}.textWhite a:link {	color: #FFFFFF;}.textWhite a:visited {	color: #FFFFFF;}.textWhite a:hover {	color: #FFFFFF;}.textWhite a:active {	color: #FFFFFF;}.textBold {	font-weight: bold;}.textWhite {	color: #FFFFFF;}.textOrange {	color: #FF6600;}.textWine {	color: #CE0000;}.textWineB {	color: #CE0000;	font-weight: bold;}.textRed {	color: #FF0000;}.textBlue {	color: #0000FF;}.textBlue02 {	color: #0057DA;}.textPurple {	color: #B408D9;}.textGreen {	color: #66A437;}#wrapper {	padding: 0px 25px 0px 25px;	text-align: center;}#container01 {	margin: 0px auto;	width: 740px;	text-align: left;}#container02 {	width: 100%;	text-align: left;}/* header */.headerLink {	color: #999999;}#pnkz a {	font-weight: bold;}/* footer */.copyright {	padding: 5px;	text-align: center;	color: #999999;}/* form */.inputBorder {	border: 1px solid #7F9DB9;	background: #FFFFFF;}.inputBox01 {	width: 160px;}.inputBox02 {	width: 216px;}.inputBox03 {	width: 45px;}.inputBox04 {	width: 56px;}.inputBox05 {	width: 90px;}.inputBox06 {	width: 280px;}.inputBox07 {	width: 640px;}.inputBox08 {	width: 350px;}.inputBox09 {	width: 410px;}.kiyakuBox {	border: 1px solid #7F9DB9;	padding: 16px 12px 16px 12px;	height: 16em;	overflow: auto;}.errorMes {	margin: 2px 0px;	color: #CE0000;	font-weight: bold;}/* top page */.inner01 {	width: 216px;	margin: 8px 4px 8px 4px;}.inner01 td span {	letter-spacing: -0.04em;}.inner02 {	width: 212px;	margin: 0px 9px;}.inner03 {	width: 324px;	margin: 4px 10px;}.inner04 {	width: 324px;	margin: 4px 12px 0px 12px;}.inner05 {	width: 340px;	margin: 0px 5px;}.inner06 {	width: 206px;	margin: 4px 12px 0px 12px;}.inner07 {	width: 220px;	margin: 0px 5px;}.capBold {	color: #0F7BBF;	font-weight: bold;}.ltsMinus {	letter-spacing: -0.04em;}.line{	border-top: 1px dashed #999999;	margin: 5px 0;}/* low */.lowCapColor01 {	background: #489EDC;}.lowCap01 {	color: #0F7BBF;	font-weight: bold;	font-size: 125%;	white-space: nowrap;}.lowBgFFF {	background: #FFFFFF;}.lowBg01 {	background: #B0C4DE;}.lowBg02 {	background: #E6E6E6;}.lowBg03 {	background: #E8F7FF;}.lowBg04 {	background: #4A9EDE;	color: #FFFFFF;	font-weight: bold;}.lowBg05 {	background: #3E94E2;}.lowBg06 {	background: #FAFAE0;}.lowBg07 {	background: #FFFFF1;}.lowBg08 {	background: #B8DFFF;}.lowBg08Ex {	background: #B8DFFF;	border-right: 2px solid #FFFFFF;}.lowBg09 {	background: #FFFFD8;}.lowBg09Last {	background: #FFFFD8;	border-bottom: 2px solid #FFFFFF;}.lowBg10 {	background: #F3F3F3;}.lowBg10Last {	background: #F3F3F3;	border-bottom: 2px solid #FFFFFF;}.lowBg11 {	background: #489EDC;	color: #FFFFFF;	font-weight: bold;}.lowBg12 {	background: #EEEEEE;}.lowBg13 {	background: #66A437;	color: #FFFFFF;	font-weight: bold;}.lowBg14 {	background: #A3D599;}.lowPad01 {	padding: 10px;}.lowPad02 {	padding: 10px 6px;}.lowPad03 {	padding: 0px 2px 0px 4px;}.lowPad04 {	padding: 0px 16px 4px 16px;}.actv01 {	border: 1px solid #2394DC;	background: #E8F7FF;	padding: 3px 8px;	font-weight: bold;	color: #0F7BBF;	white-space: nowrap;}.nrml01 {	border: 1px solid #B0C4DE;	background: #F9FAF9;	padding: 3px 8px;	white-space: nowrap;}.rsltSet01 {	margin-bottom: 20px;}.rsltSet02 {	margin-bottom: 10px;}.bgRale {	background: url(../images2/common/rale.gif) repeat-y center top;}.bgFoot {	background: url(../images2/common/foot.gif) repeat-y center top;}.bgAir {	background: url(../images2/common/air.gif) repeat-y center top;}.tdWid01 {	width: 7em;}.tagBox01 {	border-top: 1px solid #B0C4DE;	border-left: 1px solid #B0C4DE;	padding: 12px;}.prbox   {	margin: 20px 0 0 0;	border: 1px solid #FEA045;}.prBg01   {	background: #FEA045;    padding: 5 10;	font-weight: bold;	color: #FFFFFF;	white-space: nowrap;}.prhotelbox   {	margin: 20px 0 0 0;	border: 1px solid #6CB84C;}.prhotelBg01   {	background: #6CB84C;    padding: 5 10;	font-weight: bold;	color: #FFFFFF;	white-space: nowrap;}.prtitle  {	padding: 0px 0 5 0;	font-weight: bold;}.prtype  {    color: #636563;	padding: 0px 0 5 0;	font-weight: bold;}.ekitanbox  {	margin: 30px 0 0 0;	border: 1px solid #cccccc;}.ekitanBg01{	background: #2159A5;    padding: 5 10;	font-weight: bold;	color: #FFFFFF;	white-space: nowrap;}.surroundinfo{	margin: 40px 0 0 0;}/* wrapper */#wrapper #container02 .line {	border-right: 1px dashed #999999;}.kuchikomi_info {	border: 1px solid #2394DC;	background: #E8F7FF;	padding: 3px 8px;	font-weight: bold;	color: #0F7BBF;	white-space: nowrap;}.hotel_info {	border: 1px solid #428427;	background: #D9F2BF;	padding: 3px 8px;	font-weight: bold;	color: #428427;	white-space: nowrap;}.kankou_info {	border: 1px solid #E66E00;	background: #FFF2E6;	padding: 3px 8px;	font-weight: bold;	color: #E66E00;	white-space: nowrap;}.ekitan_info {	border: 1px solid #2159A5;	background: #2159A5;	padding: 3px 8px;	font-weight: bold;	color: #ffffff;	white-space: nowrap;}/* gurumet_info_side 20110630 */#gurumet_info_side {	background: #f6f6f6;	padding: 10px 10px 0 10px;}#gurumet_info_side div.title {	margin-bottom: 10px;	padding-bottom: 30px;	border-bottom: 1px solid #cfc9c9;	background:url(../images2/logo.gif) right 95% no-repeat;}#gurumet_info_side div.title p{	color: #f16d02;	font-weight: bold;	border-left: 4px solid #f16d02;	padding-left: 8px;    line-height: 1.3;}#gurumet_info_side ul#side,#gurumet_info_side ul#side, ul {	margin: 0;	padding: 0;	list-style: none;}#gurumet_info_side ul li {	float: left;	list-style: none;	margin-bottom: 10px;}#gurumet_info_side ul li ul li {	float: none;	list-style: none;	margin-bottom: 4px;	padding-right: 10px;}#gurumet_info_side ul li ul li.sub{	padding-left: 10px;}#gurumet_info_side ul li ul li a{	background:url(../images2/arrow.gif) 0 5px no-repeat;	padding-left: 10px;}/* gurumet_info */#gurumet_info {	background: #f6f6f6;	padding: 10px 10px 0 10px;	margin-top: 15px;}#gurumet_info div.title {	margin-bottom: 10px;	padding-bottom: 4px;	border-bottom: 1px solid #cfc9c9;	background:url(../images2/logo.gif) right 0 no-repeat;}#gurumet_info div.title p{	color: #f16d02;	font-weight: bold;	border-left: 4px solid #f16d02;	padding-left: 8px;    line-height: 1.3;}#gurumet_info dl, #gurumet_info dl dt,#gurumet_info dl dd,#gurumet_info dl dd ul{	margin: 0;	padding: 0;}#gurumet_info dl dt {	font-weight: bold;	margin-bottom: 10px;}#gurumet_info dl dd ul li {	float: left;	list-style: none;	margin-bottom: 5px;}#gurumet_info dl dd ul li ul li {	float: none;	list-style: none;	margin-bottom: 7px;	padding-right: 20px;}#gurumet_info dl dd ul li ul li.sub{	padding-left: 10px;}#gurumet_info dl dt a,#gurumet_info dl dd ul li ul li a{	background:url(../images2/arrow.gif) 0 5px no-repeat;	padding-left: 10px;}/* gurumet_info02 */#gurumet_info02 {	background: #f6f6f6;	padding: 10px 10px 0 10px;	margin-top: 20px;	margin-bottom: 30px;}#gurumet_info02 div.title {	margin-bottom: 10px;	padding-bottom: 4px;	border-bottom: 1px solid #cfc9c9;	background:url(../images2/logo.gif) right 0 no-repeat;}#gurumet_info02 div.title p{	color: #f16d02;	font-weight: bold;	border-left: 4px solid #f16d02;	padding-left: 8px;    line-height: 1.3;}#gurumet_info02 ul{	margin: 0;	padding: 0;}#gurumet_info02 ul li {	float: left;	list-style: none;	margin-bottom: 7px;}#gurumet_info02 ul li {	display: block;	/* background:url(../images2/line.gif) right 2px no-repeat; */	padding-right: 15px;	margin-right: 8px;	white-space: nowrap;}#gurumet_info02 ul li.last a{	background-image: none;}.separate{	width: 15px;	text-align: center;}/* 20130118?蝸??  */#keyword {	background-color: #F6F6F6;	font-size: 14px;	line-height: 20px;	margin: 10px auto;	padding: 15px;	width: 728;}#keyword h3 {	font-size: 14px;}#keyword ul {	margin-top: 8px;}#keyword ul li {	float: left;	white-space: nowrap;	padding-right: 15px;}/* 20131003?蝸??  */#gkeyword {	text-align: center;	width: 100%;}#gkeyword div {	background-color: #F6F6F6;	font-size: 14px;	line-height: 20px;	margin: 10px auto;	padding: 15px;	text-align: left;	width: 728px;}#gkeyword h3 {	font-size: 14px;}#gkeyword ul {	margin-top: 8px;}#gkeyword ul li {	float: left;	white-space: nowrap;	padding-right: 30px;}/* 20140218?蝸??  */#title {	border-bottom: 3px solid #0057da;	margin: 20px auto 0;	padding: 0;	text-align: left;	width: 784px;	position: relative;}#title p {	float: left;}#title .tag {	background-color: #0057da;	color: #fff;	font-size: 14px;	font-weight: bold;	padding: 8px 10px;	text-align: right;	width: 120px;}#title .tag img.icon {	position: absolute;	top: -8px;	left: 8px;}#title .text {	line-height: 1.9;	padding-left: 10px;	font-size: 14px;	text-align: left;}#title .logo img {    position: absolute;	top: 5px;	right: 0; }#hotel {	background-color: #fffbde;	border: 2px solid #b0c4de;	border-width: 0 2px 2px;	clear: both;	font-size: 12px;	line-height: 2;	margin: 0 auto;	padding: 10px;	width: 760px;}#hotel .data {	float: left;	width: 600px;}#hotel .btn {	float: right;}#hotel .btn input {	padding: 2px;}/* CLEAR-FIX */.clfix:after {	clear: both;	content: ""."";	display: block;	height: 0;	visibility: hidden;}*:first-child+html .clfix {	display: inline-block;	min-height: 1%;}/* Hides from IE6/IE Mac \*/* html .clfix {	height: 1%;}.clfix {	display: block;}/* End hide from IE6/IE Mac */"
    '"<link type='text/css' rel='stylesheet' href='http://ekikara.jp/css2/style.css'>" & _
    Public fontStandCSS = "body{	line-height:1.2;}/* ?? */.ll {	font-size: 100%;	line-height: 120%;}/* ?? */.l {	font-size: 90%;	line-height: 130%;}/* ?? */.headerText, .footerText {	font-size: 80%;	line-height: 150%;}.m{	font-size: 80%;}/* ? */.s_blue, .s, h1, .copyright, .pnkzText {	font-size: 70%;	line-height: 120%;	letter-spacing:-1px}/* ???? */.ss{	font-size: 50%;	line-height: 120%;	letter-spacing:-1px}.px12 {	font-size: 93%;}.px11 {	font-size: 77%;}/* ? */.l02{	color: #FF0000;	font-weight: bold;}.limited{ color: red !important;}.rapid{ color: blue !important;}.semiexp{ color: #808000 !important;}.semirapid{ color: #008080 !important;}.specialrapid{ color: #3060FF !important;}.sleeper{ color: #800080 !important;}.nozomi{  color: red !important;         }.hikari{  color: blue !important;}.s_blue{	color: #0000FF;}.red{	color: #FF0000;}"
    '"<link type='text/css' rel='stylesheet' href='http://ekikara.jp//css2/font_standard.css'>" & _
    Public htmlHead = "<!DOCTYPE HTML PUBLIC ""-//W3C//DTD HTML 4.01 Transitional//EN"">" & _
            "<html lang='ja'><head>" & _
            "<meta http-equiv='Content-Type' content='text/html; charset=Shift_JIS'>" & _
            "<title>Get Ekikara</title>" & vbNewLine & _
            "<meta http-equiv='Content-Language' content='ja'>" & vbNewLine & _
            "<meta http-equiv='Content-Style-Type' content='text/css'>" & vbNewLine & _
            "<style type=""text/css"">" & vbNewLine & styleCSS & vbNewLine & fontStandCSS & vbNewLine & "</style>" & vbNewLine & _
            "</head>" & _
            "<body bgcolor=""#FFFFFF"" leftmargin=""0"" topmargin=""0"" marginwidth=""0"" marginheight=""0"">" & _
            "<div><table border=""0"" cellpadding=""0"" cellspacing=""0""><tr><td class=""lowBg14"">"

    Public htmlEnd = "</td></tr></table></div></body></html>"

    Public _LANG_001 = "輸入路線編號或網址"
    Public _LANG_002 = "抓取"
    Public _LANG_003 = "網址或路線編號有誤無法解析"
    Public _LANG_004 = "要抓取的搭乘日"
    Public _LANG_005 = "平日"
    Public _LANG_006 = "週六 (土曜日)"
    Public _LANG_007 = "週日及休假日 (休日)"
    Public _LANG_008 = "頁數抓取完成，進行時刻表全頁下載程序"
    Public _LANG_009 = "抓取"
    Public _LANG_010 = "完成"
    Public _LANG_011 = "另存HTML"
    Public _LANG_012 = "我要把同一天同方向的時刻表從早到晚由左向右排"

    Public Function getStringPage(ByVal page, ByVal dirA, Optional ByVal wday = 1)
        If dirA = "up" Then dirA = eki_up
        If dirA = "down" Then dirA = eki_down
        Dim rt = ""
        If wday = 1 Then
            rt = dirA & page
        End If
        If wday = 2 Then
            rt = dirA & page & eki_sat
        End If
        If wday = 3 Then
            rt = dirA & page & eki_holi
        End If
        Return rt
    End Function

    Public Function getPrintPage(ByVal lineN, ByVal page, ByVal dirA, Optional ByVal wday = 1)
        Return ekikaraLineURL & lineN & "/" & getStringPage(page, dirA, wday) & eki_print & eki_htm
    End Function

    Public Function getURLPage(ByVal lineN, ByVal page, ByVal dirA, Optional ByVal wday = 1)
        Return ekikaraLineURL & lineN & "/" & getStringPage(page, dirA, wday) & eki_htm
    End Function

    Public Function getTotalPageCount(ByVal htm)
        Try
            If TypeOf htm Is Boolean Then
                If htm = False Then
                    Form1.errorFn()
                End If
            End If

            'Get title
            Dim kt1 As Integer = htm.IndexOf("<title>")
            Dim kt2 As Integer = htm.IndexOf("</title>", kt1)
            lineTitle = htm.Substring(kt1 + 7, kt2 - kt1 - 7)

        Catch ex As Exception

        End Try
        Try
            If TypeOf htm Is Boolean Then
                If htm = False Then
                    Form1.errorFn()
                End If
            End If

            Dim vs1 = "<select name=""page"" onchange=""goURL(this)"">"
            Dim vs2 = "</select>"
            Dim UTo1 As Integer = htm.IndexOf(vs1)
            Dim UTo2 As Integer = htm.IndexOf(vs2, UTo1)
            Dim UMRsv As String = htm.Substring(UTo1, UTo2 - UTo1)
            Dim sep1() As String = {"</option>"}
            Dim USPLF() As String = UMRsv.Split(sep1, StringSplitOptions.None)

            Dim rt = USPLF.Length - 1

            Return rt
        Catch ex As Exception
            writeLog(ex.Message)
            writeLog(htm)
            Form1.errorFn()
            Return 0
        End Try
    End Function

    Public Sub getTableStartFn()
        If isCK1 = True Then
            getUp1Count = 1
            getDown1Count = 1
            ReDim timeTableUp1(up1totalPage)
            ReDim timeTableDown1(down1totalPage)
        End If
        If isCK2 = True Then
            getUp2Count = 1
            getDown2Count = 1
            ReDim timeTableUp2(up2totalPage)
            ReDim timeTableDown2(down2totalPage)
        End If
        If isCK3 = True Then
            getUp3Count = 1
            getDown3Count = 1
            ReDim timeTableUp3(up3totalPage)
            ReDim timeTableDown3(down3totalPage)
        End If
        getUp1Table()
    End Sub

    Public Sub getUp1Table()
        If isCK1 = False Then
            getUp2Table()
            Exit Sub
        End If
        If getUp1Count > up1totalPage Then
            getDown1Table()
        Else
            Dim tmp1 = getPrintPage(preLineNum, getUp1Count, "up", 1)
            Dim tmp2 = httpDo(tmp1)
            Dim tmp3 = getTableHTML(tmp2)
            timeTableUp1(getUp1Count - 1) = tmp3
            Form1.printToArea(_LANG_009 & " " & _LANG_005 & " up page " & getUp1Count & " " & _LANG_010)
            getUp1Count = getUp1Count + 1
            getUp1Table()
        End If
    End Sub
    Public Sub getDown1Table()
        If isCK1 = False Then
            getUp2Table()
            Exit Sub
        End If
        If getDown1Count > down1totalPage Then
            getUp2Table()
        Else
            Dim tmp1 = getPrintPage(preLineNum, getDown1Count, "down", 1)
            Dim tmp2 = httpDo(tmp1)
            Dim tmp3 = getTableHTML(tmp2)
            timeTableDown1(getDown1Count - 1) = tmp3
            Form1.printToArea(_LANG_009 & " " & _LANG_005 & " down page " & getDown1Count & " " & _LANG_010)
            getDown1Count = getDown1Count + 1
            getDown1Table()
        End If

    End Sub

    Public Sub getUp2Table()
        If isCK2 = False Then
            getUp3Table()
            Exit Sub
        End If
        If getUp2Count > up2totalPage Then
            getDown2Table()
        Else
            Dim tmp1 = getPrintPage(preLineNum, getUp2Count, "up", 2)
            Dim tmp2 = httpDo(tmp1)
            Dim tmp3 = getTableHTML(tmp2)
            timeTableUp2(getUp2Count - 1) = tmp3
            Form1.printToArea(_LANG_009 & " " & _LANG_006 & " up page " & getUp2Count & " " & _LANG_010)
            getUp2Count = getUp2Count + 1
            getUp2Table()
        End If

    End Sub
    Public Sub getDown2Table()
        If isCK2 = False Then
            getUp3Table()
            Exit Sub
        End If
        If getDown2Count > down2totalPage Then
            getUp3Table()
        Else
            Dim tmp1 = getPrintPage(preLineNum, getDown2Count, "down", 2)
            Dim tmp2 = httpDo(tmp1)
            Dim tmp3 = getTableHTML(tmp2)
            timeTableDown2(getDown2Count - 1) = tmp3
            Form1.printToArea(_LANG_009 & " " & _LANG_006 & " down page " & getDown2Count & " " & _LANG_010)
            getDown2Count = getDown2Count + 1
            getDown2Table()
        End If

    End Sub

    Public Sub getUp3Table()
        If isCK3 = False Then
            getTableEndFn()
            Exit Sub
        End If
        If getUp3Count > up3totalPage Then
            getDown3Table()
        Else
            Dim tmp1 = getPrintPage(preLineNum, getUp3Count, "up", 3)
            Dim tmp2 = httpDo(tmp1)
            Dim tmp3 = getTableHTML(tmp2)
            timeTableUp3(getUp3Count - 1) = tmp3
            Form1.printToArea(_LANG_009 & " " & _LANG_007 & " up page " & getUp3Count & " " & _LANG_010)
            getUp3Count = getUp3Count + 1
            getUp3Table()
        End If

    End Sub
    Public Sub getDown3Table()
        If isCK3 = False Then
            getTableEndFn()
            Exit Sub
        End If
        If getDown3Count > down3totalPage Then
            getTableEndFn()
        Else
            Dim tmp1 = getPrintPage(preLineNum, getDown3Count, "down", 2)
            Dim tmp2 = httpDo(tmp1)
            Dim tmp3 = getTableHTML(tmp2)
            timeTableDown3(getDown3Count - 1) = tmp3
            Form1.printToArea(_LANG_009 & " " & _LANG_007 & " down page " & getDown3Count & " " & _LANG_010)
            getDown3Count = getDown3Count + 1
            getDown3Table()
        End If

    End Sub

    Public Sub getTableEndFn()
        getSaveTable()
    End Sub

    Public Sub getSaveTable()
        Dim vtx As String = ""
        Dim i As Integer
        Dim ta1 = "<div><table><tr>"
        Dim ta2 = "<td>"
        Dim ta3 = "</td>"
        Dim ta4 = "</tr></table></div>"

        If isCKDayDirect = False Then
            ta1 = "<div>"
            ta2 = ""
            ta3 = "<br style=""page-break-before:always;"">"
            ta4 = "</div>"
        End If
        If isCK1 = True Then
            vtx = vtx & ta1
            For i = 0 To up1totalPage - 1
                vtx = vtx & ta2 & timeTableUp1(i) & ta3 & vbNewLine & vbNewLine
            Next
            vtx = vtx & ta4
            vtx = vtx & ta1
            For i = 0 To down1totalPage - 1
                vtx = vtx & ta2 & timeTableDown1(i) & ta3 & vbNewLine & vbNewLine
            Next
            vtx = vtx & ta4
        End If
        If isCK2 = True Then
            vtx = vtx & ta1
            For i = 0 To up2totalPage - 1
                vtx = vtx & ta2 & timeTableUp2(i) & ta3 & vbNewLine & vbNewLine
            Next
            vtx = vtx & ta4
            vtx = vtx & ta1
            For i = 0 To down2totalPage - 1
                vtx = vtx & ta2 & timeTableDown2(i) & ta3 & vbNewLine & vbNewLine
            Next
            vtx = vtx & ta4
        End If
        If isCK3 = True Then
            vtx = vtx & ta1
            For i = 0 To up3totalPage - 1
                vtx = vtx & ta2 & timeTableUp3(i) & ta3 & vbNewLine & vbNewLine
            Next
            vtx = vtx & ta4
            vtx = vtx & ta1
            For i = 0 To down3totalPage - 1
                vtx = vtx & ta2 & timeTableDown3(i) & ta3 & vbNewLine & vbNewLine
            Next
            vtx = vtx & ta4
        End If
        vtx = htmlHead & vbNewLine & vtx & htmlEnd
        SaveTxtAs(vtx)
    End Sub

    Public Function getTableHTML(ByVal htm)
        Try
            If TypeOf htm Is Boolean Then
                If htm = False Then
                    Form1.errorFn()
                End If
            End If
            Dim vc1 = "lowBg14"
            Dim vc1Index As Integer = htm.lastIndexOf(vc1)
            If vc1Index < 0 Then Return ""
            Dim vs1 = "<table"
            Dim vs2 = "</table"
            Dim UTo1 As Integer = htm.IndexOf(vs1, vc1Index)
            Dim UTo2 As Integer = htm.IndexOf(vs2, UTo1)
            Dim UMRsv As String = htm.Substring(UTo1, UTo2 - UTo1)
            UMRsv = UMRsv.Replace("<img src=""/images2/down.gif"">", "").Replace("<img src=""/images2/up.gif"">", "").Replace("<img src=""/images2/right.gif"">", "").Replace("<img src=""/images2/left.gif"">", "")
            UMRsv = UMRsv.Replace(Chr(0), "")

            Dim rt = UMRsv & "</table>"

            Return rt
        Catch ex As Exception
            writeLog(ex.Message)
            writeLog(htm)
            Form1.errorFn()
            Return ""
        End Try
    End Function

    Public Function httpDo(ByVal url As String)
        Dim SHeader As String
        Sck1 = New System.Net.Sockets.Socket(Net.Sockets.AddressFamily.InterNetwork, Net.Sockets.SocketType.Stream, Net.Sockets.ProtocolType.IP)
        Dim UHtml As String = ""
        Dim URlng As Integer
        'Dim URstt(1048575) As Byte
        Dim URstt(16383) As Byte
        Dim RcvT As String = ""
        Sck1.ReceiveTimeout = 100

        Dim urlPath = url.Replace("http://" & ekikaraLineHost, "")

        '仿製 Firefox HTTP Header
        SHeader = "GET " & urlPath & " HTTP/1.1" & vbCrLf
        SHeader = SHeader & "Host: " & ekikaraLineHost & vbCrLf
        SHeader = SHeader & "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-TW; rv:1.9.0.15) Gecko/2009101601 Firefox/3.0.15" & vbCrLf
        SHeader = SHeader & "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8" & vbCrLf
        SHeader = SHeader & "Accept-Language: zh-tw,en-us;q=0.7,en;q=0.3" & vbCrLf
        SHeader = SHeader & "Accept-Encoding: gzip,deflate" & vbCrLf
        SHeader = SHeader & "Accept-Charset: Big5,utf-8;q=0.7,*;q=0.7" & vbCrLf
        SHeader = SHeader & "Keep-Alive: 300" & vbCrLf
        SHeader = SHeader & "Connection: keep-alive" & vbCrLf
        SHeader = SHeader & "" & vbCrLf

        Try

            Sck1.Connect(ekikaraLineHost, 80)
            If Sck1.Connected = True Then
                Sck1.Send(System.Text.Encoding.GetEncoding("shift-jis").GetBytes(SHeader))
            End If

        Catch ex As Exception

        End Try
        Try
            Do
                ReDim URstt(URstt.Length)
                URlng = Sck1.Receive(URstt, URstt.Length, Net.Sockets.SocketFlags.None)
                RcvT = System.Text.Encoding.GetEncoding("shift-jis").GetString(URstt)

                'writeLog(RcvT & vbNewLine & "++++++++++++++++" & vbNewLine & URlng & vbNewLine & "========================")
                UHtml = UHtml & (RcvT)
                Application.DoEvents()
            Loop While (URlng > 4)
        Catch ex As Exception

        End Try
        Sck1.Close()

        Return UHtml
    End Function

    Public Function writeLog(ByVal str)
        logString = str & vbNewLine & logString
        Return logString
    End Function

    Public Function clearLog()
        logString = ""
        Return logString
    End Function

    Public Sub clearPublicP()
        up1totalPage = 0
        down1totalPage = 0
        up2totalPage = 0
        down2totalPage = 0
        up3totalPage = 0
        down3totalPage = 0
        preURL = ""
        preLineNum = ""

        getUp1Count = -1
        getDown1Count = -1
        getUp2Count = -1
        getDown2Count = -1
        getUp3Count = -1
        getDown3Count = -1

        lineTitle = ""
    End Sub

    Private Function SVF1Txt(Optional ByVal FileNM As String = "newTimeTable.htm") As String
        Dim RETV As Integer
        Dim SVF1 = New System.Windows.Forms.SaveFileDialog
        SVF1Txt = ""
        SVF1.FileName = FileNM.Replace("<", "").Replace(">", "").Replace("?", "").Replace("/", "").Replace("*", "")
        SVF1.Title = _LANG_011
        SVF1.Filter = "HTML file (*.htm)|*.htm|HTML files (*.html)|*.html|All files (*.*)|*.*"
        RETV = SVF1.ShowDialog()
        If RETV = DialogResult.Cancel Then
            SVF1Txt = ""
        Else
            SVF1Txt = SVF1.FileName
        End If
    End Function
    Private Function SaveTxt(ByVal RTX, ByVal filePath) As Integer
        Dim SVNN As String = RTX.Replace(vbCrLf, vbLf)
        SVNN = SVNN.Replace(vbLf, vbCrLf)
        System.IO.File.WriteAllText(filePath, SVNN, System.Text.Encoding.GetEncoding("shift-jis"))
        'End If
    End Function
    Private Sub SaveTxtAs(ByVal RTX)
        'clearLog()
        'writeLog(RTX)
        'Exit Sub

        Dim filePath As String = SVF1Txt(lineTitle & ".htm")
        If filePath = "" Then
        Else
            Dim RETV = SaveTxt(RTX, filePath)
        End If
    End Sub
End Module
