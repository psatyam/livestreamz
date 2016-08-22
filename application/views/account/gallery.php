<?php // print_r($user);exit; ?>
<div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </a>
    <a class="btn btn-primary next"> Next
                        <i class="glyphicon glyphicon-chevron-right"></i></a>
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
<section class="row gallery">
    <div class="container">
        <!--        <div class="row sec_header">
                    <h2>from Our gallery</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod to end.</p>
                </div>-->
    </div>
    <!--<div class="gallery_inner">-->
    <?php if (isset($galleryData) && !empty($galleryData)) { ?>
    <div class="row"><button class="add_image btn btn-success pull-right" ><span><i class="fa fa-plus-circle"></i></span> Add Images</button></div>
        <div id="links">
            <?php foreach ($galleryData as $image) {?>
            
            <a href="<?php echo base_url().$image['int_gallery_url'] ?>" data-gallery>
        <img src="<?php echo base_url().$image['int_gallery_url'] ?>" height="150" width="150">
    </a>
                    
            <!--<a href="<?php // echo base_url().$image['int_gallery_url'] ?>" data-gallery><img src="<?php // echo base_url().$image['int_gallery_url'] ?>" height="150" width="150" ></a>-->
                <?php }?>
<!--            <img src="img/demo/withhearts2-500px.jpg" width="500" height="663" data-highres="img/demo/withhearts2-highres.jpg">
            <img src="img/demo/withhearts3-500px.jpg" width="500" height="500" data-highres="img/demo/withhearts3-highres.jpg">
            <img src="img/demo/withhearts4-500px.jpg" width="500" height="500" data-highres="img/demo/withhearts4-highres.jpg">
            <img src="img/demo/withhearts5-500px.jpg" width="1280" height="1280" data-highres="img/demo/withhearts5-highres.jpg">-->
        </div>
    <?php } else { ?>
        <h3> No images yet </h3>
        <button class="add_image btn btn-success" ><span><i class="fa fa-plus-circle"></i></span> Add Images</button>
    <?php } ?>
    <!--</div>-->
</section>
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Images</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="<?php echo site_url() ?>/gallery/save"
                          class="dropzone"
                          id="my-awesome-dropzone">
                        <input type="hidden" name="int_user_id" value="<?php echo $user['int_user_id'] ?>"> </form>
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary modal_close" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary" id="send_invite" >Send</button>-->
            </div>
        </div>
    </div>
</div>

<script>
    $('.add_image').click(function() {
//        $('form input').val('');
//        $('form textarea').val('');
        $('#galleryModal').modal('show');
    });
    $('.modal_close').click(function() {
        location.reload()
    });
</script>
<script>
    $(document).ready(function() {
        $('.photoset-grid-lightbox').photosetGrid({
            highresLinks: true,
            rel: 'withhearts-gallery',
            gutter: '2px',
            onComplete: function() {
                $('.photoset-grid-lightbox').attr('style', '');
                $('.photoset-grid-lightbox a').colorbox({
                    photo: true,
                    scalePhotos: true,
                    maxHeight: '90%',
                    maxWidth: '90%'
                });
            }
        });
    });
</script>