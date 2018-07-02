<?php
if(!empty($all_adds))
{
?>
        <section id="banners" style="background: rgba(0, 0, 0, 0) none repeat scroll 0 0;width:100%;box-sizing: border-box;">
<?php
foreach ($all_adds as $ad)
{
?>
    <a class="banner200x333 promo" href="#" style="background: #ff6099 url('<?php echo $this->webroot;?>advertisement/<?php echo $ad['Advertisement']['image']?>') no-repeat scroll 0 0;width:100%;background-size: cover;">
        
    </a>
<?php } ?>    
</section>
<?php } ?>