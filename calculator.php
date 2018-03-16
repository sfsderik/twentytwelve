<div class="mortgage-calculator-wrap">
    <hr class="mortgage-calculator-divider"/>
    <form class="form-horizontal mortgage-calculator" method="get" action="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-push-8 col-thumbnail">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive']); ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-8 col-md-pull-4">
                    <h2><?php echo $args['title']; ?></h2>
                    <div class="form-group form-group-lg">
                        <div class="col-sm-6">
                            <label for="amount">How much do you want to borrow?</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span>£</span></span>
                                <input id="amount" type="number" name="amount" class="form-control" aria-label="Amount (to the nearest euro)">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="period">Over how many years?</label>
                            <input id="period" type="number" name="period" class="form-control" aria-label="Years">
                        </div>
                        <div class="col-sm-6">
                            <label for="rate">Interest rate</label>
                            <div class="input-group">
                                <input id="rate" type="number" name="rate" class="form-control" aria-label="Interest rate">
                                <span class="input-group-addon"><span>%<span></span>
                            </div>
                        </div>
                        <div class="col-sm-6 text-center"><button type="submit" class="btn btn-calculator btn-cta cta-secondary">Calculate</button></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7 col-xs-12">
                            <div class="helper">
                                <div class="helper-icon text-center"><span class="glyphicon glyphicon-question-sign"></span></div>
                                <p>Enter the values above to calculate how much your mortgage will cost</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <hr class="mortgage-calculator-divider"/>
    <div id="mortgage-result" class="mortgage-calculator-result">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-md-push-5">
                    <h2><?php echo $args['result_title']; ?></h2>
                    <div class="row">
                        <div class="col-sm-8">
                            <p class="h3">Your monthly payments will be: <span class="mortgage-monthly screen-reader-text">£123</span></p>
                        </div>
                        <div class="col-sm-4"><span class="h1">£<span class="mortgage-monthly">123</span></span></div>
                    </div>
                    <div class="row"><div class="col-sm-12"><p>Assuming interest rates stay the same</p></div></div>
                    <div class="row">
                        <div class="col-sm-8">
                            <p class="h3">The total amount you will pay over the term is: <span class="mortgage-total screen-reader-text">£4567</span></p>
                        </div>
                        <div class="col-sm-4"><span class="h1">£<span class="mortgage-total">4567</span></span></div>
                    </div>
                    <div class="row"><div class="col-sm-12"><p>Made up to £<span class="mortgage-capital"></span> capital and £<span class="mortgage-interest"></span> interest</p></div></div>
                </div>
                <div class="col-md-5 col-md-pull-7">
                    <div class="mortgage-calculator-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
