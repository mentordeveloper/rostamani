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

            <!--you can copy the below code to your htm 

page-----------------------------begin--->

<!--change the width and height value as you want.--> 

<!-- Do change "index.htm" to your real html name of the flippingbook--> 

<iframe  style="width:600px;height:375px"  src="http://online.pubhtml5.com/mpab/rtfb/"

seamless="seamless" scrolling="no" frameborder="0" 

allowtransparency="true" allowfullscreen="true"></iframe>



<!--you can copy the above code to your htm 

page-----------------------------end---> 


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
                

            </div>

        </div>
    </div>	
    </div>
</section>
