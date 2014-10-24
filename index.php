<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Php Flood Koruma Uygulaması</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<?php
		session_start();
	?>
	<form action="" method="post">
		<h1>Php Flood Koruma Uygulaması</h1>

		<?php
			if($_POST){
				$email = $_POST['email'];
				$yorum = $_POST['yorum'];
				$gelen_deger = $_POST['flood'];
				
				if(isset($_SESSION['deger']) and $gelen_deger == $_SESSION['deger']){
				// veritabanı yorum kayıt işlemleri
					print '<p>Yorumunuz kayıt edildi.</p>';
				}else{
					print '<p>Yorum gönderme başarısız.</p>';
				}
				unset($_SESSION['deger']);
			}else{
			
			$deger = rand(1000,2000);
			$deger = md5($deger);
			$_SESSION['deger'] = $deger;
			
		?>
		
		<label for="email">Email Adresiniz</label>
		<input type="email" name="email" />
		<label for="yorum">Yorumunuz</label>
		<textarea name="yorum"></textarea>
		<input type="hidden" name="flood" value="<?php print $deger; ?>" />
		<button>Yorum Yap</button>
	</form>
	
	<?php
	}
	?>
	
</body>
</html>
