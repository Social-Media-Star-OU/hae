<!DOCTYPE html>
<html lang="et">
  <head>
    <title><?=L::page_patient_family_title;?></title>
    <?php require "components/head.php"; ?>
  </head>
  <body class="patient-article node-12 node-en path-node page-node-type-article has-glyphicons">
    <a href="#main-content" class="visually-hidden focusable skip-link"> <?=L::page_dialog_skip;?> </a>
    <div class="dialog-off-canvas-main-canvas" data-off-canvas-main-canvas>
      <div class="Mobile-top-block container">
        <div class="region region-mobile-top-block">
          <section id="block-topblockformobileonly" class="for-mobile-only block block-block-content block-block-content9275e390-a9fa-4a90-a24f-efc7495c20f0 clearfix">
            <div class="field field--name-body field--type-text-with-summary field--label-hidden field--item">
              <p><?=L::page_dialog_top;?></p>
            </div>
          </section>
        </div>
      </div>
      <?php require "components/patientHeader.php"; ?>
      <div role="main" class="main-container container js-quickedit-main-content">
        <div class="row">
          <section class="col-sm-12">
            <div class="highlighted">
              <div class="region region-highlighted">
                <div data-drupal-messages-fallback class="hidden"></div>
              </div>
            </div>
            <a id="main-content"></a>
            <div class="region region-content">
              <h1 class="page-header">
                <span property="schema:name"><?=L::page_patient_support_topTitle;?></span>
              </h1>
              <article data-history-node-id="12" role="article" about="/patsient/hae-ga-elamine/hae-tugi" typeof="schema:Article" class="article full clearfix">
                <span property="schema:name" content="<?=L::page_patient_support_topTitle;?>" class="hidden"></span>
                <div class="content">
                  <div class="field field--name-field-content field--type-entity-reference-revisions field--label-hidden field--items">
                    <div class="field--item">
                      <div class="paragraph paragraph--type--formatted-text-para paragraph--view-mode--default col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="field field--name-field-formatted-text field--type-text-long field--label-hidden field--item">
                          <h4></h4>
                          <p><?=L::page_patient_support_topAlt;?></p>
                          <p></p>
                        </div>
                      </div>
                    </div>
                    <div class="field--item">
                      <div class="paragraph paragraph--type--link-para paragraph--view-mode--default custom-link-para col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="field field--name-field-link field--type-link field--label-hidden field--item">
                          <a href="https://haei.org/"><?=L::page_patient_support_learnMore;?></a>
                        </div>
                      </div>
                    </div>
                    <div class="field--item">
                      <div class="paragraph paragraph--type--background-img-with-text-para paragraph--view-mode--default custom-carousel-paragraph col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="bg-img-with-content-block" style="background-image: url('<?=$site_url;?>assets/images/knowhae-photo-treatment-10_0.png');">
                          <div class="bg-img-text-header for-mobile img">
                            <h4>
                              <div class="field field--name-field-title field--type-string field--label-hidden field--item"><?=L::page_patient_support_lovedTitle;?></div>
                            </h4>
                          </div>
                          <div class="for-mobile img">
                            <div class="field field--name-field-bg-image field--type-image field--label-hidden field--item">
                              <img loading="lazy" src="<?=$site_url;?>assets/images/knowhae-photo-treatment-10_0.png" width="1050" height="452" alt="" typeof="foaf:Image" class="img-responsive" />
                            </div>
                            <div class="data-element">
                              <div class="bg-img-text-header">
                                <h4>
                                  <div class="field field--name-field-title field--type-string field--label-hidden field--item"><?=L::page_patient_support_lovedTitle;?></div>
                                </h4>
                              </div>
                              <div class="bg-img-text-desc">
                                <div class="field field--name-field-description field--type-text-long field--label-hidden field--item">
                                  <p><?=L::page_patient_support_lovedAlt;?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
          </section>
        </div>
      </div>
      <div class="next_page container" role="contentinfo" aria-label="next_page">
        <div class="region region-next-page">
          <section class="views-element-container block block-views block-views-blocknext-page-block-1 clearfix" id="block-views-block-next-page-block-1">
            <div class="form-group">
              <div class="view view-next-page view-id-next_page view-display-id-block_1 js-view-dom-id-608c0efce3b7a27d2693359a7bc3813e7865d9f93981c9f48e85409ee160497a">
                <div class="view-content">
                  <div class="views-row">
                    <div class="views-field views-field-field-next-page">
                      <div class="field-content"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
      <?php require "components/footer.php"; ?>
    </div>
    <?php require "components/javascript.php"; ?>
  </body>
</html>