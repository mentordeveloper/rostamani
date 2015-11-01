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

</section>
-->

<?php /*
  <div class="tab-carousel" id="tab-carousel">
  <div class="mask">
  <div class="slideset">
  <?php
  foreach($sections_data as $about_key=>$about_val){
  if($about_val['id']==8){
  foreach($about_val['content'] as $con_key=>$content){
  if($content['is_video']==1) {?>
  <div class="slide">
  <video class="video"  width="100%" height="100%" autoplay loop >
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
  <div class="pagination_new"></div>
  <!--        <a class="btn-prev" href="#">Previous</a>
  <a class="btn-next" href="#">Next</a>-->
  </div>
 *  */ ?>

<section id="section1" class="vid-holder">
    <div class="tp-banner-container">
        <div class="tp-banner" >
            <ul>	
                <?php
foreach ($sections_data as $about_key => $about_val) {
    if ($about_val['id'] == 8) {
        foreach ($about_val['content'] as $con_key => $content) {
            if ($content['is_video'] == 1) {
                                ?>
                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="600" data-thumb="homeslider_thumb6.jpg"  data-saveperformance="on"  data-title="{{$content['title']}}">
                    <!-- MAIN IMAGE -->
                    <img src="/assets/rev_slider/images/dummy.png" style='background-color:#000000' alt="" data-lazyload="/assets/rev_slider/images/images/transparent.png" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption tp-fade stb fullscreenvideo rs-parallaxlevel-0"
                         data-x="0"
                         data-y="0"
                         data-speed="500"
                         data-start="1000"
                         data-easing="Power1.easeOut"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-endspeed="600"
                         data-endeasing="Power1.easeOut"
                         data-autoplay="true"
                         data-autoplayonlyfirsttime="false"
                         data-nextslideatend="true"
                         data-forcerewind="on"			style="z-index: 2;">
                        <video class="video"  width="100%" height="100%" autoplay loop muted controls >
                            <source src="{{$content['path']}}" type="video/mp4">
                        </video>
                        <!--<iframe src='http://player.vimeo.com/video/94502406?title=0&byline=0&portrait=0;api=1' width='100%' height='100%' style='width:100%px;height:100%px;'></iframe>-->
                    </div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption grey_heavy_72 skewfromrightshort tp-resizeme rs-parallaxlevel-0"
                         data-x="197"
                         data-y="154" 
                         data-speed="500"
                         data-start="2250"
                         data-easing="Power3.easeInOut"
                         data-splitin="chars"
                         data-splitout="none"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">{{$content['title']}}
                    </div>



                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption black_heavy_60 skewfromleftshort tp-resizeme rs-parallaxlevel-0"
                         data-x="200"
                         data-y="133" 
                         data-speed="500"
                         data-start="1850"
                         data-easing="Power3.easeInOut"
                         data-splitin="chars"
                         data-splitout="none"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">{{$content['slug']}}
                    </div>

                    

                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption grey_regular_18 customin tp-resizeme rs-parallaxlevel-0"
                         data-x="34"
                         data-y="318" 
                         data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="500"
                         data-start="2600"
                         data-easing="Power3.easeInOut"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.05"
                         data-endelementdelay="0.1"
                         style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"><div style="text-align:center;">{{$content['description']}}</div>
                    </div>

                </li>
              

                <?php
            } elseif ($content['is_image'] == 1) {
                ?>
              
                
                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-thumb="{{$content['path']}}"  data-saveperformance="on"  data-title="{{$content['title']}}">
                    <!-- MAIN IMAGE -->
                    <img src="/assets/rev_slider/images/dummy.png"  alt="slidebg1" data-lazyload="{{$content['path']}}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <!-- LAYERS -->

                    
                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption grey_heavy_72 skewfromrightshort tp-resizeme rs-parallaxlevel-0"
                         data-x="197"
                         data-y="154" 
                         data-speed="500"
                         data-start="2250"
                         data-easing="Power3.easeInOut"
                         data-splitin="chars"
                         data-splitout="none"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">{{$content['title']}}
                    </div>



                    <!-- LAYER NR. 6 -->
                    <div class="tp-caption black_heavy_60 skewfromleftshort tp-resizeme rs-parallaxlevel-0"
                         data-x="-2"
                         data-y="133" 
                         data-speed="500"
                         data-start="1850"
                         data-easing="Power3.easeInOut"
                         data-splitin="chars"
                         data-splitout="none"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">{{$content['slug']}}
                    </div>

                    

                    <!-- LAYER NR. 8 -->
                    <div class="tp-caption grey_regular_18 customin tp-resizeme rs-parallaxlevel-0"
                         data-x="34"
                         data-y="318" 
                         data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="500"
                         data-start="2600"
                         data-easing="Power3.easeInOut"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.05"
                         data-endelementdelay="0.1"
                         style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"><div style="text-align:center;">{{$content['description']}}</div>
                    </div>

                   

                   
                </li>
                <?php
            }
        }
    }
}
?>
               
                
            </ul>
            <div class="tp-bannertimer"></div>	</div>
    </div>	

</section>
