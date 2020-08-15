
function form_kontrol(form_)
	{
	var inputisim= [form_.ad,form_.soyad,form_.adres,form_.d_tarihi,form_.telefon,form_.sifre1,form_.sifre2];
	var label 	= document.getElementsByName("label");
	var check1 	= document.getElementById("evli");
	var check2 	= document.getElementById("bekar");
	var check3 	= document.getElementById("erkek");
	var check4 	= document.getElementById("kadin");
	var sifre1 	= form_.sifre1.value;
	var sifre2 	= form_.sifre2.value;
	var resim   = document.getElementById('photo');
		
	
	if (check1.checked==false && check2.checked==false )
	{		
		document.getElementById('evlitx').style.color="red";
		document.getElementById('bekartx').style.color="red";
			
		return false;		
	}
	else
	{
		document.getElementById('evlitx').style.color="black";
		document.getElementById('bekartx').style.color="black";
	}
	if (check3.checked==false && check4.checked==false )
	{		
		document.getElementById('erkektx').style.color="red";
		document.getElementById('kadintx').style.color="red";		
		return false;
	}
	else
	{
		document.getElementById('erkektx').style.color="black";
		document.getElementById('kadintx').style.color="black";
	}
	if	(sifre1 == "" && sifre2 == "")
	{
		alert("şifre boş bırakılamaz !");
		return false;
	}
	
	if (	!(sifre1 == sifre2) )
	{		
		$("#errortx").remove();		
		var hata=document.createElement("p");
		hata.innerHTML="Şifreler uyuşmuyor. Lütfen kontrol edin !";
		hata.id="errortx";
		hata.style.color="red";
		document.getElementById("hata").appendChild(hata);
		form_.sifre1.focus();
		return false;		
	}	

	for(i=0;i<=15;i++)
	{
			if(inputisim[i].value=="" || inputisim[i].value==null)
			{			
				inputisim[i].focus();
				label[i].style.color = "red";
				return false;	
			}
			else
			{
				label[i].style.color = "black";		
			}		
	}
	/*
	if (resim.value<1)
	{
		document.getElementById('phototx').style.color="red";
		document.getElementById('photo').style.color="red";
		return false;
	}*/
	return true;
	}

function checkm(i)
	{
        if(i==1)//evli 
        {       
            if(document.getElementById("bekar").checked)
            document.getElementById("bekar").checked=false;         
        }
        if(i==2)//bekar
        {
            if(document.getElementById("evli").checked)
            document.getElementById("evli").checked=false;   
        }   
    
    }
////////////////////////////////////////////////////////////
	function checkc(y)
	{
        if(y==1)//erkek
        {        
            if(document.getElementById("kadin").checked)
            document.getElementById("kadin").checked=false;         
        }
        if(y==2)//kadın
        {
            if(document.getElementById("erkek").checked)
            document.getElementById("erkek").checked=false;   
        }

	}

	             
        
                   
    





/*
	if ( atpos<1 || dotpos<atpos+2 || dotpos+2>=mail.length )
    {        	
		$("#errormail").remove();		
		var mailhata=document.createElement("p");
		mailhata.innerHTML="Lütfen geçerli bir mail adresi giriniz!";
		mailhata.id="errormail";
		mailhata.style.color="red";
		document.getElementById("hatamail").appendChild(mailhata);
		form_.mail.focus();
		return false;
	} 
	*/