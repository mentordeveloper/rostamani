<?php
/**
 * @author Umair Majeed <mentordeveloper@gmail.com> 
 * @date 2015-06-02 
 *  
 */
?>
<section  id="contactUs" class="">
    <img src="{{asset('assets/landing/images/_0002_orange.png')}}" class="responsive">

    <div id="contact-us" >
        <div class="footer-holder">
            <div class="f1">
                <h2>drop a line</h2>
                @if ($msg_option==1)
                <div class="alert alert-success ">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Success</h4>
                        Our Team will contact you soon.
                </div>
                @endif
                <form action="/contact-us" method="post">

                    <div class="name">
                        <input type="text" placeholder="name" name="name" id="u_name" required>
                    </div>
                    <div class="email">
                        <input type="email" placeholder="email addresee" required name="email" id="email">
                    </div>

                    <input type="text" placeholder="subject" required name="subject" id="subject">
                    <textarea cols="10" rows="10" placeholder="Your text!" name="msg" id="msg"></textarea>
                    <input type="submit" name="drop_sub" id="drop_sub" class="btn btn-large btn-lg btn-default" value="Send" />
                </form>

            </div>
        </div>

        <div id='contact1-form-add' style='width:100%;text-align:center;'>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
             contact-form-leaderboard 
            <ins class="adsbygoogle"
                 style="display:inline-block;width:728px;height:90px"
                 data-ad-client="ca-pub-8157144337963225"
                 data-ad-slot="2598296394"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>


    <!--<img src="{{asset('assets/landing/images/f-17.png')}}" class="responsive">-->
</section>

