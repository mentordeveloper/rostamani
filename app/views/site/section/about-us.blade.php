<?php
/**
 * @author Umair Majeed <mentordeveloper@gmail.com> 
 * @date 2015-06-02 
 *  
 */


?>

<section id="section2" class="intro">
    <div class="logo-holder">
        <img src="{{asset('assets/landing/images/_new_f_gray.jpg')}}" class="responsive">
        <span class="img-holder"><img class="responsive" src="{{asset('assets/landing/images/logo-1.png')}}" alt=""></span>
    </div>
    <div class="tab-carousel">
        <div class="mask">
            <div class="slideset">
                <?php 
                    $title_arr = array();
                    foreach($sections_data as $about_key=>$about_val){
                        if($about_val['id']==1){
                            foreach($about_val['content'] as $con_key=>$content){
                                $title_arr[] = $content['title'];
                                if($content['is_doc']==1) {
                                    
                                ?>
                                <div class="slide">
                                    <div class="intro-holder">
                                        <span class="alignright"><img src="{{$content['path']}}" alt="">
                                            <p class="text_about">{{$content['slug']}}</p>
                                        </span>
                                        <div class="txt">
                                            <h2>{{$content['title']}}</h2>
                                            <p>{{html_entity_decode(stripslashes($content['description']))}}  </p>

                                        </div>
                                    </div>
                                </div>

                                <?php
                                }
                                elseif ($content['is_image']==1) {
                                    $boxes_arr = json_decode($content['detail_dm'],true);
                                ?>
                                 <div class="slide">
                                    <div class="intro-holder">
                                        <h2>{{$content['title']}}</h2>
                                        <?php 
                                        for ($i = 1; $i <= 4; $i++) {
                                            ?>
                                        <div class="box">
                                            <h4><?php echo $boxes_arr["box".$i]?></h4>
                                            <p><?php echo $boxes_arr["box_msg_".$i]?></p>
                                        </div>
                                            <?php 
                                        }?>
                                        
                                    </div>
                                </div>

                                    <?php
                                }
                                elseif ($content['is_audio']==1) {
                                ?>
                                                    
                                <div class="slide">
                                    <div class="intro-holder">
                                        <h2>{{$content['title']}}</h2>
                                        <div class="icon_container">

                                        <?php
                                        $icons_arr = json_decode($content['detail_dm'], true);
                                        for ($i = 1; $i <= 6; $i++) {?>
                                            <div class="icon">
                                                <img src="{{ $icons_arr["fil_icon_$i"] }}" alt=""> 
                                                <p>{{{ $icons_arr["icon$i"] }}}</p>
                                            </div>
                                        <?php }?>
                                            



                                        </div>

                                    </div>
                                </div>
                        <?php
                                }
                                elseif ($content['is_video']==1) {
                                ?>
                                                    
                                <div class="slide">
                                    <div class="intro-holder">
                                        <div id="about_slide"><img src="{{$content['path']}}" class="responsive" alt=""></div>

                                    </div>
                                </div>

                        <?php
                                }
                                
                                
                            }

                        }
                    }
                ?>
                
               
            </div>
        </div>
        <!--<div class="pagination"></div>-->
        <div >
            <ul class="pagination">
                <?php 
                foreach($title_arr as $key => $val_title){
                    echo '<li><a href="#">'.$val_title.'</a></li>';
                    
                }?>
            </ul>
        </div>
        <!--        <a class="btn-prev" href="#">Previous</a>
                <a class="btn-next" href="#">Next</a>-->
    </div>
    <img src="{{asset('assets/landing/images/_new_f_white.jpg')}}" alt="" class="responsive">
</section>
