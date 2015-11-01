<?php
/**
 * @author Umair Majeed <mentordeveloper@gmail.com> 
 * @date 2015-06-02 
 *  
 */
?>

<section id="section7" class="map">
     <?php 
                    foreach($sections_data as $about_key=>$map_val){
                        if($map_val['id']==4){
                            foreach($map_val['content'] as $con_key=>$content){
                                if ($content['is_text']==1 || $content['is_doc']==1) {
                                ?>
    <a href="{{$content['slug']}}" target="_blank">
        <img src="{{asset('assets/landing/images/f-6a.jpg')}}" class="responsive">
        <img src="{{asset('assets/landing/images/f-7b.jpg')}}" class="responsive">
    </a>
                                    <?php
                                }
                            }
                        }
                    }
                ?>
    <!--<img src="{{asset('assets/landing/images/f-17.png')}}" class="responsive">-->
</section>
<!--<section id="section7" class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4550.3407900139!2d55.234098583001234!3d25.14894452062442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f69836ba87529%3A0x2b464fb689a89eb2!2sA+W+Rostamani+Lumina+(LLC).+Lighting+Dubai+UAE!5e0!3m2!1sen!2sae!4v1437927614117" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>-->
