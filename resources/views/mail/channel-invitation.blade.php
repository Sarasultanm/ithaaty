<table class="action" align="center" width="50%" cellpadding="15" cellspacing="0" bgcolor="#f3f3f3" >
    <tr bgcolor="#f4f9fa">
        <td align="center">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <img src="https://ithaaty.com/images/logo.png" style="width: 200px;">    
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#f7b7b7">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                     <td align="center">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                    <strong><font size="5" >CHANNEL INVITATION</font></strong> 
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                         <img src="{{$channel_photo}}" style="width: 170px;height: 170px;border-radius: 50%;">   
                                    </center>
                                </td>
                            </tr>
                            <tr align="center">
                                <td>
                                    <font size="4"><strong>{{$channel_name}}</strong></font>
                                </td>
                            </tr> 
                            <tr align="center">
                                <td>
                                    <font size="2">{{$subcribers}} subcribers</font>
                                </td>
                            </tr> 
                            <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>
                            <tr  align="center">
                                <td>
                                    <font size="2"><strong>{{$user->email }}</strong> invited you as a editor/colaborator<br>for the channel <strong>{{$channel_name}}</strong></font>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>  
                            <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                    <a style="
                                        background-color: #f98b88;
                                        color: #ffff;
                                        text-align: center;
                                        text-decoration: none;
                                        font-size: 1rem;
                                        font-weight: 400;
                                        display: inline-block;
                                        text-align: center;
                                        padding: 1rem 2rem;
                                    " href="{{ route('verifyChannelInvitation',['link' => $link ]) }}"><strong>Accept Invitation</strong></a>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
     <tr bgcolor="#f4f9fa">
        <td align="center">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center">
                        <table border="0" cellpadding="0" cellspacing="0">
                          <tr>
                                <td>
                                   <font size="2">Copyright © 2022 ithaaty.com. All Rights Reserved.</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <table border="0" cellpadding="0" cellspacing="10">
                          <tr>
                            <td>
                               <a href="">Facebook</a>
                            </td>
                            <td>
                               <a href="">Instagram</a>
                            </td>
                            <td>
                               <a href="">Twitter</a>
                            </td>
                          </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>