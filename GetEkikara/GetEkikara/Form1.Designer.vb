<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class Form1
    Inherits System.Windows.Forms.Form

    'Form 覆寫 Dispose 以清除元件清單。
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        Try
            If disposing AndAlso components IsNot Nothing Then
                components.Dispose()
            End If
        Finally
            MyBase.Dispose(disposing)
        End Try
    End Sub

    '為 Windows Form 設計工具的必要項
    Private components As System.ComponentModel.IContainer

    '注意: 以下為 Windows Form 設計工具所需的程序
    '可以使用 Windows Form 設計工具進行修改。
    '請不要使用程式碼編輯器進行修改。
    <System.Diagnostics.DebuggerStepThrough()> _
    Private Sub InitializeComponent()
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(Form1))
        Me.TextBox1 = New System.Windows.Forms.TextBox
        Me.Button1 = New System.Windows.Forms.Button
        Me.Label1 = New System.Windows.Forms.Label
        Me.TextBox2 = New System.Windows.Forms.TextBox
        Me.ck1 = New System.Windows.Forms.CheckBox
        Me.Label2 = New System.Windows.Forms.Label
        Me.ck2 = New System.Windows.Forms.CheckBox
        Me.ck3 = New System.Windows.Forms.CheckBox
        Me.CkDayDirect = New System.Windows.Forms.CheckBox
        Me.Label3 = New System.Windows.Forms.Label
        Me.Label4 = New System.Windows.Forms.Label
        Me.SuspendLayout()
        '
        'TextBox1
        '
        Me.TextBox1.Location = New System.Drawing.Point(128, 12)
        Me.TextBox1.Name = "TextBox1"
        Me.TextBox1.Size = New System.Drawing.Size(382, 22)
        Me.TextBox1.TabIndex = 0
        '
        'Button1
        '
        Me.Button1.Location = New System.Drawing.Point(516, 12)
        Me.Button1.Name = "Button1"
        Me.Button1.Size = New System.Drawing.Size(58, 22)
        Me.Button1.TabIndex = 1
        Me.Button1.Text = "抓取"
        Me.Button1.UseVisualStyleBackColor = True
        '
        'Label1
        '
        Me.Label1.AutoSize = True
        Me.Label1.Location = New System.Drawing.Point(9, 17)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(113, 12)
        Me.Label1.TabIndex = 2
        Me.Label1.Text = "輸入路線編號或網址"
        '
        'TextBox2
        '
        Me.TextBox2.Location = New System.Drawing.Point(11, 130)
        Me.TextBox2.Multiline = True
        Me.TextBox2.Name = "TextBox2"
        Me.TextBox2.ScrollBars = System.Windows.Forms.ScrollBars.Vertical
        Me.TextBox2.Size = New System.Drawing.Size(546, 314)
        Me.TextBox2.TabIndex = 3
        '
        'ck1
        '
        Me.ck1.AutoSize = True
        Me.ck1.Checked = True
        Me.ck1.CheckState = System.Windows.Forms.CheckState.Checked
        Me.ck1.Location = New System.Drawing.Point(128, 44)
        Me.ck1.Name = "ck1"
        Me.ck1.Size = New System.Drawing.Size(48, 16)
        Me.ck1.TabIndex = 4
        Me.ck1.Text = "平日"
        Me.ck1.UseVisualStyleBackColor = True
        '
        'Label2
        '
        Me.Label2.AutoSize = True
        Me.Label2.Location = New System.Drawing.Point(9, 44)
        Me.Label2.Name = "Label2"
        Me.Label2.Size = New System.Drawing.Size(89, 12)
        Me.Label2.TabIndex = 5
        Me.Label2.Text = "要抓取的搭乘日"
        '
        'ck2
        '
        Me.ck2.AutoSize = True
        Me.ck2.Checked = True
        Me.ck2.CheckState = System.Windows.Forms.CheckState.Checked
        Me.ck2.Location = New System.Drawing.Point(182, 44)
        Me.ck2.Name = "ck2"
        Me.ck2.Size = New System.Drawing.Size(95, 16)
        Me.ck2.TabIndex = 6
        Me.ck2.Text = "週六 (土曜日)"
        Me.ck2.UseVisualStyleBackColor = True
        '
        'ck3
        '
        Me.ck3.AutoSize = True
        Me.ck3.Checked = True
        Me.ck3.CheckState = System.Windows.Forms.CheckState.Checked
        Me.ck3.Location = New System.Drawing.Point(283, 44)
        Me.ck3.Name = "ck3"
        Me.ck3.Size = New System.Drawing.Size(131, 16)
        Me.ck3.TabIndex = 7
        Me.ck3.Text = "週日及休假日 (休日)"
        Me.ck3.UseVisualStyleBackColor = True
        '
        'CkDayDirect
        '
        Me.CkDayDirect.AutoSize = True
        Me.CkDayDirect.Location = New System.Drawing.Point(12, 66)
        Me.CkDayDirect.Name = "CkDayDirect"
        Me.CkDayDirect.Size = New System.Drawing.Size(288, 16)
        Me.CkDayDirect.TabIndex = 8
        Me.CkDayDirect.Text = "我要把同一天同方向的時刻表從早到晚由左向右排"
        Me.CkDayDirect.UseVisualStyleBackColor = True
        '
        'Label3
        '
        Me.Label3.AutoSize = True
        Me.Label3.Cursor = System.Windows.Forms.Cursors.Hand
        Me.Label3.ForeColor = System.Drawing.Color.MediumBlue
        Me.Label3.Location = New System.Drawing.Point(10, 459)
        Me.Label3.Name = "Label3"
        Me.Label3.Size = New System.Drawing.Size(184, 12)
        Me.Label3.TabIndex = 9
        Me.Label3.Text = "[PDF Converter] http://pdfcrowd.com/"
        '
        'Label4
        '
        Me.Label4.AutoSize = True
        Me.Label4.Cursor = System.Windows.Forms.Cursors.Hand
        Me.Label4.ForeColor = System.Drawing.Color.MediumBlue
        Me.Label4.Location = New System.Drawing.Point(317, 459)
        Me.Label4.Name = "Label4"
        Me.Label4.Size = New System.Drawing.Size(104, 12)
        Me.Label4.TabIndex = 10
        Me.Label4.Text = "[Program] 極光駭客"
        '
        'Form1
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 12.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(586, 480)
        Me.Controls.Add(Me.Label4)
        Me.Controls.Add(Me.Label3)
        Me.Controls.Add(Me.CkDayDirect)
        Me.Controls.Add(Me.ck3)
        Me.Controls.Add(Me.ck2)
        Me.Controls.Add(Me.Label2)
        Me.Controls.Add(Me.ck1)
        Me.Controls.Add(Me.TextBox2)
        Me.Controls.Add(Me.Label1)
        Me.Controls.Add(Me.Button1)
        Me.Controls.Add(Me.TextBox1)
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.Name = "Form1"
        Me.Text = "Get Ekikara"
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents TextBox1 As System.Windows.Forms.TextBox
    Friend WithEvents Button1 As System.Windows.Forms.Button
    Friend WithEvents Label1 As System.Windows.Forms.Label
    Friend WithEvents TextBox2 As System.Windows.Forms.TextBox
    Friend WithEvents ck1 As System.Windows.Forms.CheckBox
    Friend WithEvents Label2 As System.Windows.Forms.Label
    Friend WithEvents ck2 As System.Windows.Forms.CheckBox
    Friend WithEvents ck3 As System.Windows.Forms.CheckBox
    Friend WithEvents CkDayDirect As System.Windows.Forms.CheckBox
    Friend WithEvents Label3 As System.Windows.Forms.Label
    Friend WithEvents Label4 As System.Windows.Forms.Label

End Class
