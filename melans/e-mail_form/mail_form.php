<?php
function mail_form_content() { ?>
<?php ob_start(); ?>
<?php

	session_start();

	function get_services() {
		$link = mysqli_connect("localhost", "root", "", "melans");


		$service_sql = "SELECT user_service_email.id_user, user_service_email.id_service, service.title FROM user_service_email INNER JOIN service ON user_service_email.id_service = service.id WHERE id_user = {$_SESSION['id_user']}";
		mysqli_query ($link,"set character_set_client='utf8'");
		mysqli_query ($link,"set character_set_results='utf8'");
		mysqli_query ($link,"set collation_connection='utf8_general_ci'");

		$result = mysqli_query ($link, $service_sql);
		$services = mysqli_fetch_all ($result, MYSQLI_ASSOC);
		return $services;
	}

	function get_under_services($service_id) {
		$link = mysqli_connect("localhost", "root", "", "melans");

		$under_services_sql = 'SELECT * FROM under_service WHERE id_service =' .$service_id;
		mysqli_query ($link,"set character_set_client='utf8'");
		mysqli_query ($link,"set character_set_results='utf8'");
		mysqli_query ($link,"set collation_connection='utf8_general_ci'");

		$result = mysqli_query ($link, $under_services_sql);
		$under_services = mysqli_fetch_all ($result, MYSQLI_ASSOC);
		return $under_services;
	}
?>

	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//RU" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Affichage du zoom avant pour les mobiles -->
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Active les media queries pour Windows Phone 8 -->
	  	<meta name="format-detection" content="telephone=no"> <!-- Désactive les liens bleus des numéros de téléphone sous iOS -->
		<style type="text/css" media="screen">

			.ExternalClass * {line-height:100%}

			/* Début style responsive (via media queries) */

			@media only screen and (max-width:480px) {
	            #email-penrose-conteneur {width:100% !important;}
	            .resp-full-table {width:100% !important; clear:both;}
	            .resp-full-td {width:100% !important; clear:both;}
	            .resp-full-td-center {width:100%!important; clear:both; text-align: center !important;}
	            .email-penrose-img-header {width:100% !important; max-width:340px !important;}
	            .resp-punchline {font-size:50px !important;}
	            .resp-hr-center {text-align: center !important; margin-left:auto !important; margin-right:auto !important;}
	        }

	        /* Fin style responsive */

		</style>
	</head>
	<body bgcolor="#ecf0f1">
	<div align="center" style="background-color:#ecf0f1;">

		<!-- Début en-tête -->

	<!--
		<table id="email-penrose-conteneur" width="660" align="center" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse; o-mstable-lspace:0pt; mso-table-rspace:0pt;">
			<tr>
				<td>
					<table width="660" class="resp-full-table" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
						<tr>
							<td width="50%" style="text-align:left; padding:20px 0px;">
								<a href="#"><img src="images/penrose-logo.gif" width="148" alt="Logo" border="0"></a>
							</td>
							<td width="50%" style="text-align:right; padding:20px 0px;">
								<table align="right" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td style="padding-left:10px;"><a href="#"><img src="images/facebook-icon.gif" width="23" alt="Facebook" border="0"></a></td>
										<td style="padding-left:10px;"><a href="#"><img src="images/twitter-icon.gif" width="23" alt="Twitter" border="0"></a></td>
										<td style="padding-left:10px;"><a href="#"><img src="images/linkedin-icon.gif" width="23" alt="Linkedin" border="0"></a></td>
										<td style="padding-left:10px;"><a href="#"><img src="images/instagram-icon.gif" width="23" alt="Instagram" border="0"></a></td>
										<td style="padding-left:10px;"><a href="#"><img src="images/snapchat-icon.gif" width="23" alt="Snapchat" border="0"></a></td>
										<td style="padding-left:10px;"><a href="#"><img src="images/youtube-icon.gif" width="23" alt="Youtube" border="0"></a></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	-->
		<!-- Fin en-tête -->

		<table id="email-penrose-conteneur" width="660" align="center" style="border-right:1px solid #e2e8ea; border-bottom:1px solid #e2e8ea; border-left:1px solid #e2e8ea; background-color:#ffffff;" border="0" cellspacing="0" cellpadding="0">

			<!-- Début bloc "mise en avant" -->
			<tr>
				<td style="background-color:#2ecc71">
					<table width="660" class="resp-full-table" align="center" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="100%" valign="top">
								<table align="center" border="0" cellspacing="0" cellpadding="0" style="margin:auto; padding:5px 0px 0px 0px;">
									<tr>
										<td style="text-align:center; padding:0px 20px;">
											<a href="#"><img src="https://melans.ru/upload/CDigital/f8b/f8b48ad7de0a73b296a2a2d70a2aa0cd.png" width="100" class="email-penrose-img-header" alt="Melans" border="0" style="display:block; background-color: rgba(0,0,0,0);"></a>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="resp-full-td" valign="top" style="padding:10px; text-align:center;">
								<a class="resp-punchline" href="#" style="color:#ffffff; outline:none; text-decoration:none; font-size:24px; font-family:'Helvetica Neue', helvetica, arial, sans-serif; font-weight:100;">Обновлённая информация о услугах компании</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<!-- Fin bloc "mise en avant" -->
			<!-- Début article 1 -->
			<?php $services = get_services();?>
			<?php foreach($services as $service): ?>
			<tr>
			  <td>
				  <table width="660" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
					  <tbody>
						  <tr>
							  <td width="100%">
								  <table width="660" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth">
									  <tbody>
										  <tr>
											  <td align="center" style="font-family: Helvetica, arial, sans-serif; font-size: 20px; color: #ffffff; padding: 10px 0;" st-content="heading" bgcolor="#27A55C" align="center">
												  <?= $service['title'] ?>
											  </td>
										  </tr>
									  </tbody>
								  </table>
							  </td>
						  </tr>
					  </tbody>
				  </table>
				</td>
			</tr>

			<tr>
				<td>
					<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="padding-top:10px; padding-bottom:10px;">
						<tbody>
							<tr>
								<td width="100%">
									<table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
										<tbody>
											<tr>
												<td>

													<?php $under_services = get_under_services($service['id_service']); ?>
													<?php foreach($under_services as $under_service): ?>
													<table width="190" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidth" style="padding: 0px 5px 5px 5px;">
														<tbody>
															<tr>
																<td>
																<!-- start of text content table -->
																	<table width="190" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidth">
																		<tbody>
																		<!-- image -->
																			<tr>
																				<td align="center" class="devicewidth">
																					<tr style=" background-color: #2ecc71; width: 190px; height:92px;">
																						<td style=" font-family: Helvetica, arial, sans-serif; color: #ffffff;" height="80" width="190" align="center">
																							<a href="" height="100%" style=" height:100%; display: block; padding: 10px 10px 10px 10px; text-decoration:none; color:#fff;"><?= $under_service['title'] ?></a>
																						</td>
																					</tr>
																				</td>
																			</tr>
																		<!-- end of title -->
																		<!-- end of content -->
																		</tbody>
																	</table>
																</td>
															</tr>
														<!-- end of text content table -->
														</tbody>
													</table>
													<?php endforeach; ?>


												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>

		<!-- Fin footer -->

	</div>
	</body>
	</html>

	<?php
	file_put_contents('e-mail_form/mail_form.html', ob_get_contents());
	ob_end_flush();
	?>
<?php } ?>
