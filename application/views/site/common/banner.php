<!-- Banner -->

<? if($banners){ ?>

<div class="faixa-banner">

    <div class="faixa-banner1"></div>

        

    <div id="margin">

        <!-- testeBanner -->

        <div id="showcase" class="showcase">

            

            <? foreach($banners as $banner){ ?>

            <div class="showcase-slide">

                

                <div class="showcase-content">

                    <? if(!empty($banner['image'])){ ?>

                        <? if(!empty($banner['link'])){ ?><a href="<?=$banner['link'];?>"><? } ?>

                        <img src="<?=site_url('assets/uploads/banner/'.$banner['image']);?>" alt="<?=$banner['name'];?>" />

                        <? if(!empty($banner['link'])){ ?></a><? } ?>

                    <? } ?>

                </div>

                <!-- Put the caption content in a div with the class .showcase-caption -->

                <? if(!empty($banner['description'])){ ?>

                <div class="showcase-caption">

                    <? if(!empty($banner['link'])){ ?><a href="<?=$banner['link'];?>"><? } ?>

                    <?=$banner['description'];?>

                    <? if(!empty($banner['link'])){ ?></a><? } ?>

                </div>

                <? } ?>

            </div>

            <? } ?>

        </div>

        

        <!-- fim Banner -->

    </div>

    

    <div class="faixa-banner2"></div>

</div>

<!-- Mobile -->
<div class="faixa-banner-mobile">
	<img src="<?=site_url('assets/img/banner/banner-padrao-responsivo.png');?>" alt="Carmaniacs - Troca de Óleo a Domicílio"/>
</div>
<? } ?>

<!-- Fim Banner -->