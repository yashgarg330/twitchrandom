<?php $__env->startSection('title'); ?>
    <title>Slogans | TwitchRandom</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="We need slogans! Got any ideas? Find something unexpected at http://twitchrandom.com!">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function(){

            $("#dropdown-emotes").niceScroll({cursorcolor:"#6441A5"});
            var slogans = <?php echo $approved; ?>;
            $("#dropdown-emotes a").click(function(e){
                e.preventDefault();
                var slogan = $("#slogan");
                var caretPos = slogan[0].selectionStart;
                var textVal = slogan.val();
                var name = ":"+$(this).data("shortcode-name")+":";

                slogan.val(textVal.substring(0,caretPos) + name + textVal.substring(caretPos));
            });
            setInterval(function(){
                var new_slogan = slogans[Math.floor(Math.random() * slogans.length)]["slogan"];
                $(".slogan-logo .new_slogan").text(new_slogan);
                /*twemoji.parse($(".slogan-logo .new_slogan")[0], {
                    folder: 'svg',
                    ext: '.svg',
                    callback: function(icon, options, variant) {
                        switch ( icon ) {
                            case 'a9':      // © copyright
                            case 'ae':      // ® registered trademark
                            case '2122':    // ™ trademark
                                return false;
                        }
                        return ''.concat(options.base, options.size, '/', icon, options.ext);
                    }
                });*/
            }, 2500);
        });
    </script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make("layouts.header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="marketingcontainer">
        <div class="container lg-container">
            <div class="row">
                <div class="col-sm-8">
                    <h1>Slogans</h1>
                    <h2>We need your best slogans for TwitchRandom!</h2>
                    <p>For each page we randomly select a header slogan from our list of community provided slogans.</p>
                    <p>You can help us out by submitting your idea for a new slogan below. If it's good we might use it on the site!</p>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="random-slogan-box">
                        <p class="slogan-logo">TwitchRandom<span class="new_slogan">Find Something Unexpected</span></p>
                    </div>
                    <div class="slogan-subtitle">Some sample community slogans.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container med-container">
        <form class="slogan-form" method="POST">
            <div class="form-group">
                <label for="slogan">Submit New Slogan <span>Keep it short and sweet!</span></label>
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" id="slogan" name="slogan" placeholder="<?php echo e($random_text); ?>" maxlength="50" required>
                    <div class="input-group-btn dropup">
                        <button class="btn btn-twitch dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="https://static-cdn.jtvnw.net/emoticons/v1/25/1.0"> <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right" id="dropdown-emotes">
                            <?php foreach($emote_list as $name=>$value): ?>
                                <li><a href="#" data-shortcode-name="<?php echo e($name); ?>" title="<?php echo e($name); ?>"><img src="https://static-cdn.jtvnw.net/emoticons/v1/<?php echo e($value->image_id); ?>/1.0"></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php echo e(csrf_field()); ?>

                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors->all() as $error): ?>
                            <p><span class="glyphicon glyphicon-remove"></span> <?php echo e($error); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success btn-lg">Submit Slogan</button>
            </div>
        </form>
    </div>

    <?php echo $__env->make("layouts.footer", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.wrapper', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>