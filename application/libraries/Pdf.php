<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
	
	class Pdf extends TCPDF
	{
	    function __construct()
	    {
	        parent::__construct();
	    }
	    public function Header()
	    {
	    	$base_url = "https://kp-dev.lpdb.id";
	    	$server = $_SERVER['DOCUMENT_ROOT'];
	    	$image_file = '<img width:"70px;" height="71px" src="' . base_url(). 'assets/img/garuda.jpg' . '" />';

	    	// var_dump($image_file);
	    	// die;

		    $this->SetY(10);
		    $this->SetFont('times', 'B', 9);
		    $isi_header='<table cellpadding="1" cellspacing="1" border="0">
			        <tr>
			            <td style="text-align:center;">'.$image_file.'</td>
			        </tr>
			        <tr style="text-align:center;">
			            <td>KEMENTERIAN KOPERASI DAN USAHA KECIL DAN MENENGAH R.I</td>
			        </tr>
			        <tr style="text-align:center;">
			            <td>LEMBAGA PENGELOLAAN DANA BERGULIR KOPERASI DAN USAHA MIKRO, KECIL DAN MENENGAH</td>
			        </tr>
			        <tr style="text-align:center;">
			            <td>(LPDB-KUMKM)</td>
			        </tr>
			        </table>';
		    $this->writeHTML($isi_header, true, false, false, false, '');
	    
	    }

	    public function Footer() 
	    {
	    	$base_url = "https://kp-dev.lpdb.id";
	    	$server = $_SERVER['DOCUMENT_ROOT'];
	    	$image_file = '<img width:"200px;" height="117px" src="' . base_url(). '/assets/img/footer.jpg' . '" />';
	    	// $image_file = '<img src="' . $base_url .'/static/assets/img/avatar.jpg'. '"  width="180" height="70" />';
	    	// var_dump($image_file);
     		// die;
	    	$this->SetY(-20);

	    	$html = '<div id="footer">
		        <table cellpadding="1" cellspacing="0" class="top" border="0">
		            <!-- <img src=""> -->
		            <tr>
		                <td style="width:15%">'.$image_file.'</td>
		                <td style="width:85%;" align="center">
		                <br /><br />
		                Jl. Letjend. MT. Haryono Kav. 52-53 Jakarta 12770, Telp. 021-7990756 Fax. 021-7989746<br />
		                Website : 
		                <a href="http://www.lpdb.id/" target="_blank">www.lpdb.id </a> 
		                Email : info@danabergulir.com
		                </td>
		            </tr>
		        </table>
		    </div>
	    	';
	  		$this->SetFont('times', 'B', 7);
	    	$this->WriteHTML($html, true, 0, true, 0);
    	}
	}