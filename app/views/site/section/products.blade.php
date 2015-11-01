<?php
/**
 * @author Umair Majeed <mentordeveloper@gmail.com> 
 * @date 2015-06-02 
 *  
 */
?>
<style type="text/css">
    .warning {
        color: red;
    }
    .error {
        color: red;
    }

    .code input[type="email"]{
        text-transform: none;
    }
    .tabs-left {
        margin-top: 3rem;
    }


    #left-tab-nav li a:hover {
        color: #fff;
        background-color: #444;
        padding: 10px 15px;
    }
    #left-tab-nav li a:active {
        color: #444;
    }
    #left-tab-nav li.active{
        color: #ff9da4;
    }

    #left-tab-nav > li.active > a, #left-tab-nav > li.active > a:hover, #left-tab-nav > li.active > a:focus {
        border: 0;
        color: #fff;
        background-color: #444;
        padding: 10px 15px;
    }

    .tab-content_my {
    }
    .tab-content_my .tab-pane_my {
        display: none;

    }
    .tab-content_my .active {
        display: block;
    }
</style>

<section id="section3" class="product">
    <div class="holder">
        <h2>products</h2>
        <div class="p-holder">
            <div class="row">
                <div class="col-lg-1 col-md-3 col-sm-6 col-xs-6"> </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="heading_p">Electro Mechanical</div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                            @if(isset($parent_categories[0]['id']))
                            <a href="#{{strtolower($parent_categories[0]['cat_name']).'_'.$parent_categories[0]['id']}}" class="col">			
                                <img src="{{asset('assets/landing/images/power_normal.png')}}" alt="" onmouseover="this.src = '{{asset('assets/landing/images/power_hover.png')}}';"
                                     onmouseout="this.src = '{{asset('assets/landing/images/power_normal.png')}}';">
                                <span>{{$parent_categories[0]['cat_name']}}</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-sm-12  col-xs-12">
                            <div class="heading_p">Lighting Solutions</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12 col-xs-12"> 
                            @if(isset($parent_categories[1]['id']))
                            <a href="#{{strtolower($parent_categories[1]['cat_name']).'_'.$parent_categories[1]['id']}}" class="col">
                                <img src="{{asset('assets/landing/images/ico-bulb.png')}}" alt="" onmouseover="this.src = '{{asset('assets/landing/images/ico-bulb_hover.png')}}';"
                                     onmouseout="this.src = '{{asset('assets/landing/images/ico-bulb.png')}}';">
                                <span>{{$parent_categories[1]['cat_name']}}</span>
                            </a>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12"> 
                            @if(isset($parent_categories[2]['id']))
                            <a href="#{{strtolower($parent_categories[2]['cat_name']).'_'.$parent_categories[2]['id']}}" class="col">
                                <img src="{{asset('assets/landing/images/ico-download.png')}}" alt="" onmouseover="this.src = '{{asset('assets/landing/images/ico-download_hover.png')}}';"
                                     onmouseout="this.src = '{{asset('assets/landing/images/ico-download.png')}}';">
                                <span>{{$parent_categories[2]['cat_name']}}</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="tab-content" id="main_tab_all">
            @foreach($parent_categories as $key=>$val)

            <div class="tab" id="{{strtolower($val['cat_name']).'_'.$val['id']}}">
                <a href="javascript:void(0)" class="btn-close current">close</a>

                <div class="heading-holder alignleft">
                    <h3>{{$val['cat_name']}}</h3>
                    <a href="{{$val['cat_catalog']}}" target="_blank" class="down">Download Cataloge</a>
                    <div class="content_tab">

                        <ul id="left-tab-nav" class="nav nav-list">

                            <?php
                            $flag = true;
                            foreach ($val['child_categories'] as $child_key => $child_val) {
                                $class = '';
                                if ($flag)
                                    $class = 'active';
                                ?>
                                <li class="<?php echo $class; ?>"><a class="<?php echo $class; ?>"  data-toggle="tab" href="#{{strtolower($val['cat_name']).'_'.$val['id'].'_'.$child_val['id']}}">{{$child_val['cat_name']}}</a> </li>
                                <?php
                                $flag = false;
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div id="myTabContent" class="tab-content_my">
                    <?php
                    $flag = true;
                    foreach ($val['child_categories'] as $child_key => $child_val) {
                        $class = '';
                        if ($flag)
                            $class = 'active';
                        ?>
                        <div class="tab-pane_my <?php echo $class; ?>" id="{{strtolower($val['cat_name']).'_'.$val['id'].'_'.$child_val['id']}}">
                            <ul class="indoor-tab">


                                <?php
                                $flag = false;
                                foreach ($child_val['products'] as $pro_key => $pro_val) {

                                    $image_path = explode('/', $pro_val['image']);
                                    $path_size = sizeof($image_path);
                                    unset($image_path[$path_size - 1]);
                                    if (!empty($pro_val['image_name']))
                                        $image_src = implode('/', $image_path) . '/medium_' . $pro_val['image_name'];
                                    else
                                        $image_src = $pro_val['thumb_image'];

                                    $img_src = $pro_val['image'];
                                    $description = json_decode($pro_val['description'], true);
                                    $electrical_link = '';
                                    if (is_array($description)) {
                                        $electrical_link = $description['lumen'];
                                    }
                                    ?>
                                    <li>
                                    @if($val['id']==5)
                                    <a class="electrical_no_bg" href="#pro_{{strtolower($val['cat_name']).'_'.$val['id'].'_'.$child_val['id'].'_'.$pro_val['id']}}"  data-href="{{$electrical_link}}">
                                            <img src="{{$pro_val['image']}}" alt="{{$pro_val['name']}}">
                                            {{$pro_val['name']}}
                                        </a>
                                    @else
                                        <a data-slide="slide_{{$pro_val['id']}}" href="#pro_{{strtolower($val['cat_name']).'_'.$val['id'].'_'.$child_val['id'].'_'.$pro_val['id']}}">
                                            <img src="{{$pro_val['image']}}" alt="{{$pro_val['name']}}">
                                            {{$pro_val['name']}}
                                        </a>
                                    @endif
                               
                                        
                                    </li>    
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    <?php }
                    ?>

                </div>

            </div>
            @endforeach
            <div class="tab-content sub-tab" style="display: none;" id="sub_tab_content">
                <?php
                foreach ($parent_categories as $key => $val) {
//                    if($val['id']!=5){
                        foreach ($val['child_categories'] as $child_key => $child_val) {
                        ?>                    
                        @foreach($child_val['products'] as $pro_key=>$pro_val)

                        <div class="tab sub-tab" data-pId="{{strtolower($val['cat_name']).'_'.$val['id']}}" id="pro_{{strtolower($val['cat_name']).'_'.$val['id'].'_'.$child_val['id'].'_'.$pro_val['id']}}">
                            <a href="javascript:void(0)" class="btn-close-sub current">close</a>
                            <div class="tab-slider">
                                <div class="mask">
                                    <div class="slideset">
                                        <?php
                                        $image_path = explode('/', $pro_val['image']);
                                        $path_size = sizeof($image_path);
                                        unset($image_path[$path_size - 1]);
                                        if (!empty($pro_val['image_name']))
                                            $image_src = implode('/', $image_path) . '/medium_' . $pro_val['image_name'];
                                        else
                                            $image_src = $pro_val['thumb_image'];

                                        $img_src = $pro_val['image'];
                                        ?>
                                        <div class="slide" id="slide_{{$pro_val['id']}}" >
                                            @if(!empty($child_val['cat_image']))
                                            <img src="{{$child_val['cat_image']}}"  class="responsive alignleft" alt="">
                                            @else
                                            <img src="{{$val['cat_image']}}"  class="responsive alignleft" alt="">
                                            @endif
                                            <div class="des" >
                                                <h3>{{$pro_val['name']}}</h3>
                                                <img src="{{$pro_val['image']}}" width="150" class="responsive" alt="" style="width:150px;margin: 40px 0 0 0;">
                                                <strong class="heading">Technical Specification</strong><br />
                                                <?php
                                                $description = json_decode($pro_val['description'], true);
                                                if (is_array($description)) {
                                                    foreach ($description as $k => $v) {
                                                        if (!empty($v))
                                                            echo '<b>' . ucwords(str_replace('_', ' ', $k)) . ' </b> : ' . $v . '<br/>';
                                                    }
                                                }
                                                ?>                                                
                                                <div class="">
                                                    {{$pro_val['slug']}}<br />
                                                    <a class="btn btn-default" href="{{$pro_val['product_catalog']}}">Download Product Catalog</a>
                                                    <a href="javascript:" class="btn btn-info openclose_1" id="openclose_1">Get a Quote</a>    
                                                    <div class="code" id="code" style="float: right; margin-left: 15px; margin-top: -115px;">
                                                        <strong>GET A FREE QUOTE</strong>
                                                        <h5>Please type your email address to request a quote.</h5>
                                                        <form action="/get-a-quote" id="quote_<?php echo $pro_val['id']; ?>" method="post">
                                                            <input required class="required email" type="email" name="email" id="email_<?php echo $pro_val['id']; ?>" />
                                                            <input type="hidden" name="product_id" id="product_id_<?php echo $pro_val['id']; ?>" value="<?php echo $pro_val['id']; ?>" />
                                                            <input type="submit" class="quote_btn" name="quote_btn" id="quote_email_<?php echo $pro_val['id']; ?>" data-email_fld="email_<?php echo $pro_val['id']; ?>" data-form_fld="quote_<?php echo $pro_val['id']; ?>" value="Request Quote" />
                                                        </form>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--                                <a class="btn-prev" href="#">Previous</a>
                                                                <a class="btn-next" href="#">Next</a>-->
                            </div>
                        </div>
                        @endforeach
                        <?php
                    }
//                    }
                }
                ?>
            </div>
        </div>
    </div>
    <img src="{{asset('assets/landing/images/_new_f_red.jpg')}}" class="responsive" alt="">
</section>
