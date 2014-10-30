<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />	
		<title></title>
		<style type="text/css">
			p { padding: 0; margin: 0; }
			h1, h2, h3, p, li { font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; }
			td { vertical-align:top;}
			ul, ol { margin: 0; padding: 0;}
			.title, .date {
				text-shadow: #8aa3c6 0px 1px 0px;
			}
			
			.textshadow {
				text-shadow: #ffffff 0px 1px 0px;
			}
			.trxtshadow-2 {
				text-shadow: #768296 0px -1px 0px;
			}
			h2 {
			    padding-top: 10px;
			}
			.margin {
			   padding: 10px;
			}
		</style>
	</head>
	<body marginheight="0" topmargin="0" marginwidth="0" leftmargin="0" background="" style="margin: 0px; background-color: #f4f4f4; background-repeat: repeat;" bgcolor="">
		<table cellspacing="0" border="0" cellpadding="0" width="100%" >
			<tbody>
				<tr valign="top">
					<td valign="top" class="margin"><!--container-->
						<table cellspacing="0" cellpadding="0" border="0" align="center" width="626">
							<tbody>
								<tr>
									<td valign="middle" bgcolor="#0460AD" height="97" background="header-bg.jpg" style="vertical-align: middle;">
										<table class="margintop" cellspacing="0" cellpadding="0" border="0" align="center" width="555" height="97">
											<tbody>
												<tr>
													<td valign="middle" width="36" style="vertical-align:middle; text-align: left;">
														<img width="113" height="66" src="19gear.png" style="margin:0; margin-top: 4px; display: block;" alt=""  />
													</td>
													<td valign="middle" style="vertical-align: middle; text-align: left;">
														<h1 class="title" style="margin:0; padding:0; font-size:20px; font-weight: normal; color: #fff;">															
														<img class="logo" src="<?php echo $imagen_flech ;?>">
															<span style="font-weight: bold;"><?php echo ucfirst($site_title); ?> <br/></span>
														</h1>
													</td>
													<td width="55" valign="middle" style="vertical-align:middle; text-align: center;">
														<h2 class="date" style="margin:0; padding:0; font-size:13px; font-weight: normal; color: #192c45; text-transform: uppercase; font-weight: bold; line-height:1;">
															<currentmonthname>
														</h2>
														<h2 class="date" style="margin:0; padding:0; font-size:23px; font-weight: normal; color: #192c45; font-weight: bold;">
															 <currentyear>
														</h2>
													</td>
													
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td valign="top">
										<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" bgcolor="#ffffff" style="border-width: 3px; border-color: #ffffff; border-style: solid;">
											<tbody>
												<tr>
													<td width="407" valign="top" bgcolor="#eef0f3" style="border-bottom-width: 3px; border-bottom-color: #ffffff; border-bottom-style: solid;"><!--content-->
										<!--article--><table cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
															<tbody>
																<tr>
																	<td valign="top">
																		<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
																			<tbody>
																				<tr>
																					<td height="49" width="407" valign="middle" bgcolor="#00B56C" background="article-title-bg.jpg" style="vertical-align:middle; border-left-width: 1px; border-left-color: #BAC2CC; border-left-style: solid; border-right-width: 1px; border-right-color: #BAC2CC; border-right-style: solid; border-bottom-width: 1px; border-bottom-color: #98a3b4; border-bottom-style: solid; border-top-width: 1px; border-top-color: #BAC2CC; border-top-style: solid;">
																						<h3  style="margin:0; margin-left: 17px; padding:0; font-size: 18px; font-weight: normal; color:#fff;">
																							<a style="color:#fff;" href="<?php echo get_permalink($post->ID) ?>"><?php ucfirst(the_title_attribute()); ?></a>
																						</h3>
																					</td>
																				</tr>
																				<tr>
																					<td valign="top" bgcolor="#edeff2" style="padding-top: 20px; padding-bottom: 15px; padding-left: 21px; padding-right: 21px; border-left-width: 1px; border-left-color: #bac2cc; border-left-style: solid; border-right-width: 1px; border-right-color: #bac2cc; border-right-style: solid; border-top-width: 1px; border-top-color: #ffffff; border-top-style: solid; border-bottom-width: 3px; border-bottom-color: #ffffff; border-bottom-style: solid;">
																						<table cellspacing="0" cellpadding="0" border="0" align="left" width="190">
					
																						</table>
																						<p style="font-size: 12px; line-height: 20px; font-weight: normal; color: #56667d; margin: 0; margin-bottom: 10px;">
																							
																						</p>
																						<p style="font-size: 12px; line-height: 20px; font-weight: normal; color: #56667d; margin: 0; margin-bottom: 10px;">
																							<?php 

																								echo nl2br(substr($post->post_content,0,250));
																						    ?>
																						</p>
																							<a href="<?php echo get_permalink($post->ID); ?>">Ver completo</a>											
																							</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
																<tr>
																	<td valign="top">
																		
																	</td>
																</tr>
																<tr>
																	<td valign="top">

																	</td>
																</tr>
															</tbody>
										<!-- /article--></table>												
										</td><!--/content-->																			
												
												<tr>
													<td colspan="2" valign="middle" height="50" bgcolor="#e7eaee" style="vertical-align:middle; border-width: 1px; border-style: solid; border-color: #b6bec9; text-align: center;">
														<p style="margin:0; font-size: 10px; font-weight: bold; color: #96a2b3; font-family: Arial; line-height: 18px;">
															<br />
															
														</p>
														<p style="margin:0; font-size: 10px; font-weight: bold; color: #96a2b3; font-family: Arial; line-height: 18px;">No quieres recibir mas correos? envia "eliminar suscripción" a <unsubscribe style="color: #455670; text-decoration: underline;"><?php echo $emailmio; ?></unsubscribe></p>
													</td>
												</tr> 
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table><!--/container-->
					</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>
