<?php

if(isset($email)){ 
    $to = $email;
    $CC = "support@atc.com.ng";
    // Create email headers
    $headers = 'From: '. $us . "\r\n" .
        "CC:" . $CC . "\r\n" .
        "MIME-Version: 1.0\r\n" .
        //'Reply-To: '. $us . "\r\n" .
        "Content-Type: text/html; charset=utf-8;\r\n" . 
        'X-Mailer: PHP/' . phpversion();
        
    //subject and CC are set from confirmpayment.php
            $message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
	<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width">
	<!--[if !mso]><!-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--<![endif]-->
	<title></title>
	<!--[if !mso]><!-->
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
	<!--<![endif]-->
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}
	</style>
	<style type="text/css" id="media-query">
		@media (max-width: 620px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col_cont {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				max-width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num2 {
				width: 16.6% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num5 {
				width: 41.6% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num7 {
				width: 58.3% !important;
			}

			.no-stack .col.num8 {
				width: 66.6% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.no-stack .col.num10 {
				width: 83.3% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
		}
	</style>
</head>

<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: transparent;"><div class="preheader" style="display:none;font-size:1px;color:#333333;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;">Welcome to ATC Hub</div>
	<!--[if IE]><div class="ie-browser"><![endif]-->
	<table class="nl-container" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: transparent; width: 100%;" cellpadding="0" cellspacing="0" role="presentation" width="100%" bgcolor="transparent" valign="top">
		<tbody>
			<tr style="vertical-align: top;" valign="top">
				<td style="word-break: break-word; vertical-align: top;" valign="top">
					<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:transparent"><![endif]-->
					<div style="background-color:#ffffff;">
						<div class="block-grid " style="min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #1207ab;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#1207ab;">
								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#ffffff;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px"><tr class="layout-full-width" style="background-color:#1207ab"><![endif]-->
								<!--[if (mso)|(IE)]><td align="center" width="600" style="background-color:#1207ab;width:600px; border-top: 0px solid #D4F9EF; border-left: 0px solid #D4F9EF; border-bottom: 0px solid #D4F9EF; border-right: 0px solid #D4F9EF;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 25px; padding-left: 25px; padding-top:25px; padding-bottom:25px;"><![endif]-->
								<div class="col num12" style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div class="col_cont" style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid #D4F9EF; border-left:0px solid #D4F9EF; border-bottom:0px solid #D4F9EF; border-right:0px solid #D4F9EF; padding-top:25px; padding-bottom:25px; padding-right: 25px; padding-left: 25px;">
											<!--<![endif]-->
											<div class="img-container center fixedwidth" align="center" style="padding-right: 0px;padding-left: 0px;">
												<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img class="center fixedwidth" align="center" border="0" src="https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/647614_629795/editor_images/8ea5dbb5-2e06-4f9d-8371-51bcd6ac1b26.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 192px; display: block;" width="192">
												<div style="font-size:1px;line-height:20px">&nbsp;</div>
												<!--[if mso]></td></tr></table><![endif]-->
											</div>
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
											<div style="color:#ffffff;font-family:Roboto, Tahoma, Verdana, Segoe, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #ffffff; font-family: Roboto, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 14px;">
													<p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin: 0;">...Professionalism With Innovation</p>
												</div>
											</div>
											<!--[if mso]></td></tr></table><![endif]-->
											<!--[if (!mso)&(!IE)]><!-->
										</div>
										<!--<![endif]-->
									</div>
								</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
							</div>
						</div>
					</div>
					<div style="background-color:#ffffff;">
						<div class="block-grid " style="min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f8f8f8;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f8f8f8;">
								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#ffffff;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px"><tr class="layout-full-width" style="background-color:#f8f8f8"><![endif]-->
								<!--[if (mso)|(IE)]><td align="center" width="600" style="background-color:#f8f8f8;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
								<div class="col num12" style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div class="col_cont" style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
											<!--<![endif]-->
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 60px; padding-left: 60px; padding-top: 15px; padding-bottom: 10px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
											<div style="color:#000000;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;letter-spacing:1px;line-height:1.5;padding-top:15px;padding-right:60px;padding-bottom:10px;padding-left:60px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.5; font-size: 12px; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; color: #000000; letter-spacing: 1px; mso-line-height-alt: 18px;">
													<p style="line-height: 1.5; word-break: break-word; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 18px; letter-spacing: 1px; margin: 0;">&nbsp;</p>
													<p style="line-height: 1.5; word-break: break-word; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; font-size: 16px; mso-line-height-alt: 24px; letter-spacing: 1px; margin: 10vh 0 0;"><span style="font-size: 16px;">Your payment has been confirmed</span></p>
														<p style="line-height: 1.5; word-break: break-word; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 18px; letter-spacing: 1px; margin: 0;">&nbsp;</p>
												</div>
											</div>
											<!--[if mso]></td></tr></table><![endif]-->
											<!--[if (!mso)&(!IE)]><!-->
										</div>
										<!--<![endif]-->
									</div>
								</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
							</div>
						</div>
					</div>
					<div style="background-color:#ffffff;">
						<div class="block-grid " style="min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #1207ab;">
							<div style="border-collapse: collapse;display: table;width: 100%;background-color:#1207ab;">
								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#ffffff;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px"><tr class="layout-full-width" style="background-color:#1207ab"><![endif]-->
								<!--[if (mso)|(IE)]><td align="center" width="600" style="background-color:#1207ab;width:600px; border-top: 0px solid #D4F9EF; border-left: 0px solid #D4F9EF; border-bottom: 0px solid #D4F9EF; border-right: 0px solid #D4F9EF;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 25px; padding-left: 25px; padding-top:25px; padding-bottom:25px;"><![endif]-->
								<div class="col num12" style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
									<div class="col_cont" style="width:100% !important;">
										<!--[if (!mso)&(!IE)]><!-->
										<div style="border-top:0px solid #D4F9EF; border-left:0px solid #D4F9EF; border-bottom:0px solid #D4F9EF; border-right:0px solid #D4F9EF; padding-top:25px; padding-bottom:25px; padding-right: 25px; padding-left: 25px;">
											<!--<![endif]-->
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
											<div style="color:#ffffff;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.5; font-size: 12px; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; color: #ffffff; mso-line-height-alt: 18px;">
													<p style="font-size: 16px; line-height: 1.5; word-break: break-word; text-align: center; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 24px; margin: 0;"><span style="font-size: 16px;"><strong>ABOUT US</strong></span></p>
													<p style="font-size: 14px; line-height: 1.5; word-break: break-word; text-align: center; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 21px; margin: 0;">&nbsp;</p>
													<p style="font-size: 14px; line-height: 1.5; word-break: break-word; text-align: center; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 21px; margin: 0;">Africa Trainovation Consulting Limited (ATC) is a Digital Hub for Innovative and Transformational Trainings, Skills Acquisition and Consultancy for working professionals, organizations, companies and the society at large. Read more</p>
												</div>
											</div>
											<!--[if mso]></td></tr></table><![endif]-->
											<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 20px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
											<div style="color:#ffffff;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:1.5;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;">
												<div class="txtTinyMce-wrapper" style="line-height: 1.5; font-size: 12px; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; color: #ffffff; mso-line-height-alt: 18px;">
													<p style="font-size: 14px; line-height: 1.5; word-break: break-word; text-align: center; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 21px; margin: 0;">&nbsp;</p>
													<p style="text-align: center; line-height: 1.5; word-break: break-word; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; font-size: 16px; mso-line-height-alt: 24px; margin: 0;"><span style="font-size: 16px;"><strong>CONTACT US</strong></span></p>
													<p style="text-align: center; line-height: 1.5; word-break: break-word; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 18px; margin: 0;">&nbsp;</p>
													<p style="line-height: 1.5; word-break: break-word; text-align: center; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; font-size: 14px; mso-line-height-alt: 21px; margin: 0;"><span style="font-size: 14px;">ATC hub, Km. 100, Olabisi Onabanjo way, Opposite Federal Medical Center Idi-Aba, Abeokuta, Ogun state.</span></p>
													<p style="line-height: 1.5; word-break: break-word; text-align: center; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 18px; margin: 0;">&nbsp;</p>
													<p style="line-height: 1.5; word-break: break-word; text-align: center; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; font-size: 14px; mso-line-height-alt: 21px; margin: 0;"><span style="font-size: 14px;">+234 903 580 7050&nbsp; &nbsp;<a href="https://atc.com.ng" style="text-decoration:none;color:#fff;">www.atc.com.ng</a></span></p>
												</div>
											</div>
											<!--[if mso]></td></tr></table><![endif]-->
											<table class="social_icons" cellpadding="0" cellspacing="0" width="100%" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top">
												<tbody>
													<tr style="vertical-align: top;" valign="top">
														<td style="word-break: break-word; vertical-align: top; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
															<table class="social_table" align="center" cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;" valign="top">
																<tbody>
																	<tr style="vertical-align: top; display: inline-block; text-align: center;" align="center" valign="top">
																		<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 7.5px; padding-left: 7.5px;" valign="top"><a href="https://www.facebook.com/ATChubb" target="_blank"><img width="32" height="32" src="https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-circle-white/facebook@2x.png" alt="Facebook" title="facebook" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;"></a></td>
																		<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 7.5px; padding-left: 7.5px;" valign="top"><a href="https://twitter.com/atchub_" target="_blank"><img width="32" height="32" src="https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-circle-white/twitter@2x.png" alt="Twitter" title="twitter" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;"></a></td>
																		<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 7.5px; padding-left: 7.5px;" valign="top"><a href="https://www.linkedin.com/company/africa-trainovation-consulting/" target="_blank"><img width="32" height="32" src="https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-circle-white/linkedin@2x.png" alt="Linkedin" title="linkedin" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;"></a></td>
																		<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 7.5px; padding-left: 7.5px;" valign="top"><a href="https://www.instagram.com/atchub_/" target="_blank"><img width="32" height="32" src="https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-circle-white/instagram@2x.png" alt="Instagram" title="instagram" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;"></a></td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<!--[if (!mso)&(!IE)]><!-->
										</div>
										<!--<![endif]-->
									</div>
								</div>
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
								<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
							</div>
						</div>
					</div>
					<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
	<!--[if (IE)]></div><![endif]-->
</body>
</html>';
            // Sending email
            if(!mail($to, $subject, $message, $headers)){
                $error= "Sorry for the trouble. we are presently unable to send the login details, the details are stated below: \n";
            }
}
?>