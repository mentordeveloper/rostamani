<?php
/**
 * @author Umair Majeed <mentordeveloper@gmail.com> 
 * @date 2015-06-02 
 *  
 */
?>

<section id="section8" class=" ">
    <div id="footer_1">
    <div class="footer-holder">
        <div class="f1">

            <div class="column" >
                    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4550.3407900139!2d55.234098583001234!3d25.14894452062442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f69836ba87529%3A0x2b464fb689a89eb2!2sA+W+Rostamani+Lumina+(LLC).+Lighting+Dubai+UAE!5e0!3m2!1sen!2sae!4v1437927614117" width="514" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>-->
<!--                        <a class="twitter-timeline"  href="https://twitter.com/mentordeveloper" data-widget-id="635938416685768704">Tweets by @mentordeveloper</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>-->

                        <div id='before-footer-add' style='width:100%;text-align:center;'>

                             before-footer 
                            <ins class="adsbygoogle"
                                 style="display:inline-block;width:336px;height:280px"
                                 data-ad-client="ca-pub-8157144337963225"
                                 data-ad-slot="1571365190"></ins>
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
            </div>

<!--            <div class="column" style="padding: 0px;">
                <img class="alignleft" src="{{asset('assets/landing/images/img-9.png')}}">
                <ul class="social-networks">
                    <li><a href="#" class="fb">facebook</a></li>
                    <li><a href="#" class="tw">tweeter</a></li>
                    <li><a href="#" class="yt">youtube</a></li>
                    <li><a href="#" class="in">linkedin</a></li>
                    <li><a href="#" class="gp">googleplus</a></li>
                </ul>
            </div>-->


            <div class="column3" >
                 <?php 
                    foreach($sections_data as $about_key=>$about_val){
                        if($about_val['id']==2){
                            foreach($about_val['content'] as $con_key=>$content){
                                if($content['is_video']==1) {?>
                                    
                                <?php
                                }
                                elseif ($content['is_doc']==1) {
                                ?>
                                    <h3>{{$content['title']}}</h3>
                                    <p>{{html_entity_decode(stripslashes($content['description']))}}</p>
                                    <?php
                                }
                                
                            }

                        }
                    }
                ?>
                
                                    <div id='before-footer-add1' style='width:100%;text-align:center;'>

                                         before-footer 
                                        <ins class="adsbygoogle"
                                             style="display:inline-block;width:336px;height:280px"
                                             data-ad-client="ca-pub-8157144337963225"
                                             data-ad-slot="1571365190"></ins>
                                        <script>
                                        (adsbygoogle = window.adsbygoogle || []).push({});
                                        </script>
                                    </div>

            </div>

            </div>

        </div>
    </div>	
    </div>
</section>
