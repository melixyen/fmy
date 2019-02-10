Public Class Form1

    Private Sub Form1_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load

    End Sub

    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        startFn()
        Dim rt = GetTimeTable()
        If rt <> True Then
            errorFn(_LANG_003)
        End If
    End Sub

    Public Function GetTimeTable()
        clearLog()
        clearPublicP()
        Dim str1 = TextBox1.Text
        str1 = Replace(str1, "http://", "")
        Dim lineNum = str1
        Dim ary1 As Array = Split(str1, "/")
        Dim inv1 = ary1.Length
        If inv1 > 1 Then
            If ary1.Length < 4 Then
                Return False
            End If
            If ary1(2) <> "line" Then
                Return False
            End If
            lineNum = ary1(3)
        End If

        preLineNum = lineNum
        Dim str2 = ekikaraLineURL & lineNum & "/"
        preURL = str2
        isCK1 = ck1.Checked
        isCK2 = ck2.Checked
        isCK3 = ck3.Checked
        isCKDayDirect = CkDayDirect.Checked
        If lineNum = Nothing Then Return False

        GetTotalPage()
        If stopFlag = True Then Return False

        printToArea(_LANG_008 & ">>>" & lineTitle)
        'Dim tmp1 = getPrintPage(preLineNum, 1, "up", 1)
        'Dim tmp2 = httpDo(tmp1)
        'Dim tmp3 = getTableHTML(tmp2)
        'writeLog(tmp3)
        'writeLog(tmp2 & vbNewLine & "==================================" & vbNewLine)
        getTableStartFn()
        printToArea("END")
        endFn()

        Return True
    End Function

    Public Sub GetTotalPage()
        If isCK1 = True Then
            Dim url_up1 = getURLPage(preLineNum, 1, "up")
            'printToArea(url_up1)
            Dim htm_up1 = httpDo(url_up1)
            up1totalPage = CInt(getTotalPageCount(htm_up1))
            printToArea(_LANG_005 & "up ok")
            Dim url_down1 = getURLPage(preLineNum, 1, "down")
            'printToArea(url_down1)
            Dim htm_down1 = httpDo(url_down1)
            down1totalPage = CInt(getTotalPageCount(htm_down1))
            printToArea(_LANG_005 & "down ok")
        End If

        If isCK2 = True Then
            Dim url_up2 = getURLPage(preLineNum, 1, "up", 2)
            'printToArea(url_up2)
            Dim htm_up2 = httpDo(url_up2)
            up2totalPage = CInt(getTotalPageCount(htm_up2))
            printToArea(_LANG_006 & "up ok")
            Dim url_down2 = getURLPage(preLineNum, 1, "down", 2)
            'printToArea(url_down2)
            Dim htm_down2 = httpDo(url_down2)
            down2totalPage = CInt(getTotalPageCount(htm_down2))
            printToArea(_LANG_006 & "down ok")
        End If

        If isCK3 = True Then
            Dim url_up3 = getURLPage(preLineNum, 1, "up", 3)
            'printToArea(url_up3)
            Dim htm_up3 = httpDo(url_up3)
            up3totalPage = CInt(getTotalPageCount(htm_up3))
            printToArea(_LANG_007 & "up ok")
            Dim url_down3 = getURLPage(preLineNum, 1, "down", 3)
            'printToArea(url_down3)
            Dim htm_down3 = httpDo(url_down3)
            down3totalPage = CInt(getTotalPageCount(htm_down3))
            printToArea(_LANG_007 & "down ok")
        End If

        'printToArea(up1totalPage & "," & down1totalPage & "," & up2totalPage & "," & down2totalPage & "," & up3totalPage & "," & down3totalPage)




    End Sub

    Private Sub TextBox1_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles TextBox1.DoubleClick
        TextBox1.Text = "http://ekikara.jp/newdata/line/1301731/up1_1.htm"
    End Sub

    Public Sub printToArea(ByVal str)
        Dim logS = writeLog(str)
        TextBox2.Text = logS
    End Sub

    Private Sub startFn()
        stopFlag = False
        Button1.Enabled = False
    End Sub
    Public Sub endFn()
        'clearLog()
        Button1.Enabled = True
    End Sub

    Public Sub errorFn(Optional ByVal ers As String = "ERROR !")
        stopFlag = True
        MsgBox(ers)
        endFn()
    End Sub

    Private Sub Label3_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Label3.Click
        Try
            System.Diagnostics.Process.Start("http://pdfcrowd.com/")
        Catch
            'Code to handle the error.
        End Try
    End Sub

    Private Sub Label4_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Label4.Click
        Try
            System.Diagnostics.Process.Start("http://blog.yam.com/melix")
        Catch
            'Code to handle the error.
        End Try
    End Sub
End Class
