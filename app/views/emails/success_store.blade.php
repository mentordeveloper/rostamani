<div class="SandboxScopeClass ExternalClass" id="mpf0_MsgContainer">
    <style>
        .ExternalClass #ecxoutlook a {
            padding:0;
        }

        .ExternalClass {
            width:100% !important;
            padding:0;
        }

        .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
            line-height:100%;
        }

        .ExternalClass #ecxbackgroundTable {
            padding:0;
            width:100% !important;
            line-height:100% !important;
        }

        .ExternalClass img {
            text-decoration:none;
            -ms-interpolation-mode:bicubic;
        }

        .ExternalClass a img {
            border:none;
        }

        .ExternalClass table td {
            border-collapse:collapse;
        }
    </style>
    
    <div> <!--header-->
        <table style="width: 100%;text-align: center;">
            <tr style="text-align: center;margin: 0px auto;width: 100%;">
                <td style="text-align: center;margin: 0px auto;width: 100%;">
                    <h3 style="text-align:center; margin-top: 20px; font-family: sans-serif; font-weight:10px;"><?php echo $title; ?></h3>
                </td>
            </tr>
        </table>
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" dir="ltr">
        <tbody style="padding:0;">
            <tr>
                <td style="padding:10px; border-radius:50px;" align="center"><div style="width:100%;max-width:710px !important;">
                        <table border="0"  cellpadding="0" cellspacing="0" width="100%" style="max-width:710px !important;" align="center">
                            <tbody style="padding:0;">
                                <tr>
                                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tbody style="padding:0;">
                                                <tr>
                                                    <td bgcolor="#FFFFFF" style="background:#FFFFFF;border:1px solid #D6D6D6;"><table id="ecxemail_header" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody style="padding:0;">
                                                                <tr>
                                                                    <td style="padding:20px;" bgcolor="#F5F5F5">
                                                                        <div style="font-weight:bold;font-size:14px;font-family:Helvetica Neue,arial,helvetica,freesans,sans-serif;color:#000000;">
                                                                            {{{$user['title']}}}
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="ecxemail_body">
                                                            <tbody style="padding:0;">
                                                                <tr>
                                                                    <td style="padding:20px;"><table border="0" cellpadding="0" cellspacing="0">
                                                                            <tbody style="padding:0;">
                                                                               <tr>
                                                                                    <td valign="top">
                                                                                        <div style="font-size:12px;font-family:Helvetica Neue,arial,helvetica,freesans,sans-serif;color:#575756;">
                                                                                
                                                                                            <p><b>{{ Lang::get('confide::confide.email.store_account_confirmation.greetings', array( 'name' => $user['user_name'])) }},</b></p>

                                                                                            <p>Your Store has been updated and live you can add products and use it.</p>
                                                                                            
                                                                                            <p>You Can Login your store by clicking this link.</p>
                                                                                            <p>{{{$user['store_link']}}}</p>

                                                                                            <p>{{ Lang::get('confide::confide.email.store_account_confirmation.farewell') }}</p>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table></td>
                                                                </tr>
                                                            </tbody>
                                                        </table></td>
                                                </tr>
                                            </tbody>
                                        </table></td>
                                </tr>
                            </tbody>
                        </table>
                    </div></td>
            </tr>
        </tbody>
    </table>
    <br/>
    <div>  <!--footer -->
        <table style="width: 100%;text-align: center;">
            <tr style="text-align: center;">
                <td style="text-align: center;">
                    <p style="margin-top: 20px; text-align: center; width:100%; font-family: sans-serif; font-weight:10px;" > Copyright &copy; <?php echo $title . ' ' . date('Y'); ?> . All rights reserved. </p>
                </td>
            </tr>
        </table>

    </div>

</div>

