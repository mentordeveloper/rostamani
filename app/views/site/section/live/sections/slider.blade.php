<?php

/**
 * @author Umair Majeed <mentordeveloper@gmail.com> 
 * @date 2015-06-02 
 *  
 */
?>
<!--<section id="section1" class="vid-holder">

    <video class="video"  width="100%" height="100%" autoplay loop >
        <source src="{{asset('oho.mp4')}}" type="video/mp4">
    </video>
    			<video width="100%" height="100%" autoplay loop class="video">
                                                            <source src="oho.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                                                            </video>



    <div class="mask">
            <div class="slideset">
                    <div class="slide">
                            <img src="{{asset('assets/landing/images/banner1.jpg')}}" alt="" class="aligncenter">
                    </div>
                    <div class="slide">
                            <img src="{{asset('assets/landing/images/banner2.jpg')}}" alt="" class="aligncenter">
                    </div>
            </div>
    </div>
    <a class="btn-prev" href="#">Previous</a>
    <a class="btn-next" href="#">Next</a>

</section>-->

<section id="section1" >
    <div class="tab-carousel" id="tab-carousel">
    <div class="vid-holder">
        <div class="mask">
            <div class="slideset">
                <?php 
                    foreach($sections_data as $about_key=>$about_val){
                        if($about_val['id']==8){
                            foreach($about_val['content'] as $con_key=>$content){
                                if($content['is_video']==1) {?>
                                    <div class="slide">
                                    <video muted class="video"  width="100%" height="100%" autoplay loop >
                                        <source src="{{$content['path']}}" type="video/mp4">
                                    </video>
                                    </div>
                                    
                                <?php
                                }
                                elseif ($content['is_image']==1) {
                                ?>
                                    <div class="slide">
                                        <img src="{{$content['path']}}" alt="" class="aligncenter">
                                    </div>
                                    <?php
                                }
                                
                            }

                        }
                    }
                ?>
                
            </div>
            
        </div>
        <div class="pagination_new"></div></div>
<!--        <a class="btn-prev" href="#">Previous</a>
        <a class="btn-next" href="#">Next</a>-->
    </div>
</section>