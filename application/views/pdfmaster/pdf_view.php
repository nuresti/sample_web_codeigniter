<?php

    // Surat Pemberitahuan Tagihan
    $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetTitle('PDF Default');
    $pdf->setPrintHeader(true);
    $pdf->setPrintFooter(true);
    $pdf->SetMargins(25.0, 50, 25.0); // left = 2.5 cm, top = 4 cm, right = 2.5cm 
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
     $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    $pdf->SetDisplayMode('real', 'default');
    $pdf->AddPage();
    $pdf->SetFont('times', '', 11);
    $content1 = '
        <style>
            .text-center{
                text-align:center;
            }
            .m-2{
                margin-top:10px;
            }
            .t-justify{
                text-align:justify
            }
        </style>
        <table cellpadding="1" cellspacing="1" border="0">
        <tr>
            <td style="width:10%;">Nomor</td>
            <td style="width:70%;">:</td>
            <td style="width:20%;">Jakarta, ... ... ...,20.. </td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>: </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Hal</td>
            <td>: <b></b></td>
            <td>&nbsp;</td>
        </tr>
        </table>
        <br /><br /><br />
            <span>Yth.<br />
            Pengurus (Nama Mitra) <br />
            Jl. (Alamat) <br />
            Provinsi (nama_prop)</span>

            '.$surat['isian_surat'].'

        <table cellpadding="1" cellspacing="0" border="0">
            <tr>
                <td style="width:60%">&nbsp;</td>
                <td style="width:40%; text-align:center;">
                    <b>Direktur Keuangan</b>
                </td>
            </tr>   
            <tr>
                <td><br /><br /><br />
                    <p><small>Tembusan<br />
                    Para Direktur LPDB-KUMKM</small></p></td>
                <td style="text-align:center;"><br /><br />
                    <p>..............................<br />
                    NRK................</p>
                </td>
            </tr>
        </table>
    ';
    $pdf->writeHTML($content1, true, false, true, false, '');

    $content2 = '
        <style>
            .text-center{
                text-align:center;
            }
            .m-2{
                margin-top:10px;
            }
            .t-justify{
                text-align:justify
            }
        </style>

        <!--BAGIAN KOP SURAT-->

        <table cellpadding="1" cellspacing="1" border="0">
        <tr>
            <td style="width:10%;">Nomor</td>
            <td style="width:70%;">: ${nomor_surat}/Dir.2/${tahun}</td>
            <td style="width:20%;">Jakarta, $({tanggal_surat}, 20.. </td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>: </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Hal</td>
            <td>: <b>Surat Konfirmasi Sisa Pinjaman</b></td>
            <td>&nbsp;</td>
        </tr>
        </table>
        <br /><br /><br />
            <span>Yth.<br />
            Pengurus (Nama Mitra) <br />
            Jl. (Alamat) <br />
            Provinsi (nama_prop)</span>

            <!--BAGIAN KOP SURAT-->

            <p style="text-indent: 40px" class="t-justify">Sehubungan dengan surat Saudara ${nomor_surat_mitra} tanggal ${tanggal surat} perihal permohonan konfirmasi sisa pinjaman. bersama ini kami sampaikan hal-hal sebagai berikut : :</p>
                <ol type="1" >
                  <li>${nama_mitra} menerima dana bergulir LPDB-KUMKM dengan rincian :
                <br/>
                  <table cellpadding="0" cellspacing="0" border="1" >
                    <thead>
                        <tr class="text-center">
                            <th>ID Pinjaman</th>
                            <th>Tgl Cair</th>
                            <th>Nilai Pinjaman</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                  </table>
            </li>
            <li>Sampai dengan jatuh tempo pembayaran angsuran pokok dan bunga bulan ${nama_bulan}, pinjaman atas nama ${nama_mitra} :
                <br />
                  <table cellpadding="0" cellspacing="0" border="1" class="text-center" style="width:50%">
                    <thead>
                        <tr class="text-center">
                            <th>ID Pinjaman</th>
                            <th>Sisa Pokok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>...........</td>
                            <td>...........</td>
                        </tr>
                    </tbody>
                  </table>
            </li>
            </ol>
            <p style="text-indent: 40px" class="t-justify">Demikian disampaikan, atas perhatian dan kerjasamanya diucapkan terima kasih.</p>
        <!--BAGIAN TANDA TANGAN-->

        <table cellpadding="1" cellspacing="0" border="0">
            <tr>
                <td style="width:60%">&nbsp;</td>
                <td style="width:40%; text-align:center;">
                    <b>Direktur Keuangan</b>
                </td>
            </tr>   
            <tr>
                <td><br /><br /><br />
                    <p><small>Tembusan<br />
                    Para Direktur LPDB-KUMKM</small></p></td>
                <td style="text-align:center;"><br /><br />
                    <p>..............................<br />
                    NRK................</p>
                </td>
            </tr>
        </table>

         <!--BAGIAN TANDA TANGAN-->
    ';
    // $pdf->writeHTML($content2, true, false, true, false, '');
    $pdf->Output('contoh1.pdf', 'I');
?>