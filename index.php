<?php session_start(); $_SESSION['formVeriAL'] = 'berkanakman'.rand(1000,99999);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Domain | Domain Sorgulama | Domain Sorgula | Domain Tescil</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="keywords" content="domain, domain sorgulama, domain sorgula, domain tescil, domain sorgu, domain arama, domain bul, domain kayıt, domain whois, domain ücretleri, domainler, online domain kayıt, domain seçimi, domain nedir" />
        <meta name="description" content="Domain sorgulama sistemi ile aradığınız domaini kolayca tespit ve belirttiğiniz domaini tescil edebilirsiniz." />
        <meta name="googlebot" content="domain, domain sorgulama, domain sorgula, domain tescil, domain sorgu, domain arama, domain bul, domain kayıt, domain whois, domain ücretleri, domainler, online domain kayıt, domain seçimi, domain nedir" />
        <meta name="author" content="Berkan AKMAN" />
        <meta name="url" content="www.berkanakman.com.tr" />
        <meta name="resource-type" content="document" />
        <meta name="rating" content="general, body" />
        <meta name="googlebot" content="all, index, follow, archive" />
        <meta name="robots" content="all, index, follow, archive" />
        <meta name="distribution" content="global" />
        <meta name="copyright" content="domain sorgulama" />
        <meta name="revisit-after" content="7" />
        <meta name="robots" content="ALL" />
        <meta http-equiv="content-language" content="tr" />
        <meta http-equiv="cache-control" content="no-cache" />
        <link rel="shortcut icon" href="images/favicon.ico" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" language="javascript">
        	$(document).ready(
				function(){
					$(".secimYap").click(function(){
						var kontrol = $(this).is(":checked");
						if(kontrol == true){
							$(this).parent("label").removeClass("noselect").addClass("select");
						}else{
							$(this).parent("label").removeClass("select").addClass("noselect");
						}
					});	
					
					$("#domainSorgula").click(
						function(){
							var veri = $("#domainForm").serialize();
							if($("#alanadi").val() == ''){alert("Alan Adını Yazmadınız"); return;}
							$("#domainBilgileri").html('<div class="ortala"><img src="images/loading.gif" alt="Yükleniyor" /></div>');
							$.ajax({type: 'POST', url: 'kontrol.php', data: veri, success: function(gelen) {
								$("#domainBilgileri").html(gelen);
								$(".link").unbind('click');
								$(".link").bind('click',function(){$(this).parent("td").find(".popDiv").fadeIn("normal");});
								$(".close").unbind('click');
								$(".close").bind('click',function(){$(".popDiv").fadeOut("normal");});
							}});
							
						}
					);
					$(".close").click(function(){$(".popDiv").fadeOut("normal");});
				}
			);
        </script>
    </head>
    <body>
    
    <div class="kapsa">
        <div class="main">
            <form id="domainForm">
                <table cellSpacing="0" cellPadding="5" border="0" width="100%" class="domainAlan">
                    <tr>
                        <td width="40"><p>www.</p></td>
                        <td><input class="fullText" id="alanadi" name="alanadi" maxLength="272" /></td>
                        <td width="50"><input type="button" value="SORGULA" class="button" id="domainSorgula" /></td>
                    </tr>
                </table>
                
                <table width="100%" border="0" class="uzantilar">
                    <tr>
                        <td><label class="select"><input type="checkbox"  value="com" name="uzanti[]" class="secimYap" checked="checked" /> com </label></td>
                        <td><label class="noselect"><input type="checkbox" value="net" name="uzanti[]" class="secimYap" /> net</label></td>
                        <td><label class="noselect"> <input type="checkbox" value="org" name="uzanti[]" class="secimYap" /> org</label></td>
                        <td><label class="noselect"><input type="checkbox" value="info" name="uzanti[]" class="secimYap" /> info</label></td>
                        <td><label class="noselect"><input type="checkbox" value="biz" name="uzanti[]" class="secimYap" /> biz</label></td>
                    </tr>
                    <tr>
                        <td><label class="noselect"><input type="checkbox" value="com.tr" name="uzanti[]" class="secimYap" /> com.tr  </label></td>
                        <td><label class="noselect"><input type="checkbox" value="gen.tr" name="uzanti[]" class="secimYap" /> gen.tr</label></td>
                        <td><label class="noselect"><input type="checkbox" value="web.tr" name="uzanti[]" class="secimYap" /> web.tr</label></td>
                        <td><label class="noselect"><input type="checkbox" value="k12.tr" name="uzanti[]" class="secimYap" /> k12.tr</label></td>
                        <td><label class="noselect"><input type="checkbox" value="org.tr" name="uzanti[]" class="secimYap" /> org.tr</label></td>
                    </tr>
                    <tr>
                        <td><label class="noselect"><input type="checkbox" value="tv" name="uzanti[]" class="secimYap" /> tv</label></td>
                        <td><label class="noselect"><input type="checkbox" value="de" name="uzanti[]" class="secimYap" /> de</label></td>
                        <td><label class="noselect"><input type="checkbox" value="cc" name="uzanti[]" class="secimYap" /> cc</label></td>
                        <td><label class="noselect"><input type="checkbox" value="ru" name="uzanti[]" class="secimYap" /> ru</label></td>
                        <td><label class="noselect"><input type="checkbox" value="fr" name="uzanti[]" class="secimYap" /> fr</label></td>
                    </tr>
                </table>
                <input type="hidden" name="formVeriAL" value="<?=$_SESSION['formVeriAL'];?>" />
            </form>
            
            
            <div class="domainBilgileri" id="domainBilgileri"></div>
            
    	</div>
    </div>
    </body>
</html>