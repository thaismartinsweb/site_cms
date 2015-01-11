<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<style type="text/css">
		body {font-family: Arial, sans-serif;}
	</style>
</head>
<body>
	<table cellpadding="0" cellspacing="0" width="50%" style="margin:0 25%;">
		<tr align="center">
			<td colspan="2" style="padding: 20px 0;"><h1>Contato do Site</h1></td>
		</tr>
		<tr>
			<td width="30%" style="padding: 5px 0;"><b>Nome: </b></td>
			<td width="70%" style="padding: 5px 0;"><?php echo $data['obj']->name ?></td>
		</tr>
		<tr>
			<td width="30%" style="padding: 5px 0;"><b>Email: </b></td>
			<td width="70%" style="padding: 5px 0;"><?php echo $data['obj']->email ?></td>
		</tr>
		<tr>
			<td width="30%" style="padding: 5px 0;"><b>Telefone: </b></td>
			<td width="70%" style="padding: 5px 0;"><?php echo $data['obj']->phone ?></td>
		</tr>
		<tr>
			<td width="30%" style="padding: 5px 0;"><b>Mensagem: </b></td>
			<td width="70%" style="padding: 5px 0;"><?php echo $data['obj']->content ?></td>
		</tr>
	</table>
</body>
</html>