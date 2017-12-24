<?php
if($_GET) {
	// Jika mendapatkan variabel URL ?page
	switch ($_GET['page']){				
		case '' :				
			if(!file_exists ("data_kontak.php")) die ("Sepurane Ijek Kosong!"); 
			include "data_kontak.php";	break;
			
	    	case 'data_kontak' :				
			if(!file_exists ("data_kontak.php")) die ("Sepurane Ijek Kosong!"); 
		     include "data_kontak.php";	break;
			
		    case 'data_kontak_b' :				
			if(!file_exists ("data_kontak_b.php")) die ("Sepurane Ijek Kosong!"); 
			include "data_kontak_b.php";	break;		
			
		case 'data_s':				
			if(!file_exists ("data_kontak_n.php")) die ("Sepurane Ijek Kosong!"); 
		include "data_kontak_n.php";	break;	
			
			
			case 'data_kontak_b_it' :				
			if(!file_exists ("data_kontak_b_it.php")) die ("Sepurane Ijek Kosong!"); 
			include "data_kontak_b_it.php";	break;		
			
			case 'data_kontak_b_m' :				
			if(!file_exists ("data_kontak_b_m.php")) die ("Sepurane Ijek Kosong!"); 
			include "data_kontak_b_m.php";	break;		
									
			case 'data_kontak_th' :				
			if(!file_exists ("data_kontak_th.php")) die ("Sepurane Ijek Kosong!"); 
			include "data_kontak_th.php";	break;		
			
			case 'data_kontak_tl' :				
			if(!file_exists ("data_kontak_tl.php")) die ("Sepurane Ijek Kosong!"); 
			include "data_kontak_tl.php";	break;		
			
	case 'data_sisa_p' :				
		if(!file_exists ("data_sisa_p.php")) die ("Sepurane Ijek Kosong!!"); 
		include "data_sisa_p.php";	break;

		case 'data_sisa_e' :				
		if(!file_exists ("data_sisa_e.php")) die ("Sepurane Ijek Kosong!!"); 
		include "data_sisa_e.php";	break;	
		
		case 'data_sisa_o' :				
		if(!file_exists ("data_sisa_o.php")) die ("Sepurane Ijek Kosong!!"); 
		include "data_sisa_o.php";	break;				
		
		case 'data_sisa_s' :				
		if(!file_exists ("data_sisa_s.php")) die ("Sepurane Ijek Kosong!!"); 
		include "data_sisa_s.php";	break;		
		
				case 'data_tidak_terhubung' :				
		if(!file_exists ("data_tidak_terhubung.php")) die ("Sepurane Ijek Kosong!!"); 
		include "data_tidak_terhubung.php";	break;			
//data sisa		
		
	//data kontak		
				case 'input_usul' :				
		if(!file_exists ("input_usul.php")) die ("Sepurane Ijek Kosong!!"); 
		include "input_usul.php";	break;
			
			case 'data_usul' :				
		if(!file_exists ("data_usul.php")) die ("Sepurane Ijek Kosong!!"); 
		include "data_usul.php";	break;
			
			
		case 'data_pelanggan' :				
		if(!file_exists ("data_pelanggan.php")) die ("Sepurane Ijek Kosong!!"); 
		include "data_pelanggan.php";	break;
		
		case 'data_pelanggan_marketing' :				
		if(!file_exists ("data_pelanggan_marketing.php")) die ("Sepurane Ijek Kosong!!"); 
		include "data_pelanggan_marketing.php";	break;
		


	//data marketing
					case 'telpon' :				
		if(!file_exists ("telepon.php")) die ("Sepurane Ijek Kosong!!"); 
		include "telepon.php";	break;
		
		
		case 'data_penawaran' :				
		if(!file_exists ("data_penawaran.php")) die ("Sepurane Ijek Kosong!!"); 
		include "data_penawaran.php";	break;
		
			
		case 'penawaran_terkirim' :				
		if(!file_exists ("penawaran_terkirim.php")) die ("Sepurane Ijek Kosong!!"); 
		include "penawaran_terkirim.php";	break;
		

		case 'penawaran_gagal' :				
		if(!file_exists ("penawaran_gagal.php")) die ("Sepurane Ijek Kosong!!"); 
		include "penawaran_gagal.php";	break;
		
			case 'penawaran_pending' :				
		if(!file_exists ("penawaran_pending.php")) die ("Sepurane Ijek Kosong!!"); 
		include "penawaran_pending.php";	break;
	
		case 'data_po' :				
		if(!file_exists ("data_po.php")) die ("Sepurane Ijek Kosong!!"); 
		include "data_po.php";	break;
		
			case 'data_kirim' :				
		if(!file_exists ("data_kirim.php")) die ("Sepurane Ijek Kosong!!"); 
		include "data_kirim.php";	break;


				case 'data_bayar' :				
		if(!file_exists ("data_bayar.php")) die ("Sepurane Ijek Kosong!!"); 
		include "data_bayar.php";	break;


				case 'minta_berkas' :				
		if(!file_exists ("minta_berkas.php")) die ("Sepurane Ijek Kosong!!"); 
		include "minta_berkas.php";	break;

	
		
//data_penawaran
		case 'po_pending' :				
		if(!file_exists ("po_pending.php")) die ("Sepurane Ijek Kosong!!"); 
		include "po_pending.php";	break;	
		case 'konfirmasi_po' :				
		if(!file_exists ("konfirmasi_po.php")) die ("Sepurane Ijek Kosong!!"); 
		include "konfirmasi_po.php";	break;			
		case 'po_setuju' :				
		if(!file_exists ("po_setuju.php")) die ("Sepurane Ijek Kosong!!"); 
		include "po_setuju.php";	break;	
		
		case 'po_tidak_setuju' :				
		if(!file_exists ("po_tidak_setuju.php")) die ("Sepurane Ijek Kosong!!"); 
		include "po_tidak_setuju.php";	break;	
		
	
			case 'pilih_grafik' :				
		if(!file_exists ("pilih_grafik.php")) die ("Sepurane Ijek Kosong!!"); 
		include "pilih_grafik.php";	break;	
	
				
		
				case 'belum_kirim' :				
		if(!file_exists ("belum_kirim.php")) die ("Sepurane Ijek Kosong!!"); 
		include "belum_kirim.php";	break;	
		
								
		
		}
		
		
		
}
else {
	// Jika tidak mendapatkan variabel URL : ?page
	if(!file_exists ("data_kontak.php")) die ("Sepurane Ijek Kosong!"); 
	include "data_kontak.php";	
}
?>