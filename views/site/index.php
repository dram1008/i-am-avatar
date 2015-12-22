<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'Главная';
?>

<?= \cs\plugins\ImageGallery\ImageGallery::widget([]); ?>
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="links">
    <a href="/images/controller/site/index/5element/o/11220831_10153801349482888_2669576415985857245_n.jpg" title="Banana" data-gallery>
        <img src="/images/controller/site/index/5element/11220831_10153801349482888_2669576415985857245_n.jpg" alt="Banana">
    </a>
    <a href="/images/controller/site/index/5element/o/12309886_10153801349847888_298748282568923343_o.jpg" title="Apple" data-gallery>
        <img src="/images/controller/site/index/5element/12309886_10153801349847888_298748282568923343_o.jpg" alt="Apple">
    </a>
    <a href="/images/controller/site/index/5element/o/12360196_10153801349407888_5675000495656611666_n.jpg" title="Orange" data-gallery>
        <img src="/images/controller/site/index/5element/12360196_10153801349407888_5675000495656611666_n.jpg" alt="Orange">
    </a>
    <a href="/images/controller/site/index/5element/o/12366378_10153801349457888_7899524003151262732_n.jpg" title="Orange" data-gallery>
        <img src="/images/controller/site/index/5element/12366378_10153801349457888_7899524003151262732_n.jpg" alt="Orange">
    </a>
</div>
