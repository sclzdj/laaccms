<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/12
 * Time: 3:08
 */

namespace Modules\Article\Services;

use Blade;

class TagService
{
    public function make()
    {
        $this->slide();
        $this->category();
        $this->lists();
    }

    public function slide()
    {
        Blade::directive(
            'slide', function ($expression) {
            $expression = $expression !== '' ? $expression
                : '[]';
            eval("\$expression=$expression;");
            if(!isset($expression['width'])){
                $expression['width']="100%";
            }
            if(!isset($expression['height'])){
                $expression['height']="300px";
            }
            $slidesHtml = "";
            $slides     = \Modules\Article\Entities\Slide::where('status', '1')->get();
            foreach ($slides as $slide) {
                $slidesHtml .= "<div class=\"swiper-slide\"><img src=\"{$slide['pic']}\" title=\"{$slide['title']}\"></div>";
            }
            $html = <<<HTML
            <div class="swiper-container">
                    <div class="swiper-wrapper">
                        {$slidesHtml}
                    </div>
                    <!-- 如果需要分页器 -->
                    <div class="swiper-pagination"></div>
                    <!-- 如果需要导航按钮 -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <!-- 如果需要滚动条 -->
                    <!-- <div class="swiper-scrollbar"></div> -->
                </div>
                <!--导航等组件可以放在container之外-->
                <style>
                    .swiper-container {
                        width: {$expression['width']};
                        height: {$expression['height']};
                    }
                    .swiper-container img{
                        width: {$expression['width']};
                        height: {$expression['height']};
                    }
                </style>
                <script>
                    new Swiper('.swiper-container', {
                        loop: true,
                        autoplay:true,
                        // 如果需要分页器
                        pagination: {
                            el: '.swiper-pagination',
                        },
                        // 如果需要前进后退按钮
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        // 如果需要滚动条
                        /*scrollbar: {
                            el: '.swiper-scrollbar',
                        },*/
                    });
                </script>
HTML;
            return $html;
        });
    }

    public function category()
    {
        Blade::directive(
            'category', function ($expression) {
            $expression = $expression !== '' ? $expression : '[]';
            return "<?php 
            \$categorys = \Modules\Article\Entities\Category::where('pid','0')->get()->toArray(); 
            \$channels  = \houdunwang\arr\Arr::channelList(\$categorys, 0, \"&nbsp;\", 'id'); 
            foreach (\$channels as \$key=>\$item):
                \$item['url']='/article/home/lists/'.\$item['id']; 
            ?>";
        });
        Blade::directive(
            'endcategory', function () {
            return "<?php endforeach; ?>";
        });
    }
    public function lists()
    {
        Blade::directive(
            'lists', function ($expression) {
            $expression = $expression !== '' ? $expression : '[]';
            return "<?php 
            \$expression=$expression;
            \$db=\Modules\Article\Entities\Content::where('id','>','0');
            if(isset(\$expression['category_ids'])){
                \$db->whereIn('category_id',\$expression['category_ids']);
            }
            if(isset(\$expression['is_top'])){
                \$db->where('is_top',\$expression['is_top']);
            }
            if(isset(\$expression['is_hot'])){
                \$db->orderBy('click','DESC');
            }
            if(isset(\$expression['limit'])){
                \$db->limit(\$expression['limit']);
            }else{
                \$db->limit(10);
            }
            \$contents=\$db->get();
            foreach (\$contents as \$key=>\$item):
                \$item['url']='/article/home/content/'.\$item['id'];
            ?>";
        });
        Blade::directive(
            'endlists', function () {
            return "<?php endforeach; ?>";
        });
    }
}