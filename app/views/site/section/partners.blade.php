<?php
/**
 * @author Umair Majeed <mentordeveloper@gmail.com> 
 * @date 2015-06-02 
 *  
 */
?>
<section id="clients" class="indust">
    <div class="indus-holder">
        <h2>Clients</h2>
        <!-- carousel structure example -->
        <div class="carousel">
            <div class="mask">
                <div class="slideset">
                    <?php 
                    foreach($sections_data as $about_key=>$about_val){
                        if($about_val['id']==5){
                            foreach($about_val['content'] as $con_key=>$content){
                                if($content['is_video']==1) {?>
                                    <video class="video"  width="100%" height="100%" autoplay loop >
                                        <source src="{{$content['path']}}" type="video/mp4">
                                    </video>
                                <?php
                                }
                                elseif ($content['is_image']==1) {
                                ?>
                                   
                                    <div class="slide">
                                        <img src="{{$content['path']}}" alt="{{$content['title']}}" title="{{$content['title']}}">
                                        <div class="project-title">{{$content['title']}}</div>
                                    </div>
                                    <?php
                                }
                                
                            }

                        }
                    }
                ?>
                </div>
            </div>
            <div class="pagination"></div>
<!--            <a class="btn-prev" href="#">Previous</a>
            <a class="btn-next" href="#">Next</a>-->
        </div>

    </div>
    <img src="{{asset('assets/landing/images/_new_f_orange.jpg')}}" class="responsive">
</section>
