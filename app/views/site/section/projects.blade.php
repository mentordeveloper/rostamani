<?php
/**
 * @author Umair Majeed <mentordeveloper@gmail.com> 
 * @date 2015-06-02 
 *  
 */
?>
<section id="section6" class="testimonial">
    <h2>Partners</h2>
    <!-- slideshow structure example -->
    <div id="pictures" class="owl-slider">
        <?php 
                    $title_arr = array();
                    foreach($sections_data as $about_key=>$about_val){
                        if($about_val['id']==7){
                            foreach($about_val['content'] as $con_key=>$content){
                                $title_arr[] = $content['title'];
                                if($content['is_video']==1) {?>
                                    <a class="item" href="{{$content['path']}}" rel="partners" title="{{$content['description']}}">
                                        <video class="video"  width="100%" height="100%" autoplay loop >
                                            <source src="{{$content['path']}}" type="video/mp4">
                                        </video>
                                    </a>
                                   
                                    
                                <?php
                                }
                                elseif ($content['is_image']==1) {
                                ?>
                                   <a class="item" href="{{$content['path']}}" rel="partners" title="{{$content['description']}}">
                                        <img src="{{$content['path']}}" alt="" title="{{$content['title']}}" >
                                    </a>
                                   
                                    <?php
                                }
                                
                            }

                        }
                    }
                ?>


</div>
    

    
</section>
